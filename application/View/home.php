<!DOCTYPE html>
    <head>
        <html lang="en">
        <meta charset="utf-8">
        <title>Home</title>
        <link rel="stylesheet" href="../../public/css/home.css" />
    </head>

    <body>
        <div class="topnav">
            <input type="text" placeholder="Search..">
            <div class="dropdown">
                <button onclick="myFunction()" class="dropbtn">All Categories</button>
                <div id="myDropdown" class="dropdown-content">
                    <a>Phone</a>
                    <a>Television</a>
                </div>
            </div>
            <img class="search" src="../../public/images/search.png">
            <a href="admin/signInNregister.php"><img class="login" src="../../public/images/login.gif"></a>
        </div>
        <script>
        /* When the user clicks on the button, 
        toggle between hiding and showing the dropdown content */
            function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
            }

            // Close the dropdown if the user clicks outside of it
            window.onclick = function(event) {
                if (!event.target.matches('.dropbtn')) {
                    var dropdowns = document.getElementsByClassName("dropdown-content");
                    var i;
                    for (i = 0; i < dropdowns.length; i++) {
                        var openDropdown = dropdowns[i];
                        if (openDropdown.classList.contains('show')) {
                            openDropdown.classList.remove('show');
                        }
                    }
                }
            }
        </script>

<div class="slideshow-container">

<div class="mySlides fade">
  <img src="../../public/images/img.jpg" style="width:110%">
</div>

<div class="mySlides fade">
  <img src="../../public/images/img2.jpg" style="width:100%">
</div>

<div class="mySlides fade">
  <img src="../../public/images/img3.jpg" style="width:100%">
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>
<script>
var slideIndex = 0;
showSlides();

function showSlides() {
  var i;
  var slides = document.getElementsByClassName("mySlides");
  var dots = document.getElementsByClassName("dot");
  for (i = 0; i < slides.length; i++) {
    slides[i].style.display = "none";  
  }
  slideIndex++;
  if (slideIndex > slides.length) {slideIndex = 1}    
  for (i = 0; i < dots.length; i++) {
    dots[i].className = dots[i].className.replace(" active", "");
  }
  slides[slideIndex-1].style.display = "block";  
  dots[slideIndex-1].className += " active";
  setTimeout(showSlides, 5000); // Change image every 5 seconds
}
</script>
    </body>
</html>
