<div id="header" class="d-flex flex-wrap align-items-center">

    <div class="logo col-12 col-lg-3">
        <a href="<?= BASE_URI . 'index' ?>"><img id="logo-admin" class='img-fluid' src=<?= BASE_URI . "images/immo_lievin_logo.png" ?> alt="Logo Immo Liévin" title="Logo Immo Liévin"></a>
    </div>

    <div class="searchBar col-12 col-lg-5  mt-2">
        <div class="ui-widget input-group md-form form-sm form-2 pl-0">

            <input id="tags" class="form-control my-0 py-1" type="text" placeholder="Chercher un article" aria-label="Search">
            <div class="input-group-append">
                <a href="product.html" class="input-group-text red lighten-3" id="basic-text1">
                </a>
            </div>

        </div>
    </div>
    <div class="d-flex btnLg col-lg-4 ">
        <div class="btnInscription btnLg align-self-center text-center col-6">
            <a id="btnLg" type="button" class="btn btnInscription text-dark pt font-weight-bold shadow" href="<?= BASE_URI . 'index/connexion' ?>">Connexion</a>

        </div>
        <div class="btnProposer btnLg align-self-center col-6">
            <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold shadow" href="<?= BASE_URI . 'index/proposerBien' ?>">Proposer un bien</a>
        </div>
    </div>
</div>