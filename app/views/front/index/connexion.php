<div id="content" class="mt-10">
    <h1 class="text-center">Connexion</h1>
    <form id="loginUser" action="" method="POST" class="mx-2">
        <div class="col-md-8 offset-md-2">
            <div class="justify-content-center">
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp" placeholder="Email">
                    <?= isset($errors['connexion']) ? "{$errors['connexion']}" : "" ?>
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
                </div>
            </div>
            <div class=" mx-2 d-flex justify-content-end">
                <button id="btnLogin" name="login" type="submit" class="btn text-light font-weight-bold mb-5 shadow-sm">Connexion</button>
            </div>
        </div>
    </form>
    <div class=" mx-2 text-center">

        <a id="btnInscription" type="button" class="btn text-light font-weight-bold mb-2 shadow-sm" href="<?= BASE_URI . 'index/inscription' ?>">Inscription</a>


    </div>