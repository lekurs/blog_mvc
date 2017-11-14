<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 10/11/2017
 * Time: 10:41
 */
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link href="assets/css/bootstap.css" rel="stylesheet" />
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,300,700,900" rel="stylesheet">
    <link href="assets/css/font-awesome.min.css" rel="stylesheet">
    <script type="text/javascript" src ='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script type="text/javascript">
        tinymce.init({
            selector: '#chapitre_area',
            theme: 'modern',
            height: 300,
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor'
            ],
            content_css: 'assets/css/style.css',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
        });

        tinymce.init({
            selector: '#comments_area',
            theme: 'modern',
            height: 300,
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor'
            ],
            content_css: 'assets/css/style.css',
            toolbar: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image | print preview media fullpage | forecolor backcolor emoticons'
        });
    </script>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Si icone -->
    <link rel="icon" type="image/ico" href="images/velo.ico" />
    <!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="images/velo-marqueur.png" /><!-->

    <!-- Création des metatags réseaux sociaux -->

    <!-- Metatags FB -->
    <meta property="og:title" content="Blog" />
    <meta property="og:type" content="Blog" />
    <meta property="og:url" content="www.mclwebservices.com/alaska" />
    <meta property="og:description" content="Bienvenue sur le site de location de vélo - VELIB - PARIS" />
    <meta property="og:image" content="images/velib-slider-4.jpg" />

    <!-- Metatag Twitter -->
    <meta name="twitter:card" content="Blog" />
    <meta name="twitter:tittle" content="Blog" />
    <meta name="twitter:description" content="Billet simple pour l'Alaska - Jean FORTEROCHE" />
    <title><?= $title; ?></title>
</head>
<body>
    <div class="container">
        <header>
            <div class="head-contain">
                <h1 id="image-title"><a href="index.php"><img src="assets/images/header_image_2.jpg"></a></h1>
                <div class="connexion-container">
                    <?php
                    if(isset($_SESSION['login']))
                    {
                        ?>
                        <p class="login-name">Bienvenue à
                            <?php
                                 if(isset($_SESSION['rank']) and $_SESSION['rank'] == 1)
                                {
                            ?>
                                <a href="index.php?action=admin"><?php echo $_SESSION['login'];?></a>
                            <?php
                                }
                            else
                                {
                                    echo $_SESSION['login'];
                                 }
                            ?>
                        </p>
                        <p class="badge-comment"><a href="index.php?action=adminreport" class="btn-badge-comment"><span class="nb-comments"><?= $getReports; ?></span> </a> </p>
                        <p class="disconnect"><a href="index.php?action=dc&amp;dc=ok"><i class="fa fa-times-circle"></i></a></p>
                        <?php
                    }
                    else
                    {
                        ?>
                        <p class="sapin"><img src="assets/images/sapin.png" alt="sapin" /></p>
                        <p class="connection">Connection</p>
                        <p class="inscription">Inscription</p>

                        <?php
                    }
                    ?>
                </div>
                <div id="login-form">
                    <form id="login_form" action="index.php?action=logok" method="post">
                        <div id="form">
                            <p class="logo-login"><i class="fa fa-envelope" id="envelope-login"></i> <input type="email" name="email" id="email" placeholder="Email" /><span class="close-form"  id="close"><i class="fa fa-times-circle fa-2x"></i></span></p>
                            <p class="logo-password"><i class="fa fa-lock"></i> <input type="password" placeholder="password" name="pass" id="password" /></p>
                            <p id="submit-suscribe"><input name="submit_log" id="submit" type="submit" value=""><i class="fa fa-arrow-right"></i></p>
                            <p id="password_forget"><a href="index.php?action=forget">Mot de passe oublié ?</a></p>
                        </div>
                    </form>
                </div>
                <div id="suscribe-formulaire">
                    <form id="suscribe-form" action="index.php?action=register" method="post">
                        <div id="form">
                            <p class="logo-email"><i class="fa fa-envelope" id="envelope-suscribe"></i>
                                <span class="close-form"  id="close"><i class="fa fa-times-circle fa-2x"></i></span>
                                <span class="check_ok"></span>
                                <span class="regex-mail"></span>
                                <span class="regex-mail-valide"></span>
                                <input type="email" placeholder="email@email.com" id="email_suscribe" name="email_suscribe"></p>
                            <p class="logo-password"><i class="fa fa-lock"></i>
                                <span class="regex-password"></span>
                                <input type="password" placeholder="password" name="password" id="password_suscribe" />
                            </p>
                            <p class="logo-login"><i class="fa fa-user"></i> <input type="text" name="login" id="login" placeholder="Pseudo" /></p>
                            <p id="submit-suscribe-ko"><span class="check_ko"></span></p>
                            <p id="submit-suscribe-ok"><input name="submit" id="submit_suscribe_btn" type="submit" value=""  disabled><i class="fa fa-arrow-right"></i></p>
                        </div>
                    </form>
                </div>
                <p class="name">jean forteroche</p>
        </header>


            <?= $content; ?>


        <footer>
            <div class="footer-contain">
                <div class="recap-site">
                    <p class="tree"></p>
                    <div id="author">
                        <p>Billet simple pour l'Alaska </p>
                        <p>jean forteroche</p>
                    </div>
                </div>
                <div class="social">
                    <p>Suivez moi</p>
                    <div class="social-logo">
                        <p><i class="fa fa-twitter"></i> </p>
                        <p><i class="fa fa-google-plus"></i> </p>
                        <p><i class="fa fa-facebook-official"></i></p>
                        <p><i class="fa fa-instagram"></i></p>
                    </div>
                    <div class="contact">
                        <p><i class="fa fa-envelope contact-footer"></i></p>
                        <p>contactez moi</p>
                    </div>
                    <p>Copyright</p>
                </div>
            </div>
        </footer>
    </div>
<script src="assets/js/jquery.js"></script>
<script src="assets/js/suscribe.js"></script>
<script src="assets/js/login.js"></script>
<script src="assets/js/check_login.js"></script>
<script src="assets/js/inscription.js"></script>
<script src="assets/js/reportAjax.js"></script>
<script src="assets/js/admin.js"></script>
<script src="assets/js/forget_password.js"></script>
</body>
</html>