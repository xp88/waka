<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a href="index.php"><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
            </li>

            <li>
                <a href="index.php?act=user"><i class="fa fa-users"></i>Users</a>
            </li>

            <li class="active-link">
                <a href="index.php?act=catalog"><i class="fa fa-book"></i>Danh mục</a>
            </li>

            <li>
                <a href="index.php?act=product"><i class="fa fa-file"></i>Sản phẩm</a>
            </li>

            <li>
                <a href="index.php?act=author"><i class="fa fa-user"></i>Tác giả</a>
            </li>

            <li>
                <a href="index.php?act=publisher"><i class="fa fa-building"></i>NXB</a>
            </li>

            <li>
                <a href="index.php?act=order"><i class="fa fa-th-list"></i>Đơn hàng</a>
            </li>

            <li>
                <a href="index.php?act=comment"><i class="fa fa-align-justify"></i>Comment</a>
            </li>

        </ul>
    </div>
</nav>
<!-- /. NAV SIDE  -->
<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Danh mục</h2>
                <hr>
            </div>
        </div>


        <div class="row text-center mr-x">

            <div class="card-body">
                <a href="index.php?act=catalog_add"><button type="button" class="btn btn-success"><i class="fa fa-plus" style="color:white"></i> Danh mục mới</button></a>
                <table id="myTable" class="table table-bordered table-dark">
                    <thead style="background-color: rgba(0, 0, 0, 0.3);">
                        <tr>
                            <th scope="col" style="text-align: center;">ID</th>
                            <th scope="col" style="text-align: center;">Name</th>
                            <th scope="col" style="text-align: center;">id_paretn</th>
                            <th scope="col" style="text-align: center;">home</th>
                            <th scope="col" style="text-align: center;">pro</th>
                            <th scope="col" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                  foreach ($catalog as $cat) {
                                      echo '
                                      <tr>
                                      <td>'.$cat['id'].'</td>
                                      <td>'.$cat['name'].'</td>
                                      <td>'.$cat['id_paretn'].'</td>
                                      <td>'.$cat['home'].'</td>
                                      <td>'.$cat['pro'].'</td>
                                      <td><a href="index.php?act=catalog_del&cid='.$cat['id'].'"><i class="fa fa-eraser" style="font-size:24px"></i></a> | <a href="index.php?act=catalog_edit&cid='.$cat['id'].'"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                                      </tr>
                                      ';
                                  }
                                  ?>
                    </tbody>
                </table>


            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
</div>