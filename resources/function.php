<?php

    $uploads_derectory = "uploads";

    function last_id() {

        global $connection;
        return mysqli_insert_id($connection);

    }



#############################################################################*/

    function redirect($location){

        header("Location:  $location");
    }


//Helper functions

    function set_massage($msg){

        if (!empty($msg)){
            $_SESSION['message'] = $msg;

        }else {
            $msg = "";
        }

    }

//display message
    function display_message(){

        if (isset($_SESSION['message'])){
            echo $_SESSION['message'];
            unset($_SESSION['message']);
        }

    }

    function query ($sql){
    
        global $connection;
        return mysqli_query($connection, $sql);
    }


    function confirm ($result){
   
    global $connection;

    if(!$result){
        die("klaida " . mysqli_error($connection));

    }
}

    function escape_string($string){

        global $connection;
        return mysqli_real_escape_string($connection, $string);
    }

    function fetch_array($result){
        return mysqli_fetch_array($result);   
    }


/*##########################FRONT END FUNCTION############################################################*/
function get_products(){


  $query =  query ("SELECT * FROM product");
  confirm($query);

  while($row = fetch_array($query)){
    $product_image = display_image($row['product_image']);
    
      $product = <<<DELIMETER
       <div class="col-sm-4 col-lg-4 col-md-4">
                        <div class="thumbnail">
                            <a href="item.php?id={$row['product_id']}"> <img     src="../resources/{$product_image}" alt=""></a>
                            <div class="caption">
                                <h4 class="pull-right">{$row['product_preis']}&euro;</h4>
                                <h4><a href="item.php?id={$row['product_id']}">{$row['product_title']}</a>
                                </h4>
                                <p>This is a short description. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
                                <a class="btn btn-primary" target="_blank" href="../resources/cart.php?add={$row['product_id']}">Add to cart</a>
                            </div>

                        </div>
                    </div>
      
DELIMETER;
      echo $product;
  }
}

function get_categories(){
    $query = query("SELECT * FROM categories");
    confirm($query);  

    while($row = fetch_array($query)){


        $category_links = <<<DELIMETER
  <a href='category.php?id={$row['cat_id']}' class='list-group-item'>{$row['cat_title']}</a>

DELIMETER;

echo  $category_links ;

    }

}




/*################BACKEND####################FUNCTION####
*                                                       *
*               Back                                    *
*               End                                     *
*          functions                                    *
*                                                       *
#######################################################*/
function get_products_in_cat_page(){


    $query =  query ("SELECT * FROM product WHERE product_category_id = " . escape_string($_GET['id']) . " ");
    confirm($query);

    while($row = fetch_array($query)){
        
        $product = <<<DELIMETER
        
       <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                    <img src="" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More Info</a>
                        </p>
                    </div>
                </div>
            </div>
DELIMETER;
        echo $product;
    }
}

function get_products_in_shop_page(){


    $query =  query ("SELECT * FROM product");
    confirm($query);

    while($row = fetch_array($query)){

        $product_image = display_image($row['product_image']);
      
        $product = <<<DELIMETER
        
       <div class="col-md-3 col-sm-6 hero-feature">
                <div class="thumbnail">
                <img     src="../resources/{$product_image}" alt="">
                    <div class="caption">
                        <h3>{$row['product_title']}</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>
                        <p>
                            <a href="../resources/cart.php?add={$row['product_id']}" class="btn btn-primary">Buy Now!</a> <a href="item.php?id={$row['product_id']}" class="btn btn-default">More info</a>
                        </p>
                    </div>
                </div>
            </div>
DELIMETER;
        echo $product;
    }
}

##################LOGIN###################################

function login_user(){
  if(isset($_POST['submit'])){
      $username = escape_string($_POST['username']);
      $password = escape_string($_POST['password']);

      $query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}'");
      confirm($query);
     if( mysqli_num_rows($query )== 0){
         set_massage("Your password or username are wrong!!");
         redirect("login.php");
     }else{
         $_SESSION['username'] = $username;
         redirect("admin");
     }
  }

}

//message
function send_message(){
    if(isset($_POST['submit'])) {
$to = "forexlinas@gmail.com";
     $name = $_POST['name'];
        $email = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];
        $headers = "FROM: {$name} {$email}";

       $result = mail($to, $subject, $message, $headers);

       if(!$result) {
           redirect("contact.php");
           set_massage("Negalejome issiusti");
       }else{
           set_massage("YOUR message has been sent");
           redirect("contact.php");
       }


    }

}//end of send_messge

function display_image ($picture){

    global  $uploads_derectory;
    return  $uploads_derectory . DS . $picture;
}


function orders_atvaizdas(){

    $query =  query ("SELECT * FROM orders");
    confirm($query);

    while($row = fetch_array($query)){
       
        $product = <<<DELIMETER
        <tr>
            <td>{$row['order_id']}</td>
            <td>{$row['order_amount']}</td>
            <td>{$row['order_transaction']}</td>
            <td>{$row['order_currency']}</td>
            <td>{$row['order_status']}</td>
            <td><a class="btn btn-danger" href="../../resources/templates/back/delete_order.php?id={$row['order_id']}">Delete</a></td>
           
        </tr>
DELIMETER;
        echo $product;
    }
}

