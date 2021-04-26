<section>
    <div class="wrap-header">
        <div class="card-title">
            <h1>
                kết quả tìm kiếm với từ khóa: 
                <?php
                    if(isset($listsearch) && ($listsearch!='')){
                        echo $_POST['keyword'];
                    }
                ?>
            </h1>
        </div>
        <div class="wrap-nav">
        <?php
            
        ?>
        </div>
    </div>
    <div class="row-book">
        <?php
        if($listsearch){
            foreach ($listsearch as $product) {
                $id = $product['id'];
                $name = $product['name'];
                $price = $product['price'];
                $img = $path_img.$product['image'];
                if(!is_file($img)){
                    $img=$filedefault;
                }
                $view=$product['view'];
                if($view>0){
                    $view.=" lượt xem";
                }else{
                    $view="mới cập nhật";
                }
                $link="index.php?act=detailProduct&id=".$product['id'];
                if(isset($_SESSION['id'])) {
                    echo '
                        <div class="book">
                            <a href="'.$link.'"><img src="'.$img.'" alt=""></a>
                            <a href="'.$link.'"><p class="name">'.$name.'</p></a>
                            <span class="view">'.$view.'</span>
                            <span class="price">'.number_format($price, 0,',','.') .' vnđ</span>
                            <form>
                                <input type="hidden" name="idpro" value="'.$id.'">
                                <input type="hidden" name="name" value="'.$name.'">
                                <input type="hidden" name="price" id="pri" value="'.$price.'">
                                <input type="hidden" name="img" value="'.$img.'">
                                <button type="button" class="addcart" onclick="addtocart(this)">Thêm <i class="fas fa-cart-plus"></i></button>
                            </form>   
                        </div>';
                }
                else {
                    echo '
                        <div class="book">
                            <a href="'.$link.'"><img src="'.$img.'" alt=""></a>
                            <a href="'.$link.'"><p class="name">'.$name.'</p></a>
                            <span class="view">'.$view.'</span>
                            <span class="price">'.number_format($price, 0,',','.') .' vnđ</span>
                            <form>
                                <input type="hidden" name="idpro" value="'.$id.'">
                                <input type="hidden" name="name" value="'.$name.'">
                                <input type="hidden" name="price" id="pri" value="'.$price.'">
                                <input type="hidden" name="img" value="'.$img.'">
                                <button type="button" class="addcart" name="submit"><a href="?act=login">Thêm <i class="fas fa-cart-plus"></i></a></button>
                            </form>   
                        </div>';
                }
            }
        }else{
            echo 'Not Found Data';
        }
        ?>
    </div>
</section>