<!DOCTYPE html>
<html lang="en" class="no-js">

    <!-- Mirrored from themegrids.com/themes/devin/theme/particles/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 May 2017 05:12:05 GMT -->
    <head>
        <!-- Required meta tags -->
       <meta charset="utf-8">
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come after these tags -->

        <!-- Fill in the following meta tags -->
        <meta name="keywords" content="keyword1, keyword2, keyword3"/>
        <meta name="description" content="Description">
        <meta name="author" content="Author">

        <!-- Change the site title -->
        <title>মেসার্স হাজী আবুল কাশেম এন্ড সন্স</title>

        <!-- You can regenerate the favicons as you wish using http://realfavicongenerator.net/, see the theme documentation -->
        <link rel="apple-touch-icon" sizes="180x180" href="favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="favicon/favicon-32x32.png" sizes="32x32">
        <link rel="icon" type="image/png" href="favicon/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="favicon/manifest.json">
        <link rel="mask-icon" href="favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="theme-color" content="#ffffff">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/bootstrap.min.css">
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/menu.css">
        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300i,400,700" rel="stylesheet">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>font-awesome-4.7.0/css/font-awesome.min.css">

        <!-- Pretty Photo -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/prettyPhoto.css"/>

        <!-- Flickity -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/flickity.css"/>

        <!-- animate.css -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/animate.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/style.css"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/print.css"/>

        <!-- Skills bar -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/skills-bar.css"/>

        <!-- custom.css - the styling for this theme -->
        <link rel="stylesheet" href="<?php echo base_url(); ?>css/custom.css">

        <!-- Modernizr -->
        <script src="<?php echo base_url(); ?>js/modernizr-custom.js"></script>
        <style>
            #table1{
                margin-top:  100px;
            }
            #customer {
    overflow: hidden;
    height: 182px;
    width: 300px;
    float: right;
    margin-top: -177px;
    margin-left: 2px;
}
.shopInfo {
 float: left;
height: auto;
width: 850px;
margin-top: -80px;
}
#meta {
    margin-top: 48px;
    width: 255px;
    float: right;
}
.maincustomer {
       height: 119px;
    width: 846px;
    margin-top: 1px;
}
#items th {
    background: #AED581;
}

        </style>

    </head>

    <body>

        <!-- status spinner showing while loading the page -->
        <div id="preloader"></div>

        <!-- HEADER -->
      
        <!-- HEADER END -->

        <div id="content-wrap">

            <!-- HERO AREA -->
          
            <!-- HERO AREA END -->

            <!-- bouncing arrow -->

            <!-- ABOUT -->

            <!-- ABOUT END -->

            <!-- SERVICES -->
            <section id="services">
                <div class="section-header">
                    <div>
                        <h3 >বিসমিল্লাহির রাহমানির রাহিম</h3>
                    </div>
                    <div class="container">

                        <div id="page-wrap">

                            <div id="toper">
                               
                                
                                <h2 style="font-size:x-large;">মেসার্স হাজী আবুল কাশেম এন্ড সন্স</h2>
                                 <h3> ডেলিভারি চালান</h3>
                                <h5>প্রোঃ জিয়াউল হক</h5>
                                <h5>ফুলবাড়িয়া বাসস্ট্যান্ড,ব্রাহ্মানবাড়িয়া </h5>
                                <h5>মোবাইল নাম্বারঃ ০১৭১৩-৬৩৮৯৬৬</h5>
                            </div>
                            <div id="identity">


                                     <?php

                        class Converter {

                            public static $bn = ["১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০"];
                            public static $en = ["1", "2", "3", "4", "5", "6", "7", "8", "9", "0"];

                            public static function bn2en($number) {
                                return str_replace(self::$bn, self::$en, $number);
                            }

                            public static function en2bn($number) {
                                return str_replace(self::$en, self::$bn, $number);
                            }

                        }
                        ?>


                            </div>

                            <div style="clear:both"></div>

                            <div class="maincustomer">
                                <div class="shopInfo" >

                                    <?php foreach ($all_customer as $gallery_image) { ?>
                                    <table id="table1" >
                                        <tr >
                                            <th>
                                                কাস্টমার আইডি:
                                            </th>
                                            <th >
                                                  <?php $customer_id = Converter::bn2en($gallery_image->customer_id);
                                                        echo Converter::en2bn($customer_id);?>
                                            </th>

                                        </tr>
                                        <tr>
                                            <th>
                                                নামঃ
                                            </th>
                                            <th>
                                               <?php echo $gallery_image->customer_name ?>
                                            </th>

                                        </tr>
                                        <!--  -->
                                        <tr>
                                            <th>
                                                ঠিকানাঃ
                                            </th>
                                            <th>
                                               <?php echo $gallery_image->address ?>
                                            </th>


                                        </tr>
                                        <!--  -->
                                        <tr>
                                            
                                             <th>
                                                  মোবাইলঃ
                                            </th>
                                            <th>
                                               <?php $number = Converter::bn2en($gallery_image->number);
                                                        echo Converter::en2bn($number);?>
                                            </th>


                                        </tr>
                                   

                                    </table>
                                  <?php } ?>
                                </div>

                                <div id="customer">

                              
                                    <table id="meta">
                                        <tr>
                                            <th style="width:40px;">
                                                ড্রাইভার নাম
                                            </th>
                                            <td style="width:91px;">
                                                <input type="text" style="width:100%;" name="draiver_name">
                                                
                                            </td>


                                        </tr>
                                         <tr>
                                            <th style="width:40px;">
                                                ড্রাইভার নাম্বার
                                            </th>
                                            <td style="width:91px;">
                                                <input type="text" style="width:100%;" name="draiver_number">
                                                </td>


                                        </tr>
                                        <tr>
                                            <td class="meta-head">চালান নাম্বার#</td>
                                             <td>  <?php  $calan_number='0';?>
                                    <?php foreach ($all_order as $gallery_image) { ?>
                                       <?php $calan_number=$gallery_image->calan_number ?>
                                               
                                     <?php }?> <?php echo Converter::en2bn($calan_number);?></td>
                                        </tr>
                                        <tr>
 
                                            <td class="meta-head">তারিখ</td>
                                             <td><?php echo date('d-m-Y')?></td>
                                        </tr>


                                    </table>
                                   
                                </div>


                            </div>

                             <table id="items">

                                <tr id="align" style="background-color:#cce6ff">
                                   <th style="text-align:center;width:10%  ">ক্র নংঃ
                                    </th>
                                    <th style="text-align:center; width: 60%">পণ্যের বিবরণ</th>
                                <th style="text-align:center;width:10%">ব্যান্ডেল </th>
                                    <th style="text-align:center;width:10%">পরিমাণ</th>
                                    
                                      <th style="text-align:center;width:10%">টাইপ</th>
                                  
                                </tr>
                                <tr>  <?php $i = 0;?>
                                    <?php foreach ($all_order as $gallery_image) { ?>
                                     <?php if($gallery_image->total_qty>0){?>
                                    <tr> 
                                        <td><?php echo Converter::en2bn(++$i)?></td>
                                       
                                        <td><?php echo $gallery_image->product_name ?>
                                            <input type="hidden" name="product_name[]" value="<?php echo $gallery_image->product_name ?> ">
                                        </td>
                                        <td><?php  ?>
                                            <input type="hidden" name="bundle[]" value="<?php echo'2pck'?> ">
                                        </td>
                                        <td style="text-align:right;"><?php
                                                        $quantity_value = Converter::bn2en($gallery_image->total_qty);
                                                        echo Converter::en2bn($quantity_value);
                                                        ?>
                                             <input type="hidden" name="quantity[]" value="<?php echo $gallery_image->total_qty ?> ">
                                        </td>
                                        
                                      
                                       
                                         <td> <?php echo $gallery_image->type;
                                              
                                               ?>
                                                 </td>
                                       
                                    </tr>
                                    
                                <?php } ?><?php } ?>
                                    


                            </table>

                            <div id="block_container">

                                <div id="bloc1" > <u>ক্রেতা স্বাক্ষর </u></div>  
                                <div id="bloc3">বিক্রিত মাল ফেরৎযোগ্য নহে</div>
                                <div id="bloc2"><u>বিক্রেতার স্বাক্ষর</u></div>

                            </div>
                            <button onclick="myFunction()">print copy</button>

                                    <script>
                                    function myFunction() {
                                        window.print();
                                    }
                                    </script>




                        </div>
                        <div class="row">
                            <div class="col-12">
                                
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div>

            </section>
            <!-- SERVICES END -->

            <!-- HIRE ME -->

            <!-- FOOTER END -->

        </div>

        <!-- jQuery first, then Tether, then Bootstrap JS. -->
        <script src="<?php echo base_url(); ?>js/jquery-3.1.1.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery-migrate-3.0.0.min.js"></script>
        <script src="<?php echo base_url(); ?>js/tether.min.js"></script>
        <script src="<?php echo base_url(); ?>js/bootstrap.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.stellar.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.prettyPhoto.js"></script>
        <script src="<?php echo base_url(); ?>js/flickity.pkgd.min.js"></script>
        <script src="<?php echo base_url(); ?>js/isotope.pkgd.min.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.debouncedresize.js"></script>
        <script src="<?php echo base_url(); ?>js/jquery.waypoints.min.js"></script>
        <script src="<?php echo base_url(); ?>js/typed.min.js"></script>
        <script src="<?php echo base_url(); ?>js/skill.bars.jquery.js"></script>
        <script src="<?php echo base_url(); ?>js/config.js"></script>
        <script src="<?php echo base_url(); ?>js/custom.js"></script>
        <script src="<?php echo base_url(); ?>https://maps.googleapis.com/maps/api/js?key=AIzaSyCMYUCUdT1WkZJFkrpI4IzEObG8_YNcZPg&amp;callback=myMap"></script>

    </body>

    <!-- Mirrored from themegrids.com/themes/devin/theme/particles/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 12 May 2017 05:13:18 GMT -->
</html>