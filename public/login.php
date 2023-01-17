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

include_once('Database_operacije.php');
if (isset($_POST["submit"]) && isset($_POST["username"]) && isset($_POST["password"])) {

    /* "dezinfekcija" username (prima user.name, user, user1.name2.name3 i slicno)
     * da ne bi doslo do XSS napada
     * https://regex101.com/r/O9KdEr/1
     */
    $username = filter_var($_POST["username"], FILTER_VALIDATE_REGEXP, array("options"=>array("regexp"=>"/^[a-zA-Z0-9]+(\.?[a-zA-Z0-9]+)*$/")));
    // limitiramo i duzinu username
    if (strlen($username) > 40) {
        $username = substr($username, 0, 40);
    }

    /* lozinku ne moramo da dezinfikujemo jer u proveri_kredencijale se proverava sa 
     * hesiranom lozinkom i ne ulazi direkt u sql kod kao username
     */
    $password = $_POST["password"];

    $id = Database_operacije::get_instance()->proveri_kredencijale($username, $password);

    if ($id != -1) {
        $_SESSION["auth"] = $id;
        header('Location: index.php');
        exit;
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
    <title>Polovnjaci - Prijava</title>
</head>

<body>
    <section>
        <h1>Prijavi se</h1>
        <form action="login.php" method="POST">
            <input type="text" placeholder="Korisnicko ime" name="username">
            <input type="password" placeholder="Sifra" name="password">
            <?php
            if (isset($_GET["reg"]))
                echo "<div style='color: green; font-size: 16px;'>Uspesna registracija! Unesite podatke da biste se prijavili!</div>";
            if (isset($_POST["submit"]))
                echo "<div style='color: red; font-size: 16px;'>Nepravilan unos korisckog imena ili lozinke!</div>";
            ?>
            <a href="register.php">Nemas nalog? Registruj se <span>ovde</span>!</a>
            <input type="submit" value="Prijavi se" name="submit">
        </form>
    </section>
</body>

</html>