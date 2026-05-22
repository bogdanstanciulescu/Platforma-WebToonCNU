<?php 
session_start();
$logged = false;
if (isset($_SESSION['user_id']) && isset($_SESSION['username'])) {
   $logged = true;
   $user_id = $_SESSION['user_id'];
}
?>
<!DOCTYPE html>
<html lang="ro">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Anunțuri - WebToonCNU</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="css/style.css">

  <style>
    body {
      background: #f8f9fa;
    }

    .announcements-hero {
      background: linear-gradient(135deg, #c0392b, #8e2c23);
      color: white;
      padding: 70px 20px;
      text-align: center;
      border-radius: 0 0 35px 35px;
      margin-bottom: 45px;
    }

    .announcements-hero h1 {
      font-weight: 800;
      letter-spacing: 0.5px;
    }

    .announcements-hero p {
      max-width: 750px;
      margin: 15px auto 0;
      font-size: 1.1rem;
      opacity: 0.95;
    }

    .announcement-card {
      border: none;
      border-radius: 20px;
      box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
      transition: 0.3s ease;
      height: 100%;
      overflow: hidden;
    }

    .announcement-card:hover {
      transform: translateY(-6px);
      box-shadow: 0 12px 30px rgba(0, 0, 0, 0.12);
    }

    .announcement-icon {
      width: 62px;
      height: 62px;
      border-radius: 50%;
      background: rgba(192, 57, 43, 0.12);
      color: #c0392b;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 28px;
      margin-bottom: 18px;
    }

    .btn-webtoon {
      background: #c0392b;
      border: none;
      color: white;
      padding: 10px 22px;
      border-radius: 30px;
      font-weight: 600;
      transition: 0.3s ease;
      text-decoration: none;
      display: inline-block;
    }

    .btn-webtoon:hover {
      background: #a83226;
      color: white;
      transform: scale(1.03);
    }

    .info-box {
      background: white;
      border-left: 5px solid #c0392b;
      border-radius: 15px;
      padding: 22px;
      box-shadow: 0 5px 18px rgba(0, 0, 0, 0.06);
    }

    .section-title {
      font-weight: 800;
      color: #2c2c2c;
    }

    .muted-text {
      color: #6c757d;
    }
  </style>
</head>
<body>
  <?php include 'inc/NavBar.php'; ?>

  <section class="announcements-hero">
    <div class="container">
      <h1><i class="fa fa-bullhorn"></i> Anunțuri WebToonCNU</h1>
      <p>
        Aici găsești informații utile despre concursul WebToonCNU, documentele oficiale,
        conferința de prezentare și regulamentul de participare.
      </p>
    </div>
  </section>

  <main class="container mb-5">
    <div class="row g-4 mb-5">
      <div class="col-md-6">
        <div class="card announcement-card p-4">
          <div class="card-body">
            <div class="announcement-icon">
              <i class="fa fa-video-camera"></i>
            </div>
            <h3 class="card-title">Conferința WebToonCNU</h3>
            <p class="card-text muted-text">
              Accesează conferința oficială WebToonCNU pentru informații despre desfășurarea concursului,
              obiectivele proiectului și detalii importante pentru participanți.
            </p>
            <a href="https://drive.google.com/file/d/19d-IbVcnC3sE5d4qW4KKeDbvbSUZNlvQ/view" target="_blank" class="btn-webtoon">
              <i class="fa fa-external-link"></i> Deschide conferința
            </a>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card announcement-card p-4">
          <div class="card-body">
            <div class="announcement-icon">
              <i class="fa fa-file-text"></i>
            </div>
            <h3 class="card-title">Regulamentul concursului</h3>
            <p class="card-text muted-text">
              Consultă regulamentul oficial pentru a verifica cerințele de participare, criteriile de evaluare,
              condițiile de înscriere și regulile concursului.
            </p>
            <a href="https://drive.google.com/file/d/1efIZNHlLnZaJhxa7BsRuASbnpY5PK2w2/view" target="_blank" class="btn-webtoon">
              <i class="fa fa-download"></i> Vezi regulamentul
            </a>
          </div>
        </div>
      </div>
    </div>

    <section class="mb-5">
      <h2 class="section-title mb-4">Informații utile pentru participanți</h2>
      <div class="row g-4">
        <div class="col-lg-4 col-md-6">
          <div class="info-box h-100">
            <h5><i class="fa fa-pencil"></i> Înscrierea lucrărilor</h5>
            <p class="mb-0 muted-text">
              Participanții trebuie să respecte cerințele din regulament și să trimită lucrările conform indicațiilor oficiale.
            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="info-box h-100">
            <h5><i class="fa fa-picture-o"></i> Formatul lucrărilor</h5>
            <p class="mb-0 muted-text">
              Lucrările trebuie să fie clare, originale și potrivite tematicii concursului WebToonCNU.
            </p>
          </div>
        </div>

        <div class="col-lg-4 col-md-6">
          <div class="info-box h-100">
            <h5><i class="fa fa-check-circle"></i> Evaluarea</h5>
            <p class="mb-0 muted-text">
              Juriul va analiza lucrările în funcție de creativitate, originalitate, mesaj și respectarea regulamentului.
            </p>
          </div>
        </div>
      </div>
    </section>

    <section class="text-center bg-white p-4 p-md-5 rounded-4 shadow-sm">
      <h2 class="section-title">Ai nevoie de documentele oficiale?</h2>
      <p class="muted-text mb-4">
        Folosește butoanele de mai jos pentru acces rapid la materialele importante ale concursului.
      </p>
      <div class="d-flex flex-column flex-md-row justify-content-center gap-3">
        <a href="https://drive.google.com/file/d/19d-IbVcnC3sE5d4qW4KKeDbvbSUZNlvQ/view" target="_blank" class="btn-webtoon">
          <i class="fa fa-video-camera"></i> Conferința WebToonCNU
        </a>
        <a href="https://drive.google.com/file/d/1efIZNHlLnZaJhxa7BsRuASbnpY5PK2w2/view" target="_blank" class="btn-webtoon">
          <i class="fa fa-file-text"></i> Regulament
        </a>
      </div>
    </section>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>