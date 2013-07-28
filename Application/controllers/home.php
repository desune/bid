<?php
// dieu khien trang chu

	include_once 'Application/models/item.php';
	//$auc=new auction();
	$it=new item();
	$it->setItemID('1');
	$it=$it->getItem($mysqli,$db_name);
	
	$it->setItemID('2');
	$it=$it->getItem($mysqli,$db_name);
	
	include_once 'Application/views/home.php';
?>