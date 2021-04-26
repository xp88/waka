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
                        <h2>Cập nhật đơn hàng <?php echo $order['id'];?></h2>
                    </div>
                </div>
                <!-- /. ROW  -->
                <hr />
                <div class="row">
                    <div class="col-lg-12 ">
                    </div>
                </div>
                <!-- /. ROW  -->

                <div class="row text-center pad-top">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <form action="" method="post" enctype="multipart/form-data">
                                        <div style="width: 80%; margin: 0 auto">
                                            <input type="hidden" name="id" value="<?php echo $order['id'] ?>">
                                            <br>
                                            <label for="">Name</label>
                                            <input type="text" name="name" id="" value="<?php echo $order['name'] ?>">
                                            <br>
                                            <label for="">Phone</label>
                                            <input type="tel" name="phone" id="" value="<?php echo $order['phone'] ?>">
                                            <br>
                                            <label for="">Email</label>
                                            <input type="text" name="email" id="" value="<?php echo $order['email'] ?>">
                                            <br>   
                                            <label for="">Address</label>
                                            <textarea name="address" id="" cols="60" rows="3"><?php echo $order['address'] ?></textarea>
                                            <br>
                                            <label for="">ID Status</label>
                                            <input type="number" name="id_status" id="" value="<?php echo $order['id_status'] ?>">
                                            <br>
                                            <label for="">Date</label>
                                            <input type="date" name="date" id="" value="<?php echo $order['date'] ?>">
                                            <br>
                                            <label for="">Position</label>
                                            <input type="number" name="position" id="" value="<?php echo $order['position'] ?>">
                                            <br>
                                            <label for="">Payment</label>
                                            <input type="number" name="payment" id="" value="<?php echo $order['payment'] ?>">
                                            <br>
                                        </div>
                                        <button type="submit" name="Save" class="btn btn-success"><i class="fa fa-check" style="color:white"></i>Lưu</button>
                                    </form>
                            </div>
                    <!-- /. PAGE INNER  -->
                </div>
                <!-- /. PAGE WRAPPER  -->
            </div>