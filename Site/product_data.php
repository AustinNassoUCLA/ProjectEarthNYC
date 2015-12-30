<?php

//PUT YOUR SERVER INFO HERE:
$server = "localhost"; 
$user = "root"; 
$pass = "root";
$db = "Test"; 
//-------------------------

$conn = mysql_connect($server, $user, $pass);
if (!$conn)
{
	 die("<h1>An error occurred.</h1>" . mysql_error()); 	
}

mysql_select_db($db); 
$query = "SELECT * FROM products"; 
$return_value = mysql_query($query, $conn); 
if (!$return_value)
{
	die("<h1>Data could not be loaded.</h1>" . mysql_error()); 
}

while ($row = mysql_fetch_array($return_value, MYSQL_ASSOC))
{
	
	echo "<div class=\"product\" data-name=\"{$row[prod_title]}\" data-price=\"{$row[prod_price]}\" data-id=\"{$row[prod_id]}\" style=\"background-image: url(images/products/regular/{$row['img_url']});\"><div class=\"prod_descript\" style=\"top: 385px;\"><div class=\"description_div\"><p class=\"descript_title\"> {$row['prod_title']} - \${$row['prod_price']} </p><img onmousedown=\"add(this)\" onmouseup=\"add(this)\" src=\"images/add.png\" class=\"addButton\"/><div class=\"line\"></div><p class=\"descript_text\"> {$row['prod_desc']} </p></div><img class=\"blur_img\"  src=\"images/products/blur/{$row['img_url']}\"/></div></div>";
	

}




 
mysql_close($conn); 
?>