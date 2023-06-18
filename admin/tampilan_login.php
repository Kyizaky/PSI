<?php
session_start();
if(isset($_SESSION['user_data'])){
	if($_SESSION['user_data']['usertype']==1){
		header("Location:admin.php");
	}
	else{
		header("Location:pegawai.php");	
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
</head>
<body>
   <div class="container">
   	<div class="row">
   		<?php if(isset($_REQUEST['error'])){ ?>
   		<div class="col-lg-12">
   			<span class="alert alert-danger" style="display: block;"><?php echo $_REQUEST['error']; ?></span>
   		</div>
	   	<?php } ?>
   	</div>
   	<div class="row">
   		<div class="col-lg-4">
   		</div>
   		<div class="col-lg-4">
	     <form class="form-signin" action="login.php" method="post">
	     	<div class="form-group">
	    	    <h2 class="form-signin-heading text-center">Please Login in</h2>
		    </div>
	        <div class="form-group">
		        <label for="inputEmail" class="sr-only">Email address</label>
		        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocus>
	  		</div>
	        <div class="form-group">
		        <label for="inputPassword" class="sr-only">Password</label>
		        <input type="password" name="pass" id="inputPassword" class="form-control" placeholder="Password" required>
		    </div>
		    <div >
		        <button class="btn btn-lg btn-primary btn-block" type="submit">Log in</button>
			</div>	
				
		    
	      </form>
		  	<a href="daftar.php"><button class="btn btn-lg btn-danger btn-block" >sign up</button></a>
			
		</div>
	    <div class="col-lg-4">
   		</div>
	  </div>
    </div>
</body>
</html>