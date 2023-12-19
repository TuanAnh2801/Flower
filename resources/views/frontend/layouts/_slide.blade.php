

<div class="slideshow-container">

<div class="mySlides fade">

  <img src="{{ asset('frontend/img/slide/img9.png') }}" style="width:100%">
  <div class="text">Flower-No78</div>
</div>

<div class="mySlides fade">

  <img src="{{ asset('frontend/img/slide/img10.jpg') }}" style="width:98%">
  <div class="text">Flower-No78</div>
</div>

<div class="mySlides fade">
  
  <img src="{{ asset('frontend/img/slide/img8.jpg') }}" style="width:106%">
  <div class="text">Flower-No78</div>
</div>

</div>
<br>

<div style="text-align:center">
  <span class="dot"></span> 
  <span class="dot"></span> 
  <span class="dot"></span> 
</div>

<script>
let slideIndex = 0;
showSlides();

function showSlides() {
  let i;
  let slides = document.getElementsByClassName("mySlides");
  let dots = document.getElementsByClassName("dot");
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
  setTimeout(showSlides, 2000); // Change image every 2 seconds
}
</script>

</body>
</html> 
