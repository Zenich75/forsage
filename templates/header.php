<!DOCTYPE html>
<html lang="en">
<head>
	<?php include 'templates/header-meta-tags.php'; ?>

	<title>Title</title>
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="styles/style.min.css?v=1">
</head>
<body>
<a name="top"></a>
<?php
	include 'templates/menu.php';

	if(isset($headerType) && $headerType === 'main') {
		include 'templates/header-main.php';
	} else {
		include 'templates/header-pages.php';
	}
?>
<a name="programm"></a>
<div class="contentBlock">
