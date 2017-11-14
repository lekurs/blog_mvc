<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 12/11/2017
 * Time: 14:05
 */
session_start();
$title = 'Administration / gestion des messages signalés ';

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
                <div class="admin-chapters">
                    <h3>Messages signalés</h3>
                    <?php
                    foreach ($report as $chapter)
                    {
                        ?>

                        <table class="admin-comments-table">
                            <thead>
                            <tr>
                                <th class="admin-number-comment-table">Chapitre</th>
                                <th class="admin-comment">Message</th>
                                <th class="admin-comment-update">Modif</th>
                                <th class="admin-comment-delete">Suppr</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="inter-chapter-table">
                                <td class="admin-number-comment-table"><?php echo $chapter['title']; ?></td>
                                <td class="admin-comment"><?php echo $chapter['comments'] ;?></td>
                                <td class="admin-comment-update"><a href="index.php?action=updatecomm&amp;comm=<?php echo $chapter['commentsId']; ?>"><i class="fa fa-pencil popin-comment"></i></a></td>
                                <td class="admin-comment-delete"><a href="index.php?action=delcomm&amp;comm=<?= $chapter['commentsId'];?>"><i class="fa fa-trash"></i></a></td>
                            </tr>
                            </tbody>
                        </table>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

$content = ob_get_clean();

require('app/views/tpl/front_tpl.php');

?>