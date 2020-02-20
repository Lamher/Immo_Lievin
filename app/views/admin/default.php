<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?= $description ?>">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href=<?= BASE_URI . "css/admin.css" ?>>
    <title><?= $title ?></title>
</head>

<body>

    <?= $header ?>
    <?= $navMobile ?>

    <div  class="d-flex">
        <div id="navF-admin" class="col-3 pl-10 pt-10">
            <?= $navFullscreen ?>
        </div>
        <div class="col-12 col-md-9 pt-10 pr-10">
            <?= $content ?>
        </div>
    </div>



    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="<?= BASE_URI . "js/admin.js" ?>"></script>
</body>

</html>