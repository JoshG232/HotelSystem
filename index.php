
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Website</title>
    <script src="./app.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body onLoad="showSlides(1)">


    <header>
      <?php include 'headerNav.php';?>
      <?php include 'header.html';?>
    </header>
    
    
    
    <h1>Slide show of images</h1>
    <div class="slideshow-container">

        <div class="mySlides fade">
          <div class="numbertext">1 / 4</div>
          <img src="./Images/img1.jpg" style="width:100%">
          <div class="text">Caption Text</div>
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">2 / 4</div>
          <img src="./Images/img2.jpg" style="width:100%">
          <div class="text">Caption Two</div>
        </div>
        
        <div class="mySlides fade">
          <div class="numbertext">3 / 4</div>
          <img src="./Images/img3.jpg" style="width:100%">
          <div class="text">Caption Three</div>
        </div>
        
        <div class="mySlides fade">
            <div class="numbertext">4 / 4</div>
            <img src="./Images/img4.jpg" style="width:100%">
            <div class="text">Caption Four</div>
          </div>
        
        <a class="prev" onclick="plusSlides(-1)">❮</a>
        <a class="next" onclick="plusSlides(1)">❯</a>
        <a class="random" onclick="randomSlide()">Random</a>
        </div>
        
        <br>
        


        <footer>
          <?php include 'footer.html' ?>
        </footer>
        
        

</body>
</html>

