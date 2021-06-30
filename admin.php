<?php
 $welcome="";
    session_start();
    if(isset($_SESSION["logedin"]) && $_SESSION["logedin"]=true)
    {
        if(isset($_SESSION['type']) && $_SESSION['type']=="admin" )
        {
            $welcome="ok";

        }
        else {
            header("LOCATION:Login.php");
         }
    }
    else{
        $welcome="no";
        
    }

 if($welcome=="no")
 {
    header("LOCATION:Login.php");
 }
?>
<!DOCTYPE html>
<html lang="en">
<?php
include "assets/database_Connection.php";
?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="css/admin.css">
    <link rel="stylesheet" href="css/customselect.css">
</head>

<body>
    <nav>
        <div>
            <img src="logo/logosvg.svg" alt="">
        </div>
        <div class="menu">
            <div class="mean_list">
                <p>Menu</p>
            </div>
            <div class="content_menu">
                <ul>
                    <li><a href="adminchangepassword.php">Change Password</a></li>
                    <li><a href="assets/_logout.php">Log out</a></li>
                    <!-- <li><a href="assets/workers.php">Log out</a></li> -->

                </ul>
            </div>
        </div>
    </nav>
    <!--  -->
    <section class="admin_panel flex">
        <div class="banner_changer">
            <div class="current_video">
                <?php

                $sql = 'SELECT * FROM `video`';
                $result = mysqli_query($con, $sql);
                $row = mysqli_fetch_assoc($result);
                echo '<video id="videoz" src="video/' . $row["video"] . '" autoplay muted loop></video>'
                ?>

            </div>
            <div class="input_video">
                <form action="ajax/_uploadvideo.php" method="post" id="video_upload" class="ajax1" enctype="multipart/form-data">
                    <div class="input">
                        <label for="video-upload" class="file-upload-button">Change Video</label>
                        <input type="file" name="video-upload" onchange="ValidateSize(this)" id="video-upload" accept=".mp4, .avi, .mpeg4">
                    </div>

                    <div class="button vfirst">
                        <button type="submit" id="sbtn">Submit</button>
                    </div>
                </form>

            </div>

        </div>

        <!--  -->
        <!--  -->
        <div class="deals flex">
            <div class="box_image">
                <div class="border flex flex-xy hide_over">
                    <span><img src="" id="blah" alt="No Photo" loading="lazy"></span>
                </div>
            </div>
            <form action="ajax/_upload_deal.php" method="POST" class="ajax2" enctype="multipart/form-data">
                <div class="flex flex-xy flex-col deal-box">
                    <div class="input select">
                        <div class="custom-select" style="width:200px;">
                            <select name="Type">
                                <option value="menu">Select Deal:</option>
                                <option value="hot">Hot Deals</option>
                                <!-- <option value="other">other Deals</option> -->
                                <option value="menu">Menu</option>

                            </select>
                        </div>
                    </div>
                    <div class="input">
                        <input type="text" name="dealName" id="" placeholder="Enter Deal Name" required>
                    </div>
                    <div class="input">
                        <input type="number" name="off" min="0" max="40" id="Off" placeholder="Off ">
                    </div>
                    <div class="input">
                        <input type="number" name="Price" id="" placeholder="Enter Price" required>
                    </div>
                    <div class="input">
                        <textarea name="Description" id="" cols="30" rows="10" placeholder="Enter Description Here" required></textarea>
                    </div>

                    <div class="input">
                        <label for="file-upload" class="file-upload-button">Upload Image</label>
                        <input type="file" onchange="readURL(this)" accept="*" name="file-upload" id="file-upload" required>
                    </div>

                    <div class="button">
                        <button type="submit" id="ibtn">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </section>
    <!-- hotdeal bars -->
    <section>
        <!--  -->
        <h1 class="adminname">Hot Deals</h1>
        <div class="hotdeals">
            <!--  -->
            <?php
            $sql = "SELECT * FROM `deals` WHERE Deal_type='hot'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo   ' <div class="hotdealborder" id="hot-'.$row['Sno_D'].'">
                <div class="hotdealinner">
                    <div class="concate">
                    <div class="hotdealimage">
                        <img src="img/list-img/' . $row['Image'] . '" alt="">
                    </div>
                    <div class="hotdealtext">
                        <div class="hotdealheading"><h2>' . $row['Name'] . '</h2>
                        <p>' . substr($row['Description'], 0, 50) . '....</p>
                        <input type="text" value="'.$row['Description'].'" style="display:none">
                        </div>
                        <div class="hotdealprice">
                            <span>' . $row['Price'] . '</span>
                        </div>
                        
                    </div>
                    </div>
                    <div class="action">
                        <div class="delete">
                            <button onclick="list_del(this,'.$row['Sno_D'].',1)"><img src="img/icon/del.png"></button>
                        </div>
                        <div class="Edit">
                            <button onclick="list_edit('.$row['Sno_D'].',1)"><img src="img/icon/edit.png"></button>
                        </div>
                    </div>
                </div>
            </div>';
                }
            } else {
                echo ' <div class="listed_yet">
            <h2>Not Listed yet</h2>
        </div>';
            }

            ?>

            <!--  -->
        </div>
        <!--  -->
    </section>
    <!-- hotdeals end -->


    <!-- otherdeal bars -->
    <section>

        <!--  -->
        <!-- <h1 class="adminname">Other Deals</h1>
        <div class="hotdeals"> -->

            <!--  -->
            <?php
        //     $sql = "SELECT * FROM `deals` WHERE Deal_type='other'";
        //     $result = mysqli_query($con, $sql);
        //     if (mysqli_num_rows($result)) {
        //         while ($row = mysqli_fetch_assoc($result)) {
        //             echo   ' <div class="hotdealborder" id="other-'.$row['Sno_D'].'">
        //         <div class="hotdealinner">
        //             <div class="concate">
        //             <div class="hotdealimage">
        //                 <img src="img/list-img/' . $row['Image'] . '" alt="">
        //             </div>
        //             <div class="hotdealtext">
        //                 <div class="hotdealheading"><h2>' . $row['Name'] . '</h2>
        //                 <p>' . substr($row['Description'], 0, 50) . '....</p>
        //                 <input type="text" value="'.$row['Description'].'" style="display:none">
        //                 </div>
        //                 <div class="hotdealprice">
        //                     <span>' . $row['Price'] . '</span>
        //                 </div>
                        
        //             </div>
        //             </div>
        //             <div class="action">
        //                 <div class="delete">
        //                     <button onclick="list_del(this,'.$row['Sno_D'].',2)"><img src="img/icon/del.png"></button>
        //                 </div>
        //                 <div class="Edit">
        //                     <button  onclick="list_edit('.$row['Sno_D'].',2)"><img src="img/icon/edit.png"></button>
        //                 </div>
        //             </div>
        //         </div>
        //     </div>';
        //         }
        //     } else {
        //         echo ' <div class="listed_yet">
        //     <h2>Not Listed yet</h2>
        // </div>';
        //     }

            ?>


            <!--  -->
        </div>
        <!--  -->
    </section>
    <!-- otherdeals end -->

    <!-- Menu bars -->
    <section>
        <!--  -->
        <h1 class="adminname">Menu</h1>
        <div class="hotdeals">
            <!--  -->

            <?php
            $type="menu";
            $sql = "SELECT * FROM `deals` WHERE Deal_type='menu'";
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo   ' <div class="hotdealborder" id="menu-'.$row['Sno_D'].'">
                <div class="hotdealinner">
                    <div class="concate">
                    <div class="hotdealimage">
                        <img src="img/list-img/' . $row['Image'] . '" alt="">
                    </div>
                    <div class="hotdealtext">
                        <div class="hotdealheading"><h2>' . $row['Name'] . '</h2>
                        <p>' . substr($row['Description'], 0, 50) . '....</p>
                        <input type="text" value="'.$row['Description'].'" style="display:none">
                        </div>
                        <div class="hotdealprice">
                            <span>' . $row['Price'] . '</span>
                        </div>
                        
                    </div>
                    </div>
                    <div class="action">
                        <div class="delete">
                            <button onclick="list_del(this,'.$row['Sno_D'].',3)"><img src="img/icon/del.png"></button>
                        </div>
                        <div class="Edit">
                            <button  onclick="list_edit('.$row['Sno_D'].',3)"><img src="img/icon/edit.png"></button>
                        </div>
                    </div>
                </div>
            </div>';
                }
            } else {
                echo ' <div class="listed_yet">
            <h2>Not Listed yet</h2>
        </div>';
            }

            ?>

            <!--  -->

        </div>
        <!--  -->
    </section>
    <!-- Menu end -->
