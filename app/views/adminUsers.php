<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 13/11/2017
 * Time: 11:47
 */

session_start();
$title = 'Administration des utilisateurs';

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
            <h2>Gestion des Utilisateurs</h2>
            <?php
            foreach($ranks as $rank)
            {
            ?>
                <div class="ranks">
                    <h3><?= $rank['role']; ?></h3>
            <?php
                foreach ($users as $user) {
            ?>
                    <div class="users"><span><?= $user['username']; ?></span> <span><?= $user['role']; ?></span></div>
            <?php
                }
            ?>
                </div>
            <?php
            }
                ?>
        </div>
    </div>
</section>
<?php
$content = ob_get_clean();
require ('app/views/tpl/front_tpl.php');
?>
