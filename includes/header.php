<?php
session_start();
?>
<!doctype html>
<html>
<head>
<meta charset="UTF-8" />
<title>کتابخانه مرکزی</title>

<link href="css/style.css" rel="stylesheet" type="text/css" />

<style type="text/css">
<!--
	.set_style_link {
     text-decoration: none;
     font-weight: bold; 
     }
-->
</style>

</head>

<body>


<div style="background-color:#E0D8B0"class="divTable" >
		<div class="divTableRow">
			<div class="divTableCell">
				<header class="divTable">
						<div class="divTableRow">
							<div style="background-color: #C69B7B;font-family:Arabic Typesetting;font-size:30px" align="center" class="divTableCell">کتابخانه مرکزی </div>
						</div>
				</header>
				<nav class="divTable">
						<ul class="divTableRow" style="text-align: center;">
							<li class="divTableCell"><a class="set_style_link" href="index.php">صفحه اصلي</a></li>
							<li class="divTableCell"><a class="set_style_link" href="register.php">عضويت در کتابخانه</a></li>
                            
                    <?php
                        if (isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true) 
                         {
                    ?>
                   <li class="divTableCell"><a href="logout.php"  class="set_style_link" >خروج از کتابخانه <?php echo(" ({$_SESSION["realname"]}) ") ?></a></li>
                    <?php
                         } 
                        else
                         { 
                    ?>
                            
							<li class="divTableCell"><a class="set_style_link" href="login.php">ورود به کتابخانه</a></li>
                            
                    <?php
                         } 
                    ?>						
                    
 
							<li class="divTableCell"><a class="set_style_link" href="contact.php">ارتباط با ما</a></li>
                            
                            
                    <?php
                        if (isset($_SESSION["state_login"]) && $_SESSION["state_login"]===true && $_SESSION["user_type"]=="admin") 
                         {
                    ?>
                    <li class="divTableCell"><a href="admin_products.php"  class="set_style_link" >مدیریت کتاب ها</a></li>                    
                    <li class="divTableCell"><a href="admin_manage_order.php"  class="set_style_link" >مدیریت امانت ها</a></li>
                    <?php
                         } 
                    ?>
                           
                            
						</ul>
				</nav>
				<section class="divTable">
						<section class="divTableRow">
							<aside class="divTableCell" style="width: 25%;font-size: 22px" >بخش امکانات کتابخانه</aside>
							<section class="divTableCell" style="width: 75%;" >