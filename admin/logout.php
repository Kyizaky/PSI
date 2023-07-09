<?php
session_start();
session_destroy();
header("Location:login/login_form.php");
//now login part completed