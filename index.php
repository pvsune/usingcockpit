<?php

//include cockpit
include_once('cockpit/bootstrap.php');

$app = new Lime\App();

// bind routes

$app->bind("/article/:id", function($params) use($app) {

    $post = collection('blog')->findOne(["_id"=>$params['id']]);

    return $app->render('views/article.php', ['post' => $post]);
});

$app->bind("/", function() use($app) {

    $limit = 5;
    $page  = $app->param("page", 1);
    $count = collection('blog')->count(["public"=>true]);
    $pages = ceil($count/$limit);

    // get posts
    $posts = collection('blog')->find(["public"=>true]);

    // apply pagination
    $posts->limit($limit)->skip(($page-1) * $limit);

    // apply sorting
    $posts->sort(["created"=>1]);

    return $app->render('views/index.php', ['posts'=>$posts->toArray(), 'page'=>$page, 'pages'=>$pages]);
});

$app->run();