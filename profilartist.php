<?php 
session_start();

$logged = false;

if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
    $logged = true;
    $user_id = $_SESSION['user_id'];
}

$artists = [

    [
        "name" => "Marcu Maria",
        "role" => "Artist Webtoon & Illustrator",
        "profile" => "img/maria.jpg",

        "bio" => "Pasionată de webtoon, manga și storytelling vizual, Maria creează lucrări inspirate din cultura românească și universurile anime moderne.",

        "instagram" => "https://instagram.com/",
        "discord" => "https://discord.com/",
        "email" => "mailto:maria@gmail.com",

        "works" => [

            [
                "title" => "Webtoon – Mihai Eminescu",
                "image" => "img/webtoon1-marcu-m.png",
                "description" => "Introducere "
            ],
            [
                "title" => "Webtoon – Mihai Eminescu",
                "image" => "img/webtoon2-marcu-m.png",
                "description" => "Webtoon artistic inspirat din viața și opera lui Mihai Eminescu."
            ],

            [
                "title" => "Webtoon – Ciprian Porumbescu",
                "image" => "img/webtoon3-marcu-m.png",
                "description" => "Poveste ilustrată despre compozitorul Ciprian Porumbescu."
            ],

            [
                "title" => "Bandă Desenată CNU",
                "image" => "img/webtoon4-marcu-m.png",
                "description" => "Comic original inspirat din atmosfera Colegiului Național Unirea."
            ],
            [
                "title" => "Desene din vara anului trecut 1",
                "image" => "img/webtoon5-marcu-m.png",
                "description" => "Desene inspirate de orașul Focșani."
            ],
            [
                "title" => "Desene din vara anului trecut 2",
                "image" => "img/webtoon6-marcu-m.png",
                "description" => "Desene inspirate de orașul Focșani."
            ]
        ]
    ],



    [
        "name" => "Andrei Popescu",
        "role" => "Concept Artist",
        "profile" => "img/andrei.jpg",

        "bio" => "Andrei realizează personaje originale și ilustrații fantasy pentru proiectele WebToonCNU.",

        "instagram" => "https://instagram.com/",
        "discord" => "https://discord.com/",
        "email" => "mailto:andrei@gmail.com",

        "works" => [

            [
                "title" => "Fantasy Character",
                "image" => "img/fantasy.jpg",
                "description" => "Concept fantasy pentru un personaj original."
            ],

            [
                "title" => "Cyberpunk City",
                "image" => "img/cyberpunk.jpg",
                "description" => "Ilustrație digitală într-un stil futuristic."
            ]
        ]
    ]

];
?>

