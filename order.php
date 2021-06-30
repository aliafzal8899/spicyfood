<?php
include "assets/database_Connection.php";
session_start();
if(isset($_SESSION['logedin']))
{
    if(isset($_GET["q"]))
    {
        $id=$_GET["q"];
        $sql ="SELECT * FROM `deals` WHERE Sno_D='$id'";
        $result=mysqli_query($con,$sql);
        $row=mysqli_fetch_assoc($result);
        echo '<!DOCTYPE html>
        <html lang="en">
        
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Document</title>
            <link rel="stylesheet" href="css/order.css">
            <link rel="stylesheet" href="css/style.css">
        </head>
        
        <body>
            <section class="back">
                <a href="index.php" title="back">
                    <img src="img/arrrow/arrow.png" alt="">
                </a>
            </section>
            <section>';
            if(isset($_GET['Deal']))
            {
                $val=$_GET['Deal'];
                
                if($val =='hot' || $val=='other' || $val=='menu')
                {
                    if(isset($_GET['Deal']) && $_GET['Deal']=='hot'){
                
                        echo   "<h1 class='name'>Hot Deals</h1>";
                       }
                       elseif (isset($_GET['Deal']) && $_GET['Deal']=='other'){
                           echo   "<h1 class='name'>Other Deals</h1>";
                       }
                       elseif (isset($_GET['Deal'])&& $_GET['Deal']=='menu'){
                           echo   "<h1 class='name'>Menu </h1>";
                       }
                       echo '</section>
            <section class="order_page">
                <div class="flex">
                    <div class="image_border">
                        <div class="image_order">
                            <img src="img/list-img/'.$row['Image'].'" alt="">
                        </div>
                    </div>
                    <div class="other">
                        <h2>'.$row["Name"].'</h2>
                        <p>'.$row["Description"].'</p>
                        <div class="input_order">
                        <form action="ajax/_order.php" method="POST" class="ajax" >
                            <div class="total_entry">
                                <input type="number" onchange="Calcu(this)" name="quantity"  value="1" min=1 >

                                <input type="number"  name="Phone"  placeholder="PLease Enter Your Phone Number" required title="Enter Correct Phone Otherwise Order Will not Verified">
                            </div>
                            <div class="rs">
                                <h3>Total : <span id="calculated">'.$row["Price"].'/-</span></h3>
                                <div style="display:none"> <input type="number" name="total" id ="hidval" value='.$row["Price"].'></div>
                                <div style="display:none"> <input type="number" name="sno"  value='.$_GET['q'].'></div>
                                
        
                            </div>
                            
                                <div class="btn">
                                    <button type="submit" id="changed">Order Now</button>
                                </div>
                                <div class="wantmore">
                                 <!--   <button href="" class="btn-a">
                                        spicial <span style="color:black">?</span>
                                    </button> -->
                                </div>
                            </form>
                            <div style="display:none"> <input type="number" id ="realval" value='.$row["Price"].'></div>
        
                        </div>
                    </div>
                </div>
            </section>';
            include "assets/_footer.php";
        
           
       echo ' </body>
        
        </html>';

                }
                else{
                    header("LOCATION: index.php");
                       

                }

            }
            else{
                header("LOCATION: index.php");

            }
            
            

            
    }
    else
    {

        header("LOCATION: index.php");
    }
    
}
else{
    header("LOCATION: login.php");
}
?>
<script>


function Calcu(v){
    // console.log(v.value)
    real=document.getElementById("realval");
    total=document.getElementById("calculated");
    hid=document.getElementById("hidval");
    calval=v.value*real.value;
    hid.value=calval;
    
    total.innerText=`${calval}/-`
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
                    alert(response)
                    if (response.trim() == 'Success') {
                        alert("Odered thanks")
                        window.location = "index.php";

                    } 
                    // else if (response.trim() == "invalid") {
                    //     $("#tog").click()
                    // } 
                    // else {
                        
                    //     alert(response);
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