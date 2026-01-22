<!DOCTYPE html>
<html lang="eu">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produktuak</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <?php require "header.php" ?>
            <div class="hizkuntza">
                <a href="produktuak.html"> EU</a> |
                <a href="ProduktuakEN.html">EN</a>
            </div>
        </nav>
    </header>

    <!-- EDUKIA -->
    <section id="produktuak">
        <form action="produktuak.php" method="post">
            <label for="mota">Produktu mota:</label>
            <select name="aukera" id="aukera">
                <option value="guztia" <?php if(isset($_POST["aukera"]) && $_POST["aukera"]=="guztia")echo "selected";?>>Guztia</option>
                <option value="ordenagailua" <?php if(isset($_POST["aukera"]) && $_POST["aukera"]=="ordenagailua")echo "selected";?>>Ordenagailua</option>
                <option value="mugikorra" <?php if(isset($_POST["aukera"]) && $_POST["aukera"]=="mugikorra")echo "selected";?>>Mugikorra</option>
                <option value="konponentea" <?php if(isset($_POST["aukera"]) && $_POST["aukera"]=="konponentea")echo "selected";?>>Konponenteak</option>
            </select>

            <label for="orden">Prezioaren ordena:</label>
            <input type="radio" name="orden" value="asc">
            <label for="orden">Asc</label>
            <input type="radio" name="orden" value="desc">
            <label for="orden">Desc</label>

            <label for="bilaketa">Bilaketa:</label>
            <input type="text" name="bilaketa">
            <button>Bidali</button>
        </form>
        <div class="grid">

            <?php
                require_once "db_konexioa.php";
                if(isset($_POST["orden"]) && $_POST["orden"] !=""){
                    if($_POST["orden"]=="asc"){
                        $filtro="order by prezioa ASC";
                    }else{
                        $filtro="order by prezioa DESC";                   
                    }
                }else{
                    $filtro="";
                }
                if(!isset($_POST["aukera"]) || $_POST["aukera"]=="guztia"){
                    $sql= "Select * from erronka2.produktuak $filtro";
                } else {
                    $aukera = $_POST["aukera"];
                    $sql= "Select * from erronka2.produktuak where mota like '$aukera' $filtro";
                }

                $stmt= $pdo->query($sql);
                $hitza="";
                if(isset(($_POST["bilaketa"])) && $_POST["bilaketa"]!=""){
                    $hitza=$_POST["bilaketa"];
                }
                
                while($row = $stmt-> fetch(PDO::FETCH_ASSOC)){
                        if($hitza=="" || str_contains(strtolower($row["izena"]),strtolower($hitza))){
                            echo "<div class='produktu'>";
                            echo "<img src='irudiak/".$row["argazkia"]."'>";
                            echo "<h3>".$row["izena"]."</h3>";
                            echo "<p>".$row["deskribapena"]."</p>";
                            echo "<p class='prezioa'>Prezioa: ".$row["prezioa"]."€</p>";
                            echo "<button class='erosi'>Erosi</button>";
                            echo"</div>";
                        }
                    }
            ?>
            <?php
                $konponenteak=[];
            ?>
             <?php foreach($konponenteak as $konponentea):?>
                <?php
                    if($hitza=="" || str_contains(strtolower($konponentea),strtolower($hitza))):?>
                    <?=$konponentea?>
                    <?php endif; ?>
                    <?php endforeach;?>
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