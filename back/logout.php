<?php

session_start();
$_SESSION=array();
session_destroy();
$connect = '';
header('Location: ../pages/connect.php');

