<section>
    <div class="content pa">
        <div class="left-siderbar ht660">
            <p style="color: #1ba085; font-size: 16px">Xin chào <?=$_SESSION['user'];?> <i style="font-size: 16px;" class="far fa-smile-wink"></i></p>
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
            <p style="font-size: 20px">Chỉnh sửa thông tin cá nhân</p>
            <div class="wrapuser">
                <!--------------------------->
                <form action="" method="post">
                    <div class="row-show">
                        <div class="show-info">
                            <div class="boxx">
                                <span>Họ tên:</span><br>
                                <input type="text" name="name" value="<?= $user['name']; ?>" required>
                            </div>
                            <div class="boxx">
                                <span>Ngày sinh:</span><br>
                                <input type="date" name="date" value="<?= $user['date'] ?? ''; ?>">
                            </div>
                        </div>
                        <div class="show-info">
                            <div class="boxx">
                                <span>Địa chỉ email:</span>
                                <input type="email" name="email" id="" value="<?= $user['email']; ?>" required>
                            </div>
                            <div class="boxx">
                                <span>Giới tính:</span><br>
                                <input type="text" name="gt" id="" value="<?php if($user['gender'] == NULL) echo 'Không xác định'; elseif($user['gender'] == 1) echo 'Nam'; else echo 'Nữ'; ?>">
                            </div>
                        </div>
                        <div class="show-info">
                            <div class="boxx">
                                <span>Số điện thoại:</span>
                                <input type="text" name="tel" id="" value="<?= $user['phone']; ?>" required>
                            </div>
                            <div class="boxx">
                                <span>Địa chỉ nhận hàng:</span><br>
                                <input type="text" name="address" id="" value="<?= $user['address']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <input class="btn-edit" name="btnUpdate" type="submit" value="LƯU THAY ĐỔI">
                </form>
                    <div class="btn-edit">
                        <a href="index.php?act=edit_pass">Thay đổi mật khẩu</a>
                    </div>
            </div>
        </div>
    </div>
</section>