<!DOCTYPE html> 
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<title>Înregistrare</title>

	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" 
	      rel="stylesheet">

	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>

    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450 p-3" 
    	      action="php/signup.php" 
    	      method="post">

    		<h4 class="display-4 fs-1">Crează un cont</h4><br>

    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo htmlspecialchars($_GET['error']); ?>
			</div>
		    <?php } ?>

		    <?php if(isset($_GET['success'])){ ?>
    		<div class="alert alert-success" role="alert">
			  <?php echo htmlspecialchars($_GET['success']); ?>
			</div>
		    <?php } ?>

		    <div class="mb-3">
		        <label class="form-label">Nume complet</label>

		        <input type="text" 
		               class="form-control"
		               name="fname"
		               value="<?php echo (isset($_GET['fname'])) ? htmlspecialchars($_GET['fname']) : ""; ?>">
		    </div>

		    <div class="mb-3">
		        <label class="form-label">Adresă email</label>

		        <input type="email" 
		               class="form-control"
		               name="email"
		               value="<?php echo (isset($_GET['email'])) ? htmlspecialchars($_GET['email']) : ""; ?>">
		    </div>

		    <div class="mb-3">
		        <label class="form-label">Nume de utilizator</label>

		        <input type="text" 
		               class="form-control"
		               name="uname"
		               value="<?php echo (isset($_GET['uname'])) ? htmlspecialchars($_GET['uname']) : ""; ?>">
		    </div>

		    <div class="mb-3">
		        <label class="form-label">Parolă</label>

		        <input type="password" 
		               class="form-control"
		               name="pass">
		    </div>
		  
		    <button type="submit" class="btn btn-primary">
		    	Înregistrare
		    </button>

		    <a href="login.php" class="link-secondary">
		    	Conectare
		    </a>

		</form>
		
    </div>
    <div>
	<form class="shadow w-450 p-3"  
    	      method="post">
    	<h4 class="display-4 fs-1">Platformă dezvoltată de Stănciulescu Bogdan</h4>
    	<p>Contact:</p> 
    	<p>email:bogdan.stanciulescu@liceulunirea.ro</p>
    	<p>Număr de telefon <a href="tel:+40723382292"> +40723382292</a>.</p>
    	<a class="hero-buttons" href="https://github.com/bogdanstanciulescu">Click aici pentru a vedea profilul meu de GITHUB</a>
    </form>
    </div>
</body>
</html>