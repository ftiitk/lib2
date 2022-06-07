<?php
include ("includes/header.php");



$link = mysqli_connect("localhost", "root", "vertrigo", "library_db");

if (mysqli_connect_errno())
    exit("خطاي با شرح زير رخ داده است :" . mysqli_connect_error());

$query = "SELECT * FROM products";             

$result = mysqli_query($link, $query);            
?>

 <table style="width: 100%;" border="1px"  >
  <tr>
  
  <?php

$counter = 0;
while ($row = mysqli_fetch_array($result)) {
    $counter++;
?> 

  
	<td style="border-style: dotted dashed;vertical-align: top;width: 33%; padding: 5px;" >

       <h4 style="color: brown;">نام کتاب : <?php echo ($row['pro_name']) ?></h4>
 <a href="product_detail.php?id=<?php echo ($row['pro_code']) ?>" style="text-decoration: none;">
       <img src="images/products/<?php echo ($row['pro_image']) ?>" width="190px" height="190px" />
  </a>    
       <br/>

     توضيحات  : <span style="color:green;"> <?php echo (substr($row['pro_detail'],0,120)) ?> ...</span>

     <br/><br/>
    <b><a href="product_detail.php?id=<?php echo ($row['pro_code']) ?>" style="text-decoration: none;">توضيحات تكميلي کتاب</a></b>
    
    <br/><br/>
           
    </td>  
    
<?php
    if ($counter % 2 == 0)
        echo ("</tr><tr>");
} 

if ($counter % 2 != 0)
    echo ("</tr>");

?>  
</table>

<?php
include ("includes/footer.php");
?>
   
