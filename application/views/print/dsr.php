<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Daily Sales Reports NISA</title>
	<link href='https://fonts.googleapis.com/css?family=Archivo Narrow' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('print/style4.css') ?>">
</head>
<body>
	<div class="wrapper">
		<div class="container">
			<div class="row">
				  <div class="column-left" style="background-color:none;">
				  	<div class="heading-box">
					    <h2>DAILY SALES REPORT</h2>
					</div><!--heading-box-->
					<div class="tbl">
						<table width="100%" border="1">
							<tbody>
								<tr>
									<th>Item</th>
									<th>Issued</th>
									<th>Returned</th>
									<th>Replace</th>
									<th>Samples</th>
									<th>Sold</th>
									<th>Rate</th>
									<th>Amount</th>
								</tr>
								<?php foreach ($products as $key => $value) { ?>
								<tr>
									<td><?php echo $value['Name'] ?></td>
									<td><?php echo $value['qty'] ?></td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td> </td>
									<td><?php echo $value['sale_price'] ?></td>
									<td><?php echo $value['sale_price'] * $value['qty'] ?></td>
								</tr>
								<?php } ?>								
							</tbody>
						</table>
					</div><!--tbl-->
				  </div>
				  <div class="column-right" style="background-color:none;">
				  	<div class="row1">
				  		<div class="text-box">
				    		<h2 style="position: relative;bottom: 10px;"><?php echo $products[0]['company'] ?></h2>
				    	</div><!--text box-->
				    	<div class="text-area">
				    		<div class="left-text">
				    		 <p>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $products[0]['Date'] ?></p>
				    		</div><!--lft text-->
				    		<div class="right-text">
				    		 <p>Day &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?php echo date('l', strtotime($products[0]['Date'])) ?></p>
				    		</div><!--rgt text-->
				    		<div class="left-text1">
				    		 <p>Area </p>
				    		</div><!--lft text1-->
				    		<div class="left-text2">
				    		 <p>Salesman Mr.</p>
				    		</div><!--lft text2-->
				    		<div class="left-text3">
				    		 <p>Sales Rep Mr.</p>
				    		</div><!--lft text3-->
				    		<hr>
				    		<hr style="position: relative;bottom: 28px;">
				    		<hr style="position: relative;bottom: 5px;">
				    		<h4>DETAILS</h4>
				    		<hr style="position: relative;bottom: 10px;">
				    		<div class="left-text4">
				    		 <p style="position: relative;bottom: 25px;">Today's Sales :</p>
				    		</div><!--lft text4-->
				    		<div class="left-text5">
				    		 <p style="position: relative;bottom: 37px;">Chaques :</p>
				    		</div><!--lft text5-->
				    		<div class="left-text6">
				    		 <p style="position: relative;bottom: 47px;">Sign Bills :</p>
				    		</div><!--lft text6-->
				    		<div class="left-text7">
				    		 <p style="position: relative;bottom: 57px;">Distributor Discount :</p>
				    		</div><!--lft text7-->
				    		<div class="left-text8">
				    		 <p style="position: relative;bottom: 67px;">Company Discount :</p>
				    		</div><!--lft text8-->
				    		<div class="left-text9">
				    		 <p style="position: relative;bottom: 77px;">T.O :</p>
				    		</div><!--lft text9-->
				    		<div class="left-text10">
				    		 <p style="position: relative;bottom: 87px;">Sales Return :</p>
				    		</div><!--lft text10-->
				    		<div class="left-text11">
				    		 <p style="position: relative;bottom: 97px;">Today's Cash :</p>
				    		</div><!--lft text11-->
				    		<div class="left-text12">
				    		 <p style="position: relative;bottom: 107px;word-spacing: 50px;">Recovery  Cash   Cheque</p>
				    		</div><!--lft text12-->
				    		<div class="left-text13">
				    		 <p style="position: relative;bottom: 117px;">Total Cash</p>
				    		</div><!--lft text13-->
				    		<div class="left-text14">
				    		 <p style="position: relative;bottom: 127px;">Petrol</p>
				    		</div><!--lft text14-->
				    		<div class="left-text15">
				    		 <p style="position: relative;bottom: 137px;">Other Expenses</p>
				    		</div><!--lft text15-->
				    		<div class="left-text16">
				    		 <p style="position: relative;bottom: 147px;">Net Cash</p>
				    		</div><!--lft text16-->
				    		<h4 style="position: relative;bottom: 82px;">NOTE</h4>
				    		<hr style="position: relative;bottom: 150px;">
				    		<hr style="position: relative;bottom: 122px;">
				    		<hr style="position: relative;bottom: 93px;">
				    		<hr style="position: relative;bottom: 70px;">
				    		<hr style="position: relative;bottom: 40px;">
				    		<hr style="position: relative;bottom: 15px;">
				    		<hr style="position: relative;top: 10px;">
				    		<div class="left-text17">
				    		 <p style="position: relative;bottom: 8px;">TOTAL</p>
				    		</div><!--lft text17-->
				    		<div class="left-text18">
				    		 <p style="position: relative;bottom: 18px;">SHORT</p>
				    		</div><!--lft text18-->
				    		<div class="left-text19">
				    		 <p style="position: relative;bottom: 32px;">EXCES</p>
				    		</div><!--lft text19-->
				    		<div class="left-text20">
				    		 <p style="position: relative;bottom: 40px;">OTHER</p>
				    		</div><!--lft text20-->
				    	</div><!-- text area-->
				    </div><!-- row1-->
				    <div class="footer">
            <div class="row5">
               <div class="col-lft" style="background-color:none;">
                  <p style="text-decoration: overline;">Signature of Salesman</p>
               </div>
               <div class="col-rgt" style="background-color:none;">
                  <p style="text-decoration: overline;float: right;">Signature of Incharge</p>
               </div>
            </div>
         </div>
         <!--footer-->
				  </div><!--col-rght-->
				</div>
		</div><!--container-->
	</div><!-- wrapper-->







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