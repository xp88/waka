<section>
    <div class="content pa">
        <div class="left-siderbar ht660">
            <p style="color: #1ba085; font-size: 16px">Xin chào <?=$_SESSION['user']?> <i style="font-size: 16px;" class="far fa-smile-wink"></i></p>
            <span style="font-size: 16px">Quản lý tài khoản</span>
            <ul>
                <li><a href="index.php?act=user">thông tin cá nhân</a></li>
                <li><a href="">tùy chọn thanh toán</a></li>
                <li><a href="index.php?act=sale">mã giảm giá</a></li>
            </ul>
            <span style="font-size: 16px">Đơn hàng của tôi</span>
            <ul>
                <li><a href="index.php?act=my_order">đơn hàng của tôi</a></li>
                <li><a href="">đơn hàng hủy</a></li>
                <li><a href="">sản phẩm đã xem</a></li>
            </ul>
        </div>
        <div class="right-siderbar">
            <div class="od" style="clear: both; padding-top: 20px;">
                <p style="font-size: 20px;">Chi tiết đơn hàng</p>
                <table style="width:100%;text-align: left;">
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>sản phẩm</th>                  
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng tiền</th>
                    </tr>
                    <?php foreach($products as $product): ?>
                        <?php $_SESSION['total'] = $product['total'];
                            $_SESSION['status'] = $product['id_status'];
                        ?>
                        <tr>
                            <td><a href="?act=detailProduct&id=<?=$product['id']?>"><?= ucfirst($product['name']) ?></a></td>
                            <td><img style="width: 50px; height:80px; object-fit: cover;" src="../upload/<?= $product['image'] ?>"></td>
                            <td><?= number_format($product['price']) ?> vnđ</td>
                            <td><?= $product['quantity'] ?></td>
                            <td><?= number_format($product['price'] * $product['quantity']) ?> vnđ</td>
                        </tr>
                    <?php endforeach; ?>
                    <tr>
                        <td colspan=3></td>
                        <td>Tổng tiền thanh toán</td>
                        <td><?= $_SESSION['total'] ?? '' ?> vnđ</td>
                    </tr>
                    <?php if($_SESSION['status'] == 1): ?>
                    <tr><td><input type=button value="Hủy đơn hàng" id="cancel"></td></tr>
                    <?php endif; ?>
                </table>
                <script>
                    $('#cancel').click(function() {
                        let confirm = window.confirm("Xác nhận hủy đơn hàng");
                        if(confirm) {
                            window.location.href = "?act=del_order&id=<?= $_GET['id'] ?>";
                        }
                    });
                </script>
            </div>
        </div>
    </div>
</section>