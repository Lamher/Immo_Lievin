<div id="content" class="mt-10">
    <h1 class="text-center">Connexion</h1>
    <form id="loginUser" action="" method="POST" class="mx-2">
        <div class="d-md-flex justify-content-center">
            <div class="form-group">
                <label for="mail">Email</label>
                <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp"
                       placeholder="Email">
            </div>
            <div class="form-group">
                <label for="password">Mot de passe</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
            </div>
        </div>
<div class=" mx-2 d-flex justify-content-end">
    <button id="btnLogin" name="login" type="submit" class="btn text-dark font-weight-bold mb-5">Connexion</button>
</div>

</form>
    <div class=" mx-2 d-flex justify-content-end ">

    <a id="btnInscription" type="button" class="btn text-dark font-weight-bold mb-2"
           href="<?= BASE_URI . 'index/inscription' ?>">Inscription</a>


    </div>