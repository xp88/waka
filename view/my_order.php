<section>
    <div class="content pa">
        <div class="left-siderbar ht660">
            <p style="color: #1ba085; font-size: 16px">Xin chào <?= $_SESSION['user'] ?> <i style="font-size: 16px;" class="far fa-smile-wink"></i></p>
            <span style="font-size: 16px">Quản lý tài khoản</span>
            <ul>
                <li><a href="index.php?act=user">thông tin cá nhân</a></li>
                <li><a href="">tùy chọn thanh toán</a></li>
                <li><a href="index.php?act=sale">mã giảm giá</a></li>
            </ul>
            <span style="font-size: 16px">Đơn hàng của tôi</span>
            <ul>
                <li><a href="index.php?act=my_order">đơn hàng của tôi</a></li>
                <li><a href="?act=del_order">đơn hàng hủy</a></li>
                <li><a href="?act=viewed">sản phẩm đã xem</a></li>
            </ul>
        </div>
        <div class="right-siderbar">            
            <div class="od" style="clear: both; padding-top: 20px;">
                <p style="font-size: 20px;">Đơn hàng của tôi</p>
                <table style="width:100%;text-align: left;">
                    <tr>
                        <th>Mã đơn hàng</th>
                        <th>Tổng tiền</th>
                        <th>Số lượng</th>
                        <th>Trạng thái</th>
                        <th>Ngày đặt</th>
                        <th></th>
                    </tr>
                <?php 
                    echo '';
                    if(count($orders) > 0) {
                        foreach($orders as $order) {
                            echo '<tr>
                            <td>'.$order['id'].'</td>
                            <td>'.number_format($order['total']).' vnđ</td>
                            <td>'.$order['quantity'].'</td>
                            <td>'.$order['status'].'</td>
                            <td>'.$order['date'].'</td>
                            <td><a href="?act=detail_order&id='.$order['id'].'">Chi tiết</a></td>
                        </tr>';
                        }
                    }
                    else {
                        echo '<td style=""><h3>Bạn chưa mua sản phẩm nào</h3></td>';
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</section>