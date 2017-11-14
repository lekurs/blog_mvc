<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 10/11/2017
 * Time: 11:05
 */

require ('app/models/chapters_Model.php');
require ('app/models/comments_Model.php');

function nbComment($chapter)
{
    $nbComment = nb_comment($chapter);
}

function listChapters()
{
    $chapters = getChapters();
    $getReports = countReportTotal();
    require ('app/views/showChaptersView.php');
}


