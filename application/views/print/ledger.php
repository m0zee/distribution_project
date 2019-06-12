<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>Daily Sales Reports NISA</title>
      <link href='https://fonts.googleapis.com/css?family=Archivo Narrow' rel='stylesheet'>
      <link rel="stylesheet" type="text/css" href="<?php echo base_url('print/style5.css') ?>">
   </head>
   <body>
      <div class="wrapper">
         <div class="header-text">
            <div class="text">
               <div class="row">
                  <div class="column" style="background-color:none;">
                     <h2 style="text-align: center;font-style: italic;font-family: Archivo Narrow;">
                        <?php 
                           foreach ($company as $key => $value) {
                              if ($post['company'] == $value['id']) {
                                 echo $value['Name'];
                              }
                           }
                        ?>
                     </h2>
                     <!-- <p style="padding-left:20px; font-weight: bold;font-size: 14px;">Start Date</p> -->
                  </div>
                  <div class="column" style="background-color:none;">
                     <h2 style="text-align: center;font-style: italic;font-family: Archivo Narrow;">Ledger</h2>
                     <!-- <p style="padding-left:20px;font-weight: bold;font-size: 14px;">End Date</p> -->
                  </div>
               </div>
             <!--   <div class="row1">
                  <label style="padding-left:20px;font-weight: bold; font-size: 14px;">Lorem Ipsum</label>
               </div> -->
               <!-- row1-->
            </div>
            <!--text-->
         </div>
         <!--header-->
         <div class="tables-box">
            <center>
               <table width="100%" border="1" align="center">
                  <tr>
                     <th width="1%" style="text-align: left;padding-left: 10px;">S. No.</th>
                     <th width="5%">Title</th>
                     <th width="5%">Date</th>
                     <th width="5%">Credit</th>
                     <th width="5%">Debit</th>
                     <th width="5%">Balance</th>
                  </tr>
                  <?php
                                        $balance = $ledger_entries[0]['credit_amount'] - $ledger_entries[0]['debit_amount'];
                              foreach ($ledger_entries as $key => $module) {
                                            if ($module["Type"] =='Debit') {
                                                $balance -= $module['Amount'];
                                            }
                                            else{
                                                $balance += $module['Amount'];
                                            }
                           ?>
                  <tr>
                                            <td>
                                                <?php echo $key + 1 ?>
                                            </td>
                                            <td>
                                                <?php echo $module["name"] ?>
                                            </td><!-- 
                                            <td>
                                                <?php echo $module["company"] ?>
                                            </td> -->
                                            <td>
                                                <?php echo $module["Date"] ?>
                                            </td>
                                            <td>
                                                <?php echo ($module['Type'] != 'Debit') ? $module["Amount"] : 0 ?>
                                            </td>
                                            <td>
                                                <?php echo ($module['Type'] == 'Debit') ? $module["Amount"] : 0 ?>
                                            </td>
                                            <td>
                                                <?php echo $balance ?>
                                            </td>
                                        </tr>
                                    <?php 

                                        } 
                                    ?>
                  <!-- <tr>
                     <td>1</td>
                     <td> </td>
                     <td> </td>
                     <td> </td>
                     <td> </td>
                     <td> </td>
                  </tr> -->
                  
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