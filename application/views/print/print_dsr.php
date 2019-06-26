<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Daily Sales Reports Z.F Traders</title>
      <link href='https://fonts.googleapis.com/css?family=Archivo Narrow' rel='stylesheet'>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('print/style.css') ?>">
   </head>
   <body>
      <div class="wrapper">
         <div class="header-text">
            <div class="text">
               <div class="row">
                  <div class="column" style="background-color:none;">
                     <h2 style="text-align: center;font-style: italic;font-family: Archivo Narrow;">Z.F Traders</h2>
                  </div>
                  <div class="column" style="background-color:none;">
                     <h2 style="text-align: center;font-style: italic;font-family: Archivo Narrow;">DSR.</h2>
                  </div>
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
                     <th width="10%" style="text-align: left;padding-left: 10px;">Id </th>
                     <th width="25%">Shop </th>
                     <th width="25%">Total Amount</th>
                  </tr>
                  <?php foreach ($dsr_bills as $key => $value) { ?>
                  <tr>
                     <td><?php echo $value['id'] ?></td>
                     <td><?php echo $value['shop'] ?></td>
                     <td><?php echo $value['Total_Amount'] ?></td>
                  </tr>
                  <?php } ?>
                  <tr>
                     <th></th>
                     <th>Total</th>
                     <th><?php echo $dsr_bills[0]['dsr_total'] ?></th>
                  </tr>
               </table>
            </center>
         </div>
         <!-- tables Box-->
      </div>
      <!--end of wrapper-->
      <center>
         <button onclick="myFunction()" id="printPageButton">Print this page</button>
      </center>
      <script>
         function myFunction() {
           window.print();
         }
      </script>
   </body>
</html>