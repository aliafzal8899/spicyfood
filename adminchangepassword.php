<?php
// session_start();
// if(isset($_SESSION['logedin']) && $_SESSION['logedin']==true)
// {
//     if(isset($_SESSION["type"]) && $_SESSION["type"]=='admin'){

//     }
// }
// else{
//     // echo "fdgdf";
//     header("LOCATION:login.php");
// }
// // echo $_SESSION["type"];
// session_abort();

?>
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
 <nav>
 <a href="admin.php"> <img src="img/arrrow/arrow.png" style="height:41px; " alt=""></a>
 </nav>
    <section class="login_Section flex xy-center">
        <div class="login_main">
            <div class="login_banner login_background">
                <div class="form">
                    <div class="Primary_heading_acc">
                        <h2>Change Password</h2>

                    </div>

                    <form action="ajax/_changeadminpass.php" method="POST" class="ajax">
                       
                        <div class="input_form">
                            <input type="password" placeholder="Enter Old Password" name="old" id="pass">
                        </div>
                        <div class="input_form">
                            <input type="password" placeholder="Enter New Password" name="pass" id="pass">
                        </div>
                        <div class="input_button">
                            <button type="submit" id="log">Change Password</button>
                            <button id="loaderspin" class="d-none">
                                <div class="loader"></div>
                            </button>
                        </div>



                    </form>
                    <!--  -->
                    <div class="popup" id="tog" onclick="myFunction()">
                        <span class="popuptext" style="    margin-left: 17px;" id="myPopup">Old Password Invalid</span>
                    </div>
                    <!--  -->
                     <!--  -->
                
                <!--  -->
                </div>
               
            </div>

        </div>

    </section>
    

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
                    alert(response);
                    if (response.trim() == 'done') {
                        window.location = "admin.php";

                    }
                    else if(response.trim()=="wrong")
                    {
                        $("#tog").click()
                    }
                    // else if (response.trim() == "invalid") {
                    //     $("#tog").click()
                    // }
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