<?php
session_start();
session_destroy();
header("Location:tampilan_login.php");
//now login part completed