<figure class="none" id="popfig">
    <section class="editpop">
    <div class="headingpop"><span onclick="closepop()">&times;</span></div>
    <div class="bodypop">
        <div class="type"><span id="typeid"></span></div>
        
    <div class="input none"><label for="">Heading</label><input type="number" id="snopop"></div>
    <div class="input none"><label for="">Heading</label><input type="text" id="thispop"></div>
    <div class="input"><label for="">Heading</label><input type="text" id="headingpop"></div>
    <div class="input"><label for="">Description</label><textarea name="" id="parapop" cols="30" rows="10"></textarea></div>
    <div class="input"><label for="">Price</label><input type="number" id="pricepop"></div>
    <div class="buttonpop">
    <button id="updatpop" onclick="updateedit()">Update</button>
    </div>
    </div>
    </section>
</figure>

    <section id="order_pages" class="none">
        <div class="order_body">
            <div class="head">
                <button onclick="close_body()">
                    <div class="cros1"></div>
                    <div class="cros2"></div>
                </button>
            </div>
            <div class="main">
                <section class="btn_tabs flex">
                    <a class="btn" href="#" onclick="c_oders()" >

                        Order

                    </a>
                    <a class="btn" href="#" onclick="startprocess()">


                        In Process

                    </a>
                </section>
                <!--  -->
                <section class="order_process_list">
                    <!--  list start-->
                    <!-- list -->
                    <div class="list_page" id="interval">
                        <!-- box -->
