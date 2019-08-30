<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$conn = mysqli_connect($servername="localhost", $username= "root", $password= "root1234",$dbname="db_liqroo_latest");//$dbname="php"

if ($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
} 
// echo "Connected successfully";

$sql="SELECT * FROM copy_tbl_products";
$exe=mysqli_query($conn,$sql);

// $i=1;

while ($row=mysqli_fetch_array($exe)) {
    $id=$row['id'];
    $name=$row['name'];
    $name1=str_replace("'","''","$name");
    $display_name=$row['display_name'];
    $display_name1=str_replace("'","''","$display_name");
    $info=$row['info_text'];
    $info_text=str_replace("'","''","$info");
    $type=$row['item_type'];
	$brand_id=$row['brand_id'];
	$age_id=$row['age'];
	$tax_id=$row['tax_id'];
	$category_id=$row['cat_id'];
	$country_of_origin=$row['country_of_origin'];
	$instant_delivery=1;
	$handcrafted=$row['handcrafted'];
	$limited_edition=$row['limited_edition'];
    $exclusive_gift=$row['exclusive_gift'];
    $giftware=$row['giftware'];
    $refundable=$row['refundable'];
    $expirable=$row['expirable'];
    $ecofriendly=$row['ecofriendly'];
    $recyclable=$row['recyclable'];
    $is_alcohol=$row['is_alcohol'];
    $is_tobacco=$row['is_tobacco'];
    $status=1;
    $vendor_id=1;

   $a= mysqli_query($conn,"INSERT INTO products(`name`,`display_name`,`info`,`type`,`brand_id`,`age_id`,`tax_id`,`category_id`,`country_of_origin`,`instant_delivery`,`handcrafted`,`limited_edition`,`exclusive_gift`,`giftware`,`refundable`,`expirable`,`ecofriendly`,`recyclable`,`is_alcohol`,`is_tobacco`,`status`,`vendor_id`)VALUES('".$name1."','".$display_name1."','".$info_text."','".$type."',".$brand_id.",".$age_id.",".$tax_id.",".$category_id.",'".$country_of_origin."','".$instant_delivery."','".$handcrafted."','".$limited_edition."','".$exclusive_gift."','".$giftware."','".$refundable."','".$expirable."','".$ecofriendly."','".$recyclable."','".$is_alcohol."','".$is_tobacco."','".$status."',".$vendor_id.")");
    
    echo "<pre>";	

    // $a="INSERT INTO products(`name`,`display_name`,`info`,`type`,`brand_id`,`age_id`,`tax_id`,`category_id`,`country_of_origin`,`instant_delivery`,`handcrafted`,`limited_edition`,`exclusive_gift`,`giftware`,`refundable`,`expirable`,`ecofriendly`,`recyclable`,`is_alcohol`,`is_tobacco`,`status`,`vendor_id`)VALUES('".$name1."','".$display_name1."','".$info_text."','".$type."',".$brand_id.",".$age_id.",".$tax_id.",".$category_id.",'".$country_of_origin."','".$instant_delivery."','".$handcrafted."','".$limited_edition."','".$exclusive_gift."','".$giftware."','".$refundable."','".$expirable."','".$ecofriendly."','".$recyclable."','".$is_alcohol."','".$is_tobacco."','".$status."',".$vendor_id.")";
    echo $id."--break ---".$a;

    //  $i++;
}

?>
