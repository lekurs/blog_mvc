<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 12/11/2017
 * Time: 13:37
 */
session_start();

$title = 'Administration - Blog Billet pour l\'Alaska';

ob_start();
?>
<section>
    <div class="admin-container">
        <div class="menus">
            <?php
                foreach($menu as $menus)
                {
            ?>
                <p><a href="<?= $menus['lien']; ?>" class="menus-btn"><?= $menus['menus']; ?></a></p>
            <?php
                }
            ?>
        </div>
        <div class="admin">
            <h2>Bienvenue dans l'administration du blog</h2>
            <div class="recap-admin">
                <div class="admin-chapters">
                    <h3>Vos chapitres diffusés</h3>
                    <div class="admin-chapters-post">
                        <table>
                            <thead>
                            <tr>
                                <th class="admin-title-chapter-table">Titre</th>
                                <th class="admin-resume-chapter-table">Résumé</th>
                                <th class="admin-comm-table"><i class="fa fa-commenting"></i></th>
                                <th class="admin-report-table"><i class="fa fa-commenting"></i>  <i class="fa fa-warning"></i> </th>
                                <th class="admin-chapter-update">Modif</th>
                                <th class="admin-chapter-delete">Suppr</th>
                            </tr>
                            </thead>
                            <?php
                            foreach($chapitre as $chapitres)
                            {
                                ?>
                                <tbody>
                                <tr class="inter-chapter-table">
                                    <td class="admin-title-chapter-table"><?php echo $chapitres['title']; ?></td>
                                    <td class="admin-resume-chapter-table"><?php echo nl2br(substr($chapitres['chapter'], 0, 200)); ?></td>
                                    <td class="admin-comm-table"><?php echo nb_comment($chapitres['id_chapter']);?></td>
                                    <td class="admin-report-table"><?php echo countReportByChapter($chapitres['id_chapter']); ?></td>
                                    <td class="admin-chapter-update"><a href="index.php?action=adminupdatepost&amp;c=<?php echo $chapitres['id_chapter']; ?>" ><i class="fa fa-pencil"></i></a></td>
                                    <td class="admin-chapter-delete"><a href="index.php?action=admin&amp;del=<?php echo $chapitres['id_chapter']; ?>"><i class="fa fa-trash"></i></a></td>
                                </tr>
                                </tbody>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                    <p>Total chapitres en ligne : <?php echo countChapter(); ?></p>
                    <p>Total messages signalés : <?php echo countReportTotal(); ?></p>
                </div>
                <div class="admin-chapter-offline">
                    <h3>Vos chapitres à finaliser</h3>
                    <div class="admin-chapters-offline">
                        <table>
                            <thead>
                            <tr>
                                <th class="admin-title-chapter-table">Titre</th>
                                <th class="admin-resume-chapter-table">Résumé</th>
                                <th class="admin-comm-table"><i class="fa fa-commenting"></i></th>
                                <th class="admin-report-table"><i class="fa fa-commenting"></i>  <i class="fa fa-warning"></i> </th>
                                <th class="admin-chapter-update">Modif</th>
                                <th class="admin-chapter-delete">Suppr</th>
                            </tr>
                            </thead>
                            <?php
                            foreach($chapterOffline as $chapitresOffline)
                            {
                                ?>
                                <tbody>
                                    <tr class="inter-chapter-table">
                                        <td class="admin-title-chapter-table"><?php echo $chapitresOffline['title']; ?></td>
                                        <td class="admin-resume-chapter-table"><?php echo substr($chapitresOffline['chapter'], 0, 200); ?></td>
                                        <td class="admin-comm-table"><?php echo nb_comment($chapitresOffline['id_chapter']);?></td>
                                        <td class="admin-report-table"><?php echo countReportByChapter($chapitresOffline['id_chapter']); ?></td>
                                        <td class="admin-chapter-update"><a href="index.php?action=adminupdatepost&amp;c=<?php echo $chapitresOffline['id_chapter']; ?>" ><i class="fa fa-pencil"></i></a></td>
                                        <td class="admin-chapter-delete"><a href="index.php?action=admin&amp;del=<?php echo $chapitres['id_chapter']; ?>"><i class="fa fa-trash"></i></a> </td>
                                    </tr>
                                </tbody>
                                <?php
                            }
                            ?>
                        </table>
                    </div>
                </div>
                <div class="admin-user">
                    <h3>Utilisateurs</h3>
                    <p>Dernier utilisateur enregistré : <?php echo getLastUser(); ?></p>
                    <p>Nombre d'utilisateurs : <?php echo getMaxUsers(); ?></p>
                </div>
            </div>
        </div>
    </div>
</section>
<?php

$content = ob_get_clean();

require ('app/views/tpl/front_tpl.php');
?>
