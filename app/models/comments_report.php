<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 13/11/2017
 * Time: 15:44
 */

require ('db_connect_Model.php');

if(isset($_POST['report']) && isset($_POST['chapterId']) && isset($_POST['idComments']))
{
    $report = htmlspecialchars($_POST['report']);
    $chapterId = htmlspecialchars($_POST['chapterId']);
    $idComments = htmlspecialchars($_POST['idComments']);

    $reportReplace = 0;

    if($report == 0)
    {
        $report = $reportReplace+1;
    }
    else
    {
        $report = $reportReplace;
    }

    $db = connect_db();

    $upReport = $db->prepare('UPDATE comments SET report = :report WHERE chapter_id = :chapterId AND id_comments = :idComments');
    $upReport->execute(array(
        'report' => $report,
        'chapterId' => $chapterId,
        'idComments' => $idComments
    ));

    if($upReport->rowCount() > 0)
    {
        $statut = 'success';
        $message = 'Votre message a été signalé';
        $data = array('status' => $statut, 'message' => $message);
        echo json_encode($data);
    }
}
