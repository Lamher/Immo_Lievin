<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href=<?= BASE_URI . 'css/appFront.css'  ?>>

    <title><?= $title ?></title>
</head>

<body>

    <?= $header ?>

    <?= $navigation  ?>
<?php
    $url = "http://{$_SERVER['HTTP_HOST']}{$_SERVER['REQUEST_URI']}";

if($url == "http://localhost/Immo_Lievin/public/index/listeAnnonces/Location" || $url == "http://localhost/Immo_Lievin/public/index/listeAnnonces/Vente"){
    echo $filter;
} 
?>
    <?= $content ?>

    <?= $footer ?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.4.1/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/4d7f4e43b0.js" crossorigin="anonymous"></script>
    <script src=<?= BASE_URI . 'js/appFront.js' ?>></script>
</body>

</html>