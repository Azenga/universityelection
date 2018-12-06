<?php

    require_once('core/init.php');

    $template = new Template('posts');
    $user = new User;
    $topic = new Topic;

    $template->faculties = $user->getFaculties();
    $template->posts = $topic->getAllPosts();
    $template->groups = $topic->getGroups();

    echo $template;