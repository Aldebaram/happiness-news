<?php
session_start();
if($_SESSION['login']==true){
header("location:../index.php");
echo "Logado";
}else{
 // keep the flow
}
//MySQL Database Connect include 'datalogin.php';
include 'datalogin.php';
//receive the register information.
$user = $_POST['user'];
$pass  = $_POST['password']; //as this is a project not intended for production I will not implement a hash to store de password
$avatar = $_FILES['img'];

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//Upload avatar to imgur Credits for : https://subinsb.com/uploading-images-using-imgur-api-in-php/
if(isset($_POST['submit'])){
 $img=$_FILES['img'];
 if($img['name']==''){
  echo "<h2>An Image Please.</h2>";
 }else{
  $filename = $img['tmp_name'];
  $client_id="eb37e43ad7062cf";//Your Client ID here
  $handle = fopen($filename, "r");
  $data = fread($handle, filesize($filename));
  $pvars   = array('image' => base64_encode($data));
  $timeout = 30;
  $curl    = curl_init();
  curl_setopt($curl, CURLOPT_URL, 'https://api.imgur.com/3/image.json');
  curl_setopt($curl, CURLOPT_TIMEOUT, $timeout);
  curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Client-ID ' . $client_id));
  curl_setopt($curl, CURLOPT_POST, 1);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
  curl_setopt($curl, CURLOPT_POSTFIELDS, $pvars);
  $out = curl_exec($curl);
  curl_close ($curl);
  $pms = json_decode($out,true);
  $url=$pms['data']['link'];
  if($url!=""){

    $insertUser = "INSERT INTO julio_users (login,password,avatar) VALUE ('$user','$pass','$url')";
    			if ($conn->query($insertUser) === TRUE) {

  $conn->close();

  $body = "<body>
  <main>
  <div class=\"row\">
    <div class=\"container s12\">
  <div class=\"card hoverable\">
    <div class=\"card-image\">
      <div style=\"overflow:hidden;\">
       <img src=\"https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX5338988.jpg\" style=\"margin:-30% 0px -20% 0px;\" />
      </div>
      <span class=\"card-title sombra\">Register</span>
    </div>
    <div class=\"card-content\">
    <img src=\"" . $url . "\" class=\"circle\" style=\"margin:height: 100px; width: 100px;\" />
    <div class=\"row\">
        <div class=\"input-field col s6\">
          <i class=\"material-icons prefix\">account_circle</i>
          <input id=\"user\" disabled type=\"text\" class=\"validate black-text\">
          <label for=\"user\" class=\"black-text\">" . $user . "</label>
        </div>
      </div>
      <a>User Registered Sucefully</a>
      <a href=\"../index.php\" class=\"waves-effect right waves-light btn\">Return to Home</a>
    </div>
   </div>
  </div>

    </div>
    </div>

  </main>
     </body>";
   }else{
     $body = "<body>
     <main>
     <div class=\"row\">
       <div class=\"container s12\">
     <div class=\"card hoverable\">
       <div class=\"card-image\">
         <div style=\"overflow:hidden;\">
          <img src=\"https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX5338988.jpg\" style=\"margin:-30% 0px -20% 0px;\" />
         </div>
         <span class=\"card-title sombra\">Register</span>
       </div>
       <div class=\"card-content\">
         <h3>Failed to Register User, Try again with another username</h3>
         <a onclick=\"goBack()\" class=\"waves-effect right waves-light btn\">Return</a>
         <br>
       </div>
      </div>
     </div>

       </div>
       </div>

     </main>
        </body>";

   }

  }else{
   $body = "<body>
   <main>
   <div class=\"row\">
     <div class=\"container s12\">
   <div class=\"card hoverable\">
     <div class=\"card-image\">
       <div style=\"overflow:hidden;\">
        <img src=\"https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX5338988.jpg\" style=\"margin:-30% 0px -20% 0px;\" />
       </div>
       <span class=\"card-title sombra\">Register</span>
     </div>
     <div class=\"card-content\">
       <h3>Failed to Register User, Try again</h3>
       <a href=\"../index.php\" onclick=\"goBack()\" class=\"waves-effect right waves-light btn\">Return</a>
     </div>
    </div>
   </div>

     </div>
     </div>

   </main>
      </body>";
  }
 }
}
?>

<!DOCTYPE html>
 <html>
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
           <li><a href="stuff/login.php">Login<i class="material-icons right">description</i></a></li>
           <li><a href="stuff/register.php">Register<i class="material-icons right">create</i></a></li>
         </ul>
       </div>
     </nav>';

     $logbar = '<!-- Materialize Navbar -->
     <nav class="callToFront">
        <div class="nav-wrapper indigo">
          <a href="../index.php" class="brand-logo">Happy News</a>
          <ul id="nav-mobile" class="right ">
            <li><a href="stuff/create.php">Create New!<i class="material-icons right">drafts</i></a></li>
            <li><a href="stuff/logout.php">Logout<i class="material-icons right">info_outline</i></a></li>
          </ul>
        </div>
      </nav>';



      if($_SESSION['login']==true){
      echo $logbar; //shows the navbar if theres a user on session.
      }else{
       echo $unlogbar; //shows the bar is no user in session.
      }

   ?>



<?php
// HTML Body
echo  $body;
?>



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
