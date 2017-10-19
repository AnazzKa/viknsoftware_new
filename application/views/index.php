<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vikn Software</title>
	<link rel="stylesheet" href="<?php echo base_url ?>assets/css/slider.css">
	<link rel="stylesheet" href="<?php echo base_url ?>assets/css/main.css">
	<link rel="stylesheet" href="<?php echo base_url ?>assets/css/bootstrap.min.css">
</head>
<body>
<div class="head1" style="width: 100%;height: 70px;background-color:rgba(0, 0, 0, 0.61);position: fixed;z-index: 999;">
	<div class="container">
		<div class="col-sm-4"></div>
		<div class="col-sm-4"></div>
		<div class="col-sm-4">
		<a href="<?php echo base_url ?>login"><div class="login">Login</div></a>
		</div>
			
	</div>
</div>
	<div class="slider" id="slider">
		<div class="slItems">
			<div class="slItem" style="background-image: url('<?php echo base_url ?>assets/images/01.jpg');">
				<!-- <div class="slText">
					jQuery Slider.js Backgounrd Carousel Example
				</div> -->
			</div>
			<div class="slItem" style="background-image: url('<?php echo base_url ?>assets/images/02.jpg');">
				<!-- <div class="slText">
					Praesent consequat sapien ut dui hendrerit imperdiet. Donec tincidunt risus et semper accumsan. 
				</div> -->
			</div>
			
		</div>
	</div>
  <script src="<?php echo base_url ?>assets/js/bootstrap.min.js"></script>
	<script src="http://code.jquery.com/jquery-latest.min.js" type="text/javascript"></script>
	<script src="<?php echo base_url ?>assets/js/slider.min.js"></script>
	<script>
	$(function(){
		$('#slider').rbtSlider({
			height: '100vh', 
			'dots': true,
			'arrows': true,
			'auto': 3
		});
	});

	</script>
</body>
</html>