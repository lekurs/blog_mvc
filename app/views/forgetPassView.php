<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 13/11/2017
 * Time: 13:36
 */

$title = 'Mot de passe oublié';

ob_start();
?>

<section>
  <form action="index.php?action=forget&amp;pass=forget" method="post">
      <p id="input_forget_pass"><input type="email" name="email_forget" id="email_forget" placeholder="Tapez votre email" /><span id="forget_pass_hide"></span></p>
      <p><input type="submit" value="Envoyez" class="sub-btn"></p>
  </form>
</section>

<?php
$content = ob_get_clean();

require ('app/views/tpl/front_tpl.php');
?>
