<!DOCTYPE html>
<?php
session_start();
include 'dblogin.php';

// get the information from GET
if(isset($_GET["post"])){
$post_id = $_GET["post"];
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
      $title = $row["titulo"];
      $creator_id = $row["user_id"];
      $slug = $row["slug"];
      $descricao = $row["descricao"];
      $keywords = $row["keywords"];
      $conteudo = $row["conteudo"];
      $datahora = $row["datahora"];
      $creator_name = $row["login"];
      $creator_avatar = $row["avatar"];
      if(isset($user_id)){
        if($user_id == $creator_id){
      $body = '<!-- Page Body -->
      <body>

      <main>

      <div class="row">
        <div class="container s12" >
        <br>
        <a href="edit.php?post='.$post_id.'" class="waves-effect indigo darken-1 waves-light btn"><i class="material-icons left">create</i>Edit</a>
        <a>     </a>
        <a href="delete.php?post='.$post_id.'" class="waves-effect red waves-light btn"><i class="material-icons left">delete</i>Delete</a>
        <br>
      <div class="card hoverable wrapper">
        <div class="card-content">
        <span class="card-title">Post.</span>
        <img src="'.$creator_avatar.'" class="circle right" style="height: 100px; width: 100px;" />
        <h4>By: '.$creator_name.'</h4>
        <div class="row">
         <h3>'.$title.'</h3>
         <br>
         <div class="card blue-grey">
                 <div class="card-content white-text">
                   <span class="card-title">'.$slug.'</span>
                   <p>'.$descricao.'.</p>
                 </div>
            </div>
          <br>
         <a class="black-text">Content: '.$conteudo.'</a>
         <div class="bottom">
         <br>
           <br>
           <a class="black-text">Tags: '.$keywords.'</a>
           <br>
           <a>Created at '.$datahora.'</a>
           <br>
          </div>
        </div>
       </div>
      </div>
     </div>
    </div>
  </main>
</body>
';
}else{
  $body = '<!-- Page Body -->
  <body>

  <main>

  <div class="row">
    <div class="container s12" >
  <div class="card hoverable wrapper">
    <div class="card-content">
    <span class="card-title">Post.</span>
    <img src="'.$creator_avatar.'" class="circle right" style="height: 100px; width: 100px;" />
    <h4>By: '.$creator_name.'</h4>
    <div class="row">
     <h3>'.$title.'</h3>
     <br>
     <div class="card blue-grey">
             <div class="card-content white-text">
               <span class="card-title">'.$slug.'</span>
               <p>'.$descricao.'.</p>
             </div>
        </div>
      <br>
     <a class="black-text">Content: '.$conteudo.'</a>
     <div class="bottom">
     <br>
       <br>
       <a class="black-text">Tags: '.$keywords.'</a>
       <br>
       <a>Created at '.$datahora.'</a>
       <br>
      </div>
    </div>
   </div>
  </div>
  </div>
  </div>
  </main>
  </body>
  ';
}}
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
