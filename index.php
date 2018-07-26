<?php

require_once 'classes/Template.php';

$theme = new Template();

echo $theme->SetTemplate('tamplet.html', [

    'header' => 'PHP Tamplet engine',

    'heading' => welcome(),

    'body' => body(),

]);

function welcome()
{
    return 'WELCOME';
}

function body()
{
    return 'Hay this is created by malik umer farooq';
}
