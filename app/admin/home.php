<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01//EN">
<html lang="zhs">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<title>TXL</title>

		<?php
		echo $this->Html->css('min-cleaned');
		echo $this->Html->css('bootstrap');
		?>
		<?php
		echo $this->Html->script("jquery-2.1.1.min.js");
		echo $this->Html->script("jquery.editable-1.3.3.js");
		echo $this->Html->script("bootstrap.js");
		echo $this->Html->script("sprintf.js");
		?>
		<?php
		include 'script.php';
		?>
	</head>

	<body style="zoom:120%;">
					<?php
					include 'table.php';
					?>
	</body>
</html>
