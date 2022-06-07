<?php
include ("includes/header.php");


$link = mysqli_connect("localhost", "root", "vertrigo", "library_db");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$pro_code = 0;
if (isset($_GET['id']))
    $pro_code = $_GET['id'];

if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
?>
<br />
<span style='color:red;'><b>برای امانت گرفتن کتاب انتخاب شده باید وارد سایت شوید</b></span>
<br/><br/>
درصورتی که عضو کتابخانه هستید برای ورود 
<a href='login.php' style='text-decoration: none;' ><span style='color:blue;'><b>اینجا</b></span></a>
کلیک کنید
<br/>

 و در صورتی که عضو نیستید برای ثبت نام در کتابخانه
<a href='register.php' style='text-decoration: none;' ><span style='color:green;'><b>اینجا</b></span></a>
کلیک کنید
<br /><br />
<?php
    include ("includes/footer.php");

    exit();
}



$query = "SELECT * FROM products WHERE pro_code='$pro_code'";

$result = mysqli_query($link, $query); 

?>

 <form name="order" action="action_order.php"  method="POST" >
  <table style="width: 100%;" border="1px"  >
  <tr><td style="width: 60%;">

<?php


if ($row = mysqli_fetch_array($result)) { 


?> 

  <br />

    <table style="width: 100%;" border="0"  style="margin-left: auto;margin-right: auto;"  >
    
    <tr>
       <td style="width: 22%;">کد کتاب <span style="color: red;">*</span></td>
       <td style="width: 78%;"><input type="text" id="pro_code" name="pro_code" value="<?php echo ($pro_code); ?>" style="background-color: lightgray;" readonly  /></td>
    </tr>
                          
    <tr>
       <td>نام کتاب <span style="color: red;">*</span></td>
       <td><input type="text" style="text-align: right;background-color: lightgray;" id="pro_name" name="pro_name" value="<?php echo ($row['pro_name']); ?>"  readonly  /></td>
    </tr>

<?php
    $query = "SELECT * FROM users WHERE username='{$_SESSION['username']}'";
    $result = mysqli_query($link, $query);
    $user_row = mysqli_fetch_array($result);
?>    
                         
    <tr>
       <td><br/><br/><br/></td>
       <td></td>
    </tr>
    
    <tr>
       <td style="width: 40%;">نام امانت گیرنده <span style="color: red;">*</span></td>
       <td style="width: 60%;">
       <input type="text" id="realname" name="realname" value="<?php echo ($user_row['realname']); ?>" style="background-color: lightgray;" readonly />
       </td>
    </tr>
                                                   
    <tr>
       <td>ایمیل <span style="color: red;">*</span></td>
       <td><input type="text" style="text-align: left;background-color: lightgray;" id="email" name="email" value="<?php echo ($user_row['email']); ?>"  readonly  /></td>
    </tr>
                         
    <tr>
       <td>شماره تلفن همراه <span style="color: red;">*</span></td>
       <td><input type="text" style="text-align: left;" id="mobile" name="mobile" value="09"  /></td>
    </tr>
          
                         
    <tr>
       <td><br /><br /><br /><br /></td>
       <td><input type="button" value="ثبت امانت" onclick="check_input();" /></td>
    </tr>
                         
   </table>
   
   </td>
   

  <td>


<script type="text/javascript">
<!--
	function check_input()
     {
       var r = confirm("از صحت اطلاعات وارد شده اطمینان دارید؟");
       if (r == true) {
                   var validation=true;
                   var mobile= document.getElementById('mobile').value;
                   if (mobile.length<11)
                    validation=false;
                   if (validation)
                    document.order.submit(); 
                   else
                    alert('برخی از ورودی های فرم امانت کتاب به درستی پر نشده اند'); 
        }
     }
-->
</script>

<table>
 <tr>
	<td style="border-style: dotted dashed;vertical-align: top;width: 33%;padding: 5px;">
    <h4 style="color: brown;"><?php echo ($row['pro_name']) ?></h4>
    <img src="images/products/<?php echo ($row['pro_image']) ?>" width="170px" height="170px"  />
    <br/>
    توضيحات  : <span style="color:green;">
    <?php
    $count = strlen($row['pro_detail']);
    echo (substr($row['pro_detail'], 0, (int)($count / 4)));
?>
    ...</span>
    
    <br/><br/>
   </td>
 </tr>  
</table>  

   </tr> 
   </table> 

  </form>    

<?php
} 


include ("includes/footer.php");
?>