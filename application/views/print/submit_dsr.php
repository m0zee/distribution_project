<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Daily Sales Reports NISA</title>
    <link href='https://fonts.googleapis.com/css?family=Archivo Narrow' rel='stylesheet'>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('print/style4.css') ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('print/stylesheet.css') ?>">
</head>

<body>
    <div class="wrapper">
        <div class="container">
            <div class="row">
                <div class="column-left" style="background-color:none;">
                    <div class="heading-box">
                        <h2>DAILY SALES REPORT</h2>
                    </div>
                    <!--heading-box-->
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
                                        <td>
                                            <?php echo $value['Name'] ?>
                                        </td>
                                        <td>
                                            <?php echo $value['qty'] ?>
                                        </td>
                                        <td><input type="number" name="return[<?php echo $value['id'] ?>]"></td>
                                        <td><input type="number" name="replace[<?php echo $value['id'] ?>]"></td>
                                        <td><input type="number" name="sample[<?php echo $value['id'] ?>]"></td>
                                        <td><?php echo $value['qty'] ?></td>
                                        <td>
                                            <?php echo $value['sale_price'] ?>
                                        </td>
                                        <td>
                                            <?php echo $value['sale_price'] * $value['qty'] ?>
                                        </td>
                                    </tr>
                                    <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!--tbl-->
                </div>
                <div class="column-right" style="background-color:none;">
                    <div class="row1">
                        <div class="text-box">
                            <h2 style="position: relative;bottom: 10px;"><?php echo $products[0]['company'] ?></h2>
                        </div>
                        <!--text box-->
                        <div class="text-area">
                            <div class="left-text">
                                <p>Date &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php echo $products[0]['Date'] ?>
                                </p>
                            </div>
                            <!--lft text-->
                            <div class="right-text">
                                <p>Day &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                    <?php echo date('l', strtotime($products[0]['Date'])) ?>
                                </p>
                            </div>
                            <!--rgt text-->
                            <div class="left-text1">
                                <p>Area </p>
                            </div>
                            <!--lft text1-->
                            <div class="left-text2">
                                <p>Salesman Mr.</p>
                            </div>
                            <!--lft text2-->
                            <div class="left-text3">
                                <p>Sales Rep Mr.</p>
                            </div>
                            <!--lft text3-->
                            <hr>
                            <hr style="position: relative;bottom: 28px;">
                            <hr style="position: relative;bottom: 5px;">
                            <h4>DETAILS</h4>
                            <hr style="position: relative;bottom: 10px;">
                            <div class="left-text4">
                                <p style="position: relative;bottom: 25px;">Today's Sales :</p>
                            </div>
                            <!--lft text4-->
                            <div class="left-text5">
                                <p style="position: relative;bottom: 37px;">Chaques :</p>
                            </div>
                            <!--lft text5-->
                            <div class="left-text6">
                                <p style="position: relative;bottom: 47px;">Sign Bills :</p>
                            </div>
                            <!--lft text6-->
                            <div class="left-text7">
                                <p style="position: relative;bottom: 57px;">Distributor Discount :</p>
                            </div>
                            <!--lft text7-->
                            <div class="left-text8">
                                <p style="position: relative;bottom: 67px;">Company Discount :</p>
                            </div>
                            <!--lft text8-->
                            <div class="left-text9">
                                <p style="position: relative;bottom: 77px;">T.O :</p>
                            </div>
                            <!--lft text9-->
                            <div class="left-text10">
                                <p style="position: relative;bottom: 87px;">Sales Return :</p>
                            </div>
                            <!--lft text10-->
                            <div class="left-text11">
                                <p style="position: relative;bottom: 97px;">Today's Cash :</p>
                            </div>
                            <!--lft text11-->
                            <div class="left-text12">
                                <p style="position: relative;bottom: 107px;word-spacing: 50px;">Recovery Cash Cheque</p>
                            </div>
                            <!--lft text12-->
                            <div class="left-text13">
                                <p style="position: relative;bottom: 117px;">Total Cash</p>
                            </div>
                            <!--lft text13-->
                            <div class="left-text14">
                                <p style="position: relative;bottom: 127px;">Petrol</p>
                            </div>
                            <!--lft text14-->
                            <div class="left-text15">
                                <p style="position: relative;bottom: 137px;">Other Expenses</p>
                            </div>
                            <!--lft text15-->
                            <div class="left-text16">
                                <p style="position: relative;bottom: 147px;">Net Cash</p>
                            </div>
                            <!--lft text16-->
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
                            </div>
                            <!--lft text17-->
                            <div class="left-text18">
                                <p style="position: relative;bottom: 18px;">SHORT</p>
                            </div>
                            <!--lft text18-->
                            <div class="left-text19">
                                <p style="position: relative;bottom: 32px;">EXCES</p>
                            </div>
                            <!--lft text19-->
                            <div class="left-text20">
                                <p style="position: relative;bottom: 40px;">OTHER</p>
                            </div>
                            <!--lft text20-->
                        </div>
                        <!-- text area-->
                    </div>
                    <!-- row1-->
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
                </div>
                <!--col-rght-->
            </div>
        </div>
        <!--container-->
    </div>
    <!-- wrapper-->
    <div class="wrapper">
        <div class="row">
            <div class="column" style="background-color:none;">
                <table border="1" width="99%">
                    <tbody>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Area</th>
                            <th>Lorem </th>
                            <th> Lorem Ipsum</th>
                            <th> Lorem Ipsum</th>
                            <th> Lorem Ipsum</th>
                            <th> Lorem Ipsum</th>
                            <th> Lorem Ipsum</th>
                            <th> Lorem Ipsum</th>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>4</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>5</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>6</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>7</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>8</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>9</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>10</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>11</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>12</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>13</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>14</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>15</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>16</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>

                        </tr>
                        <tr>
                            <td>17</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>18</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>19</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>20</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="column" style="background-color:none;">
                <table border="1" width="100%">
                    <tbody>
                        <tr>
                            <th>Sr. No.</th>
                            <th>Area</th>
                            <th>Lorem </th>
                            <th> Lorem Ipsum</th>
                            <th> Lorem Ipsum</th>
                            <th> Lorem Ipsum</th>
                            <th> Lorem Ipsum</th>
                            <th> Lorem Ipsum</th>
                            <th> Lorem Ipsum</th>
                        </tr>
                        <tr>
                            <td>21</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>22</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>23</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>24</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>25</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>26</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>27</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>28</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>29</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>30</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>31</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>32</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>33</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>34</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>35</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>36</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>37</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>38</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>39</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                        <tr>
                            <td>40</td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                            <td> </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="main">
            <div class="row1">
                <h5 style="position: relative;top: 2px;">DETALIS OF SALES Lorem Ipsum</h5>
                <div class="tbl1">
                    <table border="1" width="100%">
                        <tbody>
                            <tr>
                                <th>ITEM</th>
                                <th width="10%"> </th>
                                <th width="10%"> </th>
                                <th> Lorem Ipsum</th>
                                <th> Lorem Ipsum</th>
                                <th> Lorem Ipsum</th>
                                <th> Lorem</th>
                                <th> Lorem Ipsum</th>
                                <th> Lorem Ipsum</th>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- tbl1-->
            </div>
            <!-- row1-->
            <div class="row2">
                <h5>DETALIS OF SALES Lorem Ipsum</h5>
                <div class="tbl1">
                    <table border="1" width="100%">
                        <tbody>
                            <tr>
                                <th>S. No.</th>
                                <th>Lorem Ipsum </th>
                                <th>Lorem Ipsum </th>
                                <th> Lorem </th>
                                <th> Lorem Ips</th>
                                <th> Lorem Ipsum</th>
                                <th> Lorem Ipsum</th>
                                <th> Lorem Ipsum</th>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- tbl1-->
            </div>
            <!-- row2-->
            <div class="row3">
                <h5>DETALIS OF SALES Lorem Ipsum</h5>
                <div class="tbl1">
                    <table border="1" width="100%">
                        <tbody>
                            <tr>
                                <th>S. No.</th>
                                <th>Lorem Ipsum </th>
                                <th>Lorem Ipsum </th>
                                <th> Lorem </th>
                                <th> Lorem Ips</th>
                                <th> Lorem Ipsum</th>
                                <th> Lorem Ipsum</th>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- tbl1-->
            </div>
            <!-- row3-->
            <div class="row4">
                <h5>DETALIS OF SALES Lorem Ipsum</h5>
                <div class="tbl1">
                    <table border="1" width="100%">
                        <tbody>
                            <tr>
                                <th>S. No.</th>
                                <th>Lorem Ipsum </th>
                                <th>Lorem Ipsum </th>
                                <th> Lorem </th>
                                <th> Lorem Ips</th>
                                <th> Lorem Ipsum</th>
                                <th> Lorem Ipsum</th>
                                <th> Lorem Ipsum</th>
                                <th> Lorem Ipsum</th>
                                <th> Lorem Ipsum</th>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                            <tr>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                                <td> </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                <!-- tbl1-->
            </div>
            <!-- row4-->
        </div>
        <!-- main-->
        <div class="footer">
            <div class="row5">
                <div class="column-left" style="background-color:none;">
                    <p style="text-decoration: overline;">Signature of Lorem Ipsum</p>
                </div>
                <div class="column-right" style="background-color:none;">
                    <p style="text-decoration: overline;float: right;">Signature of Lorem Ipsum</p>
                </div>
            </div>
        </div>
        <!--footer-->
    </div>
    <!--wrapper-->

</body>

</html>