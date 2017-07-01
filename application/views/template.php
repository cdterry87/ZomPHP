<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta lang="en" />
		<title>ZomPHP - A lightweight PHP MVC framework for zombies</title>
		<style>
			body{font-family: verdana; font-size: 12px; color: #333;}
			footer{padding-top: 25px;}
			a{color: inherit; text-decoration: none;}
			p{padding: 0; margin: 0; margin-bottom: 5px;}
			hr{border-color: #999; color: #999;}
			input{width: 100%; height: 22px; margin: 0; padding: 0; }
			input[type="submit"]{background-color: #3794C6; border: solid 1px #108BC9; color: #fff;}
			
			table{width: 100%;}
			
			.container{margin: 0 auto; width: 300px;}
			.center{text-align: center;}
			.align-right{text-align: right;}
		</style>
	</head>
	<body>
		<header class="container center">
			<h1><a href="<?php echo $this->config('base_url'); ?>">Welcome to ZomPHP!</a></h1>
		</header>
		<section class="container">
			<?php $this->view($content); ?>
		</section>
		<footer class="container center">
			<hr/>
			&copy; Chase Terry <?php echo date('Y'); ?>
		</footer>
	</body>
</html>