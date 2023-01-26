<h1 style="text-align: center; margin: 40px 0 20px 0;">Korisnici</h1>
<ul class="korisnici">
    <li class="naslovi">
        <div>
            Ime
        </div>
        <div>
            Username
        </div>
        <div>
            E-mail
        </div>
        <div>
            Rola
        </div>
        <div>
            Telefon
        </div>
        <div>
            Verifikovan
        </div>
    </li>
    <?php
    for ($i = 0; $i < count($korisnici); $i++) {
    ?>
        <li>
            <div class="ime">
                <span class="inline-naslov">Ime: </span>
                <?php
                echo $korisnici[$i]->get_ime() . " " . $korisnici[$i]->get_prezime();
                ?>
                <a href="profil.php?id=<?php echo $korisnici[$i]->get_id() ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.3 8.925L15.05 4.725L16.45 3.325C16.8333 2.94167 17.3043 2.75 17.863 2.75C18.421 2.75 18.8917 2.94167 19.275 3.325L20.675 4.725C21.0583 5.10833 21.2583 5.571 21.275 6.113C21.2917 6.65433 21.1083 7.11667 20.725 7.5L19.3 8.925ZM17.85 10.4L7.25 21H3V16.75L13.6 6.15L17.85 10.4Z" fill="black" />
                    </svg>
                </a>
            </div>
            <div class="username">
                <span class="inline-naslov">Username: </span>
                <?php
                echo $korisnici[$i]->get_username();
                ?>
                <a href="profil.php?id=<?php echo $korisnici[$i]->get_id() ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.3 8.925L15.05 4.725L16.45 3.325C16.8333 2.94167 17.3043 2.75 17.863 2.75C18.421 2.75 18.8917 2.94167 19.275 3.325L20.675 4.725C21.0583 5.10833 21.2583 5.571 21.275 6.113C21.2917 6.65433 21.1083 7.11667 20.725 7.5L19.3 8.925ZM17.85 10.4L7.25 21H3V16.75L13.6 6.15L17.85 10.4Z" fill="black" />
                    </svg>
                </a>
            </div>
            <div class="email">
                <span class="inline-naslov">E-mail: </span>
                <?php
                echo $korisnici[$i]->get_email();
                ?>
                <a href="profil.php?id=<?php echo $korisnici[$i]->get_id() ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.3 8.925L15.05 4.725L16.45 3.325C16.8333 2.94167 17.3043 2.75 17.863 2.75C18.421 2.75 18.8917 2.94167 19.275 3.325L20.675 4.725C21.0583 5.10833 21.2583 5.571 21.275 6.113C21.2917 6.65433 21.1083 7.11667 20.725 7.5L19.3 8.925ZM17.85 10.4L7.25 21H3V16.75L13.6 6.15L17.85 10.4Z" fill="black" />
                    </svg>
                </a>
            </div>
            <div class="rola">
                <span class="inline-naslov">Rola: </span>
                <?php
                // ako je 1 onda admin, ako je 0 onda korisnik
                echo $korisnici[$i]->get_rola() == 1 ? "admin" : "korisnik";
                ?>
                <a href="admin.php?promenirole&id=<?php echo $korisnici[$i]->get_id(); ?>">
                    <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 1L17 5M17 5L13 9M17 5H7M5 11L1 15M1 15L5 19M1 15H10" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
            <div class="telefon">
                <span class="inline-naslov">Telefon: </span>
                <?php
                echo $korisnici[$i]->get_telefon();
                ?>
                <a href="profil.php?id=<?php echo $korisnici[$i]->get_id() ?>">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M19.3 8.925L15.05 4.725L16.45 3.325C16.8333 2.94167 17.3043 2.75 17.863 2.75C18.421 2.75 18.8917 2.94167 19.275 3.325L20.675 4.725C21.0583 5.10833 21.2583 5.571 21.275 6.113C21.2917 6.65433 21.1083 7.11667 20.725 7.5L19.3 8.925ZM17.85 10.4L7.25 21H3V16.75L13.6 6.15L17.85 10.4Z" fill="black" />
                    </svg>
                </a>
            </div>
            <div class="verifikovan">
                <span class="inline-naslov">Verifikovan: </span>
                <?php
                echo $korisnici[$i]->get_verifikovan() == 1 ? "verifikovan" : "nije verifikovan";
                ?>
                <a href="admin.php?promeniverifikaciju&id=<?php echo $korisnici[$i]->get_id(); ?>">
                    <svg width="18" height="20" viewBox="0 0 18 20" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M13 1L17 5M17 5L13 9M17 5H7M5 11L1 15M1 15L5 19M1 15H10" stroke="black" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                    </svg>
                </a>
            </div>
        </li>
    <?php } ?>
</ul>