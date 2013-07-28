<?php
include_once 'Application/models/users.php';
$us=new users();
if ($_SESSION['admin']==1)
{
$members=$us->getList($mysqli,$db_name);
	
}
else
{
$members=$us->getListUndelete($mysqli,$db_name);
}
include_once 'Application/views/membercontrol.php';

//include_once 'Application/views/members.php';
?>