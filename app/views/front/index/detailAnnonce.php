<div id="content" class="d-md-flex pt-5 pb-5">
    <div class="imgDetailLg d-flex col-12 col-md-4 justify-content-around flex-wrap pt-5 shadow-sm" id="descLg">
        <div class=" product-prewiew1 col-12 text-center">
            <img id="product-preview1" class="img-fluid" src='<?= BASE_IMG . $infos['images'][0]['name'] ?>' alt="">
        </div>
        <div class=" d-flex justify-content-around pt-3">
            <?= isset($infos['images'][1]) ? "<div class='col-6'><img id='product-preview2' class='img-fluid' src='" . BASE_IMG . $infos['images'][1]['name'] . "' alt=''></div>" : '' ?>
            <?= isset($infos['images'][2]) ? "<div class='col-6'><img id='product-preview3' class='img-fluid' src='" . BASE_IMG . $infos['images'][2]['name'] . "' alt=''></div>" : '' ?>
        </div>
    </div>


    <div class="col-12 col-md-8">
        <div class="d-md-flex align-items-center">
            <h1 class="col-12 col-md-9"><?= $infos['name'] ?></h1>
            <h3 class="col-12 col-md-3 text-right font-weight-bold"><?= $infos['price'] . ' €' ?></h3>
        </div>
        <div class="col-12 d-flex justify-content-end my-2">
                <form action='' method='POST'><input type='hidden' name='id' value='<?= $infos['id'] ?>'><button type='submit' name='favorite' class='btn btn-index text-light font-weight-bold mx-2 shadow-sm'>Favoris</button>
                </form>
                <a href='<?= BASE_URI . 'index/contact' ?>'><button type='button' class='btn btn-index text-light font-weight-bold mx-2 shadow-sm'>Message</button></a>
            </div>

        <div class="d-md-flex">
            <div class="col-md-4">
                <p class="mt-4 "><span class="font-weight-bold">Ref : </span><?= $infos['reference'] ?></p>
                <p class="mt-4 "><span class="font-weight-bold">Lieu : </span><?= $infos['city'] ?></p>
                <p class="mt-4 "><span class="font-weight-bold">Surface : </span><?= $infos['surfaceArea'] . ' m²' ?></p>
                <?= isset($infos['rooms']) ?"<p class='mt-4 '>Nbre de pièces : {$infos['rooms']}</p>":""; ?>
                <?= isset($infos['bedrooms']) ?"<p class='mt-4 '>Nbre de pièces : {$infos['bedrooms']}</p>":""; ?>
            </div>
            <div class="col-md-8">
                <p><?= $infos['description'] ?></p>

            </div>

        </div>






    </div>
</div>