<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 10/11/2017
 * Time: 11:49
 */



function logUser($email, $pass)
{
    $db = connect_db();
    $login = $db->prepare('SELECT * FROM user where email = :email');
    $login->execute(array(
        'email' => $email
    ));

    if($login->rowCount() != 0)
    {
        $log = $login->fetch();
        $passDb = $log['password'];

        if(password_verify($pass, $passDb))
        {
            session_start();
            $_SESSION['login'] = $log['username'];
            $_SESSION['email']= $log['email'];
            $_SESSION['id'] = $log['id_user'];
            $_SESSION['rank'] = $log['role'];

            setcookie('login', $_SESSION['email'], time() + 365*24*3600, null, null, false, true);
        }
    }
}

function dcUser()
{
    session_start();
    session_destroy();
    header('Location: index.php?dc=ok');
}



function suscribe($username, $password, $email, $role)
{
    $db = connect_db();

    $addUser = $db->prepare('INSERT INTO user (username, password, email, role) VALUES (:username, :password, :email, :role)');
    $addUser->execute(array(
            'username' => $username,
            'password' => $password,
            'email' => $email,
            'role' => $role
        ));
        return $addUser;
}

function getMaxUsers()
{
    $db = connect_db();
    $user = $db->query('SELECT * FROM user');

    $countUser = $user->rowCount();

    return $countUser;
}

function getLastUser()
{
    $db = connect_db();

    $lastUser = $db->query('SELECT * FROM user ORDER BY id_user DESC LIMIT 0,1');

    while ($last = $lastUser->fetch())
    {
        echo $last['username'];
    }
}

function updateRank($userId)
{
    $db = connect_db();
    $update = $db->prepare('UPDATE user SET role WHERE id_user = :userId');
    $updateOk = $update->execute(array('userId' => $userId));

    return $updateOk;

    $update->closeCursor();
}

function getAllUsers()
{
    $db = connect_db();
    $users = $db->query('SELECT u.id_user AS id_user, u.username AS username, u.email AS email, u.role AS roleId, r.id as idRole, r.role AS role FROM role r INNER JOIN user u WHERE r.id = u.role ORDER BY role ASC');
    $allUsers = $users->fetchAll();

    return $allUsers;

    $users->closeCursor();
}

function getAllUsersByRank($rankId)
{
    $db = connect_db();
    $users = $db->prepare('SELECT * FROM user WHERE role = :rankId');
    $users->execute(array('rankid' => $rankId));
    $usersByRank = $users->fetchAll();

    return $usersByRank;
}

function getRanks()
{
    $db = connect_db();
    $ranks = $db->query('SELECT * FROM role ORDER BY role');
    $allRanks = $ranks->fetchAll();

    return $allRanks;

    $ranks->closeCursor();
}

function forgetPass($emailUser)
{
    $db = connect_db();
    $mail = $db->prepare('SELECT * FROM user WHERE email = :email');
    $mail->execute(array('email' => $emailUser));
    $getEmail = $mail->fetchAll();

    return $getEmail;

}