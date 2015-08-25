<?php
/**
 * Created by PhpStorm.

 * User: munabste
 * Date: 8/25/2015
 * Time: 3:36 PM
 */

include ('Munabo.php');
    session_start();
    $app = new Munabo(1);
    $app->display_app();



