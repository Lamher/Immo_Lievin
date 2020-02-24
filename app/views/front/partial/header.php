<div id="header" class="d-flex flex-wrap align-items-center">

    <div class="logo col-12 col-lg-3">
       <a href="<?= BASE_URI . 'index'  ?>"><img src=<?= BASE_URI . "images/immo_lievin_logo.png"  ?> alt=""></a>
    </div>
    <div class=" row btnSm col-12">
        <div class="btnInscriptionSm align-center col-5 offset-2 ">
            <a id="btnAddSm" type="button" class="btn text-dark font-weight-bold"
               href="<?= BASE_URI . 'index/connexion' ?>">Inscription/Connexion</a>


        </div>
        <div class="btnProposerSm align-center col-5 ">
            <a id="btnProposeSm" type="button" class="btn text-dark font-weight-bold"
               href="<?= BASE_URI . 'index/proposer.php' ?>">Proposer</a>

        </div>
    </div>
    <div class="searchBar col-12 col-lg-5  mt-2"><input class="form-control" type="text" placeholder="Search"
                                                        aria-label="Search">
    </div>
    <div class="d-flex btnLg col-lg-2 ">
        <div class="btnInscription btnLg align-self-center offset-5 col-lg-6 ">
            <a id="btnAddLg" type="button" class="btn text-dark font-weight-bold"
               href="<?= BASE_URI . 'index/connexion' ?>">Inscription/Connexion</a>

        </div>
        <div class="btnProposer btnLg  align-self-center offset-5 col-lg-6">
            <a id="btnProposeLg" type="button" class="btn text-dark font-weight-bold"
               href="<?= BASE_URI . 'index/proposer.php' ?>">proposer</a>
        </div>
    </div>
</div>