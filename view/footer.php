<div class="slogan">
        <p class="author">MOMO, MICHAEL ENDE</p>
        <p>" Vì thời gian là cuộc sống. Mà chúng ta cảm nhận cuộc sống bằng con tim "</p>
    </div>

    <footer>
        <div class="footer-transparent">
            <div class="information">
                <div>THÔNG TIN HỮU ÍCH</div>
                <P>
                    Review Truyện - Cafe Sách <br><br>
                    Tin waka <br><br>
                    Giới thiệu chung <br><br>
                    Thỏa thuận chung <br><br>
                </P>
                
            </div>
            <div class="contact">
                <div>THÔNG TIN LIÊN HỆ</div>
                <p>
                    Email: support@waka.vn <br><br>
                    Tel: 0243791844 <br><br>
                    Giấy xác nhận Đăng ký hoạt động phát hành xuất bản phẩm điện 
                    tử số 8132/XN-CXBIPH do Cục Xuất bản, <br> In và Phát hành cấp ngày 
                    31/12/2019

                </p>
            </div>
            <div class="connect">
                <div>LIÊN KẾT</div>
                <!-- start font awesome -->
                <a href="#"><i class="fab fa-facebook-f"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-youtube"></i></a>
                <a href="#"><i class="fab fa-linkedin-in"></i></a>
                <!-- end font awesome -->
            </div>
        </div>
    </footer>
    <script>
        window.onscroll = function() {
            myFunction()
        };
        // hiện số hàng trong giỏ sau khi load page
        window.onload = function() {
            showCart();
        }

        var header = document.getElementById("myheader");
        var mylogo = document.getElementById("mylogo");
        var sticky = header.offsetTop;

        function myFunction() {
            if (window.pageYOffset > sticky) {
                header.classList.add("sticky");
                mylogo.classlist.add("small_logo")
            } else {
                header.classList.remove("sticky");
                mylogo.classlist.remove("small_logo")
            }
        }
        
        var slideIndex = 0;
        showSlides();

        function showSlides() {
            var i;
            var slides = document.getElementsByClassName("mySlides");
            var dots = document.getElementsByClassName("dot");
            for (i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            for (i = 0; i < dots.length; i++) {
                dots[i].className = dots[i].className.replace(" active", "");
            }
            slides[slideIndex - 1].style.display = "block";
            dots[slideIndex - 1].className += " active";
            setTimeout(showSlides, 3000); // Change image every 2 seconds
        }

        function addtocart(x){
            this.preventDefault;
            var pa = x.parentNode;
            var id = pa.children[0].value;
            var name = pa.children[1].value;
            var price = pa.children[2].value;
            var img = pa.children[3].value;
            $.post("addtocart.php", {id: id, name: name, price: price, img: img},
                function (data, textStatus, jqXHR) {
                    sessionStorage.setItem('cart', data);
                    $("#countcart").html(data);
                }
            );
            return false;
        }

        function del(x){
            var tr = x.parentNode.parentNode;
            var id = tr.children[0].children[0].value;            
            $(function () {
                $(tr).remove();
                updateSum();
                $.post("delecart.php", {id: id}, function (data, textStatus, jqXHR) {
                    sessionStorage.setItem('cart', data);
                    $("#countcart").html(data);
                    if(checkCartEmpty()) {
                        alert("Đơn hàng trống! Vui lòng thêm hàng vào giỏ");
                        window.location.href = '?act=product';
                    }
                });
            });
        }

        function showCart() {
            $("#countcart").text(sessionStorage.getItem('cart') == 0 ? '' : sessionStorage.getItem('cart'));
        }
        function updateSum() {
            let totalArr = $('.total').toArray();
            if(totalArr.length > 0) {
                let sumTotal = totalArr.map(td => td.innerText).reduce(function(sum = 0, total) {
                        return sum =  parseInt(sum) + parseInt(total);
                    });
                $('#sum').text(sumTotal);
            }
            else 
                $('#sum').text(0);
        }

        function checkCartEmpty() {
            if(sessionStorage.getItem('cart') == 0)
                return true;
            else
                return false;
        }
    </script>
</body>
</html>