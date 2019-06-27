<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" /> 
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="/public/assets/css/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="/public/assets/css/style.css">
	<title><?=$this->title;?></title>
</head>
	<body>
		<div class="container-fluid container-extra">
			<h1 align="center"><?=$this->title;?></h1>
			<?php if (!empty($content)):?>
				<?php echo $content;?>
			<?php endif;?>
		</div>

		<footer>
			<script type="text/javascript" src="/public/assets/js/jquery.js"></script>
			<script type="text/javascript" src="/public/assets/js/jquery.mask.min.js"></script>
			<script type="text/javascript" src="/public/assets/js/bootstrap/bootstrap.min.js"></script>
			<script type="text/javascript" src="/public/assets/js/sweetalert.min.js"></script>
		</footer>

	</body>
</html>