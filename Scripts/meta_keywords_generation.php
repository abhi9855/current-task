<?php
    
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
                // echo "<pre>";
                    $chars1= implode(',',$chars);
                    $comb=implode(',',$new_combinations);
                    $new=$chars1.",".$comb;
                // print_r($comb);
                // echo str_word_count($new);


           if(isset($_GET['submit']))
            {
            // print_r($new_combinations);
            # call same function again for the next iteration
            // echo "<pre>";
                return combination($chars, $size - 1, $new);
               // return str_replace("'","''","$str_replace");
            }
    }

        $string = $_GET['text'];
        $chars = explode (" ", $string);
        $output = combination($chars,2,$combinations);
        // echo str_word_count($output);
        // print_r($chars);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Liqroo</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800" rel="stylesheet">
</head>

<body>
<link rel="stylesheet" href="style.css">
<div id="register">
   <div class="container">
       <div class="section-title section-title-3">
            <h2>Meta Keywords Generation Form</h2>
       </div> 
       <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="form-side driver-forms">                  
                   <form class="contact-single-input"  method="GET">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-uppercase">enter your text<span class="error-asteric">*</span></label>
                                <input type="text" id="textx" class="form-control"  placeholder="enter_your_text" name="text" value="">                              
                            </div>    
                          
                            <div class="form-group">
                                <label for="" class="text-uppercase">result :</label>
                                <textarea rows="10" id="meta_keyword" class="form-control"  placeholder="Meta_keyword" name="meta_keyword" style="height:185px;"><?php print_r($output); ?></textarea>
                            </div>                  
                        </div>
                                          
                </div>   
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group">
                            <input type="submit" name="submit" class="btn btn-default btn-submit subscribe-btn"  value="submit" style="color:#fff; background-color: #49b8f1; padding: 8px 30px;">
                           <!-- <button type="submit" name="submit" class="btn btn-default btn-submit subscribe-btn" style="color:#fff; background-color: #49b8f1; padding: 8px 30px;">Submit</button>  -->
                        </div>
                    </div>
                </div>
               </form>
            </div>
         </div>
      </div>    
   </div>         
</div>          
</body>

</html>

