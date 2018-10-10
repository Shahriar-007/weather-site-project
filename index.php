<?php

   $weather = "" ;
   
   $error = "" ;

     if (array_key_exists('city', $_GET)) {

      @$urlcontents = file_get_contents("http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_GET['city'])."&appid=d3130a4f43f8285753f396541bb4e31a") ;

      $weatherarray = json_decode($urlcontents, true);



           

            if ($weatherarray['cod'] == 200){
      
                $weather = "Current weather in ".$_GET['city']." is: ".$weatherarray['weather'][0]['main'].",  ".$weatherarray['weather'][0]['description'].". Cloudiness: ".$weatherarray['clouds']['all']."%. ";

                $temperature = intval($weatherarray['main']['temp'] - 273);
                $windspeed = $weatherarray['wind']['speed'] * 3.6 ;

                $weather .= "Temperature: ".$temperature."&deg;C. Humidity: ".$weatherarray['main']['humidity']."%. Wind speed: ".$windspeed." km/h. "  ;

                  } else{

                  	
                  	  $error = "Could not find city. Please try again." ;
                  }

 


    }

  

?>




<!doctype html>
<html lang="en">
         
<head>
   <!-- Required meta tags -->
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"> 

   <link rel="shortcut icon" type="image/x-icon" href="pic2.svg" />
 
                                 
   <title>Weather Information Provider</title>
   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">





    <style type"text/css">
           
        html { 
                background: url(pic1.jpg) no-repeat center center fixed; 
                -webkit-background-size: cover;
                -moz-background-size: cover;
                -o-background-size: cover;
                background-size: cover;
              }


        body{
                background: none ;
             }
                                                   

        .container {
                     text-align: center ;
                     margin-top: 10px ;
                     width: 550px;
                    }


        input {
                margin: 20px 0 ;
              }

        

        #weather {
                   margin-top: 20px ;
                  }

         #logo{
             height: 150px ;
             width: 150px ;
         }         

    </style>

</head>
  


<body>
  <img id="logo" src="pic3.png">

   
   <div class="container">
    
       <h1>What's The Weather ?</h1>

   
       <form>
      
          <fieldset class="form-group">
      
              <label for="city"><h5>Enter the name of a city</h5></label>
      
              <input type="text" class="form-control" name="city" id="city" placeholder="Eg. Dhaka, London" value= "<?php

                         if  (array_key_exists('city', $_GET)) 

                             {

                                echo $_GET['city'] ;
                              }
                                                                                    
                              ?>">

          </fieldset>

                                               
          <button type="submit" class="btn btn-primary">Submit</button>

             
   
       </form>


                                    
       <div id="weather">
     
           <?php
 
               if ($weather)

                   {

				      echo '<div class="alert alert-warning" role="alert"> '.$weather.' </div>' ;
                
                    }
                                                                              

  
                                                              
                else if ($error) 

                    {
  

                        echo '<div class="alert alert-danger" role="alert">'.$error.'</div>' ;
                                                                                 
                     }

            ?>


       </div>

   </div>
    







    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

  
</body>
      
</html>

