<?php
// filepath: d:\UTH\WebII\000_Final_Proyect\includes\admin\islogged.php

session_start();

if (!isset($_SESSION['user_id'])) {
    header('Location: /admin/login.php');
    exit();
}