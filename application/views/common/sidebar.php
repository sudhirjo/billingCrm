<!DOCTYPE html>
<html lang="en">
<head>
  <title>Billing</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <style>
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {height: 550px}
    
    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }
        
    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {height: auto;} 
    }
  </style>
</head>
<body>
<nav class="navbar navbar-inverse visible-xs">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Bharat Energy</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?php echo base_url('create-product');?>">Products</a></li>
		<li><a href="<?php echo base_url('create-customer');?>">Customer</a></li>
		<li><a href="<?php echo base_url('create-purchaser');?>">Purchaser</a></li>
		<li><a href="<?php echo base_url('create-seller');?>">Seller</a></li>
		<li><a href="<?php echo base_url('create-purchase-bill');?>">Purchaser Bill</a></li>
		<li><a href="<?php echo base_url('create-sale-bill');?>">Sales Bill</a></li>
		<li><a href="<?php echo base_url('view-stock-report');?>">Stock Report</a></li>
		<li><a href="<?php echo base_url('view-transaction-report');?>">Transaction Report</a></li>



      </ul>
    </div>
  </div>
</nav>

<div class="container-fluid">
  <div class="row content">
    <div class="col-sm-3 sidenav hidden-xs">
      <h2>Bharat Energy</h2>
      <ul class="nav nav-pills nav-stacked" id="navMenus">
        <li class="active"><a href="<?php echo base_url('create-product');?>">Products</a></li>
		<li><a href="<?php echo base_url('create-customer');?>">Customer</a></li>
		<li><a href="<?php echo base_url('create-purchaser');?>">Purchaser</a></li>
		<li><a href="<?php echo base_url('create-seller');?>">Seller</a></li>
		<li><a href="<?php echo base_url('create-purchase-bill');?>">Purchaser Bill</a></li>
		<li><a href="<?php echo base_url('create-sale-bill');?>">Sales Bill</a></li>	
	<li><a href="<?php echo base_url('view-stock-report');?>">Stock Report</a></li>
		<li><a href="<?php echo base_url('view-transaction-report');?>">Transaction Report</a></li>

      </ul><br>
    </div>
    <br>
	<script>
$("#navMenus").on('click','li',function(){
	    $("#navMenus li.active").removeClass("active"); 
     $(this).addClass("active");  // adding active class
});
	</script>
