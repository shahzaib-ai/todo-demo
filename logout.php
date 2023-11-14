<?php
session_start();
unset($_SESSION["SUCC_MSG"]);
header("Location:login.php");
