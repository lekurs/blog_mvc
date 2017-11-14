<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 10/11/2017
 * Time: 15:04
 */


function getComments($chapter)
{
    $db = connect_db();
    $req = $db->prepare('SELECT c.id_comments AS id_comments, c.comments AS comments, c.report AS report, c.user_id AS user_id, c.chapter_id AS chapter_id, u.id_user AS id_user, u.username AS username FROM comments AS c INNER JOIN  user AS u ON c.user_id = u.id_user WHERE c.chapter_id = :chapter');
    $req->execute(array('chapter' => $chapter));
    $comments = $req->fetchAll();

    return $comments;
}

function getComment()
{
    if(isset($_GET['comm']) && !empty($_GET['comm']))
    {
        $commId = htmlspecialchars($_GET['comm']);
        $db = connect_db();

        $comm = $db->prepare('SELECT * FROM comments WHERE id_comments = :idComm');
        $comm->execute(array('idComm' => $commId));

        return $comm;
    }
}

function nb_comment($chapter) {
    $db = connect_db();

    $nb_comments = $db->prepare('SELECT * FROM comments WHERE chapter_id = ' . $chapter);
    $nb_comments->execute(array($chapter));

    $count_comment = $nb_comments->rowCount();

    return $count_comment;
}

function countReportTotal()
{
    $db = connect_db();
    $report = $db->query('SELECT ch.id_chapter AS idChapter,  comm.chapter_id AS chapterId, ch.title AS title FROM comments comm INNER JOIN chapter ch ON ch.id_chapter = comm.chapter_id WHERE comm.report = 1');

    $countReport = $report->rowCount();

    return $countReport;
}

function countReportByChapter($chapter)
{
    $db = connect_db();
    $report = $db->query('SELECT ch.id_chapter AS idChapter,  comm.chapter_id AS chapterId FROM comments comm INNER JOIN chapter ch ON ch.id_chapter = comm.chapter_id WHERE comm.report = 1 AND ch.id_chapter =' .$chapter);

    $countReport = $report->rowCount();

    return $countReport;
}

function getAllReportByChapter()
{
    $db = connect_db();

    $report = $db->query('SELECT ch.id_chapter AS idChapter,  comm.chapter_id AS chapterId, comm.id_comments AS commentsId, ch.title AS title, comm.comments, comm.user_id FROM comments comm INNER JOIN chapter ch ON ch.id_chapter = comm.chapter_id WHERE comm.report = 1 ORDER BY  comm.chapter_id ');
    $tabReport = $report->fetchAll();
    return $tabReport;
}

function postComm($comment, $userId, $chapterId)
{
    $db = connect_db();

    $comm = $db->prepare('INSERT INTO comments (comments, user_id, chapter_id) VALUES (:comments, :userId, :chapterId)');
    $comm->execute(array(
        'comments' => $comment,
        'userId' => $userId,
        'chapterId' => $chapterId
    ));
}


function updateComment($idComment, $comment)
{
        $db = connect_db();
        $commUpdate = $db->prepare('UPDATE comments SET comments = :comment, report = 0 WHERE id_comments = :idComment');
        $commUpdate->execute(array('comment' => $comment, 'idComment' => $idComment));

}

function deleteComment($idComment)
{
    $db = connect_db();
    $del = $db->prepare('DELETE FROM comments WHERE id_comments = :idComment');
    $del->execute(array('idComment' => $idComment));
}