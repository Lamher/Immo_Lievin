<div id="header-admin" class=" text-light d-flex flex-wrap align-items-center">
    <div class="col-6 px-0">
    <a href="<?= BASE_URI_ADMIN ?>"><img id="logo-admin" class='img-fluid' src=<?= BASE_URI . "images/immo_lievin_logo.png" ?> alt="Logo Immo Liévin" title="Logo Immo Liévin"></a>
    </div>
    <div class="row col-5 icon-admin align-items-center d-flex flex-row-reverse mr-1">
        <p class="mb-0"><?= $count ?></p>
        <a href="<?= BASE_URI_ADMIN . 'index/message_list' ?>" class="icon-admin"><i class="mx-2 my-auto  fas fa-envelope"></i></a>
    </div>
    <div class="col-1 d-flex justify-content-center">
    <a href="<?= BASE_DIR ?>" class="icon-admin"><i class="icon-admin fas fa-sign-out-alt"></i></a>
    </div>



</div>