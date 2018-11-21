<?php

    require_once('core/init.php');

    $template = new Template('index');
    $user = new User;

    $template->faculties = $user->getFaculties();

    echo $template;