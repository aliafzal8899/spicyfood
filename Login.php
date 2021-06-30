<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    <?php
     
        include "assets/_nav.php";
     
    ?>
    <section class="login_Section flex xy-center">
        <div class="login_main">
            <div class="login_banner login_background">
                <div class="form">
                    <div class="Primary_heading_acc">
                        <h2>Login Account</h2>

                    </div>

                    <form action="ajax/_login.php" method="POST" class="ajax">
                        <div class="input_form">
                            <input type="email" placeholder="Enter Email" name="email" id="em">
                        </div>
                        <div class="input_form">
                            <input type="password" placeholder="Enter Password" name="pass" id="pass">
                        </div>
                        <div class="input_button">
                            <button type="submit" id="log">Login</button>
                            <button id="loaderspin" class="d-none">
                                <div class="loader"></div>
                            </button>
                        </div>



                    </form>
                    <!--  -->
                    <div class="popup" id="tog" onclick="myFunction()">
                        <span class="popuptext" id="myPopup">Invalid Creditionals</span>
                    </div>
                    <!--  -->
                     <!--  -->
                <div class="flex space_bw">
                    <a href="signup.php">Create An Account</a>
                    <!-- <a href="">Forget password</a> -->
                </div>
                <!--  -->
                </div>
               
            </div>

        </div>

    </section>
    <?php
    include "assets/_footer.php";
    ?>

</body>
<script>
    // When the user clicks on <div>, open the popup
    function myFunction() {
        var popup = document.getElementById("myPopup");
        popup.classList.toggle("show");
    }
</script>

<script src="jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("form.ajax").on("submit", function() {
            // 


            // 
            var that = $(this),
                url = that.attr("action"),
                method = that.attr("method"),
                data = {};
            that.find("[name]").each(function(index, value) {
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
                    
                    if (response.trim() == 'welcome') {
                        window.location = "index.php";

                    }
                    else if(response.trim()=="welcomeadmin")
                    {
                        window.location="admin.php";
                    }
                    else if (response.trim() == "invalid") {
                        $("#tog").click()
                    }
                },
                xhrFields: function(e) {
                    $("#log").hide()
                    $("#loaderspin").show()
                }
            });
            return false;
        });

    });
</script>
<script>
    let log=document.getElementById("login");
    log.className="active"

</script>

</html>