<?php

//HTML Head
echo "<!DOCTYPE html>
 <html>
   <head>
     <!--Import Google Icon Font-->
     <link href=\"https://fonts.googleapis.com/icon?family=Material+Icons\" rel=\"stylesheet\">
     <!--Import materialize.css-->
     <link type=\"text/css\" rel=\"stylesheet\" href=\"../css/materialize.min.css\"  media=\"screen,projection\"/>
     <!--Import custom.css-->
     <link type=\"text/css\" rel=\"stylesheet\" href=\"../css/custom.css\"  media=\"screen,projection\"/>


     <!--Let browser know website is optimized for mobile-->
     <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\"/>
   </head>";

//Materialize Navbar
echo "  <nav class=\"callToFront\">
    <div class=\"nav-wrapper indigo\">
      <a href=\"../index.php\" class=\"brand-logo\">Happy News</a>
      <ul id=\"nav-mobile\" class=\"right \">
        <li><a href=\"login.php\">Login<i class=\"material-icons right\">description</i></a></li>
      </ul>
    </div>
  </nav>";




// HTML Body
echo  "<body>

<main>

<div class=\"row\">
  <div class=\"container s12\">


<div class=\"card\">
  <div class=\"card-image\">
    <div style=\"overflow:hidden;\">
     <img src=\"https://d2gg9evh47fn9z.cloudfront.net/800px_COLOURBOX5338988.jpg\" style=\"margin:-30% 0px -20% 0px;\" />
    </div>
    <span class=\"card-title sombra\">Register</span>
  </div>
  <div class=\"card-content\">
  <img src=\"http://www.stickpng.com/assets/images/585e4bf3cb11b227491c339a.png\" class=\"cirlce\" style=\"margin:height: 100px; width: 100px;\" />
  <div class=\"row\">
  <form class=\"col s12\">
  <div class=\"file-field input-field\">
      <div class=\"btn\">
        <span>User Image</span>
        <input type=\"file\">
      </div>
      <div class=\"file-path-wrapper\">
        <input class=\"file-path validate\" type=\"text\">
      </div>
    </div>
    <div class=\"row\">
      <div class=\"input-field col s6\">
        <i class=\"material-icons prefix\">account_circle</i>
        <input id=\"icon_prefix\" type=\"text\" class=\"validate black-text\">
        <label for=\"icon_prefix\">User Name</label>
      </div>
      <div class=\"input-field col s6\">
        <i class=\"material-icons prefix\">https</i>
        <input id=\"icon_telephone\" type=\"password\" class=\"validate black-text\">
        <label for=\"icon_telephone\">Password</label>
      </div>
    </div>
  </form>
</div>
  </div>
  <div class=\"card-action\">
    <a href=\"#\">This is a link</a>
  </div>
</div>





  </div>
  </div>

</main>
   </body>";




  echo "<footer class=\"page-footer indigo callToFront\">
          <div class=\"container\">
            <div class=\"row\">
              <div class=\"col l6 s12\">
                <h5 class=\"white-text\">Footer Content</h5>
                <p class=\"grey-text text-lighten-4\">Placeholder.</p>
              </div>
              <div class=\"col l4 offset-l2 s12\">
                <h5 class=\"white-text\">Links</h5>
                <ul>
                  <li><a class=\"grey-text text-lighten-3\" href=\"#!\">Link 1</a></li>
                </ul>
              </div>
            </div>
          </div>
        </footer>
        <!-- Load materialize javascript-->
        <script type=\"text/javascript\" src=\"../js/materialize.min.js\"></script>
 </html>";
?>
