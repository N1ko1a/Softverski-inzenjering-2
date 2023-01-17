<body class="bg-1">
    <section class="login">
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