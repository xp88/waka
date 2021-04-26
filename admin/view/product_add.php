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
                <h2>Thêm sản phẩm mới</h2>
                <hr/>
            </div>
        </div>

        <div class="row  pad-top">
            <form action="" method="post" enctype="multipart/form-data">
                <div style="width:100%; padding-left:20px">
                    <table id="tab">
                        <tr>
                            <th>Catalog ID</th>
                            <td><input type="number" name="id_catalog" id="" value="" required></td>
                            <th>Name</th>
                            <td><input type="text" name="name" id="" value=""></td>
                            <th>Price</th>
                            <td><input type="number" name="price" id="" value=""></td>
                        </tr>

                        <tr>
                            <th>Author</th>
                            <td><input type="number" name="id_author" id="" value="" required></td>
                            <th>View</th>
                            <td><input type="number" name="view" id="" value=""></td>
                            <th>Publisher</th>
                            <td><input type="number" name="id_publisher" id="" value="" required></td>
                        </tr>

                        <tr>
                            <th>Rating</th>
                            <td> <input type="text" name="rating" id="" value=""></td>
                            <th>Hot</th>
                            <td><input type="number" name="hot" id="" value=""></td>
                            <th>Bestseller</th>
                            <td><input type="number" name="bestseller" id="" value=""></td>
                        </tr>

                        <tr>
                            <th>New</th>
                            <td><input type="number" name="new" id="" value=""></td>
                            <th>Image</th>
                            <td colspan="4">
                                <input type="file" name="new_image" id="">
                            </td>
                        </tr>

                        <tr>
                            <th>Detail</th>
                            <td colspan="4"><textarea name="detail" id="" cols="60" rows="5"></textarea></td>
                        </tr>

                        <tr>
                            <td></td>
                            <td> <button type="submit" name="Save" class="btn btn-success"><i class="fa fa-check" style="color:white"></i>Lưu</button></td>
                        </tr>
                    </table>
                </div>
            </form>
        </div>   
    </div>
</div>