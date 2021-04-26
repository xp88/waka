<?php
    session_start();
    include "../model/connect.php";
    include "../model/user.php";
    include "../model/catalog.php";
    include "../model/product.php";
    include "../model/author.php";
    include "../model/publisher.php";
    include "../model/order.php";
    include "../model/comment.php";
    include "../model/status.php";
    include "../view/global.php"; 
    include "../view/header.php";

    if (!isset($_SESSION['admin'])) {
        header('location: ../../index.php');
    } else {
        if(isset($_GET['act'])){
            $act = $_GET['act'];
            switch($act){
                
                case 'user':
                    $users=allUsers();
                    include "../view/user.php";
                    break;

                case 'user_del':
                    $id = $_GET['id'];
                    delUser($id);
                    header('location: index.php?act=user');
                    break;

                case 'user_edit':
                    $id = $_GET['id'];
                    $u = getUser($id);
                    if (isset($_POST['Save'])) {
                        $id = $_POST['id'];
                        $user = $_POST['user'];
                        $pass = $_POST['pass'];
                        $newpass = $_POST['newpass'];
                        if ($newpass != "" && (!password_verify($newpass, $pass))) {
                            $pass = password_hash($newpass, PASSWORD_BCRYPT);
                        }
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $date = $_POST['date'];
                        $address = $_POST['address'];
                        $gender = $_POST['gender'];
                        $result = updateUser($id, $user, $name, $pass, $phone, $email, $date, $address, $gender);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("Đã cập nhật thông tin người dùng!");
                            window.location.href = "index.php?act=user";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Cập nhật thất bại!");
                            window.location.href = "index.php?act=user";
                                </script>
                            ';
                        }
                    }
                    include "../view/user_edit.php";
                    break;

                case 'catalog':
                    $catalog = allCatalogs();
                    include "../view/catalog.php";
                    break;
                
                case 'catalog_del':
                    $cid = $_GET['cid'];
                    delCatalog($cid);
                    header('location: index.php?act=catalog');
                    break;
    
                case 'catalog_edit':
                    $id = $_GET['cid'];
                    $cat = getCatalog($id);
                    if (isset($_POST['Save'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $id_paretn = $_POST['id_paretn'];
                        $home = $_POST['home'];
                        $pro=$_POST['pro'];
                        $result = updateCatalog($id, $name, $id_paretn, $home, $pro);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("Đã cập nhật danh mục thành công!");
                            window.location.href = "index.php?act=catalog";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Cập nhật thất bại!");
                            window.location.href = "index.php?act=catalog";
                                </script>
                            ';
                        }
                    }
                    include "../view/catalog_edit.php";
                    break;
                case 'catalog_add':
                    if (isset($_POST['Save'])){
                        $name = $_POST['name'];
                        $id_paretn = $_POST['id_paretn'];
                        $home = $_POST['home'];
                        $pro=$_POST['pro'];
                        $result = addCatalog($name, $id_paretn, $home, $pro);
                        if ($result > 0) {
                            echo '
                            <script type="text/javascript">
                            alert("Đã tạo danh mục mới!");
                            window.location.href = "index.php?act=catalog";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Không tạo được danh mục mới!");
                            window.location.href = "index.php?act=catalog";
                                </script>
                            ';
                        }
                    }
                    include "../view/catalog_add.php";
                    break;
                case 'product':
                    $products = allProducts();
                    include "../view/product.php";
                    break;
                    
                case 'product_del':
                    $id = $_GET['pid'];
                    delProduct($id);
                    header('location: index.php?act=product');
                    break;
    
                case 'product_edit':
                    $id = $_GET['pid'];
                    $p = getProductDetail($id);
    
                    if (isset($_POST['Save'])) {
                        $id = $_POST['id'];
                        $id_catalog = $_POST['id_catalog'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $id_author=$_POST['id_author'];
                        $detail = $_POST['detail'];
                        $view = $_POST['view'];
                        $rating = $_POST['rating'];
                        $hot = $_POST['hot'];
                        $bestseller = $_POST['bestseller'];
                        $new = $_POST['new'];
                        if ($_FILES['new_image']['name']) {
                            $new_image = $_FILES['new_image']['name'];
                            $tmp_image = $_FILES['new_image']['tmp_name'];
                            move_uploaded_file($tmp_image, "../../upload/" . $new_image);
                        } else $new_image = $p['image'];
                        $result = updateProduct($id, $id_catalog, $name, $new_image, $price, $id_author,  $detail, $view, $rating, $hot, $bestseller, $new);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("Đã cập nhật sản phẩm thành công!");
                            window.location.href = "index.php?act=product";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Cập nhật thất bại!");
                            window.location.href = "index.php?act=product";
                                </script>
                            ';
                        }
                    }
                    include "../view/product_edit.php";
                    break;
    
                case 'product_add':
                    if (isset($_POST['Save'])) {
                        $id_catalog = $_POST['id_catalog'];
                        $name = $_POST['name'];
                        $price = $_POST['price'];
                        $id_author=$_POST['id_author'];
                        $detail = $_POST['detail'];
                        $view = $_POST['view'];
                        $id_publisher=$_POST['id_publisher'];
                        $rating = $_POST['rating'];
                        $hot = $_POST['hot'];
                        $bestseller = $_POST['bestseller'];
                        $new = $_POST['new'];
                        if ($_FILES['new_image']['name']) {
                            $new_image = $_FILES['new_image']['name'];
                            $tmp_image = $_FILES['new_image']['tmp_name'];
                            move_uploaded_file($tmp_image, "../../upload/" . $new_image);
                        } else $new_image=NULL;
    
                        $result = addProduct($id_catalog, $name, $new_image, $price, $id_author,  $detail, $view, $id_publisher,$rating, $hot, $bestseller, $new);
                        
                        if ($result > 0) {
                            echo '
                            <script type="text/javascript">
                            alert("Đã tạo sản phẩm mới!");
                            window.location.href = "index.php?act=product";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Không tạo được sản phẩm mới!");
                            window.location.href = "index.php?act=product";
                                </script>
                            ';
                        }
                    }
                    include "../view/product_add.php";
                    break;
                case 'author':
                    $author = allAuthors();
                    include "../view/author.php";
                    break;
                case 'author_del':
                    $id = $_GET['auid'];
                    delAuthor($id);
                    header('location: index.php?act=author');
                    break;
                case 'author_edit':
                    $id = $_GET['auid'];
                    $a = getAuthor($id);
                    if (isset($_POST['Save'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $result = updateAuthor($id, $name);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("Cập nhật thông tin tác giả thành công!");
                            window.location.href = "index.php?act=author";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Cập nhật thất bại!");
                            window.location.href = "index.php?act=author";
                                </script>
                            ';
                        }
                    }
                    include "../view/author_edit.php";
                    break;
    
                case 'author_add':
                    if (isset($_POST['Save'])){
                        $name = $_POST['name'];
                        $result = addAuthor($name);
                        if ($result > 0) {
                            echo '
                            <script type="text/javascript">
                            alert("Đã thêm tác giả mới!");
                            window.location.href = "index.php?act=author";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Không tạo được tác giả mới!");
                            window.location.href = "index.php?act=author";
                                </script>
                            ';
                        }
                    }
                    include "../view/author_add.php";
                    break;
                case 'publisher':
                    $publisher = allPublishers();
                    include "../view/publisher.php";
                    break;
                case 'publisher_del':
                    $id = $_GET['pid'];
                    delPublisher($id);
                    header('location: index.php?act=publisher');
                    break;
                case 'publisher_edit':
                    $id = $_GET['pid'];
                    $p = getPublisher($id);
                    if (isset($_POST['Save'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $result = updatePublisher($id, $name);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("Cập nhật NXB thành công!");
                            window.location.href = "index.php?act=publisher";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Cập nhật thất bại!");
                            window.location.href = "index.php?act=publisher";
                                </script>
                            ';
                        }
                    }
                    include "../view/publisher_edit.php";
                    break;
                case 'publisher_add':
                    if (isset($_POST['Save'])){
                        $name = $_POST['name'];
                        $result = addPublisher($name);
                        if ($result > 0) {
                            echo '
                            <script type="text/javascript">
                            alert("Đã thêm NXB mới!");
                            window.location.href = "index.php?act=publisher";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Không tạo được NXB mới!");
                            window.location.href = "index.php?act=publisher";
                                </script>
                            ';
                        }
                    }
                    include "../view/publisher_add.php";
                    break;
                
                case 'order':
                    $order = allOrders();
                    $list_status = getListStatus();
                    include "../view/order.php";
                    break;

                case 'order_del':
                    $id = $_GET['order_id'];
                    delOrder($id);
                    header('location: index.php?act=order');
                    break;

                case 'order_edit':
                    $id = $_GET['order_id'];
                    $order = getOrder($id);
                    if (isset($_POST['Save'])) {
                        $id = $_POST['id'];
                        $name = $_POST['name'];
                        $phone = $_POST['phone'];
                        $email = $_POST['email'];
                        $address = $_POST['address'];
                        $id_status = $_POST['id_status'];
                        $date = $_POST['date'];
                        $position = $_POST['position'];
                        $payment = $_POST['payment'];
                        $result = updateOrder($id, $name, $phone, $email, $address, $id_status, $date, $position, $payment);
                        if ($result) {
                            echo '
                            <script type="text/javascript">
                            alert("Cập nhật đơn hàng thành công!");
                            window.location.href = "index.php?act=order";
                            </script>
                            ';
                            } else {
                                echo '
                            <script type="text/javascript">
                            alert("Cập nhật thất bại!");
                            window.location.href = "index.php?act=order";
                                </script>
                            ';
                        }
                    }
                    include "../view/order_edit.php";
                    break;
                
                case 'order_detail':
                    $id = $_GET['order_id'];
                    $list_order = getOrderDetail($id);
                    $list_product = orderDetailProduct($id);
                    include "../view/order_detail.php";
                    break;
                case 'comment':
                    $comments = get_comments();
                    include '../view/comment.php';
                    break;
                case 'comment_del':
                    $cmt_id = $_GET['id'];
                    $result = del_comment_by_id($cmt_id);
                    if($result) {
                        header('Location: ?act=comment');
                    }
                    else {
                        echo "<script>alert(`đã có lỗi xảy ra vui lòng thử lại`)</script>";
                    }
                    break;
                
                case 'logout':
                    if(isset($_SESSION['id'])) unset($_SESSION['id']);
                    if(isset($_SESSION['user'])) unset($_SESSION['user']);
                    if(isset($_SESSION['admin'])) unset($_SESSION['admin']);
                    header('location: ../../index.php');
                    break;
                
                default:
                    include "../view/home.php";
            }
            
        }
        else {
            include "../view/home.php";
        }
    }
    include "../view/footer.php";
?>