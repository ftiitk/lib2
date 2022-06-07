<?php
include ("includes/header.php");   
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true)) {
?>
<script type="text/javascript">
<!--
location.replace("index.php");	 
-->
</script>
<?php
} 

$pro_code = $_POST['pro_code'];
$pro_name = $_POST['pro_name'];
$realname = $_POST['realname'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$username = $_SESSION['username'];
$link = mysqli_connect("localhost", "root", "vertrigo", "library_db");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$query = "INSERT INTO orders 
    (id,
     username,
     orderdate,
     pro_code,
     mobile,
     state
     ) VALUES
      ('0',
       '$username',
       '".date('y-m-d')."',
       '$pro_code',
       '$mobile','0')";


if (mysqli_query($link, $query) === true) {
    echo ("<p style='color:green;'><br/><b>کتاب امانتی شما با موفقیت در سامانه ثبت شد</b></p>");
    mysqli_query($link, $query);

} else
    echo ("<p style='color:red;'><b>خطا در ثبت امانت</b></p>");


mysqli_close($link);

include ("includes/footer.php");
?>
