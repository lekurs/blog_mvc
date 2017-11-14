<?php
/**
 * Created by PhpStorm.
 * User: Bidule
 * Date: 12/11/2017
 * Time: 13:47
 */

function getMenus()
{
    $db = connect_db();

    $menu = $db->query('SELECT * FROM menus');
    $menus = $menu->fetchAll();

    return $menus;

    $menu->closeCursor();
}