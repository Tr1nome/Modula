<?php
session_name("ClubStephenKing");
    session_start();
    $page = "accueil";
    require "./requires/functions.php";
    include "./includes/head.php";
    createHeader($page);
    createContent($page);
    include "./includes/footer.php";