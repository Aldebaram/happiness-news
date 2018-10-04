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


<?php
include 'dblogin.php'; // DB login info

$user = $_POST['user'];
$pass  = $_POST['password'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

$getUser = "SELECT user_id,login,avatar  FROM julio_users WHERE login='$user' AND password='$pass';";
      if ($resultado = $conn->query($getUser)) {
      $row = $resultado->fetch_assoc();
      $avatar = $row["avatar"];
      $id = $row["user_id"];
      if($id==""){
      unset($_SESSION['user_id']);
      unset($_SESSION['user']);
      unset($_SESSION['avatar']);
      unset($_SESSION['login']);
      $failed = true;
    }
    else{
      $_SESSION['user_id'] = $id;
      $_SESSION['avatar'] = $avatar;
      $_SESSION['user'] = $user;
      $_SESSION['login'] = true;
      $failed = false;
    }
    //SQL ERROR CONDITION
  }

  $conn->close();
?>
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



   if($_SESSION['login']==true){
   echo $logbar; //shows the navbar if theres a user on session.
   }else{
    echo $unlogbar; //shows the bar is no user in session.
   }

?>

<!-- Page Body -->
<?php
if($failed==FALSE){
echo "
<body>

  <main>
  <br>

  <div class=\"row\">
    <div class=\"container s12\" >
    <div class=\"card hoverable\">
    <div class=\"card-content\">
    <span class=\"card-title\">Login Successful!</span>
    <div class=\"row\">
    <img src=\"$avatar\" class=\"circle\" style=\"height: 100px; width: 100px;\" />
    <h4>$user</h4>
</a>

    </div>
    <div id=\"second\">
    </div>
   </div>
  </div>
    </div>
    </div>
  </main>
     </body>";
   }else{
     echo "
     <body>

       <main>
       <br>

       <div class=\"row\">
         <div class=\"container s12\" >
         <div class=\"card hoverable\">
         <div class=\"card-content\">
         <span class=\"card-title\">Login Failed!</span>
         <div class=\"row\">

         <h4>User or password are wrong!</h4>
     </a>

         </div>
         <div id=\"second\">
         </div>
        </div>
       </div>
         </div>
         </div>
       </main>
          </body>";



     }
     ?>

<!-- Page Footer -->
<footer class="page-footer indigo callToFront">
             <div class="container">
               <div class="row">
                 <div class="col l6 s12">
                   <h5 class="white-text">Footer Content</h5>
                   <p class="grey-text text-lighten-4">Placeholder.</p>
                 </div>
                 <div class="col l4 offset-l2 s12">
                   <h5 class="white-text">Links</h5>
                   <ul>
                     <li><a class="grey-text text-lighten-3" href="#!">Link 1</a></li>
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
