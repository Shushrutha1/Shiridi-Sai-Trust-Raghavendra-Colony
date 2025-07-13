<?php
include("config.php");
include("header.php");
?>

<!-- Lightbox2 and Bootstrap CSS -->
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css" rel="stylesheet">

<style>
    .gallery-title {
        margin-top: 100px;
    }

    .card-img-top {
        transition: transform 0.3s ease;
    }

    .card:hover .card-img-top {
        transform: scale(1.05);
    }
</style>

<div class="container text-center gallery-title">
<p><strong><h2>SHIRIDI SAI TRUST RAGHAVENDRA COLONY WELFARE SOCIETY<h2></strong>
<h4>Sri Raghavendra Colony, Nalgonda, Telangana - 508001</h4>
</p>
    <h2>GALLERY</h2>
    <hr>
</div>

<div class="container my-4">
    <div class="row">
        <?php
        // Images must be in /assets/img/
        $images = [
            "download.jpg",
			"images.jpeg",
           	"download5.jpeg",
			"download.jpg",
            "download1.jpeg",            
            "download6.jpeg",
			"download2.jpeg"

        ];

        foreach ($images as $index => $img) {
            $imgPath = "assets/img/" . $img;
            echo '
            <div class="col-lg-3 col-md-4 col-sm-6 mb-4">
                <a href="' . $imgPath . '" data-lightbox="sai-gallery" data-title="Image ' . ($index + 1) . '">
                    <div class="card shadow-sm">
                        <img src="' . $imgPath . '" class="card-img-top img-fluid" alt="Sai Image ' . ($index + 1) . '">
                    </div>
                </a>
            </div>';
        }
        ?>
    </div>
</div>

<!-- Lightbox2 JS -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

<?php include("footer.php"); ?>
