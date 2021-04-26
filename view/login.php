<section class="section2">

    <div class="form-transparent">
        <div class="form">
            <div class="sign-up">
                <h2>ĐĂNG NHẬP</h2>
            </div>

            <form action="index.php?act=login" method="post">

                <label for="">Tên Đăng Nhập</label>
                <input class="box" type="text" name="user" placeholder="Tên đăng nhập" required>

                <label for="">Mật Khẩu</label>
                <input class="box" type="password" name="pass" placeholder="Nhập mật khẩu" required>
                <br><br>
                <a class="" href="">Quên mật khẩu</a> 
                <br><br>
                <input class="submit" type="submit" name="login" value="Đăng Nhập">
            </form>
            <?php
                if(isset($txt_err_lg)&&($txt_err_lg!="")){
                    echo "<h3 style='color:red;'>".$txt_err_lg."</h3>";
                }
            ?>
        </div>
    </div>
</section>