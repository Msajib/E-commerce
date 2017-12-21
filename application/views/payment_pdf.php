<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">

        <!-- <link rel="stylesheet" type="text/css" href="registration.css"> -->
        <style>
            body {
                font-family: "Roboto", Helvetica, Arial, sans-serif;
                font-weight: 100;
                font-size: 13px;
                line-height: 21px;
                color: black;
                background:white;
            }
            #sajib{
                align-content: center;
                width: 850px;
                height:75%;
                margin-top: 35px;
                background: #84FFFF;
            }
            .inline{

                float: right;
                margin-right: 30px;}
            h3 {
                font-size: 20px;
                font-weight: 200;
                text-align: right;
                margin-right: 68px;
            }
            .name{
                margin-left: 10px;
            }
        </style>

    </head>
    <body >
        <!-- About Daily Income Information-->
        <div id="sajib">
            <h3 style="text-align:center;">বিসমিল্লাহির রাহমানির রাহিম</h3>
            <h2 align="center">টাকা আদায়ের রশিদ </h2>
            <table style="height: 40px; width: 100%; ">
                <tbody>
                    <tr id="shopinfo">
                        <td >
                            <div class="name">
                                <h4 >মেসার্স হাজী মোঃ আবুল কাশেম এন্ড সন্স</h4>
                                ফুলবাড়িয়া বাসস্ট্যান্ড,ব্রাহ্মানবাড়িয়া</br>
                                প্রোঃ জিয়াউল হক</br>
                                মোবাইলঃ০১৭৬৬-৬৫৬৪৮৫
                            </div> 
                        </td>
                        <?php foreach ($all_customer_infoo as $gallery_image) { ?>
                            <td style="width: 45%; height: 4.21666px;     padding-right: 22px; text-align: right;">তারিখঃ &nbsp;:&nbsp;&nbsp;<?php echo date('d-m-Y'); ?> </br>
                                <p >কাস্টমার আইডি &nbsp;:&nbsp;<?php echo $gallery_image->customer_id ?>&nbsp;&nbsp; </p></td>
                        </tr>
                    <td></td>
                    <?php $reference='0' ?>
                    <?php foreach ($all_payment_info as $payment) { ?>
                          <?php $reference=$payment->product_name?>
                        <td style="width: 45%; height: 4.21666px; padding-right: 22px; text-align: right;">টাকা &nbsp;:&nbsp;<input style="text-align:right;" type="text" value="<?php echo $payment->amount ?>">&nbsp;&nbsp;&nbsp;</td> 
                        <?php } ?>
            </tbody>
                    </table>
                    <div > 

                        <table border="1px"; style="height: 172px; width: 830px; ">
                            <tbody>

                                <tr>
                                    <td style="width: 125.417px;text-align: center;">নাম:</td>
                                    <td style="width: 426.583px;text-align: center;"><?php echo $gallery_image->customer_name ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 125.417px;text-align: center;">মোবাইল নাম্বার:</td>
                                    <td style="width: 426.583px;text-align: center;"><?php echo $gallery_image->number ?></td>
                                </tr>
                                <tr>
                                    <td style="width: 125.417px;text-align: center;">ঠিকানা:</td>
                                    <td style="width: 426.583px;text-align: center;"><?php echo $gallery_image->address ?></td>
                                </tr>
                                <tr>

                                    <td style="width: 125.417px;text-align: center;">মারফত :</td>
                                    <td style="width: 426.583px;text-align: center;"><?php echo $reference ?></td>
                                </tr>


                            <td style="width: 125.417px;text-align: center;">  কথায়:</td>
                            <td style="width: 426.583px;text-align: center;"><textarea style="width:723px;"></textarea></td>
                            </tr>
                            <tr style="text-align:right;" colspan="1" >

                                <td style="width: 125.417px;"><div class="inline"><h3><ins>স্বাক্ষর</ins></h3></div></td>


                            </tr>

                       

                        </tbody>


                    </table>

                <?php } ?>

            </div>


        </div>
        <button onclick="myFunction()" >print copy</button>

        <script>
            function myFunction() {
                window.print();
            }
        </script>
    </body>
</html>