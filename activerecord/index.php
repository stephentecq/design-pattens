<?php
/**
 * Created by PhpStorm.
 * User: munabste
 * Date: 8/24/2015
 * Time: 10:31 AM
 */

 require_once 'php-activerecord/ActiveRecord.php';
 ActiveRecord\Config::initialize(function($cfg)
     {
        $cfg->set_model_directory('models');
        $cfg->set_connections(array(
        'development' => 'mysql://root:@localhost/xapp_base'));
     });


    # create Tito
    $content = Content::create(array('name' => 'about', 'discription' => 'this page describes the about info', 'content' => 'This is the content for this page'));

    # read Tito
    //$user = User::find_by_id('2');

    # update Tito
    //$user->name = 'Tito Jr';
    //$user->save();

    # delete Tito
    //$user->delete();