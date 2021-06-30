<?php
include "assets/database_Connection.php";
 
 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="responsive/index.css">

    <!-- fonts -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Lobster&display=swap" rel="stylesheet"> -->
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/contact.css">

</head>

<body>
    <?php include "assets/_nav.php" ?>
    <main>
        <section class="contact_us">
            <div class="border-img">
                <h1>Contact Us</h1>
                <form action="ajax/_contact.php" method="POST" class="ajax">
                    <div class="input">
                        <input type="text" name="Name"  placeholder="Enter Full Name" name="" id="">
                    </div>
                    <div class="input">
                        <input type="email" name="email" placeholder="Enter your Email" name="" id="">
                    </div>
                    <div class="input">
                        <textarea name="message" id="" placeholder="Enter Message...." cols="30" rows="10"></textarea>
                    </div>
                    <?php
                     
                        if(isset($_SESSION["logedin"]))
                        {
                            echo '<div class="input-button">
                            <button type="submit">Send</button>
                            <button type="reset" style="display:none;" id="rbtn"></button>
                            </div>';

                        }
                        else{
                           echo' <div class="login-first">
                            <a href="login.php">Please Login first</a>
                            </div>';
                        }
                     
                    ?>
                    
                </form>
            </div>
        </section>
    </main>




    <?php
    include "assets/_footer.php";
    ?>
</body>

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
                    console.log(response);
                    if (response.trim() == 'welcome') {
                        alert("success full");
                        $("#rbtn").click();

                    
                    } else {
                        alert("some thing went wrong");
                    }
                }
                // xhrFields: function(e) {
                //     $("#log").hide()
                //     $("#loaderspin").show()
                // }
            });
            return false;
        });

    });
</script>
<script>
    let log = document.getElementById("contact");
    log.className = "active"
</script>

</html>