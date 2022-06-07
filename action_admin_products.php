<?php
include ("includes/header.php");
if (!(isset($_SESSION["state_login"]) && $_SESSION["state_login"] === true && $_SESSION["user_type"] =="admin")) {
?>
<script type="text/javascript">
<!--
location.replace("index.php");	
-->
</script>
<?php
} 

if (!(isset($_GET['action']) && $_GET['action']=='DELETE') ){
	
	if (isset($_POST['pro_code']) && !empty($_POST['pro_code']) && isset($_POST['pro_name']) &&!empty($_POST['pro_name']) && isset($_POST['pro_detail']) &&!empty($_POST['pro_detail']))
	{

		$pro_code = $_POST['pro_code'];
		$pro_name = $_POST['pro_name'];
		$pro_image = basename($_FILES["pro_image"]["name"]);
		$pro_detail = $_POST['pro_detail'];

	} else
		exit("برخی از فیلد ها مقدار دهی نشده است");
	
}

$link = mysqli_connect("localhost", "root", "vertrigo", "library_db");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

if (isset($_GET['action'])) {
    $id = $_GET['id'];
	
    switch ($_GET['action']) {
        case 'EDIT':
            $query = "UPDATE products SET
             pro_code='$pro_code',
             pro_name='$pro_name',
             pro_detail='$pro_detail'
			
                         
             WHERE pro_code='$id'";

            if (mysqli_query($link,$query) === true)
                echo ("<p style='color:green;'><b>کتاب انتخاب شده با موفقيت ويرايش شد</b></p>");
            else
                echo ("<p style='color:red;'><b>خطا در ويرايش کتاب</b></p>");
			
            break;
			
        case 'DELETE':
			$query = "SELECT pro_image  FROM products
             WHERE pro_code='$id'";
			$result=mysqli_query($link, $query);
			$row = mysqli_fetch_array($result);
			$pro_image=$row['pro_image'];
			
            $query = "DELETE  FROM products
             WHERE pro_code='$id'";
            if (mysqli_query($link, $query) === true){
                echo ("<p style='color:green;'><b>کتاب انتخاب شده با موفقيت حذف شد</b></p>");
				unlink("images/products/".$pro_image);
			}
            else
                echo ("<p style='color:red;'><b>خطا در حذف کتاب</b></p>");
			
            break;
			
    } 
    mysqli_close($link);
    include ("includes/footer.php");
    exit();
			
} 


$target_dir = "images/products/";
$target_file = $target_dir.$_FILES["pro_image"]["name"];
$uploadOk = 1;
$imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);



if ($uploadOk == 1) {

    $query = "INSERT INTO products 
    (pro_code,
     pro_name,
     pro_image,
     pro_detail) VALUES
      ('$pro_code',
       '$pro_name',
       '$pro_image',
       '$pro_detail')";

    if (mysqli_query($link, $query) === true)
        echo ("<p style='color:green;'><b>کتاب با موفقیت به کتابخانه اضافه شد</b></p>");
    else
        echo ("<p style='color:red;'><b>خطا در ثبت مشخصات کتاب در کتابخانه</b></p>");
} else
    echo ("<p style='color:red;'><b>خطا در ثبت مشخصات کتاب در کتابخانه</b></p>");

mysqli_close($link);

include ("includes/footer.php");
?>
