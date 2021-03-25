
<!DOCTYPE html>
<html lang="en">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.1/css/bulma.min.css">
    <link rel="stylesheet" href="css/main.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <style>
  /* Make the image fully responsive */
  .carousel-inner img {
    margin: auto;
    width: 100%;
    height: 60%;
    position: relative;
  }
  </style>
    <script defer src="https://use.fontawesome.com/releases/v5.9.0/js/all.js"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.9.0/js/v4-shims.js"></script>
   
</head>
<body>
    <?php 
        require_once('includes/header.php');
    ?>
    <div class="columns" ><h1 style="padding:1%;margin:auto;">BIENVENUE A </h1></div>
    <div class="columns"><h1 style="padding:1%;margin:auto;">Pépinière El Baraka</h1></div>
    <div id="demo" class="carousel slide" data-ride="carousel">

  <!-- Indicators -->
  <ul class="carousel-indicators">
    <li data-target="#demo" data-slide-to="0" class="active"></li>
    <li data-target="#demo" data-slide-to="1"></li>
    <li data-target="#demo" data-slide-to="2"></li>
  </ul>
  
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://th.bing.com/th/id/OIP.0l5OCN9X8E_m8VmlMLOqigHaEK?w=323&h=182&c=7&o=5&pid=1.7" alt="Los Angeles" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="https://th.bing.com/th/id/OIP.0l5OCN9X8E_m8VmlMLOqigHaEK?w=323&h=182&c=7&o=5&pid=1.7" alt="Chicago" width="1100" height="500">
    </div>
    <div class="carousel-item">
      <img src="https://th.bing.com/th/id/OIP.0l5OCN9X8E_m8VmlMLOqigHaEK?w=323&h=182&c=7&o=5&pid=1.7" alt="New York" width="1100" height="500">
    </div>
  </div>
  
  <!-- Left and right controls -->
  <a class="carousel-control-prev" href="#demo" data-slide="prev">
    <span class="carousel-control-prev-icon"></span>
  </a>
  <a class="carousel-control-next" href="#demo" data-slide="next">
    <span class="carousel-control-next-icon"></span>
  </a>
</div>
    <!-- Slideshow container -->
<!-- div class="slideshow-container">

<Full-width images with number and caption text -->
<!--div class="mySlides fade">
          <div class="numbertext">1 / 5</div>
          <img src="img/backgrnd.jpg" style="width:100%">
          <div class="text">Notre passion :  <strong>le jardin d'inspiration</strong>.</div>
        </!--div>
        
        <div class="mySlides fade">
          <div class="numbertext">2 / 5</div>
          <img src="img/backgrnd.jpg" style="width:100%">
          <div class="text"> Une exigence de qualité</div>
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">3 / 5</div>
          <img src="img/backgrnd.jpg" style="width:100%">
          <div class="text">Un assortiment raffiné et original </div>
        </div>
        <div class="mySlides fade">
            <div class="numbertext">4 / 5</div>
            <img src="img/backgrnd.jpg" style="width:100%">
            <div class="text">Une recherche constante de variétés nouvelles </div>
          </div>
          <div class="mySlides fade">
            <div class="numbertext">5/ 5</div>
            <img src="img/backgrnd.jpg" style="width:100%">
            <div class="text"> Plus de quarante ans d'expérience</div>
          </div>

<!-- Next and previous buttons -->
<!--a class="prev" onclick="plusSlides(-1)">&#10094;</!--a>
<a class="next" onclick="plusSlides(1)">&#10095;</a>
</div>
<br>

<!-- The dots/circles -->
<!--div-- style="text-align:center">
<span class="dot" onclick="currentSlide(1)"></span>
<span class="dot" onclick="currentSlide(2)"></span>
<span class="dot" onclick="currentSlide(3)"></span>
</!--div-->
<script src="js/main.js"></script>
    <?php
        require_once('includes/footer.php');
    ?>
</body>
</html>