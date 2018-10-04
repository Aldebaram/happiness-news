<!DOCTYPE html>
<?php
session_start();
if(isset($_SESSION['login'])){
if($_SESSION['login']==true){// check if user is logged
//keep the flow
}else{
header("location:../index.php");//redirect to home is login is false
}
}else{
header("location:../index.php");//redirect to home if theres no login in session
}
include 'dblogin.php';

// get the information from POST
// get the information from POST
$title = $_POST['title'];
$slug  = $_POST['slug'];
$desc = $_POST['desc'];
$tags  = $_POST['tags'];
$content = $_POST['content'];
if(isset($_POST["post"])){
$post_id = $_POST["post"];
}else {
  header("location:../index.php"); //redirect to home if no post id is found
}
//get the information from Session
if(isset($_SESSION['user_id'])){
  $user_id = $_SESSION['user_id'];
}else {
  $user_id="";
}

if(isset($_SESSION['avatar'])){
  $avatar = $_SESSION['avatar'];
}

if(isset($_SESSION['user'])){
  $user = $_SESSION['user'];
}

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//get post information
$getPost = "SELECT t1.user_id,titulo,slug,descricao,keywords,conteudo,datahora,login,avatar FROM julio_noticias t1 INNER JOIN julio_users t2 ON t1.user_id = t2.user_id WHERE id='$post_id';";
      if ($resultado = $conn->query($getPost)) {
      $row = $resultado->fetch_assoc();
      $creator_id = $row["user_id"];
// Update Post
if(isset($user_id)){
  if($user_id == $creator_id){
$editPost = "UPDATE julio_noticias SET user_id='$user_id' ,titulo='$title' ,slug='$slug' ,descricao='$desc' ,keywords='$tags',conteudo='$content' WHERE id = ".$post_id.";";
      if ($conn->query($editPost) === TRUE){
      $inserted = true;
      $body = '<!-- Page Body -->
      <body>

      <main>

      <div class="row">
        <div class="container s12" >


      <div class="card hoverable">
        <div class="card-image">
          <div style="overflow:hidden;">
           <img src="https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX5338988.jpg" style="margin:-30% 0px -20% 0px;" />
          </div>
          <span class="card-title sombra">Post Edited!.</span>
        </div>
        <div class="card-content">
        <div class="row">
         <h4>'.$title.' Edited</h4>
         <a href="viewPost.php?post='.$post_id.'" class="waves-effect waves-light btn">Go to Post</a>
        </div>
       </div>
       <div id="second">
       </div>
      </div>
     </div>
    </div>
  </main>
</body>
';
}else{
  $inserted = false;
  echo "failed to update";
}
}else{
  $inserted = false;
  echo "not the creator";
}
}else{
  $inserted = false;
  echo "user id not set";
}
}else{
  $inserted = false;
  echo "failed to find post";
}
  $conn->close();
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
 $unlogbar = '<!-- Materialize Navbar -->
 <nav class="callToFront">
    <div class="nav-wrapper indigo">
      <a href="../index.php" class="brand-logo">Happy News</a>
      <ul id="nav-mobile" class="right ">
        <li><a href="login.php">Login<i class="material-icons right">description</i></a></li>
        <li><a href="register.php">Register<i class="material-icons right">create</i></a></li>
      </ul>
    </div>
  </nav>';

  $logbar = '<!-- Materialize Navbar -->
  <nav class="callToFront">
     <div class="nav-wrapper indigo">
       <a href="../index.php" class="brand-logo">Happy News</a>
       <ul id="nav-mobile" class="right ">
         <li><a href="create.php">Create New!<i class="material-icons right">drafts</i></a></li>
         <li><a href="logout.php">Logout<i class="material-icons right">info_outline</i></a></li>
       </ul>
     </div>
   </nav>';



   if($_SESSION['login']==true){
   echo $logbar; //shows the navbar for user on session.
   }else{
    echo $unlogbar; //shows the navbar for no user in session.
   }

?>


<?php
echo $body;
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
