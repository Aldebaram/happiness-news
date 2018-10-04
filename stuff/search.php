<!DOCTYPE html>
<?php
include 'dblogin.php';

session_start();
if(isset($_GET["search"]) && isset($_GET["page"])){
$page = $_GET["page"]; // gets the page number
$search = $_GET["search"]; // gets the page number

if($page==""){
  $page=0;
}
}else{
	$page = 0;
	$search="";
}
$index = $page * 3;  // update the idex to load the posts

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
   die("Connection failed: " . $conn->connect_error);
}

$getPosts = "SELECT DISTINCT id,t1.user_id,titulo,slug,descricao,keywords,conteudo,datahora,login,avatar FROM julio_noticias t1 INNER JOIN julio_users t2 ON t1.user_id = t2.user_id WHERE keywords LIKE '%".$search."%' GROUP BY id ORDER BY datahora DESC;
";
if ($resultado = $conn->query($getPosts)) {
      if ( $resultado->num_rows > 0 ) {
      $rows = $resultado->fetch_all(MYSQLI_ASSOC);

      if(isset($rows[0+$index]["id"])){
      $post_id[0+$index] = $rows[0+$index]["id"];
      $title[0+$index] = $rows[0+$index]["titulo"];
      $creator_id[0+$index] = $rows[0+$index]["user_id"];
      $slug[0+$index] = $rows[0+$index]["slug"];
      $descricao[0+$index] = $rows[0+$index]["descricao"];
      $keywords[0+$index] = $rows[0+$index]["keywords"];
      $conteudo[0+$index] = $rows[0+$index]["conteudo"];
      $datahora[0+$index] = $rows[0+$index]["datahora"];
      $creator_name[0+$index] = $rows[0+$index]["login"];
      $creator_avatar[0+$index] = $rows[0+$index]["avatar"];

      $card1 = '<div class="carousel-item">
        <div class="card card-home grey lighten-5 medium hoverable">
            <div class="card-content">
              <span class="card-title">'.$title[0+$index].'</span>
              <a>By: '.$creator_name[0+$index].'</a><a class="right">'.$datahora[0+$index].'</a>
            <p class="">'.$descricao[0+$index].'</p>
          </div>
          <div class="card-action">
            <a class="black-text" href="viewPost.php?post='.$post_id[0+$index].'">View Post</a>
          </div>
        </div>
      </div>';
      $finish = false;
}else{
  $card1 = '<div class="carousel-item">
    <div class="card card-home grey lighten-5 medium hoverable">
        <div class="card-content">
          <span class="card-title">No More Results</span>
          <a></a><a class="right"></a>
        <p class=""></p>
      </div>
    </div>
  </div>';


  $finish = true;
}

      if(isset($rows[1+$index]["id"])){
      $post_id[1+$index] = $rows[1+$index]["id"];
      $title[1+$index] = $rows[1+$index]["titulo"];
      $creator_id[1+$index] = $rows[1+$index]["user_id"];
      $slug[1+$index] = $rows[1+$index]["slug"];
      $descricao[1+$index] = $rows[1+$index]["descricao"];
      $keywords[1+$index] = $rows[1+$index]["keywords"];
      $conteudo[1+$index] = $rows[1+$index]["conteudo"];
      $datahora[1+$index] = $rows[1+$index]["datahora"];
      $creator_name[1+$index] = $rows[1+$index]["login"];
      $creator_avatar[1+$index] = $rows[1+$index]["avatar"];

      $card2 = '<div class="carousel-item">
        <div class="card card-home grey lighten-5 medium hoverable">
            <div class="card-content">
              <span class="card-title">'.$title[1+$index].'</span>
              <a>By: '.$creator_name[1+$index].'</a><a class="right">'.$datahora[1+$index].'</a>
            <p class="">'.$descricao[1+$index].'</p>
          </div>
          <div class="card-action">
            <a class="black-text" href="viewPost.php?post='.$post_id[1+$index].'">View Post</a>
          </div>
        </div>
      </div>';
}else{
  $card2 = '<div class="carousel-item hide">
    <div class="card card-home grey lighten-5 medium hoverable">
        <div class="card-content">
          <span class="card-title">No More Results</span>
          <a></a><a class="right"></a>
        <p class=""></p>
      </div>
    </div>
  </div>';


  $finish = true;
}
      if(isset($rows[2+$index]["id"])){
      $post_id[2+$index] = $rows[2+$index]["id"];
      $title[2+$index] = $rows[2+$index]["titulo"];
      $creator_id[2+$index] = $rows[2+$index]["user_id"];
      $slug[2+$index] = $rows[2+$index]["slug"];
      $descricao[2+$index] = $rows[2+$index]["descricao"];
      $keywords[2+$index] = $rows[2+$index]["keywords"];
      $conteudo[2+$index] = $rows[2+$index]["conteudo"];
      $datahora[2+$index] = $rows[2+$index]["datahora"];
      $creator_name[2+$index] = $rows[2+$index]["login"];
      $creator_avatar[2+$index] = $rows[2+$index]["avatar"];

      $card3 = '<div class="carousel-item">
        <div class="card card-home grey lighten-5 medium hoverable">
            <div class="card-content">
              <span class="card-title">'.$title[2+$index].'</span>
              <a>By: '.$creator_name[2+$index].'</a><a class="right">'.$datahora[2+$index].'</a>
            <p class="">'.$descricao[2+$index].'</p>
          </div>
          <div class="card-action">
            <a class="black-text" href="viewPost.php?post='.$post_id[2+$index].'">View Post</a>
          </div>
        </div>
      </div>';
      $finish = false;
}else{
  $card3 = '<div class="carousel-item hide">
    <div class="card card-home grey lighten-5 medium hoverable">
        <div class="card-content">
          <span class="card-title">No More Results</span>
          <a></a><a class="right"></a>
        <p class=""></p>
      </div>
    </div>
  </div>';


  $finish = true;
}
    }

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
      <a href="../index.php" class="brand-logo left">Happy News</a>
      <ul id="nav-mobile" class="right ">
        <li><a href="login.php">Login<i class="material-icons right">description</i></a></li>
        <li><a href="register.php">Register<i class="material-icons right">create</i></a></li>
      </ul>
    </div>
  </nav>
  <nav>
  <div class="nav-wrapper indigo lighten-1">
    <form action="search.php" method="GET">
      <div class="input-field">
        <input id="search" type="search" name="search" required>
        <label class="label-icon" for="search"><i class="material-icons">search</i></label>
    <input type="hidden" name="page" value="'.($page).'" />
        <i class="material-icons">close</i>
      </div>
    </form>
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
   </nav>
    <nav>
    <div class="nav-wrapper indigo lighten-1">
      <form action="search.php" method="GET">
        <div class="input-field">
          <input id="search" type="search" name="search" required>
          <label class="label-icon" for="search"><i class="material-icons">search</i></label>
		  <input type="hidden" name="page" value="'.($page).'" />
          <i class="material-icons">close</i>
        </div>
      </form>
    </div>
  </nav>
   ';



   if($_SESSION['login']==true){// check if user is logged
   echo $logbar; //shows the navbar if theres a user on session.
   }else{
    echo $unlogbar; //shows the bar is no user in session.
   }

?>



<!-- Page Body -->
<main>
  <br>

    <div class="container" >

      <div class="carousel">

        <?php
        // load the cards with the posts
        if(isset($card1)){
		echo $card1;
        }
		if(isset($card2)){
		echo $card2;
        }

		if(isset($card3)){
		echo $card3;
		}

        ?>


<br>
    </div>
<br>
  <div class="divider"></div>
<br>
    <ul class="pagination center">
<?php
if($page>0){
    echo '<li class="waves-effect"><a href="?search='.$search.'&page='.($page-1).'"><i class="material-icons">chevron_left</i></a></li>';
}
echo '<a class="black-text">Page '.$page.'</a>';
if($finish==false){
  echo  '<li class="waves-effect"><a href="?search='.$search.'&page='.($page+1).'"><i class="material-icons">chevron_right</i></a></li>';
}
?>
    </ul>
    </div>
    </div>
</main>




    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

    <!-- Compiled and minified JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>








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
