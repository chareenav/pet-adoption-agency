<!doctype html>
<html>
<head>
 
   <meta name="robots" content="noindex,nofollow">
   <title>AJAX Pet Adoption Agency</title>
   <style>
       #myForm div{
        margin-bottom:2%;
        }
   </style>
   <script src="https://code.jquery.com/jquery-latest.js"></script>
   
</head>
<body>
<h2>AJAX Pet Adoption Agency</h2>
<p>Below is a starter page for the AJAX Pet Adoption Agency assignment.</p>
<div id="output">
<form id="myForm" action="" method="get">

   <div id="pet_feels">
       <h3>Feels</h3>
       <p>Please choose how you would like your pet to feel:</p>
       <input type="radio" name="feels" value="fluffy" required="required">fluffy <br />
       <input type="radio" name="feels" value="scaly">scaly <br />
   </div>
   <div id="pet_likes">
       <h3>Likes</h3>
       <p>Please tell us what your pet will like:</p>
       <input type="radio" name="likes" value="petted" required="required">to be petted <br />
       <input type="radio" name="likes" value="ridden">to be ridden <br />
   </div>
    <div id="pet_eats">
       <h3>Eats</h3>
       <p>Please tell us what your pet likes to eat:</p>
       <input type="radio" name="eats" value="carrots" required="required">carrots <br />
       <input type="radio" name="eats" value="pets">other people's pets <br />
   </div>
  
   <div><input type="submit" value="submit it!" /></div>
</form>
</div>
<p><a href="index.php">RESET</a></p>
<script>
    $("document").ready(function(){
        
        //hide likes and eats
        $("#pet_likes").hide();
        $("#pet_eats").hide();

      //show the like section on click of the feels radio button
      $("#pet_feels").click(function(e){
        $("#pet_likes").slideDown(200);
      });

      $("#pet_likes").click(function(e){
        $("#pet_eats").slideDown(200);
      });
      
    $('#myForm').submit(function(e){
    e.preventDefault();//no need to submit as you'll be doing AJAX on this page
            let feels = $("input[name=feels]:checked").val();//1-2
            let likes = $("input[name=likes]:checked").val();//3-4
            let eats = $("input[name=eats]:checked").val();//5-6

          let pet = "";
            if(feels=="fluffy" && likes=="petted" && eats=="carrots"){
              pet = "rabbit";
            }else if(feels=="scaly" && likes=="ridden" && eats=="pets"){
              pet = "velociraptor"
            }else{
              pet = "pig";
            }
  
            let output = "";

          $.get( "includes/get_pet.php", { critter: pet } )
           .done(function( data ) {
            //alert( "Data Loaded: " + data );
            pet = data;

          output += `<p>Your pet feels ${feels}</p>`;
          output += `<p>Your pet likes to be ${likes}</p>`;
          output += `<p>Your pet likes to eat ${eats}</p>`;
          output += pet;

          //replace form with our data
          $("#output").html(output);            

           });

        });

    });

   </script>
</body>
</html>
