<body class="bg-1">
<section class="login">
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