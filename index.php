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
    <link rel="stylesheet" href="css/media.css">
    <link rel="stylesheet" href="responsive/index.css">
    
    <!-- <link rel="stylesheet" href="responsive/nav.css"> -->
    <!-- fonts -->
    <!-- <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Libre+Baskerville&family=Lobster&display=swap" rel="stylesheet"> -->
<link rel="stylesheet" href="OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.carousel.min.css">
<link rel="stylesheet" href="OwlCarousel2-2.3.4/docs/assets/owlcarousel/assets/owl.theme.default.min.css">

</head>
<body>
    <?php include "assets/_nav.php"; ?>
    
    <main>
        <?php include "assets/_banner.php"; ?>
        <!-- crousal -->
        <section>
            <div class="name" id="deal"><h2>Hot Deals
            </h2></div>
        <div class="owl-carousel owl-theme">
           <?php  include "assets/_owl.php" ?>
            
        </div>
    </section>
        <!--  -->
        <!-- -------------------------------------------------  -->
        <section class="list_burger">
            <div class="name">Menu</div>
            <div class="buttons_wise flex">
                <button onclick="col_wise()" class="columnwise" id="column_wise_show">
                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 138.14 121.71"><defs><style>.cls-1{fill:none;stroke:#da1c5c;stroke-miterlimit:10;}</style></defs><title>column</title><rect class="cls-1" x="0.5" y="0.5" width="137.14" height="120.71"/><rect class="cls-1" x="8.78" y="11.9" width="45.36" height="33.48"/><rect class="cls-1" x="80.22" y="11.9" width="45.36" height="33.48"/><rect class="cls-1" x="8.78" y="67.02" width="45.36" height="33.48"/><rect class="cls-1" x="80.22" y="67.02" width="45.36" height="33.48"/></svg>
                </button>
                <button  onclick="row_wise()" id="row_wise_show" class="rowwize">
                    <svg id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 138.14 121.71"><defs><style>.cls-1{fill:none;stroke:#da1c5c;stroke-miterlimit:10;}</style></defs><title>Untitled-1</title><rect class="cls-1" x="0.5" y="0.5" width="137.14" height="120.71"/><rect class="cls-1" x="8.78" y="11.9" width="116.28" height="19.8"/><rect class="cls-1" x="8.78" y="53.94" width="116.28" height="19.8"/><rect class="cls-1" x="8.78" y="89.98" width="116.28" height="19.8"/></svg>
                </button>
            </div>
            <div class="body_list" id="menu_body_list">
            <div class="list" id="inner_body_list">
                <!--  -->
               <?php include "assets/_menu_list.php"; ?>
                <!--  -->
                <!--  -->
            </div>
            </div>
        </section>



    </main>
    <!-- footer -->
    <?php
    include "assets/_footer.php";
    ?>
    <!-- end -->
   <script src="jquery-3.6.0.min.js"></script>

    <script src="OwlCarousel2-2.3.4/docs/assets/owlcarousel/owl.carousel.min.js"></script>
   
<script src="javascript/java.js"></script>
   <script>
       $(document).ready(function(){
  $(".owl-carousel").owlCarousel({
      loop:true,
      margin:20,
      nav:false,
      dots:false,
      reponsive:{
          0:{
              item:1
          },
          600:{
              item:2
          },
          1000:{
              item:8
          }
      }
  });
});
   </script>
   <script>
    let log=document.getElementById("home");
    log.className="active"
    function myFunction(x) {
  x.classList.toggle("change");
}
</script>
</body>
</html>