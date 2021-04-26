<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a href="index.php"><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
            </li>

            <li>
                <a href="index.php?act=user"><i class="fa fa-users"></i>Users</a>
            </li>

            <li>
                <a href="index.php?act=catalog"><i class="fa fa-book"></i>Danh mục</a>
            </li>

            <li class="active-link">
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
                <h2>Danh sách sản phẩm</h2>
                <hr />
            </div>
        </div>


        <div class=" pad">
            <a href="index.php?act=product_add"><button type="button" class="btn btn-success"><i class="fa fa-plus" style="color:white"></i> Sản phẩm mới</button></a>
            <table id="tab_pro">
                <thead style="background-color: rgba(0, 0, 0, 0.3);">
                    <tr>
                        <!-- <th  >ID</th>
                        <th  >Catalog</th> -->
                        <th class="name">Name</th>
                        <th>Image</th>
                        <th>Price</th>
                        <!-- <th  >Author</th> -->
                        <th>Detail</th>
                        <th>View</th>
                        <th>Rating</th>
                        <!-- <th  >Hot</th>
                        <th  >Bestseller</th>
                        <th  >New</th> -->
                        <th >Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- ẩn di
                            <td>'.$p['id'].'</td>      
                            <td>'.$p['id_catalog'].'</td> 
                            <td>'.$p['id_author'].'</td>
                            <td>'.$p['hot'].'</td>
                            <td>'.$p['bestseller'].'</td>
                            <td>'.$p['new'].'</td>
                    -->
                    <?php
                    foreach ($products as $p) {
                        echo '
                        <tr>
                                            
                            <td class="name">'.$p['name'].'</td>                                  
                            <td><img src="../../upload/'.$p['image'].'" alt="" style="height: 80px; width=50px;"></td>
                            <td>'.number_format($p['price'], 0, ",", ".").'</td>
                              
                            <td><div id="detail">'.$p['detail'].'</div></td>
                            <td>'.$p['view'].'</td>
                            <td>'.$p['rating'].'</td>
                            
                            <td style="width:90px;"><a href="index.php?act=product_del&pid='.$p['id'].'"><i class="fa fa-eraser" style="font-size:24px"></i></a> | <a href="index.php?act=product_edit&pid='.$p['id'].'"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
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