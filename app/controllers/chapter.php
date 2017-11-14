<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 10/11/2017
 * Time: 14:30
 */


function showChapter($chapter)
{
    $showChapter = getChapter($chapter);
    $nb_comment = nb_comment($chapter);
    $comm = getComments($chapter);
    $getReports = countReportTotal();

    require ('app/views/showChapterView.php');
}

function postNewComment($content, $user, $chapterId)
{
    $newComment = postComm($content, $user, $chapterId);
    header('Location: index.php?admin');
}
