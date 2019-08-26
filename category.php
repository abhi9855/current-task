 <?php 
  require 'config.php'; 
  require 'class.php'; 
  $cat=new cat(); 
  if(isset($_POST['submit'])){ 
    $p_cid=$_POST['p_cid']; 
    $name=$_POST['name']; 
    // mysql_query("INSERT INTO category (name,p_cid) VALUES('$name','$p_cid') ") or die(mysql_error()); 
 } 

?>


<form action="" method="post">
    <select name="p_cid">
        <option value="0">Select Category</option><?php /*$cat->cat_list();*/ ?>
    </select>
    Category : <input name="name" type="text" />
    <input name="submit" type="submit" value="Submit" />
</form>