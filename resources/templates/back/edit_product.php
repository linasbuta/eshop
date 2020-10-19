

<?php 


    if(isset($_GET['id'])){
        $query = query("SELECT * FROM product WHERE product_id = ".escape_string($_GET['id']). " ");

        confirm($query);

        while ($row = fetch_array($query)){
            $product_title = escape_string($row['product_title']);
            $product_category_id = escape_string($row['product_category_id']);
            $product_preis = escape_string($row['product_preis']);
            $product_quantity = escape_string($row['product_quantity']);
            $product_description = escape_string($row['product_description']);
            $short_desc = escape_string($row['short_desc']);
            $product_image = $row['product_image'];
            $product_img = display_image($row['product_image']);
        }
    
        update_product();
    }

?>



    <div class="col-md-12">

        <div class="row">
            <h1 class="page-header">
                Edit Product

            </h1>
        </div>



        <form action="" method="post" enctype="multipart/form-data">


            <div class="col-md-8">

                <div class="form-group">
                    <label for="product-title">Product Title </label>
                    <input id="product-title" type="text" name="product_title" class="form-control" value="<?php echo $product_title ; ?>">

                </div>


                <div class="form-group">
                    <label for="product_description">Product Description</label>
                    <textarea name="product_description" id="product_description" cols="30" rows="10" class="form-control"><?php echo $product_description ; ?></textarea>
                </div>



                <div class="form-group row">

                    <div class="col-xs-3">
                        <label for="product-price">Product Price</label>
                        <input type="number" name="product_preis" id="product-price" class="form-control" size="60" value="<?php echo $product_preis ; ?>">
                    </div>
                </div>

                <div class="form-group">
                    <label for="short-desc">Short desc</label>
                    <textarea name="short_desc" id="short-desc" cols="30" rows="5" class="form-control"><?php echo $short_desc ; ?></textarea>
                </div>


            </div>

            <aside id="admin_sidebar" class="col-md-4">


                <div class="form-group">
                
                    <input type="submit" name="update" class="btn btn-primary btn-lg" value="Update">
                </div>


                <!-- Product Categories-->

                <div class="form-group">
                    <label for="product_category">Product Category</label>

                    <select name="product_category_id" id="product_category" class="form-control">
                        <option value=""><?php echo  show_product_category_title($product_category_id) ;?></option>
                        <?php show_caregories_add_page(); ?>
                    </select>


                </div>

                <div class="form-group">
                    <label for="product-quantity">Product Quantity</label>
                    <input  type="number" name="product_quantity" class="form-control " id="product-quantity"
                    value="<?php echo $product_quantity ; ?>">
                </div>


            
                <!-- Product Image -->
                <div class="form-group">
                    <label for="product-image">Product Image</label>
                    <input type="file" name="file" id="product-image"><br>
                    
                    <img width="100" src="../../resources/<?php echo $product_img ;?>" alt="">

                </div>



            </aside>



        </form>



                    

