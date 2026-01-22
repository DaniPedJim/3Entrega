<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produktuak</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header>
        <nav>
            <a class="berritech-btn">
                <img src="irudiak/LogoErronka1.png" alt="Berritech">
            </a>
            <a href="index.html">SARRERA</a>
            <a href="produktuak.html">PRODUKTUAK</a>
            <a href="norgara.html">NOR GARA</a>
            <a href="formularioa.html">FORMULARIOA</a>
            <a href="login.html">LOGIN</a>
            <div class="hizkuntza">
                <a href="produktuak.html"> EU</a> |
                <a href="ProduktuakEN.html">EN</a>
            </div>
        </nav>
    </header>

    <!-- EDUKIA -->
    <section id="produktuak">
        <div class="grid">

            <?php
                require_once "db_konexioa.php";
                $sql= "Select izena,prezioa,deskribapena,argazkia from erronka2.produktuak";
                $stmt= $pdo->query($sql);
                while($row = $stmt-> fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='produktu'>";
                    echo "<img src='irudiak/".$row["argazkia"]."'>";
                    echo "<h3>".$row["izena"]."</h3>";
                    echo "<p>".$row["deskribapena"]."</p>";
                    echo "<p class='prezioa'>Prezioa: ".$row["prezioa"]."€</p>";
                    echo "<button class='erosi'>Erosi</button>";
                    echo"</div>";
            
                }
                
                
            ?>
        </div>
    </section>


    <!-- FOOTER -->
    <footer>
        <p>&copy; 2025 Enpresa Izena. Eskubide guztiak erreserbatuta.</p>
        <p>Emaila: info@enpresa.com | Tel: +34 600 123 456</p>
        <p>Helbidea: Kale Nagusia 12, Donostia, Euskadi</p>
        <p>
        <div class="redes">
            <a href="https://instagram.com" target="_blank">Instagram</a>
            <a href="https://facebook.com" target="_blank">Facebook</a>
            <a href="https://twitter.com" target="_blank">X</a>
        </div>
        </p>
    </footer>

</body>

</html>