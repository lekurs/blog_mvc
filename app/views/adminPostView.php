<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 13/11/2017
 * Time: 09:39
 */
session_start();
$title = 'Administration - Poster un nouveau chapitre';

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
            <h2>Votre nouveau chapitre</h2>
            <form action="index.php?action=adminpost&amp;post=ok" method="post">
                <input type="text" name="title" id="title" placeholder="Titre :" />
                <textarea id="chapitre_area" name="chapitre_area" placeholder="Votre texte"></textarea>
                <div class="check">
                    <div><p>Souhaitez vous mettre en ligne ce chapitre ?</p></div>
                    <div class="contain-checkbox">
                        <label class="switch">
                            <input type="checkbox" value="online" name="online" id="online" />
                            <div class="slider round"></label>
                    </div>
                </div>


        </div>
        <p>
            <input type="submit" value="Enregistrer" name="reccord_chapter" id="reccord_chapter" class="sub-btn">
        </p>
        </form>
    </div>
    </div>
</section>
<?php
$content = ob_get_clean();
require ('app/views/tpl/front_tpl.php');
?>
