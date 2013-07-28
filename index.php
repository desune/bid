<?php 
session_start();
include_once 'Application/models/item.php';
//$_GET['control'] la bien de xac dinh Controller thich hop.
//Neu tren link ko co $_GET['control'] thi mac dinh la trangchu
//include_once 'Application/controllers/autoupdate.php';
if(isset($_GET['control']))
{
	$control = $_GET['control'];
}
else{
	$_SESSION['userID']='';
	if($_SESSION['userID']==NULL)
	$control = "login";
	else 
	$control="home";
}

include_once 'Application/configs/config.php'; // include file cau hinh

//Dieu khien vao ControllerTrangchu
if($control == "home")
	include_once 'Application/controllers/home.php';
	
//Dieu khien vao ControllerRegister
if($control == "register")
	include_once 'Application/controllers/register.php';
if($control == "login")
	include_once 'Application/controllers/login.php';
// Neu nguoi su dung thoat
if($control == "logout")
{
	unset($_SESSION['userID']);
	unset($_SESSION['userName']);
	unset($_SESSION['admin']);
	unset($_SESSION['sex']);
	unset($_SESSION['phone']);
	unset($_SESSION['mail']);
	unset($_SESSION['birthday']);
	header("Location:index.php");

}
//Dieu khien vao ControllerMember
if($control == "members")
{
	include_once 'Application/controllers/members.php';
}
//Dieu khien vao ControllerPhongthu
if($control == "user")
{
	include_once 'Application/controllers/user.php';
}

if($control == "useredit")
{
	
include_once 'Application/controllers/useredit.php';
}


if($control == "adminedit")
{
	
include_once 'Application/controllers/adminedit.php';
}
//Dieu khien vao ControllerLienhe
if($control == "item")
{
	include_once 'Application/controllers/item.php';
}

if($control == "itemedit")
{
	include_once 'Application/controllers/itemedit.php';
}

if($control == "itemadd")
{
	include_once 'Application/controllers/itemadd.php';
}

if($control == "setAuction")
{
	include_once 'Application/controllers/setAuction.php';
}

if($control == "auction")
{
	include_once 'Application/controllers/auction.php';
}
if($control == "deleteAuction")
{
	include_once 'Application/controllers/deleteAuction.php';
}
if($control == "editAuction")
{
	include_once 'Application/controllers/editAuction.php';
}
if($control == "runAuction")
{
	include_once 'Application/controllers/runAuction.php';
}

if($control == "bidview")
{
	include_once 'Application/controllers/bidview.php';
}

if($control == "bidcontrol")
{
	include_once 'Application/controllers/bidcontrol.php';
}

if($control == "bidend")
{
	include_once 'Application/controllers/bidend.php';
}
if($control == "admin")
{
	include_once 'Application/controllers/admin.php';
}

if($control == "itemcontrol")
{
	include_once 'Application/controllers/itemcontrol.php';
}


if($control == "auctioncontrol")
{
	include_once 'Application/controllers/auctioncontrol.php';
}

if($control == "paypalcontrol")
{
	include_once 'Application/controllers/paypalcontrol.php';
}
if($control == "paypal")
{
	include_once 'Application/controllers/paypal.php';
}
if($control == "myuser")
{
	include_once 'Application/controllers/myuser.php';
}
if($control == "membercontrol")
{
	include_once 'Application/controllers/membercontrol.php';
}
if($control == "tintuc")
{
	include_once 'Application/controllers/tintuc.php';
}
if($control == "huongdan")
{
	include_once 'Application/controllers/huongdan.php';
}
?>
