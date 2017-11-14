<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 10/11/2017
 * Time: 11:26
 */
session_start();
$title = 'Billet pour l\'Alaska - Jean Forteroche';

ob_start();

?>

<section>
    <?php
    foreach ($chapters as $chapter) {
        ?>
        <article>
            <div class="date_pastille">
                <div class="date_pastille_contain">
                    <p><?php echo substr($chapter['date_creation'], 0,2); ?></p>
                    <p><?php echo substr($chapter['date_creation'], 3,3); ?></p>
                </div>
            </div>
            <div class="chapitre-conteneur">
                <h2 class="titre_chapitre"><a href="index.php?action=shwcha&amp;c=<?php echo $chapter['id_chapter']; ?>"><?php echo $chapter['title']; ?></a></h2>
                <p class="contenu_chapitre"><?php echo substr($chapter['chapter'], 0, 600); ?></p>
                <?php
//                    nbComment($data['id_chapter']);
                ?>
                <p class="commentaires"><i class="fa fa-commenting"></i><span class="count_comment"><?php echo nbComment($chapter['id_chapter']); ?></span><span> Commentaires</span> </p>
            </div>
        </article>
        <?php
    }
    ?>
</section>

<?php
$content = ob_get_clean();

require ('app/views/tpl/front_tpl.php');
?>
