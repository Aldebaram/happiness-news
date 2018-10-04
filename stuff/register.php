<!DOCTYPE html>
<?php
session_start();

if(isset($_SESSION['login'])){
if($_SESSION['login']==true){// check if user is logged
header("location:../index.php");
}else{
 // keep the flow
}
}
?>
 <html>
 <!-- Page Header -->
   <head>
     <!--Import Google Icon Font-->
     <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
     <!--Import materialize.css-->
     <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"  media="screen,projection"/>
     <!--Import custom.css-->
     <link type="text/css" rel="stylesheet" href="../css/custom.css"  media="screen,projection"/>


     <!--Let browser know website is optimized for mobile-->
     <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
   </head>

<?php ?>
<?php
 $unlogbar = '<!-- Materialize Navbar -->
 <nav class="callToFront">
    <div class="nav-wrapper indigo">
      <a href="../index.php" class="brand-logo left">Happy News</a>
      <ul id="nav-mobile" class="right ">
        <li><a href="login.php">Login<i class="material-icons right">description</i></a></li>
        <li><a href="register.php">Register<i class="material-icons right">create</i></a></li>
      </ul>
    </div>
  </nav>';

  $logbar = '<!-- Materialize Navbar -->
  <nav class="callToFront">
     <div class="nav-wrapper indigo">
       <a href="../index.php" class="brand-logo left">Happy News</a>
       <ul id="nav-mobile" class="right ">
         <li><a href="create.php">Create New!<i class="material-icons right">drafts</i></a></li>
         <li><a href="logout.php">Logout<i class="material-icons right">info_outline</i></a></li>
       </ul>
     </div>
   </nav>';



 if(isset($_SESSION['login'])){
   if($_SESSION['login']==true){// check if user is logged
   echo $logbar; //shows the navbar if theres a user on session.
   }else{
    echo $unlogbar; //shows the bar is no user in session.
   }
   }else{
	   echo $unlogbar; //shows the bar is no user in session.
   }

?>



<!-- Page Body -->
<body>

<main>

<div class="row">
  <div class="container s12" >
<br>
<br>

<div class="card hoverable">
  <div class="card-image">
    <div style="overflow:hidden;">
     <img src="https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX5338988.jpg" style="margin:-30% 0px -20% 0px;" />
    </div>
    <span class="card-title sombra">Register</span>
  </div>
  <div class="card-content">
  <div class="row">
  <form id="form" class="col s12" action="registerDB.php" enctype="multipart/form-data" method="POST" >
  <a class="black-text">Avatar: </a><input name="img" size="35" type="file" class="" /><br/>
    <div class="row">
      <div class="input-field col s6">
        <i class="material-icons prefix">account_circle</i>
        <input id="user" name="user" type="text" class="validate black-text">
        <label for="user">User Name</label>
      </div>
      <div class="input-field col s6">
        <i class="material-icons prefix">https</i>
        <input id="password" name="password" type="password" class="validate black-text">
        <label for="password">Password</label>
      </div>
    </div>
    <div onclick="loading()">
    <button  value="Upload" class="btn waves-effect waves-light" type="submit" name="submit">Register
      <i class="material-icons right">send</i>
      </div>
    </button>
   </form>
  </div>
 </div>
 <div id="second">
 </div>
</div>
  </div>
  </div>
</main>
   </body>



   <!-- Page Footer -->
   <footer class="page-footer indigo callToFront">
                <div class="container">
                  <div class="row">
                    <div class="col l6 s12">
                      <h5 class="white-text">Happy News!</h5>
                      <p class="grey-text text-lighten-4">You can read more about this website </p><a href="https://github.com/Aldebaram/happiness-news" class="white-text underline" >Here</a>
                    </div>
                    <div class="col l4 offset-l2 s12">
                      <h5 class="white-text">My Github</h5>
                      <ul>
                        <li><a class="grey-text text-lighten-3" href="https://github.com/Aldebaram">Aldebaram</a></li>
                      </ul>
                    </div>
                  </div>
                </div>
   </footer>
   <!-- Load materialize javascript-->
   <script type="text/javascript" src="../js/materialize.min.js"></script>
   <!-- Load myjavascript-->
   <script type="text/javascript" src="../js/script.js"></script>
</html>
