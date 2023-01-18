<div class="naj2">
    <h2>NAJNOVIJI OGLASI</h2>
</div>
<div class="naj2-oglasi">
    <?php
    for ($i = 0; $i < count($vozila); $i++) {
        $oglas = $vozila[$i];

        $imgPath = "slike/" . $oglas->getFotografije() . "/";
        $dir = scandir($imgPath);
        $img = $imgPath . $dir[2];
    ?>
        <div class="oglas">
            <img src="<?php echo $img ?>" alt="nema">
            <p><?php echo $oglas->getModel(); ?></p>
            <p><?php echo $oglas->getCena(); ?>e</p>
        </div>
    <?php
    }
    ?>
</div>