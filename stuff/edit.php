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
          <div class="card hoverable">
            <div class="card-image">
              <div style="overflow:hidden;">
               <img src="https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX5338988.jpg" style="margin:-30% 0px -20% 0px;" />
              </div>
              <span class="card-title sombra">Edit '.$title.'.</span>
            </div>
            <div class="card-content">
            <div class="row">
            <form id="form" class="col s12" action="editPost.php" enctype="multipart/form-data" method="POST" >
            <input type="hidden" name="post" value="'.($post_id).'" />
              <div class="row">
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">account_circle</i>
                  <input id="title" name="title" type="text" class="validate black-text" data-length="40" value="'.$title.'">
                  <label for="title">Title</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">assignment</i>
                  <input id="slug" name="slug" type="text" class="validate black-text" data-length="200" value="'.$slug.'">
                  <label for="slug">Slug</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">comment</i>
                  <input id="desc" name="desc" type="text" class="validate black-text" data-length="800" value="'.$descricao.'">
                  <label for="desc">Description</label>
                </div>
                <div class="input-field col s12 m6">
                  <i class="material-icons prefix">bookmark_border</i>
                  <input id="tags" name="tags" type="text" class="validate black-text" data-length="50" value="'.$keywords.'">
                  <label for="tags">Tags</label>
                </div>
                <div class="input-field col s12">
                      <textarea id="content" name="content" class="materialize-textarea" data-length="2500">'.$conteudo.'</textarea>
                      <label for="content">Content</label>
                </div>
              </div>
              <div onclick="loading()">
              <button  value="Upload" class="btn waves-effect waves-light" type="submit" name="submit">Edit
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
             </body>';

        }else{
          echo "Not the creator of this post";
        }
      }else{
        echo "user id not set";
    }
  }else{
    echo "failed to get post";
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



   if($_SESSION['login']==true){
   echo $logbar; //shows the navbar if theres a user on session.
   }else{
    echo $unlogbar; //shows the bar is no user in session.
   }



  echo $body;
?>





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
