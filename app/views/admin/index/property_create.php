<div id="content-admin" class="mt-10">
    <h1 class="text-center">Ajouter un bien</h1>
    <form id="add_user_form" action="" method="POST" enctype="multipart/form-data" class="mx-2">
    <input type="hidden" name="token" value="<?= (isset($_SESSION['token']))?$_SESSION['token']:'' ?>">
        <div class="d-flex">
            <div class="form-group col-md-4">
                <label for="type">Type de bien</label>
                <select class="form-control" id="type" name="type">
                    <option value="Vente">Vente</option>
                    <option value="Location">Location</option>
                </select>
            </div>

            <div class="flex-column col-md-4 align-self-center">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="visible" id="visible">
                    <label class="form-check-label" for="visible">Visible</label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="indexTop" id="indexTop">
                    <label class="form-check-label" for="indexTop">Mis en avant</label>
                </div>
            </div>

        </div>
        <div class="d-md-flex">
            <div class="col-md-4">

                <div class="form-group">
                    <label for="category">Catégorie</label>
                    <select class="form-control" id="category" name="category">
                        <option value="1">Maison</option>
                        <option value="2">Appartement</option>
                        <option value="3">Terrain à bâtir</option>
                        <option value="4">Jardin</option>
                        <option value="5">Garage</option>
                        <option value="6">Parking</option>
                        <option value="7">Immobilier professionnel</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom">
                    <?= isset($errors['name'])?"{$errors['name']}":"" ?>
                </div>
                <div class="form-group">
                    <label for="reference">Référence</label>
                    <input type="text" class="form-control" id="reference" name="reference" placeholder="Référence">
                    <?= isset($errors['reference'])?"{$errors['reference']}":"" ?>
                </div>

                <div class="form-group">
                    <label for="price">Prix</label>
                    <input type="text" class="form-control" id="price" name="price" aria-describedby="emailHelp" placeholder="Prix">
                    <?= isset($errors['price'])?"{$errors['price']}":"" ?>
                </div>

            </div>

            <div class="col-md-4">

                <div class="form-group">
                    <label for="surfaceArea">Surface</label>
                    <input type="text" class="form-control" id="surfaceArea" name="surfaceArea" placeholder="Surface ( en m² )">
                    <?= isset($errors['surfaceArea'])?"{$errors['surfaceArea']}":"" ?>
                </div>
                <div class="form-group">
                    <label for="rooms">Pièces</label>
                    <input type="number" class="form-control" id="rooms" name="rooms" placeholder="Nombre" value=0>
                    <?= isset($errors['rooms'])?"{$errors['rooms']}":"" ?>
                </div>
                <div class="form-group">
                    <label for="bedrooms">Chambres</label>
                    <input type="number" class="form-control" id="bedrooms" name="bedrooms" placeholder="Nombre" value=0>
                    <?= isset($errors['bedrooms'])?"{$errors['bedrooms']}":"" ?>
                </div>

                <div class="form-group">
                    <label for="energyClass">Classe énergétique</label>
                    <input type="text" class="form-control" id="energyClass" name="energyClass" placeholder="De A à G">
                    <?= isset($errors['energyClass'])?"{$errors['energyClass']}":"" ?>
                </div>
            </div>
            <div class="col-md-4">

                <div class="d-lg-flex">

                    <div class="form-group col-lg-3 pl-0 pr-1">
                        <label for="streetNumber">N°</label>
                        <input type="text" class="form-control" id="streetNumber" name="streetNumber" placeholder="N°">
                        <?= isset($errors['streetNumber'])?"{$errors['streetNumber']}":"" ?>
                    </div>
                    <div class="form-group col-lg-9 px-0">
                        <label for="streetName">Nom de Rue</label>
                        <input type="text" class="form-control" id="streetName" name="streetName" placeholder="Nom de Rue">
                        <?= isset($errors['streetName'])?"{$errors['streetName']}":"" ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="postalCode">Code Postal</label>
                    <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="Code Postal">
                    <?= isset($errors['postalCode'])?"{$errors['postalCode']}":"" ?>
                </div>
                <div class="form-group">
                    <label for="city">Ville</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Ville">
                    <?= isset($errors['city'])?"{$errors['city']}":"" ?>
                </div>
                <div class="form-group">
                    <label for="country">Pays</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Pays">
                    <?= isset($errors['country'])?"{$errors['country']}":"" ?>
                </div>
            </div>

        </div>
        <div class="form-group col-12">
            <label for="description">Description du bien</label>
            <textarea class="form-control" id="description" name="description" rows="3"></textarea>
            <?= isset($errors['description'])?"{$errors['description']}":"" ?>
        </div>

        <div class="d-lg-flex">
            <div class="input-group col-12 col-lg-4 my-2">

                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image1" id="image1" aria-describedby="input_image1">
                    <label class="custom-file-label" for="image1">Image 1 ( Par défaut )</label>
                </div>
            </div>
            <div class="input-group col-12 col-lg-4 my-2">

                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image2" id="image2" aria-describedby="input_image2">
                    <label class="custom-file-label" for="image2">Image 2</label>
                </div>
            </div>
            <div class="input-group col-12 col-lg-4 my-2">

                <div class="custom-file">
                    <input type="file" class="custom-file-input" name="image3" id="image3" aria-describedby="input_image3">
                    <label class="custom-file-label" for="image3">Image 3</label>
                </div>
            </div>
        </div>
        <div class=" mx-2 d-flex justify-content-end">
            <button id="btn-add" name="add-property" type="submit" class="btn text-light font-weight-bold">Ajouter le bien</button>
        </div>
    </form>
</div>