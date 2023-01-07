<div class="row mb footer" style="background-color: rgb(255, 215, 222);">
            Copyright © 2022   🐳 TTY ☀️ Tăng Tấn Y 🐳
        </div>
    </div>
<!-- js cho slideshow -->
<script>
    var slideIndex = 0;
    showSlides();

    function showSlides() {
    var i;
    var slides = document.getElementsByClassName("mySlides");
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";
    }
    slideIndex++;
    if (slideIndex > slides.length) {slideIndex = 1}
    slides[slideIndex-1].style.display = "block";
    setTimeout(showSlides, 2000); // Change image every 2 seconds
    }
</script>

</body>

</html>