<!DOCTYPE html>
<html lang="ro">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Profiluri Artiști | WebToonCNU</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <link rel="stylesheet" href="css/style.css">

    <style>

        body{
            background: #0f172a;
            color: white;
            font-family: 'Segoe UI', sans-serif;
        }

        .hero{
            padding: 80px 20px 50px;
            text-align: center;
        }

        .hero h1{
            font-size: 3.5rem;
            font-weight: 800;
        }

        .hero p{
            color: #cbd5e1;
            max-width: 700px;
            margin: auto;
            margin-top: 15px;
        }

        .artist-card{
            background: #1e293b;
            border-radius: 28px;
            padding: 35px;
            margin-bottom: 40px;
            border: 1px solid rgba(255,255,255,0.08);
            transition: 0.3s;
        }

        .artist-card:hover{
            transform: translateY(-5px);
            box-shadow: 0 20px 40px rgba(0,0,0,0.35);
        }

        .profile-img{
            width: 130px;
            height: 130px;
            object-fit: cover;
            border-radius: 50%;
            border: 4px solid #c0392b;
        }

        .artist-name{
            font-size: 2rem;
            font-weight: 700;
            margin-top: 10px;
        }

        .artist-role{
            color: #94a3b8;
            margin-bottom: 15px;
        }

        .artist-bio{
            color: #dbe4ee;
            line-height: 1.8;
        }

        .social-links a{
            color: white;
            font-size: 1.2rem;
            margin-right: 18px;
            transition: 0.2s;
        }

        .social-links a:hover{
            color: #c0392b;
        }

        .btn-gallery{
            background: #c0392b;
            border: none;
            color: white;
            padding: 13px 24px;
            border-radius: 14px;
            font-weight: 600;
            transition: 0.3s;
        }

        .btn-gallery:hover{
            background: #962d22;
        }

        .gallery{
            display: none;
            margin-top: 35px;
        }

        .work-card{
            background: #0f172a;
            border-radius: 20px;
            overflow: hidden;
            border: 1px solid rgba(255,255,255,0.06);
            height: 100%;
            transition: 0.3s;
        }

        .work-card:hover{
            transform: scale(1.02);
        }

        .work-card img{
            width: 100%;
            height: 260px;
            object-fit: cover;
        }

        .work-content{
            padding: 20px;
        }

        .work-content h5{
            font-weight: 700;
            margin-bottom: 10px;
        }

        .work-content p{
            color: #cbd5e1;
            font-size: 0.95rem;
        }

        .section-title{
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 50px;
            text-align: center;
        }

        @media(max-width:868px){

            .hero h1{
                font-size: 2.4rem;
            }

            .artist-name{
                font-size: 1.6rem;
            }

            .profile-img{
                width: 110px;
                height: 110px;
            }

        }

    </style>

</head>

<body>

<?php include 'inc/NavBar.php'; ?>

<section class="hero">

    <h1>Profiluri Artiști WebToonCNU</h1>

    <p>
        Descoperă artiștii consacrați ai comunității WebToonCNU,
        lucrările lor și universurile artistice create special
        pentru competițiile și proiectele comunității.
    </p>

</section>

<div class="container pb-5">

<?php foreach($artists as $index => $artist): ?>

    <div class="artist-card">

        <div class="row align-items-center">

            <div class="col-lg-2 text-center mb-4 mb-lg-0">

                <img src="<?= $artist['profile']; ?>" class="profile-img">

            </div>

            <div class="col-lg-7">

                <div class="artist-name">
                    <?= $artist['name']; ?>
                </div>

                <div class="artist-role">
                    <?= $artist['role']; ?>
                </div>

                <p class="artist-bio">
                    <?= $artist['bio']; ?>
                </p>

                <div class="social-links mt-3">

                    <a href="<?= $artist['instagram']; ?>" target="_blank">
                        <i class="fab fa-instagram"></i>
                    </a>

                    <a href="<?= $artist['discord']; ?>" target="_blank">
                        <i class="fab fa-discord"></i>
                    </a>

                    <a href="<?= $artist['email']; ?>">
                        <i class="fas fa-envelope"></i>
                    </a>

                </div>

            </div>

            <div class="col-lg-3 text-lg-end text-center mt-4 mt-lg-0">

                <button class="btn-gallery"
                    onclick="toggleGallery('gallery<?= $index; ?>')">

                    Vezi lucrările

                </button>

            </div>

        </div>



        <div class="gallery" id="gallery<?= $index; ?>">

            <div class="row g-4 mt-2">

                <?php foreach($artist['works'] as $work): ?>

                    <div class="col-lg-4 col-md-6">

                        <div class="work-card">

                            <img src="<?= $work['image']; ?>">

                            <div class="work-content">

                                <h5>
                                    <?= $work['title']; ?>
                                </h5>

                                <p>
                                    <?= $work['description']; ?>
                                </p>

                            </div>

                        </div>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </div>

<?php endforeach; ?>

</div>

<script>

function toggleGallery(id){

    const gallery = document.getElementById(id);

    if(gallery.style.display === "block"){

        gallery.style.display = "none";

    }else{

        gallery.style.display = "block";

    }

}

</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
```
