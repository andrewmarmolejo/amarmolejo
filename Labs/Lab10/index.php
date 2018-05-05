<?php

    include 'inc/header.php';

?>
    <div class='container'>
        <div class='text-center'>
        
        <!-- Add Carousel here -->
        <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100" src="img/samantha.jpg" width="200" alt="Samantha The Panda">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/sally.jpg" width="200" alt="Sally The Cat">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/ted.jpg" width="200" alt="Ted The Sloth">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/otter.jpg" width="200" alt="Olly The Otter">
                </div>
                <div class="carousel-item">
                    <img class="d-block w-100" src="img/tiger.jpg" width="200" alt="Tammy The Tiger">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
        <br>
        <a href="pets.php"  class="btn btn-outline-primary" role="button" aria-pressed="true"> Adopt Now! </a>
        <br>
        </div>
    </div>
<?php
    include 'inc/footer.php';
?>
</body>
</html>