<!--                         

                        $sql = "SELECT * FROM `oder` WHERE `verified`=0";
                        $result = mysqli_query($con, $sql);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $sno2 = $row['deal_sno'];
                            
                            $sql2 = "SELECT * FROM `deals` where `Sno_D`=$sno2";
                            $result2 = mysqli_query($con, $sql2);
                            $row2 = mysqli_fetch_assoc($result2);
                            if ($row2) {
                                echo '<div class="box flex">
                                <div>
                                    <div class="flex box_heads">
                                        <h5>' . $row2['Name'] . '</h5>
                                        <span>'.$row['quantity'].' - peice</span>
                                        <span>Price
                                            <span>'.$row2["Price"].'</span>/-
                                        </span>
                                        <span>Total
                                            <span>'.$row['Price'].'</span>/-
                                        </span>
                                    </div >
                                    <div class="flex sp-b">
                                    <h5>' . $row2['Deal_type'] . '</h5>
                                    <p>'.$row['Phone'].'</p>
                                    </div>
                                    <span>
    
                                    </span>
                                </div>
                                <div>
                                    <button class="sm-btn fail">Cancel</button>
                                    <button class="sm-btn success">Verify</button>
                                </div>
                            </div>
                            }
                        } -->

                            <!-- ebox'; -->




                    </div>
                    <!-- e -->
                    <!-- list endf -->
                </section>
                <!--  -->
            </div>
            <div class="footer"></div>
        </div>
    </section>
    <section class="plus">
        <button onclick="other_body()">
            <div class="side_btn" >
            <div class="oders"><span id="odr_num">9+</span></div>

                <div id="cricle">
                    <div class="center">
                        <!-- <div class="reltive">

                <div id="up"></div>
            </div>
            <div class="reltive">

                <div  id="down"></div> -->
                        <img src="logo/logosvg.svg" alt="">
                    </div>
                </div>
            </div>
            </div>
        </button>
    </section>
    <script src="jquery-3.6.0.min.js"></script>
    <script src="javascript/admin.js"></script>
    <script src="javascript/customselec.js"></script>
    <!-- <script src="javascript/deal_upload.js"></script> -->
    <script>
        function ValidateSize(file) {

            var FileSize = file.files[0].size / 1024 / 1024; // in MiB
            var filetype = file.files[0].name.split(".");
            filetype = filetype[filetype.length - 1]

            if (FileSize > 20) {
                alert('File size exceeds 20 MiB');
                // $(file).val(''); //for clearing with Jquery
                b = document.getElementById("sbtn");
                b.disabled = true;
                b.style.background = "#aad2b1";

            } else {
                if (filetype.toLowerCase() == "mp4" || filetype.toLowerCase() == "avi" || filetype.toLowerCase() == "mpeg4") {
                    b = document.getElementById("sbtn");
                    b.disabled = false;
                    b.style.background = "#be1e2d";
                } else {
                    alert('File Type is Not Correct');
                    b = document.getElementById("sbtn");
                    b.disabled = true;
                    b.style.background = "#aad2b1";
                }

            }
        }
    </script>

    <script>
        function readURL(file) {
            var FileSize = file.files[0].size / 1024 / 1024; // in MiB
            var filetype = file.files[0].name.split(".");
            filetype = filetype[filetype.length - 1]
            if (FileSize > 10) {
                alert('File size exceeds 10 MiB');
                // $(file).val(''); //for clearing with Jquery
                b = document.getElementById("ibtn");
                b.disabled = true;
                b.style.background = "#aad2b1";

            } else {
                if (filetype.toLowerCase() == "jpg" || filetype.toLowerCase() == "jpeg" || filetype.toLowerCase() == "png" || filetype.toLowerCase() == "svg") {
                    if (file.files && file.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            $('#blah').attr('src', e.target.result);
                        }

                        reader.readAsDataURL(file.files[0]); // convert to base64 string
                    }
                } else {
                    alert('File Type is Not Correct');
                    b = document.getElementById("ibtn");
                    b.disabled = true;
                    b.style.background = "#aad2b1";
                }
            }
        }
    </script>
    
