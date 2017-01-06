<?php 
include("connect.php");

$sel_query = "SELECT * FROM category WHERE cid='" . $_POST['gal'] . "'";
$rs_query = mysql_query ( $sel_query );
$row_query = mysql_fetch_assoc ( $rs_query );
$catname = ereg_replace ( " ", "", $row_query ['cat_name'] );

$dir [2] = "portfolio_images/" . $catname . "/large/";

$select_cat="SELECT * FROM product where cid='" . $_POST['gal'] . "'";
		
$rs_cat = mysql_query($select_cat);

$result='';
while($row_cat = mysql_fetch_assoc($rs_cat))
{
      $result.= '{"href":"'.$dir [2].'/'.$row_cat['product_large'].'"},';
}

$demo =trim($result, ",");
echo $demo;
?>
