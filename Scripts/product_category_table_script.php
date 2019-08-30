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

$sql="SELECT * FROM product_list_liqlive_updated";
$exe=mysqli_query($conn,$sql);
// $rows = mysqli_fetch_all($exe);
while ($row=mysqli_fetch_array($exe)) {
// foreach ($rows as $row) {
    $cat_id = $row['cat_id'];
    $id= $row['id'];

    mysqli_query($conn,"INSERT INTO category_products(category_id,product_id)VALUES(".$cat_id.",".$id.")");

    $additional_cat_ids = $row['additional_cat_ids'];
    if($additional_cat_ids){    	
	    $exp = explode(",",$additional_cat_ids);
	    // echo"<pre>";
	    // print_r($exp);

	    if(!empty($exp)){
	    	for ($i=0; $i < count($exp); $i++) { 
	    		 $add_cate_id = $exp[$i];
	    		 mysqli_query($conn,"INSERT INTO category_products(category_id,product_id)VALUES(".$add_cate_id.",".$id.")");
	    		 //echo "INSERT INTO category_products(category_id,product_id)VALUES('$cat_id','$add_cate_id')";
	    	}
	    }

    }

    //echo $row['additional_cat_ids']."<br>";
    
    //print_r($id." => ".$cat_id.$additional_cat_ids."<>");
}

?>