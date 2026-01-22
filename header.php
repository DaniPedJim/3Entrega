<?php
    session_start();
        if($_SERVER["REQUEST_METHOD"]=="POST"){
            if(isset($_POST["erabiltzailea"]) && isset($_POST["pasahitza"]) && $_POST["erabiltzailea"]!="" && $_POST["pasahitza"]!=""){
                $_SESSION["email"]=$_POST["erabiltzailea"];
                $_SESSION["pasahitza"]=$_POST["pasahitza"];
            }
        }
        if(isset($_GET["atera"]) && $_GET["atera"]==="login"){
            $_SESSION["email"]="";
            $_SESSION["pasahitza"]="";
        }
    ?>
    <!-- MENUA -->
    <header>

        <nav>
            <a class="berritech-btn">
                <img src="irudiak/LogoErronka1.png" alt="Berritech">
            </a>
            <a href="index.php">SARRERA</a>
            <a href="produktuak.php">PRODUKTUAK</a>
            <a href="norgara.php">NOR GARA</a>
            <a href="formularioa.php">FORMULARIOA</a>
            
            <?php if(!(isset($_SESSION["email"]) && isset($_SESSION["pasahitza"])) || ($_SESSION["email"]=="" && $_SESSION["pasahitza"]=="")): ?>
                <a href="login.php">LOGIN</a>
            <?php else: ?>
                <a href="?atera=login">LOGIN ITXI</a>
            <?php endif;?>