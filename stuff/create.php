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

?>



<!-- Page Body -->
<body>

<main>

<div class="row">
  <div class="container s12" >


<div class="card hoverable">
  <div class="card-image">
    <div style="overflow:hidden;">
     <img src="https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX5338988.jpg" style="margin:-30% 0px -20% 0px;" />
    </div>
    <span class="card-title sombra">Create New Post.</span>
  </div>
  <div class="card-content">
  <div class="row">
  <form id="form" class="col s12" action="createPost.php" enctype="multipart/form-data" method="POST" >
    <div class="row">
      <div class="input-field col s12 m6">
        <i class="material-icons prefix">account_circle</i>
        <input id="title" name="title" type="text" class="validate black-text" data-length="40">
        <label for="title">Title</label>
      </div>
      <div class="input-field col s12 m6">
        <i class="material-icons prefix">assignment</i>
        <input id="slug" name="slug" type="text" class="validate black-text" data-length="200">
        <label for="slug">Slug</label>
      </div>
      <div class="input-field col s12 m6">
        <i class="material-icons prefix">comment</i>
        <input id="desc" name="desc" type="text" class="validate black-text" data-length="800">
        <label for="desc">Description</label>
      </div>
      <div class="input-field col s12 m6">
        <i class="material-icons prefix">bookmark_border</i>
        <input id="tags" name="tags" type="text" class="validate black-text" data-length="50">
        <label for="tags">Tags</label>
      </div>
      <div class="input-field col s12">
            <textarea id="content" name="content" class="materialize-textarea" data-length="2500"></textarea>
            <label for="content">Content</label>
      </div>
    </div>
    <div onclick="loading()">
    <button  value="Upload" class="btn waves-effect waves-light" type="submit" name="submit">Create
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
