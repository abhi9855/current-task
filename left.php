<?php
													
	 function show_cat($p_cid=0,$space=''){
	 	$r2=$mysqli->query=("SELECT * FROM category WHERE p_cid='$p_cid'");
 		
			if($p_cid==0){
			$space='';
		}else{
			 $space .="-----";
		}
		
		
		while($row2=$r2->fetch_assoc())
		{
		
		
		 
		 
		 ?>
		 <li><a href="products.php?action=cat&cid=<?php echo $row2['cid']; ?>" title="Desktops"><span><?php echo $space.$row2['name'] ?></span></a></li>
 		 <?php
		 
		
		 
		 	show_cat($row2['cid'],$space);
		 
		}

	 
	 }
	 
	 
	 
	 show_cat();
	  
	
	 
	 ?>