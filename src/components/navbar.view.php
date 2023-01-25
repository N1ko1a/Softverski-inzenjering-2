<body>
    <header>
        <a href="/"><img src="slike/logo.jpg" alt="Logo polovnjaci RTSI"></a>
        <nav>
            <ul>
                <li>
                    <a href="login.php">
                        <?php 
                        if (isset($_SESSION["auth"]))
                            echo "ODJAVI SE";
                        else
                            echo "PRIJAVI SE"; ?>
                    </a>
                </li>
                <?php
                if (!isset($_SESSION["auth"])) {
                ?>
                <li>
                    <a href="register.php">REGISTRUJ SE</a>
                </li>
                <li>
                    <a href="login.php">POSTAVI OGLAS</a>
                </li>
                <?php
                } else {
                ?>
                <li>
                    <a href="novioglas.php">POSTAVI OGLAS</a>
                </li>
                <?php } ?>
            </ul>
        </nav>
    </header>
