<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Daily Sales Reports NISA</title>
	<link href='https://fonts.googleapis.com/css?family=Archivo Narrow' rel='stylesheet'>
	<link rel="stylesheet" type="text/css" href="<?php echo base_url('print/style3.css') ?>">
</head>
<body>
	<?php 
		foreach ($dsr_bills as $key => $value) {
			$rate = explode(',', $value['rate']);
			$product = explode(',', $value['product']);
			$qty = explode(',', $value['qty']);
	?>
	<div class="wrapper">
		<div class="box" >
			<div class="row">		
				  <div class="column" style="background-color:none;">
				  	<div class="left" style="border:1px solid #000;width: 100%;position: relative;left: 20px;height: 121px;text-align: center;">
					  	<div class="text" style="width: 50%;text-align: center;position: relative;left: 100px;">
					  		<h1><?php //echo $value['company'] ?>Z.F Traders</h1>
					  		 <!-- <p style="position: relative;bottom: 20px;">/RADERS</p> -->
					  	</div><!-- text-->
					 </div><!--left-->
				  </div>
				  <div class="column" style="background-color:none">
				    <div class="tbl" style="width: 70%;">
				    	<table width="100%" border="1" style="font-size: 15px;">
							<tbody>
								<tr>
									<td>SHOPE NAME </td>
									<td> <?php echo $value['shop'] ?> </td>
								</tr>
								<tr>
									<td>DATE <?php echo date('d-m-Y', strtotime($value['Date'])) ?> </td>
									<td> DAY: <?php echo date('l', strtotime($value['Date'])) ?></td>
								</tr>
								<tr>
									<td>So NAME</td>
									<td><?php echo $value['booker'] ?></td>
								</tr>
								<tr>
									<td>S.M NAME </td>
									<td></td>
								</tr>
								<tr>
									<td>CONTACT</td>
									<td> </td>
								</tr>
							</tbody>
						</table>
				    </div><!-- tbl-->
				  </div> 
			</div> <!-- box -->	 	  
		</div><!-- row-->
		<div class="row1" style="margin-top:0px;">
			<div class="tbl1" style="width: 85%;position: relative;left: 10px;bottom: 10px;">
				<table width="100%" border="1">
					<tbody>
						<tr>
							<th>S No.</th>
							<th>QTY</th>
							<th>PRODUCT NAME</th>
							<th>RATE</th>
							<th>DIS</th>
							<th>TOTAL</th>
						</tr>

						<?php 
							foreach ($product as $k => $v) {
						?>
						<tr>
							<td style="	text-align: center;"><?php echo $k+1 ?></td>
							<td style="	text-align: center;"><?php echo $qty[$k] ?></td>
							<td style="	text-align: center;"><?php echo $product[$k] ?></td>
							<td style="	text-align: center;"><?php echo $rate[$k] ?></td>
							<td style="	text-align: center;"><?php echo $value['company_discount'] + $value['Discount'] ?>%</td>
							<td style="	text-align: center;"><?php echo round(($qty[$k] * $rate[$k]) - ($qty[$k] * $rate[$k] * ($value['company_discount'] + $value['Discount']) / 100)) ?></td>
						</tr>
						<?php } ?>
						<tr>
							<th>Total Amount</th>
							<th></th>
							<th></th>
							<th></th>
							<th><?php echo $value['company_discount'] + $value['Discount'] ?>%</th>
							<th><?php echo $value['Total_Amount'] ?></th>
						</tr>
					</tbody>
				</table>
			</div><!-- tbl1-->
		</div><!--row1-->
	</div><!--wrapper-->
<?php } ?>



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