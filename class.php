<?php 
    class cat{
        public $child_cat_cid;
        function cat_list($p_cid=0,$space=''){
            $q="SELECT * FROM categories";
            $r=mysql_query($q) or die(mysql_error());
            
            $count=mysql_num_rows($r);
            
            if($p_cid==0){
                $space='';
            }else{
                $space .="    ";
            }
            if($count > 0){
                
                while($row=mysql_fetch_array($r)){
                    echo "".$space.$row['name']."";
                    
                    $this->cat_list($row['cid'],$space);
                }
                
            }
        }
    }
?>