<?php
if(isset($_POST['submit']))
{
   /*extract data from the post
   set POST variables*/
   $url='https://apiliqroo.co.uk/web-services/0.6/customer/ws_find_customers_drinks.php?function=ws_find_customers_drinks&cust_id=104&session_key=179da0c4a063e6192038387cee5a9f56';
   // echo $url;

   // curl_setopt($ch,CURLOPT_URL, $url);
   $fields = array(
     'drink_name' => urlencode($_POST['drink_name']),
     'drink_type' => urlencode($_POST['drink_type']),
     'country_of_origin' => urlencode($_POST['country_of_origin']),
     'where_did_you_try' => urlencode($_POST['where_did_you_try']),
     'pics' => urlencode($_FILES['pics']['name'])
    );

   //move uploaded file to local directory
   // move_uploaded_file($fields['pics']['tmp_name'], "photos/".$fields['pics']['name']);

   //url-ify the data for the POST
   foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
   rtrim($fields_string, '&');

   //open connection
   $ch = curl_init();

   //set the url, number of POST vars, POST data
   curl_setopt($ch,CURLOPT_URL, $url);
   curl_setopt($ch,CURLOPT__POST, count($fields));
   curl_setopt($ch,CURLOPT_POST, $fields_string);

   //execute post
   $result = curl_exec($ch);

   //close connection
   curl_close($ch);
    
   // echo "<pre>";
   // print_r($fields); 
   // echo "</pre>";
   echo $result;   
}
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
   <div class="container" style="padding:10px 5px 15px;">
   <?php   ?>
   <div class="alert alert-success">
<strong>Success!</strong> Indicates a successful or positive action.
</div>
<?php   ?>
<div class="alert alert-danger">
  <strong>Danger!</strong> Indicates a dangerous or potentially negative action.
</div>
<?php ?>


       <div class="section-title section-title-3">
            <h2>Find your Drink </h2>
       </div> 
       <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
               <div class="form-side driver-forms">                  
                  <form class="contact-single-input"  action="find_your_drink.php" method="POST" enctype="multipart/form-data">
                     <div class="col-md-6">
                         <div class="form-group">
                              <label class="text-uppercase">Name of Drink<span class="error-asteric">*</span></label>
                              <input type="text" id="df1" class="form-control"  placeholder="name_of_drink" name="drink_name" required="" value="">                              
                          </div>    
                          <div class="form-group">
                              <label class="text-uppercase">Type of Drink</label>
                              <select id="type_of_drink" class="form-control" name="drink_type"  placeholder="drink_type">                      
                                 <option value="0" disabled selected>Type of Drink </option>
                                 <option value="Beer">Beer</option>
                                 <option value="Cider">Cider</option>
                                 <option value="Vodka">Vodka</option>
                                 <option value="Whiskey">Whiskey</option>
                                 <option value="Gin">Gin</option>
                                 <option value="Wine">Wine</option>
                                 <option value="Brandy">Brandy</option>
                                 <option value="Barley">Barley</option>
                                 <option value="Caffeinated">Caffeinated</option>
                                 <option value="Rum">Rum</option>
                                 <option value="Tequila">Tequila</option>
                                 <option value="Liqueur">Liqueur</option>
                                 <option value="Cocktail">Cocktail</option>
                                 <option value="Other">Other</option>
                              </select>  
                           </div>   
                           <div class="form-group">
                              <label for="" class="text-uppercase">Country of Origin</label>
                              <input type="tel" id="df-5" class="form-control" placeholder="Unknown" name="country_of_origin" maxlength="20" value=""> 
                           </div>  
                           <div class="form-group">
                              <label for="" class="text-uppercase">Upload Image(<small style="font-size:10px;color:#9e9191; text-transform:capitalize;">s</small>)</label>
                              <input type="file" name="pics"  />
                           </div>                  
                     </div>   
                                          
                     </div>   
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="" class="text-uppercase">Where did you try it?<span class="error-asteric">*</span> </label>
                              <textarea rows="10" id="df-5" class="form-control"  placeholder="Message" name="where_did_you_try" required="" style="height:185px;"></textarea>
                              
                           </div> 
                        </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="form-group">
                     
                           <button type="submit" name="submit" class="btn btn-default btn-submit subscribe-btn" style="color:#fff; background-color: #49b8f1; padding: 8px 30px;">Submit</button> 
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

