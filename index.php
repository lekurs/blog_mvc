<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 10/11/2017
 * Time: 11:21
 */

require ('app/controllers/chapters.php');
require ('app/controllers/login.php');
require ('app/controllers/chapter.php');
require ('app/controllers/admin.php');

try{
    if(isset($_GET['action'])) {
        if ($_GET['action'] == 'listChapters') {
            listChapters();
        }
        elseif ($_GET['action'] == 'listChapter') {
            if (isset($_GET['c'])) {
                listChapter();
            }
        }
        elseif ($_GET['action'] == 'suscribe') {
            if (!empty($_POST['email_suscribe']) && !empty($_POST['password']) && !empty($_POST['username'])) {
                suscribe($_POST['email_suscribe'], $_POST['password'], $_POST['username']);
            }
        }
        elseif ($_GET['action'] == 'logok') {
            echo $_POST['pass'];
            if (!empty($_POST['email']) && !empty($_POST['pass'])) {
                $email = htmlspecialchars(strtolower($_POST['email']));
                $pass = htmlspecialchars($_POST['pass']);
                $passHash = htmlspecialchars(password_hash($_POST['pass'], PASSWORD_DEFAULT));
                login($email, $pass);
            }
        }
        elseif ($_GET['action'] == 'register') {
            if (isset($_POST['email_suscribe']) && isset($_POST['login']) && isset($_POST['password']) && !empty($_POST['login']) && !empty($_POST['password']) && !empty($_POST['email_suscribe'])) {
                $username = htmlspecialchars($_POST['login']);
                $password = htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT));
                $email = htmlspecialchars(strtolower($_POST['email_suscribe']));
                $role = 2;

                suscribeUser($username, $password, $email, $role);
            }
        }
        elseif($_GET['action'] == 'dc' && $_GET['dc'] == 'ok')
        {
            logOut();
        }
        elseif($_GET['action'] == 'updateUser')
        {
            updateUser();

            if(isset($_GET['u']) && !empty($_GET['u']))
            {
                $userId = htmlspecialchars($_GET['u']);
                updateRankUser($userId);
            }
        }
        elseif ($_GET['action'] == 'shwcha') {
            if (isset($_GET['c']) && !empty($_GET['c'])) {
                $chapter = htmlspecialchars($_GET['c']);

                showChapter($chapter);
            }
        }
        elseif ($_GET['action'] == 'postcomm')
        {
            if(isset($_GET['c']) && !empty($_GET['c']))
            {
                if(isset($_POST['chapterId']) && !empty($_POST['chapterId']) && isset($_POST['sessionId']) && !empty($_POST['sessionId']) && isset($_POST['post_commentaire']) && !empty($_POST['post_commentaire']))
                {
                    $chapterId = htmlspecialchars($_POST['chapterId']);
                    $comment = $_POST['post_commentaire'];
                    $userId = htmlspecialchars($_POST['sessionId']);

                    postNewComment($comment, $userId, $chapterId);
                }
            }
        }
        elseif ($_GET['action'] == 'admin') {
            adminIndex();

            if(isset($_GET['del']) && !empty($_GET['del']))
            {
                $chapterId = htmlspecialchars($_GET['del']);
                adminDelChapter($chapterId);
            }
        }
        elseif ($_GET['action'] == 'adminreport') {
            adminReport();
        }
        elseif ($_GET['action'] == 'updatecomm') {
            if (isset($_GET['comm']))
                adminGetComment(htmlspecialchars($_GET['comm']));
            if (isset($_POST['comments_area']) && !empty($_POST['comments_area'])) {
                adminUpdateComment(htmlspecialchars($_POST['comments_area']));
            }
        }
        elseif ($_GET['action'] == 'delcomm') {
            if (isset($_GET['comm'])) {
                adminDelComm(htmlspecialchars($_GET['comm']));
            }
        }
        elseif ($_GET['action'] == 'adminpost') {
            adminPostChapter();
            if (isset($_GET['post']) && $_GET['post'] == 'ok') {
                if (isset($_POST['title']) && isset($_POST['chapitre_area']) && !empty($_POST['title']) && !empty($_POST['chapitre_area'])) {
                    $title = htmlspecialchars($_POST['title']);
                    $content = $_POST['chapitre_area'];
                    if (isset($_POST['online']) && $_POST['online'] == "online") {
                        $online = 1;
                    } else {
                        $online = 0;
                    }
                    postNewChapter($title, $content, $online);
                }
            }
        }
        elseif ($_GET['action'] == 'adminupdatepost') {
            if (isset($_GET['c']) && !empty($_GET['c'])) {
                $chapterId = htmlspecialchars($_GET['c']);
                updateChapter($chapterId);
            }

            if (isset($_GET['up']) && $_GET['up'] == 'ok') {
                if (isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['chapitre_area']) && !empty($_POST['chapitre_area'])) {
                    if (isset($_POST['online']) && $_POST['online'] == "online") {
                        $online = 1;
                    } else {
                        $online = 0;
                    }

                    $title = htmlspecialchars($_POST['title']);
                    $chapter = $_POST['chapitre_area'];
                    $chapterId = htmlspecialchars($_POST['idChapter']);

                    adminUpdateChapter($title, $chapter, $online, $chapterId);
                }
            }
        }
        elseif ($_GET['action'] == 'adminuser')
        {
            updateUser();
        }
        elseif ($_GET['action'] == 'forget')
        {
            forgetPassword();

            if(isset($_POST['email_forget']) && !empty($_POST['email_forget']))
            {
                $email = htmlspecialchars($_POST['email_forget']);
                forgetPass($email);
            }
        }
    }
    else {
        listChapters();
    }
}
catch (Exception $e)
{
    echo 'Erreur : ' . $e->getMessage();
}