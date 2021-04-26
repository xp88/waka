<section class="section2">
<div class="my_order">
    <div class="od">
        <!-- <p style="font-size: 20px;">Đơn hàng của tôi</p> -->
    <?php 
        if(isset($_SESSION['cart'])){
            echo '
            <table style="width:100%; text-align: left;">
            <tr>
                <th>Tên sản phẩm</th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Số lượng</th>
                <th>Tổng tiền</th>
                <th>Xóa</th>
            </tr>
            ';
            $sum_total = 0;
            for ($i=0; $i < sizeof($_SESSION['cart']); $i++) { 
                $idpro = $_SESSION['cart'][$i][0];
                $total = $_SESSION['cart'][$i][3] * $_SESSION['cart'][$i][4];
                $sum_total += $total;
                $delete = "<a href='index.php?act=viewcart&del=".$idpro."'>Xoa</a>";
                echo '
                    <tr>
                        <td>'.$_SESSION['cart'][$i][1].'<input type="hidden" value="'.$_SESSION['cart'][$i][0].'"></td>
                        <td><img src="'.$_SESSION['cart'][$i][2].'" width="50px" height="80px"></td>
                        <td>'.$_SESSION['cart'][$i][3].'</td>
                        <td>'.$_SESSION['cart'][$i][4].'</td>
                        <td class="total">'.$total.'</td>
                        <td><div onclick="del(this)"><i class="fas fa-eraser"></i></div></td>
                    </tr>
                ';
            }
            echo '
                <tr>
                <td colspan="4">Tổng tiền thanh toán</td>
                <td id="sum">'.$sum_total.'</td>
                <td></td>
                </tr>
            </table>';
        }
    ?>
    </div>
</div>
<?php 
    $total = 0;
    $quantity = 0;
    foreach($_SESSION['cart'] as $item) {
        $total += $item[3];
        $quantity += $item[4];
    }
?>
<div class="checkout">
    <p style="font-size: 20px;">Đặt hàng</p>
    <form action="" method="post">
        <input type="hidden" name="total" value="<?= $total ?>">
        <input type="hidden" name="quantity" value="<?= $quantity ?>">
        <label for="">Tên</label>
        <input type="text" class="box br" name="cus-name" value="<?php echo $u['name']?>" required>
        <label for="">Số điện thoại</label>
        <input type="tel" class="box br" name="tel" value="<?php echo $u['phone']?>" required>
        <label for="">Email</label>
        <input type="email" class="box br" name="email" value="<?php echo $u['email']?>" required>
        <label for="">Địa chỉ giao hàng</label>
        <input type="text" class="box br" name="address" value="<?php echo $u['address']?>" required>
        <label for="">Phương thức thanh toán</label><br><br>
        <input type="radio" name="payment" id="" value="1" checked="checked"><span>Thanh toán khi nhận hàng</span><br><br>
        <input type="radio" name="payment" id="" value="2"><span>Thanh toán điện tử</span><br><br><br>
        <input type="submit" id="sub" name="checkout" value="đặt hàng">
    </form>
</div>
</section>