<script src="jquery-3.6.0.min.js"></script>
    <script>
        function odr_counter()
        {
            $.ajax({
                url: 'ajax/total_or.php',
                // type: 'POST',
                // data: data,
                success: function(response) {
                    vale=document.getElementById("odr_num");
                    vale.innerText=response;
                },
               
            });

        }
        setInterval(odr_counter,1000);

        function updateoders()
        {
            // alert("run");
            $.ajax({
                url: 'ajax/_oder_updater.php',
                // type: 'POST',
                // data: data,
                success: function(response) {
                    // alert(response)
                    vale=document.getElementById("interval");
                    vale.innerHTML=response;
                },
               
            });

        }


    let orders=setInterval(updateoders,1000);
    //
    let proces
    function Inprocess(){
        
        // clearInterval(orders);
        $.ajax({
                url: 'ajax/_oder_inprocess.php',
                // type: 'POST',
                // data: data,
                success: function(response) {
                    // alert(response)
                    vale=document.getElementById("interval");
                    vale.innerHTML=response;
                },
                
            });

        }
        
    // proces=setInterval(Inprocess,1000) 
    

    function c_oders(){
        orders=setInterval(updateoders,1000);
        clearInterval(proces)
    }
    function startprocess(){
        proces=setInterval(Inprocess,1000)
        clearInterval(orders)
    }

    
    
       
    



    
    </script>
    <script>
        function clicked(v){
            $.ajax({
            url: 'ajax/_verifier.php',
            type: "post",
            data: {"sno":v},
            success: function(response) {
                // alert("Verified");
            },

        });
        
        }

        function clickedel(v){
            $.ajax({
            url: 'ajax/_order_del.php',
            type: "post",
            data: {"sno":v},
            success: function(response) {
                // alert("Verified");
            },

        });
        
        }


</script>
<script>

function list_del(v,no,types)
{
    num=parseInt(no);
    if(types=='1')
    {
        doc=document.getElementById(`hot-${num}`);
        list_remover(num,"hot",doc);
    }
    if(types=='3')
    {
        doc=document.getElementById(`menu-${num}`);
        list_remover(num,"menu",doc);
        
    }
    
}


function list_remover(sno,type,doc)
{
    flag=0;

    $.ajax({
                url: 'ajax/list_del.php',
                type: 'POST',
                data: {"sno":sno,"type":type},
                success: function(response) {
                    // alert(response)
                    if(response.trim()==='del')
                    {
                        
                        doc.remove(x.selectedIndex);
                    }
                    
                },
                
                
            });

}
</script>
<script>
    let headingpop=document.getElementById("headingpop");
    let descpop=document.getElementById("parapop");
    let pricepop=document.getElementById("pricepop");
    let toggle =document.getElementById("popfig");
    let typeid=document.getElementById("typeid");
    let snopop=document.getElementById("snopop")
    let btnpop=document.getElementById("updatpop");
    let popid=document.getElementById("thispop");

function closepop(){
    toggle.className="none";
}
function update_pop(id,type,sno)
{
    // console.log(id);
let doc=document.getElementById(id)
heading=doc.getElementsByTagName("h2")[0].innerText;
para=doc.getElementsByTagName("input")[0].value;
price=doc.getElementsByTagName("span")[0].innerText;

    toggle.className="";
    typeid.innerText=type;
    headingpop.value=heading;
    descpop.value=para;
    snopop.value=sno;
    pricepop.value=price;
    btnpop.innerText="update"
    thispop.value=id;
// alert(sno);




}
function list_edit(no,type)
{
    if(type=='1')
    {
        var hot=`hot-${no}`;
       let a=document.getElementById(hot);
       update_pop(hot,"hot",no)
       
    }
    else if(type=='2')
    {
        var other=`other-${no}`;
       let a=document.getElementById(other);
       update_pop(other,"other",no)
       
    }
    else if(type=='3')
    {
        var menu=`menu-${no}`;
       let a=document.getElementById(menu);
       update_pop(menu,"menu",no)
       
    }
}

function updateedit()
{
    $.ajax({
        url:"ajax/_update_deal.php",
        method:"POST",
        data:{"sno":snopop.value,"heading":headingpop.value,"desc":descpop.value,"price":pricepop.value},
        success:function(response){
            if(response.trim()=="update")
            {
                btnpop.innerText="updated !"
                // btnpop.attributes
               
                // update valu in non ajax cards
                let thisid=document.getElementById(popid.value);
                
                thisid.getElementsByTagName("h2")[0].innerText=headingpop.value;
                thisid.getElementsByTagName("p")[0].innerText=descpop.value;
                thisid.getElementsByTagName("span")[0].innerText=pricepop.value;
                closepop();


            }
        }
    })
}

</script>
</body>

</html>