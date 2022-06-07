<?php
include ("includes/header.php");

$link = mysqli_connect("localhost", "root", "vertrigo", "library_db");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$pro_code=0;
if (isset($_GET['id']))
	 $pro_code=$_GET['id'];

$query = "SELECT * FROM products WHERE pro_code='$pro_code'";            

$result = mysqli_query($link, $query);            


?>

 <table style="width: 100%;" border="1px"  >
  <tr>
  
  <?php


if ($row = mysqli_fetch_array($result)) {
  
?> 

  
	<td style="border-style:dashed;vertical-align: top;padding: 5px;" >

       <h4 style="color: brown;"><?php echo ($row['pro_name']) ?></h4>
 
       <img src="images/products/<?php echo ($row['pro_image']) ?>" width="190px" height="190px"  />
     
       <br/>

     توضيحات و خلاصه کتاب  : <span style="color:green;"> <?php echo ($row['pro_detail']) ?> </span>
     <br/><br/>
    <b><a href="order.php?id=<?php echo ($row['pro_code']) ?>" style="text-decoration: none;">امانت گرفتن کتاب</a></b>
    <br/><br/>
           
    </td>  
    
<?php
   
	  
} 

?>  
</tr>
</table>

<?php
include ("includes/footer.php");
?>
   
