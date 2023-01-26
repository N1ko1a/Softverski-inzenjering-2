<?php
require_once $_SERVER["DOCUMENT_ROOT"] . "/../src/modules/Pretraga_u_href.php";
?>
<div class="hidden" id="modal">
    <div class="container">
        <h1>Izaberi sacuvanu pretragu</h1>
        <?php
        for ($i = 0; $i < count($pretrage); $i++) {
            $puh = new Pretraga_u_href($pretrage[$i]);

        ?>
            <div class="flex mx-auto">
                <a href="<?php echo $puh->get_href(); ?>">Pretraga <?php echo $pretrage[$i]->getId(); ?></a>
                <a href="uklonipretragu.php?id=<?php echo $pretrage[$i]->getId(); ?>" style="color: red;">
                    <svg width="14" height="18" viewBox="0 0 14 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14 1H10.5L9.5 0H4.5L3.5 1H0V3H14M1 16C1 16.5304 1.21071 17.0391 1.58579 17.4142C1.96086 17.7893 2.46957 18 3 18H11C11.5304 18 12.0391 17.7893 12.4142 17.4142C12.7893 17.0391 13 16.5304 13 16V4H1V16Z" fill="red" />
                    </svg>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<script defer src="javascript/modal.js"></script>