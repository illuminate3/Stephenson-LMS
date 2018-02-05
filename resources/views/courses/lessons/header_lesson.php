<!DOCTYPE html>

<html>
	<head>
		<title><?php echo $title; ?></title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1"/>
		<link rel="stylesheet" href="<?php echo url('css/materialize.min.css'); ?>">
		<link rel="stylesheet" type="text/css" href="<?php echo url('css/material-icons.css'); ?>">
		<style>
			*{box-sizing: border-box}
			html,body{height: 100%;}
			.container{
				width: 90%;
			}
			#lesson-left-bar{
				float: left;
				width: 300px;
				height: 100%;
			}
			
			#lesson-video{
				float: left;
				width: calc(100% - 300px);
			}
			
			.module{
				margin: 15px 0px;
			}
			
			.lesson{
				margin:5px 15px;
				padding: 5px 0px;
				border-bottom: 1px solid white;
			}
		</style>
	</head>

	<body>

		
		