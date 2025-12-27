<?php
if (basename($_SERVER['PHP_SELF']) == basename(__FILE__)) {
    header('location:Wisatas.php');
}
?>

<footer>
    <div class="container-fluid bg-dark">
        <div class="container-xl py-4">
            <div class="row mx-auto bg-dark">
                <div class="col-md-4 newsletter">
                    <h5>SUBSCRIBE TO OUR</h5>
                    <h1>NEWSLETTER</h1>
                </div>
                <div class="col-md-2"></div>
                <div class="col-md-6 letterform">
                    <form>
                        <input type="email" class="form-control rounded-pill" placeholder="Enter Email" id="email" name="email">
                        <button type="button" class="btn btn-dark rounded-pill" id="buttonemail" name="buttonemail" onclick="return clickButton();">SUBMIT</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid bg-secondary">
        <div class="container-xl py-5 bg-secondary">
            <div class="row mx-auto bg-secondary">
                <div class="col-md-12 kolomfooter text-center">
                    <a href="Wisatas.php" class="navbrandfooter"><i class="fa fa-plane fa-3x">&nbsp;Wisata</i></a>
                    <h6 class="mt-3">Lorem Ipsum is simply dummy text of the printing and typesetting industry</h6>
                    <div class="icon"><a href="#"><i class="fa fa-facebook fa-2x"></i></a>
                        <a href="#"><i class="fa fa-twitter fa-2x"></i></a>
                        <a href="#"><i class="fa fa-instagram fa-2x"></i></a>
                        <a href="#"><i class="fa fa-pinterest fa-2x"></i></a>
                        <a href="#"><i class="fa fa-youtube-play fa-2x"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script type="text/javascript">
    function clickButton() {
        var email = document.getElementById('email').value;
        document.getElementById('email').value = '';
        $.ajax({
            type: "post",
            url: "send_email.php",
            data: {
                'email': email
            },
            cache: false,
            success: function(html) {
                alert('Data Send');
                $('#msg').html(html);
            }
        });
        return false;
    }
</script>