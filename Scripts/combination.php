<?php
include_once'config.php';
    
    function combination($chars, $size, $combinations = array()) {
        $n=count($chars);
        # if it's the first iteration, the first set 
        # of combinations is the same as the set of characters
        if (empty($combinations)) {
            $combinations = $chars;
        }
        
            # we're done if we're at size 1
            if ($size == 1) {
                return $combinations;
            }
            
            # initialise array to put new values in
            $new_combinations = array();

            # loop through existing combinations and character set to create strings
            
            foreach ($combinations as $combination) {
                foreach ($chars as $char) {
                    $new_combinations[] = $combination." " . $char;
                }
            }
            $chars1= implode(',',$chars);
            $comb=implode(',',$new_combinations);
            $new=$chars1.",".$comb;
            $str_replace= combination($chars, $size - 1, $new);
            return str_replace("'","''","$str_replace");
        
    }

    $query="SELECT A.id,A.display_name, D.name as categoryName from tbl_products A  LEFT OUTER JOIN tbl_product_cats D ON D.id=A.cat_id";
    $sql = mysqli_query($conn, $query);
    $rows = mysqli_fetch_all($sql);
    // $rows = mysqli_fetch_assoc($sql);
    // echo "<pre>";
    // while($rows = mysqli_fetch_assoc($sql))
    // $arr= $rows['display_name'] . " " . $rows['categoryName'];
    // $chars = explode (" ", $arr);
        // print_r($chars);
        // die;

    foreach ($rows as $row) {
        $id = $row[0];
      // echo"<pre>";
        // print_r($id);
      
        $arr= $row[1] . " " . $row[2];
        $chars = explode (" ", $arr);
        $output = combination($chars,2,$combinations);
        echo "<pre>";

        print_r($chars);
        echo "<br>";
        echo "--------------------------------------------";
        echo "<br>";
     
     // echo "UPDATE tbl_products SET categoryName=".$output." WHERE id=".$id;
        // mysqli_query($conn,"UPDATE product_list SET meta_keywords='".$output."' WHERE id=".$id);
    }

?>

