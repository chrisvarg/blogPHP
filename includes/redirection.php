<?php

if(isset($_SESSION) == false) {
    session_start();
};

if(isset($_SESSION['usuario']) == false) {
    header("Location: index.php");
}