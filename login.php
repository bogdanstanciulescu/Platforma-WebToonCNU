<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Conectare</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	
    <div class="d-flex justify-content-center align-items-center vh-100">
    	
    	<form class="shadow w-450 p-3" 
    	      action="users/users-login.php" 
    	      method="post">

    		<h4 class="display-4  fs-1">Conectare</h4><br>
    		<?php if(isset($_GET['error'])){ ?>
    		<div class="alert alert-danger" role="alert">
			  <?php echo htmlspecialchars($_GET['error']); ?>
			</div>
		    <?php } ?>

		  <div class="mb-3">
		    <label class="form-label">Nume de utilizator (username)</label>
		    <input type="text" 
		           class="form-control"
		           name="uname"
		           value="<?php echo (isset($_GET['uname']))? htmlspecialchars($_GET['uname']):"" ?>">
		  </div>

		  <div class="mb-3">
		    <label class="form-label">Parolă</label>
		    <input type="password" 
		           class="form-control"
		           name="pass">
		  </div>
		  
		  <button type="submit" class="btn btn-primary">Conectează-te</button>
		  <a href="admin-login.php" class="link-secondary">Conectare organizatori</a>
		  &nbsp;&nbsp;&nbsp;
		  <a href="blog.php" class="link-secondary">Lucrări Participanți</a>
		  &nbsp;&nbsp;&nbsp;
		  <a href="signup.php" class="link-secondary">Înscriere</a>
		</form>
    </div>
    <div>
	<form class="shadow w-450 p-3"  
    	      method="post">
    	<h4 class="display-4 fs-1">Platformă realizată de Stănciulescu Bogdan</h4>
    	<p>Contact:</p> 
    	<p>email:bogdan.stanciulescu@liceulunirea.ro</p>
    	<p>Număr de telefon <a href="tel:+40723382292"> +40723382292</a>.</p>
    	<a class="hero-buttons" href="https://github.com/bogdanstanciulescu">Click aici pentru a vedea profilul meu de GITHUB</a>
    </form>
    </div>
</body>
</html>