<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v7.0&appId=633886054140033&autoLogAppEvents=1" nonce="aL0Qdd1Q">
</script>
<div class="content3">
    <div class="wrap-header">
        <div class="card-title">
            <h1>
            <?php
                $idcatalog=$detailPro['id_catalog'];
                $namecatalog=getname("catalog",$idcatalog);
                echo $namecatalog['name'];
            ?>
            </h1>
        </div>
        <div class="wrap-nav">
        <?php
            foreach($catalog3 as $catalog){
                $link = 'index.php?act=product&idcatalog='.$catalog['id'];
                echo '<li><a href="'.$link.'">'.$catalog['name'].'</a></li>';

            }
        ?>
        </div>
    </div>
    <?php
        $id = $detailPro['id'];
        $name = $detailPro['name'];
        $date = $detailPro['date'];
        $rating = $detailPro['rating'];
        $price = $detailPro['price'];
        $detail = $detailPro['detail'];
        $img = $path_img.$detailPro['image'];
        if(is_file($img)){
            $link = '<img src="'.$img.'" alt="'.$name.'" title="'.$name.'">';
        }else{
            $link = $filedefault;
        }

        $idauthor = $detailPro['id_author'];
        $authorname = getname("author",$idauthor);

        $idpub = $detailPro['id_publisher'];
        $publishername = getname("publisher",$idpub);

    ?>
    <div class="wrap-content3">
        <div class="left-wrap-cnt">
            <div class="top-left-wr">
                <div class="card-img">
                    <?=$link;?>
                </div>
                <div class="txt-detail">
                    <h1><?=$name?></h1>
                    <p>Tác giả: <span><?=$authorname['name'];?></span></p>
                    <p>Nhà xuất bản: <span><?=$publishername['name'];?></span></p>
                    <p>Ngày cập nhật: <span> <?=$date;?> </span></p>
                    <p>Đánh giá: <span> <?=$rating;?> sao</span></p>
                    <p>Giá sách: <span class="price"><?=$price;?> vnđ</span></p>
                    <form>
                        <input type="hidden" name="idpro" value="<?= $id ?>">
                        <input type="hidden" name="name" value="<?= $name ?>">
                        <input type="hidden" name="price" value="<?= $price ?>">
                        <input type="hidden" name="img" value="<?= $img ?>">
                        <?php if(isset($_SESSION['id'])): ?>
                        <button type="submit" name="submit" class="add_cart" onclick="return addtocart(this)"><a href>mua sách</a></button>
                        <?php else: ?>
                        <button type="button"><a href="?act=login">mua sách</a></button>
                        <?php endif; ?>
                    </form>
                    <p class="detail"><?=$detail?></p>
                </div>
            </div>
            <div class="comment" id="cmt-section">
                <div class="title-cmt" id="title-cmt">BÌNH LUẬN</div>
                <div class="wrap-cmt">
                    <div class="name">
                        <i class="fas fa-user"></i>Nguyễn Văn Hà |
                        <span class="date">11/08/2020 12:29</span>
                    </div>
                    <div class="text">Sản phẩm này quá tốt</div>
                </div>
                <?php foreach($comments as $comment): ?>
                <div class="wrap-cmt" data-id="<?= $comment['id'] ?>">
                    <div class="name">
                        <i class="fas fa-user"></i><?= $comment['name'] ?> |
                        <span class="date"><?php $date = date_create($comment['date']); echo date_format($date, "d/m/Y H:i"); ?></span>
                    </div>
                    <div class="text"><?= $comment['content'] ?></div>
                    <?php 
                        $user_id = $_SESSION['id'] ?? '';
                        if($comment['user_id'] == $user_id): ?>
                    <div class="edit">
                        <a href="" class="del" data-id="<?= $comment['id'] ?>">Xóa</a>
                    </div>
                    <?php endif; ?>
                </div>
                <?php endforeach; ?>
                <!-- Chặn cmt nếu chưa login -->
                <?php if(isset($_SESSION['id'])): ?>
                    <div class="wrap-cmt">
                        <div class="name">
                            <i class="fas fa-user"></i><?= $_SESSION['user'] ?>
                        </div>
                        <form action="javascript:void(0)">
                            <textarea name="" id="comment" placeholder="Nhập bình luận của bạn tại đây..."></textarea>
                            <input type="submit" id="cmt-sub" name="submit" value="Gửi">
                        </form>
                    </div>
                <?php 
                    else:
                        echo '<a href="?act=login">Đăng nhập để được bình luận</a>';
                    endif; ?>
                <script>
                    //  hàm tạo comment
                    $('#cmt-sub').click(function() {
                        let cmt = $("#comment").val();
                        let userId = <?= $_SESSION['id'] ?? '' ?>;
                        let productId = <?= $_GET['id'] ?>;
                        let cmtInfo = {
                            userId,
                            productId,
                            content : cmt
                        };
                        let cmtInfoJSON = JSON.stringify(cmtInfo);
                        $.ajax({
                            method: "POST",
                            dataType: "json",
                            url: "../model/ajax/set_cmt.php",
                            data: {data: cmtInfoJSON},
                            success: function(data) {
                                $("#comment").val('');
                                $("#title-cmt").after(`<div class="wrap-cmt" data-id=${data.id}>
                                    <div class="name">
                                        <i class="fas fa-user"></i>${data.name} |
                                        <span class="date">${data.date}</span>
                                    </div>
                                    <div class="text">${data.content}</div>
                                    <div class="edit">
                                        <a href="" class="del" data-id="${data.id}">Xóa</a>
                                    </div>
                                </div>`);
                            },
                            error: function(e) {
                                console.log(e.message);
                            }
                        });
                    });
                    // hàm xóa comment
                    $(document).on('click', '.del', function(e) {
                        e.preventDefault();
                        let id = $(this).data("id");
                        $.get(`../model/ajax/del_cmt.php?id=${id}`).done(function(data) {
                            let response = JSON.parse(data);
                            if(response.result) {
                                $('.wrap-cmt').each(function() {
                                    if($(this).data('id') == response.cmt_id)
                                        $(this).remove();
                                });
                            }
                            else
                                alert("đã có lỗi xảy ra vui lòng thử lại!")
                        })
                    });
                </script>
            </div>
        </div>
        <div class="right-wrap-cnt">
            <h1>liên quan</h1>
            <div class="list-img">
                <div class="box-img">
                    <a href="?detailProduct&id=13">
                        <img src="../view/img/img13.jpg" alt="">
                    </a>
                </div>
                <div class="box-img">
                    <a href="?detailProduct&id=14">
                        <img src="../view/img/img14.jpg" alt="">
                    </a>
                </div>
                <div class="box-img">
                    <a href="?detailProduct&id=1">
                        <img src="../view/img/img1.jpg" alt="">
                    </a>
                </div>
                <div class="box-img">
                    <a href="?detailProduct&id=2">
                        <img src="../view/img/img2.jpg" alt="">
                    </a>
                </div>

            </div>
        </div>
    </div>
</div>
<!-----------------mới nhất---------------->
<section class="new-week">
    <div class="product">
        <p>bạn có thể thích</p>
    </div>

    <div class="row">
        <?php
            foreach ($bestseller as $product) {
                $name=$product['name'];
                $img=$path_img.$product['image'];

                $idauthor=$product['id_author'];
                $author=getname("author",$idauthor);

                if(!is_file($img)){
                    $img=$filedefault;
                }
                $view=$product['view'];
                if($view>0){
                    $view.=" lượt xem";
                }else{
                    $view=" mới cập nhật";
                }
                $link="index.php?act=detailProduct&id=".$product['id'];
                echo '
                        <div class="card-book">
                            <div>
                                <a href="'.$link.'"><img src="'.$img.'" alt=""></a>
                                <div class="txt">
                                    <p class="name"><a href="'.$link.'">'.$name.'</a></p>
                                    <p class="author"><a href="">'.$author['name'].'</a></p>
                                    <p class="view">'.$view.'</p>
                                </div>
                            </div>
                        </div>
                    ';
            }
        ?>
    </div>
</section>
<!-------------------mới nhất----------------->
    