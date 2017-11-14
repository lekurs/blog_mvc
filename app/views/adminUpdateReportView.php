<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 12/11/2017
 * Time: 14:16
 */

session_start();
$title = 'Modification du commentaire N° ' . $_GET['comm'];
ob_start();

?>
<section>
    <div class="admin-container">
        <div class="menus">
            <?php
            foreach($menu as $menus)
            {
                ?>
                <p><a href="<?php echo $menus['lien']; ?>" class="menus-btn"><?php echo $menus['menus']; ?></a></p>
                <?php
            }
            ?>
        </div>
        <div class="admin">
            <h2>Bienvenue dans l'administration du blog</h2>
            <div class="recap-admin">
                <h3>Messages signalés</h3>
                <?php
                foreach ($comment as $comments)
                {
                    ?>
                    <form action="index.php?action=updatecomm&amp;comm=<?= $comments['id_comments'];?>" method="post">
                        <textarea id="comments_area" name="comments_area"><?= $comments['comments']; ?></textarea>
                        <p><input type="submit" value="Mettre à jour" class="sub-btn"></p>
                    </form>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
</section>

<?php

$content = ob_get_clean();

require('app/views/tpl/front_tpl.php');

?>
