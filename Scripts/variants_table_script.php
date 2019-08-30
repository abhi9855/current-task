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



$sql="SELECT * FROM variants";
$exe1=mysqli_query($conn,$sql);

$variant_id=[];
while ($row=mysqli_fetch_array($exe1)) {
	$variant_id[]=$row['id'];
	// $pack_id=$row['pack_id'];
	// echo "<pre>".$variant_id;
}
// echo "<pre>";
// print_r($variant_id);
// die;
$sql="SELECT * FROM packs";
$exe2=mysqli_query($conn,$sql);
$pack_id=[];
while ($row=mysqli_fetch_array($exe2)) {
	$pack_id[]=$row['id'];
	// $pack_id=$row['pack_id'];
	// echo "<pre>".$pack_id;
}
$i=0;
$j=0;

$sql="SELECT * FROM product_list_liqlive_updated";
$exe=mysqli_query($conn,$sql);
while ($row=mysqli_fetch_array($exe)) {

    // $cat_id = $row['cat_id'];

    $id= $row['id'];
	$barcode=$row['barcode'];
	$sku=$row['sku'];
	$meta_keywords=$row['meta_keywords'];
	// $expl=explode(' ', $meta_keywords);
	$meta_description=$row['meta_description'];
	$original_price=$row['original_price_per_unit'];
	$sale_price=$row['sale_price_per_unit'];
	$v_id=$variant_id[$i];
	$p_id=$pack_id[$j];

    // mysqli_query($conn,"INSERT INTO product_variant(variant_id,product_id,pack_id,barcode,sku,meta_keywords,meta_description,original_price,sale_price)VALUES(".$v_id.",".$id.",".$p_id.",'".$barcode."','".$sku."','".$meta_keywords."','".$meta_description."',".$original_price.",".$sale_price.")");
    
    echo "<pre>";	
    // echo $meta_keywords;
    echo $meta_description;
 	echo "INSERT INTO product_variant(variant_id,product_id,pack_id,barcode,sku,meta_keywords,meta_description,original_price,sale_price)VALUES(".$v_id.",".$id.",".$p_id.",'".$barcode."','".$sku."','".$meta_keywords."','".$meta_description."',".$original_price.",".$sale_price.")";
   // die;

    // $additional_cat_ids = $row['additional_cat_ids'];
/*    
    if($additional_cat_ids){    	
	    $exp = explode(",",$additional_cat_ids);

	    if(!empty($exp)){
	    	for ($i=0; $i < count($exp); $i++) { 
	    		 $add_cate_id = $exp[$i];
	    		 mysqli_query($conn,"INSERT INTO category_products(category_id,product_id)VALUES(".$add_cate_id.",".$id.")");
	    	}
	    }	
    }*/
$i++;
$j++;
	$i = ($i==155) ? 0 : $i;
	$j = ($j==42) ? 0 : $j;
}

?>


