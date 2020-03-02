<div id="content-admin" class="mt-10">
    <h1 class="text-center">Modifier un utilisateur</h1>
    <form id="update_user_form" action="" method="POST" class="mx-2">
    <input type="hidden" name="token" value="<?= (isset($_SESSION['token']))?$_SESSION['token']:'' ?>">
        <div class="d-md-flex">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom" value="<?= $infos['name'] ?>">
                    <?= isset($errors['name']) ? $errors['name'] : '' ?>
                </div>
                <div class="form-group">
                    <label for="surname">Prénom</label>
                    <input type="text" class="form-control" id="surname" name="surname" placeholder="Prénom" value="<?= $infos['surname'] ?>">
                    <?= isset($errors['surname']) ? $errors['surname'] : '' ?>
                </div>

                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp" placeholder="Email" value="<?= $infos['mail'] ?>">
                    <?= isset($errors['mail']) ? $errors['mail'] : '' ?>
                </div>
                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe" value="<?= $infos['password'] ?>">
                    <?= isset($errors['password']) ? $errors['password'] : '' ?>
                </div>
            </div>
            <div class="col-md-6">
                <div class="d-flex">
                    <div class="form-group col-2 pl-0 pr-1">
                        <label for="street_number">N°</label>
                        <input type="text" class="form-control" id="streetNumber" name="streetNumber" placeholder="N°" value="<?= $infos['streetNumber'] ?>">
                        <?= isset($errors['streetNumber']) ? $errors['streetNumber'] : '' ?>
                    </div>
                    <div class="form-group col-10 px-0">
                        <label for="street_name">Nom de Rue</label>
                        <input type="text" class="form-control" id="streetName" name="streetName" placeholder="Nom de Rue" value="<?= $infos['streetName'] ?>">
                        <?= isset($errors['streetName']) ? $errors['streetName'] : '' ?>
                    </div>
                </div>
                <div class="form-group">
                    <label for="postal_code">Code Postal</label>
                    <input type="text" class="form-control" id="postalCode" name="postalCode" placeholder="Code Postal" value="<?= $infos['postalCode'] ?>">
                    <?= isset($errors['postalCode']) ? $errors['postalCode'] : '' ?>
                </div>
                <div class="form-group">
                    <label for="city">Ville</label>
                    <input type="text" class="form-control" id="city" name="city" placeholder="Ville" value="<?= $infos['city'] ?>">
                    <?= isset($errors['city']) ? $errors['city'] : '' ?>
                </div>
                <div class="form-group">
                    <label for="country">Pays</label>
                    <input type="text" class="form-control" id="country" name="country" placeholder="Pays" value="<?= $infos['country'] ?>">
                    <?= isset($errors['country']) ? $errors['country'] : '' ?>
                </div>
            </div>

        </div>
        <div class=" mx-2 d-flex justify-content-end">
            <button id="btn-update" name="update-user" type="submit" class="btn text-light font-weight-bold">Modifier</button>
        </div>
    </form>
</div>