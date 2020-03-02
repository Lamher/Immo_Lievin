<div id="content-admin" class="mt-10">
    <h1 class="text-center">Modifier un bien</h1>
    <form id="update_user_form" action="" method="POST" enctype="multipart/form-data" class="mx-2">
    <input type="hidden" name="token" value="<?= (isset($_SESSION['token']))?$_SESSION['token']:'' ?>">
        <div class="d-flex">
            <div class="form-group col-md-4">
                <label for="type">Type de bien</label>
                <select class="form-control" id="type" name="type">
                    <option value="Vente" <?= ($infos['type'] == "Vente") ? "selected" : ""; ?>>Vente</option>
                    <option value="Location" <?= ($infos['type'] == "Location") ? "selected" : ""; ?>>Location</option>
                </select>
            </div>

            <div class="flex-column col-md-4 align-self-center">
                <div class="form-check">
                    <input name="visible" type="checkbox" class="form-check-input" id="visible" <?= ($infos['visible'] == 1) ? "checked" : ""; ?>>
                    <label class="form-check-label" for="visible">Visible</label>
                </div>
                <div class="form-check">
                    <input name="indexTop" type="checkbox" class="form-check-input" id="indexTop" <?= ($infos['indexTop'] == 1) ? "checked" : ""; ?>>
                    <label class="form-check-label" for="indexTop">Mis en avant</label>
                </div>
            </div>

        </div>
        <div class="d-md-flex">
            <div class="col-md-4">

                <div class="form-group">
                    <label for="category">Catégorie</label>
                    <select class="form-control" id="category" name="category">
                        <option value="1" <?= ($infos['category'] == 1) ? "selected" : ""; ?>>Maison</option>
                        <option value="2" <?= ($infos['category'] == 2) ? "selected" : ""; ?>>Appartement</option>
                        <option value="3" <?= ($infos['category'] == 3) ? "selected" : ""; ?>>Terrain à bâtir</option>
                        <option value="4" <?= ($infos['category'] == 4) ? "selected" : ""; ?>>Jardin</option>
                        <option value="5" <?= ($infos['category'] == 5) ? "selected" : ""; ?>>Garage</option>
                        <option value="6" <?= ($infos['category'] == 6) ? "selected" : ""; ?>>Parking</option>
                        <option value="7" <?= ($infos['category'] == 7) ? "selected" : ""; ?>>Immobilier professionnel</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?= $infos['name'] ?>">
                    <?= isset($errors['name'])?"{$errors['name']}":"" ?>
                </div>
                <div class="form-group">
                    <label for="reference">Référence</label>
                    <input type="text" class="form-control" id="reference" name="reference" placeholder="Référence" value="<?= $infos['reference'] ?>">
                    <?= isset($errors['reference'])?"{$errors['reference']}":"" ?>
                </div>

                <div class="form-group">
                    <label for="price">Prix</label>
                    <input type="text" class="form-control" id="price" name="price" aria-describedby="emailHelp" placeholder="Prix" value="<?= $infos['price'] ?>">
                    <?= isset($errors['price'])?"{$errors['price']}":"" ?>
                </div>

            </div>

            <div class="col-md-4">

                <div class="form-group">
                    <label for="surfaceArea">Surface</label>
                    <input type="text" class="form-control" id="surfaceArea" name="surfaceArea" placeholder="Surface ( en m² )" value="<?= $infos['surfaceArea'] ?>">
                    <?= isset($errors['surfaceArea'])?"{$errors['surfaceArea']}":"" ?>
                </div>
                <div class="form-group">
                    <label for="rooms">Pièces</label>
                    <input type="text" class="form-control" id="rooms" name="rooms" placeholder="Nombre" value="<?= $infos['rooms'] ?>">
                    <?= isset($errors['rooms'])?"{$errors['rooms']}":"" ?>
                </div>
                <div class="form-group">
                    <label for="bedrooms">Chambres</label>
                    <input type="text" class="form-control" id="bedrooms" name="bedrooms" placeholder="Nombre" value="<?= $infos['bedrooms'] ?>">
                    <?= isset($errors['bedrooms'])?"{$errors['bedrooms']}":"" ?>
                </div>

                <div class="form-group">
                    <label for="energyClass">Classe énergétique</label>
                    <input type="text" class="form-control" id="energyClass" name="energyClass" placeholder="De A à G" value="<?= $infos['energyClass'] ?>">
                    <?= isset($errors['energyClass'])?"{$errors['energyClass']}":"" ?>
                </div>
            </div>
            <div class="col-md-4">

                <div class="d-lg-flex">

                    <div class="form-group col-lg-3 pl-0 pr-1">
                        <label for="streetNumber">N°</label>
                        <input type="text" class="form-control" id="streetNumber" name="streetNumber" placeholder="N°" value="<?= $infos['streetNumber'] ?>">
                        <?= isset($errors['streetNumber'])?"{$errors['streetNumber']}":"" ?>

                    </div>
                    <div class="form-group col-lg-9 px-0">
                        <label for="streetName">Nom de Rue</label>
                        <input type="text" class="form-control" id="streetName" name="streetName" placeholder="Nom de Rue" value="<?= $infos['streetName'] ?>">
                        <?= isset($errors['streetName'])?"{$errors['streetName']}":"" ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="postalCode">Code Postal</label>
                    <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="Code Postal" value="<?= $infos['postalCode'] ?>">
                    <?= isset($errors['postalCode'])?"{$errors['postalCode']}":"" ?>
                </div>
                <div class="form-group">
                    <label for="city">Ville</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Ville" value="<?= $infos['city'] ?>">
                    <?= isset($errors['city'])?"{$errors['city']}":"" ?>
                </div>
                <div class="form-group">
                    <label for="country">Pays</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Pays" value="<?= $infos['country'] ?>">
                    <?= isset($errors['country'])?"{$errors['country']}":"" ?>
                </div>
            </div>

        </div>
        <div class="form-group col-12">
            <label for="description">Description du bien</label>
            <textarea class="form-control" name="description" id="description" rows="3"><?= $infos['description'] ?></textarea>
            <?= isset($errors['description'])?"{$errors['description']}":"" ?>
        </div>

        <div class="d-flex">
            <?php
            $count = count($infos['images']);
            for ($loop = 0; $loop < 3; $loop++) {
                if ($loop < $count) {
                    echo "<div class='col-12 col-lg-4 my-2 align-self-center text-center'><img class=' img-display  img-fluid' src='" . BASE_IMG . $infos['images'][$loop]['name'] . "'></div>";
                } else {
                    echo "<div class='col-12 col-lg-4 my-2 align-self-center text-center'><img class=' img-display  img-fluid' src=''></div>";
                }
            }
            ?>
        </div>
        <div class="d-flex">
            <?php
            $count = count($infos['images']);
            for ($loop = 0; $loop < 3; $loop++) {
                $id = (isset($images[$loop]['id']))?$images[$loop]['id']:"";
                ?>
                <div class="input-group col-12 col-lg-4 my-2">
                    <div class="custom-file d-lg-flex">
                    <input type='hidden' name='img<?= $loop + 1 ?>' value="<?= $id ?>">
                        <input name="image<?= $loop + 1 ?>" type="file" class="custom-file-input" aria-describedby="input_image<?= $loop + 1 ?>">
                        <label class="custom-file-label" for="image<?= $loop + 1 ?>">Image</label>
                    </div>
                </div>
            <?php
            } ?>
        </div>



        <div class=" mx-2 d-flex justify-content-end">
            <button id="btn-update" name="update-property" type="submit" class="btn text-light font-weight-bold">Modifier</button>
        </div>
    </form>
</div>