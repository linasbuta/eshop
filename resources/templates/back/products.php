

    <h1 class="page-header">
      All Products
        <?php display_message(); ?>
    </h1>
      <h2 class="btn-success text-center"> <?php display_message(); ?>
      </h2>
    <table class="table table-hover">


        <thead>

          <tr>
              <th>Id</th>
              <th>Title</th>
              <th>Category</th>
              <th>Price</th>
              <th>Quantity</th>
              <th>Edit</th>
              <th>Delete</th>
          </tr>
        </thead>
        <tbody>

    <?php product_admin (); ?>
          


      </tbody>
    </table>

              </div>

              </div>
              <!-- /.container-fluid -->

          </div>
          <!-- /#page-wrapper -->

      </div>
      <!-- /#wrapper -->

      <!-- jQuery -->
      <script src="../../../public/admin/js/jquery.js"></script>

      <!-- Bootstrap Core JavaScript -->
      <script src="../../../public/admin/js/bootstrap.min.js"></script>

      <!-- Morris Charts JavaScript -->
      <script src="../../../public/admin/js/plugins/morris/raphael.min.js"></script>
      <script src="../../../public/admin/js/plugins/morris/morris.min.js"></script>
      <script src="../../../public/admin/js/plugins/morris/morris-data.js"></script>

  </body>

  </html>
