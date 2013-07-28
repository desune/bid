<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8"></meta>
        <title>Auction</title>
        <link rel="stylesheet" href="Public/css/head.css" />
        <?php include_once 'Application/models/item.php'; ?>
    </head>
    <body>
	    <?php
		error_reporting(E_STRICT | E_ERROR | E_WARNING | E_PARSE | E_RECOVERABLE_ERROR | E_COMPILE_ERROR | E_USER_ERROR | E_USER_WARNING ); 
		?>
        <div id="daugianguoc">  
            <div class="top"> <a href="/"> <div class="logo"><img src="Public/images/header/logo.gif"/> </div> </a>
                <?php
                $usertest4 = $_SESSION['userID'];
                if (isset($usertest4)) {
                    print'<li class="active"> <span style="background:url(Public/images/header/home.png) top left no-repeat;" ><a href="index.php?control=home"><div class="menu"> <span class="main">&nbsp;</span><br>Trang Chủ</div> </a></span></li>';
                } else {
                    print'<li class="active"> <span style="background:url(Public/images/header/home.png) top left no-repeat;" ><a href="index.php?control=login"><div class="menu"> <span class="main">&nbsp;</span><br>Trang Chủ</div> </a></span></li>';
                }
                ?>
                <li class="active"> <span style="background:url(Public/images/header/khachhang.png) top left no-repeat;" ><a href="index.php?control=members"> <div class="menu"> <span class="main">&nbsp;</span><br />Khách hàng</div> </a></span></li>
                <li class="active"> <span style="background:url(Public/images/header/huongdan.png) top left no-repeat;" ><a href="index.php?control=huongdan"> <div class="menu"> <span class="main">&nbsp;</span><br />Hướng dẫn</div> </a></span></li>
                <li class="active"> <span style="background:url(Public/images/header/thongtin1.png) top left no-repeat;" ><a href="index.php?control=tintuc"> <div class="menu"> <span class="main">&nbsp;</span><br />Tin tức</div> </a></span></li>
                <li class="active"> <span style="background:url(Public/images/header/spdaugia1.png) top left no-repeat;" ><a href="index.php?control=bidview"> <div class="menu"> <span class="main">&nbsp;</span><br />Đang đấu giá</div> </a></span></li>
                <li class="active"> <span style="background:url(Public/images/header/dadaugia.png) top left no-repeat;" ><a href="index.php?control=bidend"> <div class="menu"> <span class="main">&nbsp;</span><br />Đã đấu giá</div> </a></span></li>
                <?php
                if ($_SESSION['userID'] != NULL) {
                	$uID = $_SESSION['userID'];
                    print'<li class="active"> <span style="background:url(Public/images/header/napxu.png) top left no-repeat;" ><a href="index.php?control=paypal"><div class="menu"> <span class="main">&nbsp;</span><br />Nạp zen</div></a></span></li>
                        <li class="active"> <span style="background:url(Public/images/header/khachhang.png) top left no-repeat;" ><a href="index.php?control=myuser&value='.$uID.'"><div class="menu"> <span class="main">&nbsp;</span><br />Thông tin cá nhân</div></a></span></li>';
                }
                ?>
                <?php
                if ($_SESSION['admin'] != NULL) {
                    print'<li class="active"><span style="background:url(Public/images/header/khachhang.png) top left no-repeat;" ><a href="index.php?control=itemcontrol"><div class="menu"> <span class="main">&nbsp;</span><br />ADMIN</div></a></span></li>';
                }
                ?>
                <?php
                if ($_SESSION['userID'] == NULL) {
                    print'<li class="active"><span style="background:url(Public/images/header/khachhang.png) top left no-repeat;" ><a href="index.php?control=register"><div class="menu"> <span class="main">&nbsp;</span><br />Đăng ký</div></a></span></li>
                          <li class="active"><span style="background:url(Public/images/header/khachhang.png) top left no-repeat;" ><a href="index.php?control=login"><div class="menu"> <span class="main">&nbsp;</span><br />Đăng nhập</div></a></span></li>';
                } else {
                    print'<li class="active"><span style="background:url(Public/images/header/home.png) top left no-repeat;" ><a href="index.php?control=logout"><div class="menu"> <span class="main">&nbsp;</span><br />Thoát</div></a></span></li>';
                }
                ?>
            </div>
        </div>
        <div id="content">