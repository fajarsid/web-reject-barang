<?php
     if(!isset($_SESSION)) 
     { 
         session_start(); 
     } 

    // Koneksi ke database
    $conn = mysqli_connect("localhost", "root", "", "dbreject");
?>