###########################################################################

function product_admin (){
   
    $query = query(" SELECT * FROM product");
    confirm($query);

    while($row = fetch_array($query)) {

        $category = show_product_category_title($row['product_category_id']);

        $product_image = display_image($row['product_image']);

        $product = <<<DELIMETER

        <tr>
            <td>{$row['product_id']}</td>

            <td>
                {$row['product_title']}<br>

             <a href="index.php?edit_product&id={$row['product_id']}">
             <img width='100' src="../../resources/{$product_image}" alt="">
             </a>

            



            </td>


            <td>{$category}</td>
            <td>{$row['product_preis']}</td>
            <td>{$row['product_quantity']}</td>
             <td><a class="btn btn-success" href="index.php?edit_product&id={$row['product_id']}">Edit </a></td>
             
              <td><a class="btn btn-danger" href="../../resources/templates/back/delete_product.php?id={$row['product_id']}">Delete</a> </td>
        </tr>

DELIMETER;

        echo $product;


    }






}

function show_product_category_title($product_category_id){


    $category_query = query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}' ");
    confirm($category_query);



    while($category_row = fetch_array($category_query)) {

        return $category_row['cat_title'];

    }



}

/*###########Admin Products ####################################################
*
 *
 *
 * ############################################################################
*/
function add_product(){
if(isset($_POST['publish'])){
$product_title = escape_string($_POST['product_title']);
    $product_category_id = escape_string($_POST['product_category_id']);
    $product_preis = escape_string($_POST['product_preis']);
    $product_quantity = escape_string($_POST['product_quantity']);
    $product_description = escape_string($_POST['product_description']);
    $short_desc = escape_string($_POST['short_desc']);
    $product_image = $_FILES['file']['name'];
    $image_temp_location = $_FILES['file']['tmp_name'];

    move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);

    $query = query(" INSERT INTO product (product_title, product_category_id, product_preis, product_quantity, product_description, short_desc, product_image) VALUES ('{$product_title}', '{$product_category_id}', '{$product_preis}', '{$product_quantity}', '{$product_description}', '{$short_desc}', '{$product_image}')");

    $last_id = last_id();
    confirm($query);

    set_massage("New Product with id {$last_id} just Added");
    redirect("index.php?products");

}


}

function show_caregories_add_page(){
    $query = query("SELECT * FROM categories");
    confirm($query);

    while($row = fetch_array($query)){

        
        $category_options = <<<DELIMETER
  
  <option value="{$row['cat_id']}">{$row['cat_title']}</option>

DELIMETER;

        echo  $category_options ;

    }

}

/*###########Admin Products ####################################################
*
 *
 *
 * ############################################################################
*/
function update_product()
{
    if (isset($_POST['update'])) {
        $product_title = escape_string($_POST['product_title']);
        $product_category_id = escape_string($_POST['product_category_id']);
        $product_preis = escape_string($_POST['product_preis']);
        $product_quantity = escape_string($_POST['product_quantity']);
        $product_description = escape_string($_POST['product_description']);
        $short_desc = escape_string($_POST['short_desc']);
        $product_image = $_FILES['file']['name'];
        $image_temp_location = $_FILES['file']['tmp_name'];

        if(empty($product_image)){
            $get_pic = query("SELECT product_image FROM product WHERE product_id = ".escape_string($_GET['id'])."");
            confirm($get_pic);
            $row = fetch_array($get_pic);
            $product_image =$row['product_image'];
        }

        move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image);

        $query = " UPDATE product SET ";
        $query .= "product_title = '{$product_title}', ";
        $query .= "product_category_id = '{$product_category_id}', ";
        $query .= "product_preis = '{$product_preis}', ";
        $query .= "product_quantity = '{$product_quantity}', ";
        $query .= "product_description = '{$product_description}', ";
        $query .= "short_desc = '{$short_desc}', ";
        $query .= "product_image = '{$product_image}' ";
        $query .= "WHERE product_id=" . escape_string($_GET['id']);

        $send_update_query = query($query);
        confirm($send_update_query);


        set_massage("New Product with   just Updating");
        redirect("index.php?products");
    }

}

/*####################reports.php ################################################*/
function reports_display(){
    
  $query =  query ("SELECT * FROM reports");
  confirm($query);

  while($row = fetch_array($query)){ ?>
    <tr>
        <td>
            <?php echo $row['report_id'];?>
        </td>
        <td>
            <?php echo $row['product_id'];?>
        </td>
        <td>
            <?php echo $row['order_id'];?>
        </td>
        <td>
            <?php echo $row['product_preis'];?>
        </td>
        <td>
            <?php echo $row['product_title'];?>
        </td>
        <td>
            <?php echo $row['product_quantity'];?>
        </td>
    </tr>
      
  <?php }
}

function categories(){
    $query = query("SELECT * FROM categories");
    confirm($query);

    while($row = fetch_array($query)){ ?>
        <tr>
            <td><?php echo $row['cat_id'] ?></td>
            <td><?php echo  $row['cat_title'];?></td>
        </tr>

  <?php  }
}

function categories_insert($title){
   
    $query = query(" INSERT INTO categories(cat_title)  VALUES('{$title}')");

}








