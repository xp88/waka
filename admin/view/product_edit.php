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

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-lg-12">
                <h2>Cập nhật thông tin sản phẩm</h2>
                <hr>
            </div>
        </div>


        <div class="row  pad-top">
            <form action="" method="post" enctype="multipart/form-data">
                <div style="width:100%; padding-left:20px">
                    <table id="tab">
                        <tr>
                            <input type="hidden" name="id" id="" value="<?php echo $p['id'] ?>">
                            <th>Catalog ID:</th>
                            <td><input type="number" name="id_catalog" id="" value="<?php echo $p['id_catalog'] ?>"></td>
                            <th>Name</th>
                            <td><input type="text" name="name" id="" value="<?php echo $p['name'] ?>"></td>
                            <th>Price</th>
                            <td><input type="number" name="price" id="" value="<?php echo $p['price'] ?>"></td>
                        </tr>

                        <tr>
                            <th>Author</th>
                            <td><input type="text" name="id_author" id="" value="<?php echo $p['id_author'] ?>"></td>
                            <th>View</th>
                            <td><input type="number" name="view" id="" value="<?php echo $p['view'] ?>"></td>
                            <th>Publisher</th>
                            <td><input type="number" name="id_publisher" id="" value="<?php echo $p['id_publisher'] ?>"></td>
                        </tr>

                        <tr>
                            <th>Rating</th>
                            <td> <input type="text" name="rating" id="" value="<?php echo $p['rating'] ?>"></td>
                            <th>Hot</th>
                            <td><input type="number" name="hot" id="" value="<?php echo $p['hot'] ?>"></td>
                            <th>Bestseller</th>
                            <td><input type="number" name="bestseller" id="" value="<?php echo $p['bestseller'] ?>"></td>
                        </tr>

                        <tr>
                            <th>New</th>
                            <td><input type="number" name="new" id="" value="<?php echo $p['new'] ?>"></td>
                            <th>Image</th>
                            <td colspan="4">
                                <input type="file" name="new_image" id="">
                            </td>
                        </tr>

                        <tr>
                            <th>Detail</th>
                            <td colspan="4"><textarea name="detail" id="" cols="60" rows="5"><?php echo $p['detail'] ?></textarea></td>
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

<!-- <div class="row text-center pad-top">
                    <div class="card-header"></div>
                    <div class="card-body" style="width: 80%; margin: 0 auto;">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div style="width: 30%; float:left">
                                <img src="../../upload/<?php echo $p['image'] ?>" style="width: 200px;" alt="">
                                <input type="file" name="new_image" id="">
                            </div>
                            <div style="width: 70%; float:left">
                                <label for="">Product ID</label>    
                                <input type="hidden" name="id" value="<?php echo $p['id'] ?>">
                                <input type="number" name="" id="" disabled value="<?php echo $p['id'] ?>">
                                <br>
                                <label for="">Catalog ID</label>
                                <input type="number" name="id_catalog" id="" value="<?php echo $p['id_catalog'] ?>">
                                <br>
                                <label for="">Name</label>
                                <input type="text" name="name" id="" value="<?php echo $p['name'] ?>">
                                <br>   
                                <label for="">Price</label>
                                <input type="number" name="price" id="" value="<?php echo $p['price'] ?>">
                                <br>
                                <label for="">Author</label>
                                <input type="text" name="id_author" id="" value="<?php echo $p['id_author'] ?>">
                                <br>
                                <label for="">Detail</label>
                                <textarea name="detail" id="" cols="60" rows="5"><?php echo $p['detail'] ?></textarea>
                                <br>                           
                                <label for="">View</label>
                                <input type="number" name="view" id="" value="<?php echo $p['view'] ?>">
                                <br>
                                <label for="">Rating</label>
                                <input type="text" name="rating" id="" value="<?php echo $p['rating'] ?>">
                                <br>
                                <label for="">Hot</label>
                                <input type="number" name="hot" id="" value="<?php echo $p['hot'] ?>">
                                <br>
                                <label for="">Bestseller</label>
                                <input type="number" name="bestseller" id="" value="<?php echo $p['bestseller'] ?>">
                                <br>
                                <label for="">New</label>
                                <input type="number" name="new" id="" value="<?php echo $p['new'] ?>">
                                <br>
                            </div>
                            <button type="submit" name="Save" class="btn btn-success"><i class="fa fa-check" style="color:white"></i>Lưu</button>
                        </form>
                    </div>
                    
                </div> -->