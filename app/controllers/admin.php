<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 12/11/2017
 * Time: 13:42
 */

require ('app/models/menus_Model.php');

function adminIndex()
{
    $menu = getMenus();
    $chapitre = getChapters();
    $chapterOffline = chapterOffline();
    $maxUser = getMaxUsers();
    $getReports = countReportTotal();
    require ('app/views/adminView.php');
}

function adminReport()
{
    $menu = getMenus();
    $report = getAllReportByChapter();
    $getReports = countReportTotal();

    require ('app/views/adminReportView.php');
}

function adminDelComm($comm)
{
    if(isset($_GET['comm']) && !empty($_GET['comm']))
    {
        $comm = htmlspecialchars($_GET['comm']);
        $del = deleteComment($comm);
        header('Location: index.php?action=admin');
    }
}

function adminPostChapter()
{
    $menu = getMenus();
    $getReports = countReportTotal();
    require ('app/views/adminPostView.php');
}

function postNewChapter($title, $content, $online)
{
    $post = insertPost($title, $content, $online);

    header('Location:index.php?action=admin');
}

function updateChapter($chapterId)
{
    $menu = getMenus();
    $chap = getChapter($chapterId);
    $getReports = countReportTotal();
    require ('app/views/adminUpdateChapterView.php');
}

function adminUpdateChapter($title, $chapter, $online, $chapterId)
{
    $chapUpdate = updatePost($title, $chapter, $online, $chapterId);
    header('Location: index.php?action=admin');
}

function adminDelChapter($chapterId)
{
    $delChap = delChapter($chapterId);
    header('Location:index.php?action=admin');
}

function adminUpdateComment($idComment, $comment)
{
    $updateComment = updateComment($idComment, $comment);
}

function adminGetComment()
{
    $menu = getMenus();
    $comment = getComment();
    $getReports = countReportTotal();
    if(isset($_POST['comments_area']) && !empty($_POST['comments_area']))
    {
        $idComment = htmlspecialchars($_GET['comm']);
        $comments = htmlspecialchars($_POST['comments_area']);
        adminUpdateComment($idComment, $comments);

    }

    require('app/views/adminUpdateReportView.php');
}