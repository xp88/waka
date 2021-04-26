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

            <li>
                <a href="index.php?act=product"><i class="fa fa-file"></i>Sản phẩm</a>
            </li>

            <li>
                <a href="index.php?act=author"><i class="fa fa-user"></i>Tác giả</a>
            </li>

            <li>
                <a href="index.php?act=publisher"><i class="fa fa-building"></i>NXB</a>
            </li>

            <li class="active-link">
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
                <h2>Đơn hàng</h2><hr>
            </div>
        </div>
        

        <div class="row text-center mr-x">
            
            <div class="card-body">
                <table id="myTable" class="table table-bordered table-dark">
                    <thead style="background-color: rgba(0, 0, 0, 0.3);">
                        <tr>
                            <th scope="col" style="text-align: center;">Order ID</th>
                            <th scope="col" style="text-align: center;">ID Product</th>
                            <th scope="col" style="text-align: center;">Quantity</th>
                            <th scope="col" style="text-align: center;">Email</th>
                            <th scope="col" style="text-align: center;">Address</th>
                            <th scope="col" style="text-align: center;">Status</th>
                            <th scope="col" style="text-align: center;">Total</th>
                            <th scope="col" style="text-align: center;">Date</th>
                            <!-- <th scope="col" style="text-align: center;">Position</th> -->
                            <th scope="col" style="text-align: center;">Payment</th>
                            <th scope="col" style="text-align: center;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                         <!-- <td><?php // echo $order[$i]['position']; ?></td> -->

                        <?php for ($i = 0; $i < count($order); $i++) { 
                            if ($order[$i]['payment'] == 1) {
                                $payment="COD";
                            } else {
                                $payment="E-payment";
                            }?>
                            <tr>
                                <td><a href="index.php?act=order_detail&order_id=<?php echo $order[$i]['id']; ?>"> <?php echo $order[$i]['id']; ?></a></td>
                                <td> <?php echo $order[$i]['name']; ?></td>
                                <td><?php echo $order[$i]['phone']; ?></td>
                                <td><?php echo $order[$i]['email']; ?></td>
                                <td><?php echo $order[$i]['address']; ?></td>
                                <td><?php echo $list_status[$i]['status']; ?></td>
                                <td><?php echo $order[$i]['total']; ?></td>
                                <td><?php echo $order[$i]['date']; ?></td>
                               
                                <td><?php echo $payment; ?></td>
                                <td><a href="index.php?act=order_del&order_id=<?php echo $order[$i]['id']; ?>"><i class="fa fa-eraser" style="font-size:24px"></i></a>|<a href="index.php?act=order_edit&order_id=<?php echo $order[$i]['id']; ?>"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                            

            </div>
            <!-- /. PAGE INNER  -->
        </div>
        <!-- /. PAGE WRAPPER  -->
    </div>
    </div>