

  <?php add_product(); ?>



  <div class="col-md-12">

    <div class="row">
      <h1 class="page-header">
        Add Product

      </h1>
    </div>



  <form action="" method="post" enctype="multipart/form-data">


  <div class="col-md-8">

    <div class="form-group">
        <label for="product-title">Product Title </label>
            <input id="product-title" type="text" name="product_title" class="form-control">
          
    </div>

    <div class="form-group">
          <label for="product_description">
          Product Description</label>

          <textarea name="product_description" id="product_description" cols="30" rows="10" class="form-control">
          </textarea>
    </div>

    <div class="form-group row">

      <div class="col-xs-3">
        <label for="product-price">Product Price</label>
        <input id="product-price" type="number" step="0.01" name="product_preis" class="form-control" size="60">
      </div>
    </div>

    <div class="form-group">
        <label for="short_desc">Short desc</label>
        <textarea name="short_desc" id="short_desc" cols="30" rows="5" class="form-control"></textarea>
    </div>
       

    </div><!--Main Content-->


  <!-- SIDEBAR-->


  <aside id="admin_sidebar" class="col-md-4">

      
      <div class="form-group">
       
          <input type="submit" name="publish" class="btn btn-primary btn-lg" value="Publish">
      </div>


      <!-- Product Categories-->

      <div class="form-group">
          <label for="product_category">Product Category</label>

          <select name="product_category_id" id="product_category" class="form-control">
              <option value="">Select Category</option>
            <?php show_caregories_add_page(); ?>
          </select>


  </div>

      <div class="form-group">
        <label for="product_quantity">Product Quantity</label>
          <input id="product_quantity"  type="number" name="product_quantity" class="form-control ">
      </div>

      <!-- Product Image -->
      <div class="form-group">
          <label for="product_image">Product Image</label>
          <input type="file" name="file">
        
      </div>

  </aside><!--SIDEBAR-->
     
  </form>



                  

