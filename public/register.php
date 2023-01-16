<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();

if (isset($_SESSION["auth"])) {
    unset($_SESSION["auth"]);
    header('Location: index.php');
    exit;
};

$postoji_korisnik_username = false;
$postoji_korisnik_email = false;
$lozinke_se_ne_poklapaju = false;

function proveri_inpute($ime, $prezime, $email, $username, $password, $telefon)
{
    if (preg_match('/^[A-Za-z]{3,40}$/', $ime) == 0)
        return false;

    if (preg_match('/^[A-Za-z]{3,40}$/', $prezime) == 0)
        return false;

    if (preg_match('/^[a-zA-Z0-9]+(\.?[a-zA-Z0-9]+)*$/', $username) == 0)
        return false;

    if (preg_match('/[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+/', $email) == 0)
        return false;

    // Najmanje 8 karaktera, najmanje 1 veliko slovo, najmanje 1 malo slovo, najmanje 1 broj i najmanje 1 specijalni karakter
    if (preg_match('/^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$/', $password) == 0)
        return false;

    if (preg_match('/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/', $telefon) == 0)
        return false;

    return true;
}

include_once('Database_operacije.php');
if (isset($_POST["submit"]) && isset($_POST["ime"]) && isset($_POST["prezime"]) && isset($_POST["email"]) && isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["repassword"]) && isset($_POST["telefon"])) {

    $ime = $_POST["ime"];
    $prezime = $_POST["prezime"];
    $email = $_POST["email"];
    $username = $_POST["username"];
    $password = $_POST["password"];
    $repassword = $_POST["repassword"];
    $telefon = $_POST["telefon"];

    if (proveri_inpute($ime, $prezime, $email, $username, $password, $telefon)) {
        if ($password != $repassword)
            $lozinke_se_ne_poklapaju = true;

        $korisnik = Database_operacije::get_instance()->get_korisnik_po_username($username);

        if ($korisnik->get_id() != -1)
            $postoji_korisnik_username = true;

        $korisnik = Database_operacije::get_instance()->get_korisnik_po_mail($email);

        if ($korisnik->get_id() != -1)
            $postoji_korisnik_email = true;
        
        if (!$postoji_korisnik_email && !$postoji_korisnik_username && !$lozinke_se_ne_poklapaju) {
            Database_operacije::get_instance()->napravi_nalog($ime, $prezime, $username, $password, $telefon, $email);

            header('Location: login.php?reg=1');
            exit;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="login.css">
    <title>Polovnjaci - Registracija</title>
</head>

<body>
    <section>
        <h1>Registruj se</h1>
        <form action="register.php" method="POST">
            <input type="text" placeholder="Ime" name="ime" pattern="^[A-Za-z]{3,40}$" title="Ime korisnika" required>
            <input type="text" placeholder="Prezime" pattern="^[A-Za-z]{3,40}$" title="Prezime korisnika" name="prezime" required>
            <input type="email" placeholder="E-mail" pattern="[^@ \t\r\n]+@[^@ \t\r\n]+\.[^@ \t\r\n]+" title="E-mail korisnika" name="email" required>
            <input type="text" placeholder="Korisnicko ime" pattern="^[a-zA-Z0-9]+(\.?[a-zA-Z0-9]+)*$" title="Dozvoljena su slova i brojevi, sa tackama izmedju" name="username" required>
            <input type="password" placeholder="Sifra" pattern="^(?=.*?[A-Z])(?=.*?[a-z])(?=.*?[0-9])(?=.*?[#?!@$ %^&*-]).{8,}$" title="Najmanje 8 karaktera, 1 veliko slovo, 1 malo slovo, 1 broj i 1 specijalni karakter" name="password" required>
            <input type="password" placeholder="Ponovi sifru" name="repassword" required>
            <input type="tel" placeholder="Broj telefona" pattern="^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$" title="Broj telefona" name="telefon" required>
            <?php
            if (isset($_POST["submit"]))
                echo "<div style='color: red; font-size: 16px;'>Nepravilan unos podataka!</div>";
            if ($lozinke_se_ne_poklapaju)
                echo "<div style='color: red; font-size: 16px;'>Lozinka i ponovljena lozinka se ne poklapaju!</div>";
            if ($postoji_korisnik_email)
                echo "<div style='color: red; font-size: 16px;'>Korisnik sa istim e-mailom vec postoji!</div>";
            if ($postoji_korisnik_username)
                echo "<div style='color: red; font-size: 16px;'>Korisnik sa istim korisnickim imenom vec postoj!</div>";
            ?>
            <a href="login.php">Vec imas nalog? Prijavi se <span>ovde</span>!</a>
            <input type="submit" value="Prijavi se" name="submit">
        </form>
    </section>
</body>

</html>