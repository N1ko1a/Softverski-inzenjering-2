<div class="profil">
    <form action="profil.php">
        <input type="hidden" name="id" value="<?php echo $profil->get_id() ?>"/>
        <label for="ime" class="naslov">Ime: </label>
        <input id="ime" name="ime" type="text" class="ime ml-auto" value="<?php echo $profil->get_ime(); ?>" />
        <button type="submit" name="izmeni_ime">
            <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 9.4L0 5.4L1.4 4L4 6.6L10.6 0L12 1.4L4 9.4Z" fill="black" />
            </svg>
        </button>
    </form>
    <form action="profil.php">
        <input type="hidden" name="id" value="<?php echo $profil->get_id() ?>"/>
        <label for="prezime" class="naslov">Prezime: </label>
        <input id="prezime" name="prezime" type="text" class="prezime ml-auto" value="<?php echo $profil->get_prezime(); ?>" />
        <button type="submit" name="izmeni_prezime">
            <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 9.4L0 5.4L1.4 4L4 6.6L10.6 0L12 1.4L4 9.4Z" fill="black" />
            </svg>
        </button>
    </form>
    <form action="profil.php">
        <input type="hidden" name="id" value="<?php echo $profil->get_id() ?>"/>
        <label for="username" class="naslov">Username: </label>
        <input id="username" name="username" type="text" class="username ml-auto" value="<?php echo $profil->get_username(); ?>" />
        <button type="submit" name="izmeni_username">
            <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 9.4L0 5.4L1.4 4L4 6.6L10.6 0L12 1.4L4 9.4Z" fill="black" />
            </svg>
        </button>
    </form>
    <form action="profil.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $profil->get_id() ?>"/>
        <label for="email" class="naslov">E-mail: </label>
        <input id="email" name="email" type="text" class="email ml-auto" value="<?php echo $profil->get_email(); ?>" />
        <button type="submit" name="izmeni_email">
            <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 9.4L0 5.4L1.4 4L4 6.6L10.6 0L12 1.4L4 9.4Z" fill="black" />
            </svg>
        </button>
    </form>
    <form action="profil.php">
        <input type="hidden" name="id" value="<?php echo $profil->get_id() ?>"/>
        <label for="telefon" class="naslov">Telefon: </label>
        <input id="telefon" name="telefon" type="text" class="telefon ml-auto" value="<?php echo $profil->get_telefon(); ?>" />
        <button type="submit" name="izmeni_telefon">
            <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 9.4L0 5.4L1.4 4L4 6.6L10.6 0L12 1.4L4 9.4Z" fill="black" />
            </svg>
        </button>
    </form>
    <form action="profil.php" class="izmeni-lozinku" method="POST">
        <input type="hidden" name="id" value="<?php echo $profil->get_id() ?>"/>
        <label for="password" class="naslov">Izmeni lozinku:</label>
        <div class="flex flex-col gap-3">
            <input class="lozinka" name="password" id="password" type="password" placeholder="Lozinka">
            <input class="lozinka" name="repassword" type="password" placeholder="Ponovi lozinku">
        </div>
        <button type="submit" name="izmeni_lozinku">
            <svg width="12" height="10" viewBox="0 0 12 10" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M4 9.4L0 5.4L1.4 4L4 6.6L10.6 0L12 1.4L4 9.4Z" fill="black" />
            </svg>
        </button>
    </form>
</div>