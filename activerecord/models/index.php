<?php
/**
 * Created by PhpStorm.
 * User: munabste
 * Date: 8/25/2015
 * Time: 3:34 PM
 */

    include ('Munabo.php');
    session_start();

    $name;
    if(empty($_POST['name'])){
        $_POST['name'] = '';
    }

    $me = new Munabo($_POST['name']);
    $me->mk_content();