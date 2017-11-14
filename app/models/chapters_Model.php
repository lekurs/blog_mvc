<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 10/11/2017
 * Time: 11:05
 */

require ('db_connect_Model.php');


function getChapters()
{
    $db = connect_db();
    $req = $db->query('SELECT id_chapter, title, chapter, DATE_FORMAT(create_date, \'%d/%M/%Y\') AS date_creation FROM chapter where online = 1');
    $chapters = $req->fetchAll();
    return $chapters;

    $req->closeCursor();
}

function getChapter($chapter)
{
    $db = connect_db();
    $data = $db->prepare('SELECT id_chapter, title, chapter, DATE_FORMAT(create_date, \'%d/%M/%Y\') AS date_creation FROM chapter WHERE id_chapter = :chapter');
    $data->execute(array('chapter' => $chapter));
    $tabChapter = $data->fetchAll();

    return $tabChapter;

    $data->closeCursor();
}

function countChapter()
{
    $db = connect_db();
    $chapters = $db->query('SELECT id_chapter, title, chapter, DATE_FORMAT(create_date, \'%d/%m/%Y\') AS date_creation FROM chapter where online = 1');
    $countChapter = $chapters->rowCount();

    return$countChapter;
}

function chapterOffline()
{
    $db = connect_db();
    $chapter = $db->query('SELECT id_chapter, title, chapter, DATE_FORMAT(create_date, \'%d/%m/%Y\') AS date_creation FROM chapter where online = 0');
    $chapters = $chapter->fetchAll();

    return $chapters;

    $chapter->closeCursor();
}

function delChapter($chapter)
{
    $db = connect_db();

    $del = $db->prepare('DELETE FROM chapter WHERE id_chapter = :chapter');
    $del->execute(array('chapter' => $chapter));

    $del->closeCursor();
}


function insertPost($title, $chapter, $online)
{
    $db = connect_db();
    $insert = $db->prepare('INSERT INTO chapter (title, chapter, create_date, online) VALUES (:title, :chapter, NOW(), :online)');
    $insert->execute(array(
        'title' => $title,
        'chapter' => $chapter,
        'online' => $online
    ));

    $insert->closeCursor();
}

function updatePost($title, $chapter, $online, $chapterId)
{
     $db = connect_db();
    $update = $db->prepare('UPDATE chapter SET title = :title, chapter = :chapter, create_date =NOW(), online = :online WHERE id_chapter = :chapterId');
    $update->execute(array(
        'title' => $title,
        'chapter' => $chapter,
        'online' => $online,
        'chapterId' => $chapterId
    ));
    $update->closeCursor();
}