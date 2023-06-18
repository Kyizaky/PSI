<?php
session_start();
include 'conn.php';

if(isset($_REQUEST['email']) && isset($_REQUEST['pass'])){

	//mysqli real escape prevent from sql injection which filter the user input
	$email=mysqli_real_escape_string($kon,$_REQUEST['email']);
	$password=mysqli_real_escape_string($kon,$_REQUEST['pass']);
	$qr=mysqli_query($kon,"select * from users where email='".$email."' and pass='".md5($password)."'");
	if(mysqli_num_rows($qr)>0){
		$data=mysqli_fetch_assoc($qr);
		$_SESSION['user_data']=$data;
		if($data['role']==1){
			$_SESSION['role']== 1;
			header("Location:admin.php");
				
		}
		elseif($data['role']==2){
			$_SESSION['roles']== 2;
			header("Location:pegawai.php");
				
		}
		else {
			$_SESSION['roles']== 3;	
			header("Location: pelanggan.php");
			
		}

	}
	else{
		header("Location:tampilan_login.php?error=Invalid Login Details");		
	}
}
else{
	header("Location:tampilan_login.php?error=Please Enter Email and Password");
}