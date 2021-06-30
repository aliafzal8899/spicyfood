<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="css/login.css">
    <!-- fonts -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Lobster&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.theme.default.min.css">

</head>

<body>
    <?php include "assets/_nav.php" ?>
    <section class="login_Section flex xy-center">
        <div class="login_main">
            <div class="login_banner Burger_background">

                <div class="form Signup_form">
                    <div class="Primary_heading_acc">
                        <h2>Create an Account</h2>

                    </div>
                    <form action="ajax/_signup.php" class="ajax" method="POST">
                        <div class=" marset_signup">
                            <!--  -->
                            <div class="input_form">
                                <input type="text" placeholder="Enter First Name" name="first-name" id="first-name">
                            </div>
                            <!--  -->
                            <div class="input_form">
                                <input type="text" placeholder="Enter Last name" name="second-name" id="second-name">
                            </div>
                            <!--  -->
                        </div>
                        <!--  -->

                        <!--  -->
                        <div class="input_form">
                            <input type="email" placeholder="Enter Your Email" name="email" id="email">
                        </div>
                        <!--  -->
                        <span class="checker_avail" id="status"> </span>
                        <!--  -->
                        <div class="input_form">
                            <input type="password" placeholder="Enter Password" name="pass" id="pass">
                        </div>
                        <div class="input_button">
                            <button id="sbtn" type="submit">Sign up</button>
                            <button id="loaderspin" class="d-none">
                                <div class="loader"></div>
                            </button>
                        </div>


                    </form>
                </div>
            </div>
        </div>
    </section>
    <?php
    include "assets/_footer.php";
    ?>
    <script src="jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#email").on("keyup", function() {
                var that = $(this)
                console.log(that.val())
                data = {};
                name = "email"
                data[name] = that.val();
                console.log(data)
                $.ajax({
                    url: 'ajax/_signup-checker.php',
                    type: "POST",
                    data: data,
                    success: function(response) {
                        // console.log(response);
                        // window.alert(response)

                        if (response.trim() == "welcome") {
                            // window.alert="hey";
                            var a = document.getElementById("status");
                            a.innerText = "Available";
                            a.className = "checker_avail";
                            b=document.getElementById("sbtn");
                            b.disabled=false;
                            b.style.background="green";
                            // window.location="login.php";
                        } else {
                            var a = document.getElementById("status");
                            a.innerText = "Not Available !";
                            a.className = "not_Available";
                            b=document.getElementById("sbtn");
                            b.disabled=true;
                            b.style.background="black";
                        }
                    }
                });
                return false;
            });

            $("form.ajax").on("submit", function() {
                var that = $(this),
                    url = that.attr('action'),
                    method = that.attr('method'),
                    data = {};
                that.find('[name]').each(function(index, value) {
                    var that = $(this),
                        name = that.attr('name'),
                        value = that.val()
                    data[name] = value;
                });
                $.ajax({
                    url: url,
                    type: method,
                    data: data,
                    success: function(response) {
                        

                        if (response.trim() == "welcome") {
                            window.location = "login.php";
                        } else {
                            $("#alertError").show();
                        }
                    },
                    xhrFields: function(e) {
                        $("#sbtn").hide()
                        $("#loaderspin").show()
                    }
                });
                return falsel;



            });
        });
    </script>
</body>

</html>