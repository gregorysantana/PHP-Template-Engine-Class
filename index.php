<?php
require_once "classes/Template.php";

$theme = new Template("tamplet.html");

$theme->SetAttributes([

    'header' => 'PHP Tamplet engine',

    'heading' => welcome(),

    'body' => body(),

]);


echo $theme->Rander();

function  welcome(){

    return "WELCOME";

}

function body(){

    return "Hay this is created by malik umer farooq";

}
