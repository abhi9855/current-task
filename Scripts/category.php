 <?php 
  // require 'config.php'; 

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$conn = mysqli_connect($servername="localhost", $username= "root", $password= "root1234",$dbname="db_liqroo_latest");//$dbname="php"

if ($conn->connect_error)
{
    die("Connection failed: ".$conn->connect_error);
} 
// echo "Connected successfully";

 
  $cat=new cat(); 
 //  if(isset($_POST['submit'])){ 
 //    $parent_cat_id=$_POST['parent_cat_id']; 
 //    $name=$_POST['name']; 
 //    mysqli_query("INSERT INTO categories (name,parent_cat_id) VALUES('$name','$parent_cat_id') ") or die(mysql_error()); 
 // } 
class cat{
    public $child_cat_cid;

    function cat_list($conn,$parent_cat_id=0,$space=''){
        $q="SELECT * FROM categories WHERE  parent_cat_id=name";

        $r=mysqli_query($conn, $q);
        // or die(mysqli_error());

        $count=mysqli_num_rows($r);
        print_r($count);
        if($parent_cat_id==0){
            $space='';
        }else{
            $space .="    ";
        }
        // print_r("Count = ".$count."<br>");
        // echo "<br>";
        if($count > 0){

            while($row=mysqli_fetch_assoc($r)){
                echo " ".$space.$row['name']."";
                $this->cat_list($row['parent_cat_id'],$space);
                // echo $row['name'];
                echo "<br>---------------------------------<br>";
            } 
        }
    }
}
$cat->cat_list($conn);
?>


<!-- <form action="" method="post">
    <select name="parent_cat_id">
        <option value="0">Select Category</option>
        <?php 


        foreach ($cat->cat_list($conn) as $value) {
            
          ?>
          <option value="<?php echo $value; ?>"><?php echo $value; ?></option>
          <?php 

            
        }
        ?>
    </select>
    Category : <input name="name" type="text" />
    <input name="submit" type="submit" value="Submit" />
</form> -->