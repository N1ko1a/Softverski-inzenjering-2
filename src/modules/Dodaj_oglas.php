<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/database/Database_operacije.php";

class Dodaj_oglas
{

    public function dodaj_oglas(int $vlasnik, array $input) : bool
    {

        if (
            !isset($input["marka"],
            $input["model"],
            $input["godiste"],
            $input["cena"],
            $input["karoserija"],
            $input["zapremina"],
            $input["snaga"],
            $input["emisiona_klasa_motora"],
            $input["klima"],
            $input["kilometraza"],
            $input["broj_sedista"],
            $input["broj_vrata"],
            $input["boja_vozila"],
            $input["poreklo_vozila"],
            $input["vrsta_goriva"],
            $input["vrsta_prenosa"],
            $input["vrsta_pogona"],
            $input["opis"],
            $_FILES['slike']) &&
            count($_FILES['slike']['name']) > 0
        )
            return false;

        $id = Database_operacije::get_instance()->dodaj_oglas(
            $vlasnik,
            $input["marka"],
            $input["model"],
            $input["godiste"],
            $input["cena"],
            $input["karoserija"],
            $input["zapremina"],
            $input["snaga"],
            $input["emisiona_klasa_motora"],
            $input["klima"],
            $input["kilometraza"],
            $input["broj_sedista"],
            $input["broj_vrata"],
            $input["boja_vozila"],
            $input["poreklo_vozila"],
            $input["vrsta_goriva"],
            $input["vrsta_prenosa"],
            $input["vrsta_pogona"],
            $input["opis"]
        );

        mkdir($_SERVER["DOCUMENT_ROOT"] . "/slike/$id");

        for ($i = 0; $i < count($_FILES['slike']['name']); $i++) {
            $file = $_FILES['slike']['tmp_name'][$i];
            $file_name = $_FILES['slike']['name'][$i];
            $file_type = $_FILES['slike']['type'][$i];
            $file_size = $_FILES['slike']['size'][$i];
            $file_error = $_FILES['slike']['error'][$i];

            // process image
            $image = imagecreatefromstring(file_get_contents($file));

            $original_width = imagesx($image);
            $original_height = imagesy($image);
          
            $ratio = min(800/$original_width, 600/$original_height);
            $width = $ratio * $original_width;
            $height = $ratio * $original_height;
            
            $new_image = imagecreatetruecolor(800, 600);
            
            imagecopyresampled($new_image, $image, (800-$width)/2, (600-$height)/2, 0, 0, $width, $height, $original_width, $original_height);

            imagewebp($new_image, $_SERVER["DOCUMENT_ROOT"] . "/slike/$id/$file_name.webp", 80);

            imagedestroy($image);
            imagedestroy($new_image);
        }

        return true;
    }
}
