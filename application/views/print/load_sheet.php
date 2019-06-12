<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Daily Sales Reports <?php echo $products[0]['company'] ?></title>
      <link href='https://fonts.googleapis.com/css?family=Archivo Narrow' rel='stylesheet'>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('print/style.css') ?>">
   </head>
   <body>
      <div class="wrapper">
         <div class="header-text">
            <div class="text">
               <div class="row">
                  <div class="column" style="background-color:none;">
                     <h2 style="text-align: center;font-style: italic;font-family: Archivo Narrow;"><?php echo $products[0]['company'] ?></h2>
                     <p style="padding-left:20px; font-weight: bold;font-size: 14px;">Sales Rep</p>
                  </div>
                  <div class="column" style="background-color:none;">
                     <h2 style="text-align: center;font-style: italic;font-family: Archivo Narrow;">LOAD LI.</h2>
                     <p style="padding-left:20px;font-weight: bold;font-size: 14px;">Date </p>
                  </div>
               </div>
               <div class="row1">
                  <label style="padding-left:20px;font-weight: bold; font-size: 14px;">Area</label>
               </div>
               <!-- row1-->
            </div>
            <!--text-->
         </div>
         <!--header-->
         <div class="tables-box">
            <center>
               <table width="100%" border="1" align="center">
                  <tr>
                     <th width="25%" style="text-align: left;padding-left: 10px;">PRODUCT </th>
                     <th width="10%">QUANTITY </th>
                     <th width="10%"> </th>
                     <th width="10%"> </th>
                  </tr>
                  <?php foreach ($products as $key => $value) { ?>
                  <tr>
                     <td><?php echo $value['Name'] ?></td>
                     <td><?php echo $value['qty'] ?></td>
                     <td> </td>
                     <td> </td>
                  </tr>
                  <?php } ?>
               </table>
            </center>
         </div>
         <!-- tables Box-->
      </div>
      <!--end of wrapper-->
      <center>
         <button onclick="myFunction()" id="printPageButton">Print this page</button>
         <a href="<?php echo base_url('dsr_bills/bills/'.$id) ?>"><button>Print Bills</button></a>
      </center>
      <script>
         function myFunction() {
           window.print();
         }
      </script>
   </body>
</html>