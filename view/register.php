<section class="section2">
        <div class="form-transparent">
            <div class="form">
                <div class="sign-up">
                    <h2>ĐĂNG KÝ</h2>
                </div>
                <form action="index.php?act=register" method="post">
                    <label for="">Tên </label>
                    <input class="box" type="text" name="name" placeholder="Nhập tên..." required>
                    <label for="">Email</label>
                    <input class="box" type="email" name="email" placeholder="Nhập email" required>
                    <label for="">Tên Đăng Nhập</label>
                    <input class="box" type="text" name="user" placeholder="Tên đăng nhập" required>
                    <label for="">Mật Khẩu</label>
                    <input class="box" type="password" name="pass" id="password" placeholder="Nhập mật khẩu" required> 
                    <label for="">Xác Nhận Mật Khẩu</label>
                    <input class="box" type="password" name="" id="re-pass" placeholder="Xác nhận mật khẩu" required>
                    <input type="checkbox" name="agree" required> Tôi đồng ý. <br><br>
                    <input class="submit" type="submit" name="submit" value="Đăng Ký">
                </form>
                <?php
                    if(isset($txt_err_user)&&($txt_err_user!="")){
                        echo "<h2>".$txt_err_user."</h2>";
                    }
                ?>
            </div>
        </div>
    </section>

    <script>
    function checkPass(pass1, pass2){
        if (pass1 == pass2) {
            return true;
        } else return false;
    }

    $('#re-pass').focusout(function() {
        let pass1 = $('#password').val();
        let pass2 = $('#re-pass').val();
        if (!checkPass(pass1, pass2)) {
            alert("Sai xac nhan mat khau!");
        }
    });
</script>