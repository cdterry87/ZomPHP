<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta lang="en" />
		<title>ZomPHP - A lightweight PHP MVC framework for zombies</title>
		<style>
			body{font-family: verdana; font-size: 12px;}
			footer{padding-top: 25px;}
			a{color: inherit; text-decoration: none;}
			p{padding: 0; margin: 0; margin-bottom: 5px;}
			input[type=text],textarea,input[type=submit]{border: solid 1px #999; font-family: verdana; font-size: 20px;}
			textarea{height: 100px;}
			input[type=submit]{cursor: pointer; color: #777;}
			
			table{width: 100%;}
			th{text-align: left; background-color: #aaa;}
			table td a{display: block; width: 100%; height: 100%;}
			
			.container{margin-left: auto; margin-right: auto; width: 720px;}
			.center{text-align: center;}
			.align-left{text-align: left;}
			.align-right{text-align: right;}
            .message{color: red; font-size: 20px;}
			
			.box{border-bottom: solid 1px #999; padding-top: 10px;}
			.box-header{font-weight: bold; padding-bottom: 5px;}
		</style>
	</head>
	<body>
		<header class="container">
			<h1><a href="<?php echo $this->config('base_url'); ?>">Welcome to ZomPHP!</a></h1>
		</header>
		<section class="container">
			<?php $this->view($content); ?>
		</section>
		<footer class="container">
			&copy; Chase Terry <?php echo date('Y'); ?>
		</footer>
	</body>
</html>