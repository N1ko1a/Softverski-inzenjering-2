<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Polovnjaci</title>
</head>
<body>
    <header>
        <a href="index.html" ><img src="slike/logo.jpg" alt="nista"></a>
        <nav>
            <ul>
                <li>
                    <a href="login.html" >PRIJAVI SE</a>
                </li>
                <li>
                    <a href="register.html" >REGISTRUJ SE</a>
                </li>
                <li>
                    <a href="automobili.html" >POSTAVI OGLAS</a>
                </li>
            </ul>
        </nav>
    </header>
    <div class="pretraga">
        <div class="jedan">
            <select required>
                <option value="" disabled selected hidden>Marka vozila</option>

                <?php
                include_once("db.php");
                $marke = DBOperacije::getInstance()->getSpecifikacijaList(new Marka());
                for ($i=0; $i < count($marke); $i++) { 
                    ?>
                    <option value="<?php echo $marke[$i]->getId(); ?>"><?php echo $marke[$i]->getNaziv(); ?></option>
                    <?php
                }
                ?>

            </select>
            <input type="text" name="model" placeholder=" Model" style="width: 300px; height: 40px; ">
            <input type="text" name="cena" placeholder=" Cena do" style="width: 300px; height: 40px; ">
        </div>
        <div class="dva">
            <select >
                <option value="" disabled selected hidden>Karoserija</option>
                <?php
                include_once("db.php");
                $list = DBOperacije::getInstance()->getSpecifikacijaList(new Karoserija());
                for ($i=0; $i < count($list); $i++) { 
                    ?>
                    <option value="<?php echo $list[$i]->getId(); ?>"><?php echo $list[$i]->getNaziv(); ?></option>
                    <?php
                }
                ?>
            </select>
            <div class="godiste">
            <input class= "godisteod" type="text" name="godiste od" placeholder=" Godiste do">
            <input class="godistedo" type="text" name="do" placeholder=" Do">
            </div>
            <select>
                <option value="gorivo" disabled selected hidden>Gorivo</option>
                <?php
                include_once("db.php");
                $list = DBOperacije::getInstance()->getSpecifikacijaList(new VrstaGoriva());
                for ($i=0; $i < count($list); $i++) { 
                    ?>
                    <option value="<?php echo $list[$i]->getId(); ?>"><?php echo $list[$i]->getNaziv(); ?></option>
                    <?php
                }
                ?>
            </select>
        </div>
        <div class="tri" >
            <input type="text" name="kilometraza" placeholder=" Kilometraza do" style=" width: 300px; height: 40px; ">
            <select id="region">
                <option value="" disabled selected hidden>Region</option>
                <option value="1">Bilo koji</option>
                <!-- <option value="1">Beograd</option>
                <option value="2">Centralna Srbija</option>
                <option value="3">Istocna Srbija</option>
                <option value="4">Juzna Srbija</option>
                <option value="5">Zapadna Srbija</option>
                <option value="6">Kosovo i Metohija</option>
                <option value="7">Vojvodina</option> -->
            </select>
            <select>
                <option value="" disabled selected hidden>Vrsta menjaca</option>
                <?php
                include_once("db.php");
                $list = DBOperacije::getInstance()->getSpecifikacijaList(new VrstaPrenosa());
                for ($i=0; $i < count($list); $i++) { 
                    ?>
                    <option value="<?php echo $list[$i]->getId(); ?>"><?php echo $list[$i]->getNaziv(); ?></option>
                    <?php
                }
                ?>
                <!-- <option value="automatik">Automatik</option>
                <option value="manuelni">Manuelni</option> -->
            </select>
        </div>
        <div class="cetri">
            <button class="pretrazi">PRETRAZI</button>
        </div>
    </div>
    <div class="naj1">
        <h2>NAJPOPULARNIJE MARKE VOZILA</h2>
    </div>

    <div class="naj1-oglasi">
        <div class="oglas">
            <a target="_blank" href="oglas.html"><img src="slike/20a3297e075c-1920x1080.jpg" alt="nema"></a>
            <p>Volkswagen Polo 1.4 TDI</p>
            <p>2.350e</p>
        </div>
        <div class="oglas">
            <img src="slike/20a3297e075c-1920x1080.jpg" alt="nema">
            <p>Volkswagen Polo 1.4 TDI</p>
            <p>2.350e</p>
        </div>
        <div class="oglas">
            <img src="slike/20a3297e075c-1920x1080.jpg" alt="nema">
            <p>Volkswagen Polo 1.4 TDI</p>
            <p>2.350e</p>
        </div>
        <div class="oglas">
            <img src="slike/20a3297e075c-1920x1080.jpg" alt="nema">
            <p>Volkswagen Polo 1.4 TDI</p>
            <p>2.350e</p>
        </div>
        <div class="oglas">
            <img src="slike/20a3297e075c-1920x1080.jpg" alt="nema">
            <p>Volkswagen Polo 1.4 TDI</p>
            <p>2.350e</p>
        </div>
        <div class="oglas">
            <img src="slike/20a3297e075c-1920x1080.jpg" alt="nema">
            <p>Volkswagen Polo 1.4 TDI</p>
            <p>2.350e</p>
        </div>
    </div>

    <div class="naj2">
        <h2>NAJNOVIJI OGLASI</h2>
    </div>
    <div class="naj2-oglasi">
        <div class="oglas">
            <img src="slike/20a3297e075c-1920x1080.jpg" alt="nema">
            <p>Volkswagen Polo 1.4 TDI</p>
            <p>2.350e</p>
        </div>
        <div class="oglas"> 
            <img src="slike/20a3297e075c-1920x1080.jpg" alt="nema">
            <p>Volkswagen Polo 1.4 TDI</p>
            <p>2.350e</p>
        </div>
        <div class="oglas">
            <img src="slike/20a3297e075c-1920x1080.jpg" alt="nema">
            <p>Volkswagen Polo 1.4 TDI</p>
            <p>2.350e</p>
        </div>
        <div class="oglas">
            <img src="slike/20a3297e075c-1920x1080.jpg" alt="nema">
            <p>Volkswagen Polo 1.4 TDI</p>
            <p>2.350e</p>
        </div>
        <div class="oglas">
            <img src="slike/20a3297e075c-1920x1080.jpg" alt="nema">
            <p>Volkswagen Polo 1.4 TDI</p>
            <p>2.350e</p>
        </div>
        <div class="oglas">
            <img src="slike/20a3297e075c-1920x1080.jpg" alt="nema">
            <p>Volkswagen Polo 1.4 TDI</p>
            <p>2.350e</p>
        </div>
        <div class="oglas">
            <img src="slike/20a3297e075c-1920x1080.jpg" alt="nema">
            <p>Volkswagen Polo 1.4 TDI</p>
            <p>2.350e</p>
        </div>
        <div class="oglas">
            <img src="slike/20a3297e075c-1920x1080.jpg" alt="nema">
            <p>Volkswagen Polo 1.4 TDI</p>
            <p>2.350e</p>
        </div>
        <div class="oglas">
            <img src="slike/20a3297e075c-1920x1080.jpg" alt="nema">
            <p>Volkswagen Polo 1.4 TDI</p>
            <p>2.350e</p>
        </div>
    </div>
</body>
</html>