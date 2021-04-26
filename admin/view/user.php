<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">

            <li>
                <a href="index.php"><i class="fa fa-desktop "></i>Dashboard <span class="badge">Included</span></a>
            </li>

            <li class="active-link">
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
                <h2>Danh sách người dùng</h2>
                <hr>
            </div>
        </div>

        <div class="row text-center mr-x">

            <div class="card-body">
                <table id="myTable" class="table table-bordered table-dark">
                    <thead style="background-color: rgba(0, 0, 0, 0.3);">
                        <tr>
                            <th scope="col" style="text-align: center;">ID</th>
                            <th scope="col" style="text-align: center;">User</th>
                            <th scope="col" style="text-align: center;">Name</th>
                            <th scope="col" style="text-align: center;">Phone</th>
                            <th scope="col" style="text-align: center;">Email</th>
                            <th scope="col" style="text-align: center;">DOB</th>
                            <th scope="col" style="text-align: center;">Address</th>
                            <th scope="col" style="text-align: center;">Role</th>
                            <th scope="col" style="text-align: center;">Gender</th>
                            <th scope="col" style="text-align: center; width:90px;">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                                    foreach ($users as $u) {
                                        $role = 0;
                                        if ($u['role'] == 1) {
                                            $role = "Admin";
                                        } else $role = "User";
                                        $gender = 0;
                                        if ($u['gender'] == 1) {
                                            $gender = "Nam";
                                        } else if ($u['gender'] == 2) {
                                            $gender = "Nữ";
                                        } else $gender = "Chua xac dinh";
                                        
                                        echo '
                                        <tr>
                                        <td>'.$u['id'].'</td>
                                        <td>'.$u['user'].'</td>
                                        <td>'.$u['name'].'</td>
                                        <td>'.$u['phone'].'</td>
                                        <td>'.$u['email'].'</td>
                                        <td>'.$u['date'].'</td>
                                        <td>'.$u['address'].'</td>
                                        <td>'.$role.'</td>
                                        <td>'.$gender.'</td>
                                        <td style="width:90px;"><a href="index.php?act=user_del&id='.$u['id'].'"><i class="fa fa-eraser" style="font-size:24px"></i></a> | <a href="index.php?act=user_edit&id='.$u['id'].'"><i class="fa fa-edit" style="font-size:24px"></i></a></td>
                                        </tr>
                                        ';
                                    }
                                    ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>