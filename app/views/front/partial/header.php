<div id="header" class="d-flex flex-wrap align-items-center">

    <div class="logo col-12 col-lg-3">
       <a href="<?= BASE_URI . 'index'  ?>"><img src=<?= BASE_URI . "images/immo_lievin_logo.png"  ?> alt=""></a>
    </div>
<!--    <div class=" btnSm col-12 d-flex">-->
<!--        <div class="btnSm align-center col-6">-->
<!--            <a id="btnSm" type="button" class="btn text-dark font-weight-bold"-->
<!--               href="--><?//= BASE_URI . 'index/connexion' ?><!--">Connexion</a>-->
<!--        </div>-->
<!--        <div class="btnSm align-center col-6 ">-->
<!--            <a id="btnSm" type="button" class="btn text-dark font-weight-bold"-->
<!--               href="--><?//= BASE_URI . 'index/proposerBien' ?><!--">Proposer un bien</a>-->
<!--        </div>-->
<!--    </div>-->
    <div class="searchBar col-12 col-lg-5  mt-2"><input class="form-control" type="text" placeholder="Search"
                                                        aria-label="Search">
    </div>
   <div class="d-flex btnLg col-lg-4 ">
        <div class="btnInscription btnLg align-self-center text-center offset-5 col-lg-3 ">
            <a id="btnLg" type="button" class="btn btnInscription text-dark pt font-weight-bold"
               href="<?= BASE_URI . 'index/connexion' ?><">Connexion</a>

        </div>
        <div class="btnProposer btnLg  align-self-center col-lg-6">
            <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
               href="<?= BASE_URI . 'index/proposer' ?><">Proposer un bien</a>
        </div>
    </div>
</div>

