<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 10/11/2017
 * Time: 11:49
 */
require ('app/models/userLogin_model.php');

function login($email, $pass)
{
    $user = logUser($email, $pass);

    header('Location: index.php');
}

function suscribeUser($email, $pass, $login, $role)
{
    $emailRegex = $email;
    $patternEmail = '/.+@.+\..+/';
    $passRegex = $pass;
    $patterPass = '/^[A-Z?!\/\\:;.,§&é"\'(-è_çà)=+\d]+.[a-zA-Z?!\/\\:;.,§&é"\'(-è_çà)=+]+.\d\S/';

    if(!preg_match($patternEmail, $emailRegex, $matches) && !preg_match($patterPass, $passRegex, $matchesTwo))
    {
        echo "test2";
        $addUser = suscribe($email, $pass, $login, $role);
        if($addUser === false) {
            die('Impossible d\'ajouter cet utilisateur');
        }
        else {
            header('Location: index.php');
        }
    }
}

function logOut()
{
    $disconnect = dcUser();
}

function updateRankUser($userId)
{
    $updateOk = updateRank($userId);

    if($updateOk == false)
    {
        die('Impossible de mettre à jour l\'utilisateur');
    }
    else {
        header('Location:index.php?action=updateUser');
    }
}

function updateUser()
{
    $menu = getMenus();
    $ranks = getRanks();
    $users = getAllUsers();
//    $userByRank = getAllUsersByRank($rankid);
    require ('app/views/adminUsers.php');
}

function forgetPassword()
{
    require ('app/views/forgetPassView.php');
}

function forgetPassSend($email)
{
    forgetPass($email);

    foreach ($email as $mail)
    {
        $emailForget = $mail['email'];
         $to = $emailForget;
    $subject = 'Mot de passe oublié - Billet pour l\'Alaska';
    $message = '
    <html>
        <head>
            <title>Mot de passe oublié</title>
        </head>
        <body>
            <p>Bonjour, veuillez cliquez sur le lien ci-dessous pour changer votre mot de passe</p>
            <p><a href="localhost/blog_mvc/index.php?action=getchangepass">Changez mon mot de passe</a></p>
        </body>
    </html>';

    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

    mail($to, $subject, $message, $headers);
    }
}