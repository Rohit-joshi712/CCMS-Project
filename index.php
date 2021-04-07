<html>
  <head>
      <title>Cricket Club Mangement</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="./css/style.css">
      <link rel="stylesheet" href="./bootstrap/bootstrap3.4.1.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body>

    
  <nav class="navbar navbar-inverse fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a style="font-size:25px; padding-left:90px;" id="nav" class="navbar-brand m-5" href="#nav">Cricket Club Management</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="active"><a href="">Home</a></li>
          <li><a href="#about">About</a></li>
          <li><a href="#gallary">Gallary</a></li>
          <li><a href="userlogin.php">Login</a></li>
        </ul>
      </div>
    </div>
  </nav>

    
    <br><br>

    <div class="container" id="mycontainer">
        <div id="myCarousel" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
          <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
          </ol>
      
          <!-- Wrapper for slides -->
          <div class="carousel-inner">
            <div class="item active">
              <img src="./images/banner_1.jpg" alt="Los Angeles" style="width:100%;">
            </div>
      
            <div class="item">
              <img src="./images/banner_2.jpg" alt="Chicago" style="width:100%;">
            </div>
          
            <div class="item">
              <img src="./images/banner_3.jpg" alt="New york" style="width:100%;">
            </div>
          </div>
      
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
      </div>
      
      <div class="container">
        <div class="row">
          <div id="about">
            <br><br>
            <h2 style="font-weight: bold; font-size: 40px;">About</h2>
            <br><br>
            <p class="lead">Cricket club management project is designed with the motive of managing a cricket club. This software system consists of various online booking and management functionaries needed by a cricket club.</p>
            <ul>
              <li>Efficient management and maintains the functioning on a cricket club</li>
              <li>Users may register for various cricket training batches through the website contact form</li>
            </ul>
          </div>
          <br><br>
          <div id="gallary">
            <h2 style="font-weight: bold; font-size: 40px;">Gallary</h2>
            <br>
              <div class="col-sm-6 col-lg-3 ">
                <img src="./images/1.jpg" alt="" height="250px" width="250px">
              </div>
              <div class="col-sm-6 col-lg-3 ">
                  <img src="./images/2.jpg" alt="" height="250px" width="250px">
              </div>
              <div class="col-sm-6 col-lg-3 ">
                  <img src="./images/3.jpg" alt="" height="250px" width="250px">
              </div>
              <div class="col-sm-6 col-lg-3 ">
                  <img src="./images/4.jpg" alt="" height="250px" width="250px">
              </div>
              <div class="col-sm-6 col-lg-3">
                  <img src="./images/5.jpg" alt="" height="250px" width="250px">
              </div>
              <div class="col-sm-6 col-lg-3">
                  <img src="./images/6.jpg" alt="" height="250px" width="250px">
              </div>
              <div class="col-sm-6 col-lg-3">
                  <img src="./images/7.jpg" alt="" height="250px" width="250px">
              </div>
              <div class="col-sm-6 col-lg-3">
                  <img src="./images/8.jpg" alt="" height="250px" width="250px">
              </div>
          </div>
        </div>
      </div>
      <br><br>
      <div id="footer">
        <div class="container-fluid">
          <div class="row">
            <div id="social" class="col-md-12">
              <ul class="list-unstyled list-inline " id="ull">
                <li><a href="https://en-gb.facebook.com/login/"><i class="fa fa-facebook-square"></i></a></li>
                <li><a href="https://www.instagram.com/accounts/login/?hl=en"><i class="fa fa-instagram"></i></a></li>
                <li><a href="https://twitter.com/login?lang=en-gb"><i class="fa fa-twitter-square"></i></a></li>
              </ul>
              <div id="copy" class="col-md-12">
                <p>@ comapany copyright</p>
              </div>
            </div>
          </div>
        </div>
      </div>
  </body>
</html>