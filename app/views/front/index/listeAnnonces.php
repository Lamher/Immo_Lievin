






<div class="listeAnnonces">
    <div id="formListeLg" class=" d-flex align-center justify-content-center ml-200">
        <form class="align-self-center " >
            <div class="form-check form-check-inline ">
                <select class="form-check-input" id="type" value="" placeholder="Type">
                    <option value="location">Location</option>
                    <option value="Vente">Vente</option>
                </select>
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="text" id="ville" value="" placeholder="Ville">
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="text" id="categorie" value="" placeholder="Catégorie">
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="text" id="reference" value="" placeholder="Référence">
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="number" id="mini" value="" placeholder="Budget mini">
            </div>
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="number" id="maxi" value="" placeholder="Budget maxi">
            </div>
        </form>
    </div>


    <div class="cardImages d-lg-flex justify-content-center">
        <!-- Card -->
        <div class="card card-index  mt-5">

            <!--Card image-->
            <div class="view overlay">
                <img class="card-img-top card-properties img-fluid" src=<?= BASE_URI . 'images/img_galery/test.png' ?>
                     alt="Card image cap">
                <a href="<?= BASE_URI . 'index/detailAnnonce' ?>">
                    <div class="mask rgba-white-slight">detail</div>
                </a>
            </div>

            <!--Card content-->
            <div class="card-body">

                <!--Title-->
                <h4 class="card-title text-center">Card title</h4>
                <!--Text-->
                <div class="infosProperty d-flex">
                <p class="card-text  ">Maison de charme</p>
                <p>145895 $</p>
                </div>
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <div class="d-flex justify-content-between">
                    <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                       href="<?= BASE_URI . 'index' ?>">Favoris</a>
                    <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                       href="<?= BASE_URI . 'index' ?>">Messages</a>
                </div>
            </div>

        </div>
        <!-- Card -->
        <!-- Card -->
        <div class="card card-index mt-5">

            <!--Card image-->
            <div class="view overlay">
                <img class="card-img-top card-properties img-fluid" src=<?= BASE_URI . 'images/img_galery/maison3.jfif' ?>
                     alt="Card image cap">
                <a href="#">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!--Card content-->
            <div class="card-body">

                <!--Title-->
                <h4 class="card-title text-center">Card title</h4>
                <!--Text-->
                <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk
                    of the
                    card's
                    content.</p>
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <div class="d-flex justify-content-between">

                    <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                       href="<?= BASE_URI . 'index' ?>">Favoris</a>
                    <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                       href="<?= BASE_URI . 'index' ?>">Messages</a>
                </div>
            </div>

        </div>
        <!-- Card -->

        <!-- Card -->
        <div class="card card-index mt-5">

            <!--Card image-->
            <div class="view overlay">
                <img class="card-img-top card-properties img-fluid" src=<?= BASE_URI . 'images/img_galery/maison4.jfif' ?>
                     alt="Card image cap">
                <a href="#">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!--Card content-->
            <div class="card-body">

                <!--Title-->
                <h4 class="card-title text-center">Card title</h4>
                <!--Text-->
                <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk
                    of the
                    card's
                    content.</p>
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <div class="d-flex justify-content-between">

                    <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                       href="<?= BASE_URI . 'index' ?>">Favoris</a>
                    <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                       href="<?= BASE_URI . 'index' ?>">Messages</a>
                </div>
            </div>

        </div>
        <!-- Card -->
        <!-- Card -->
        <div class="card card-index  mt-5">

            <!--Card image-->
            <div class="view overlay">
                <img class="card-img-top card-properties img-fluid" src=<?= BASE_URI . 'images/img_galery/maison5.jfif' ?>
                     alt="Card image cap">
                <a href="#">
                    <div class="mask rgba-white-slight"></div>
                </a>
            </div>

            <!--Card content-->
            <div class="card-body">

                <!--Title-->
                <h4 class="card-title text-center">Card title</h4>
                <!--Text-->
                <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk
                    of the
                    card's
                    content.</p>
                <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
                <div class="d-flex justify-content-between">

                    <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                       href="<?= BASE_URI . 'index' ?>">Favoris</a>
                    <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                       href="<?= BASE_URI . 'index' ?>">Messages</a>
                </div>
            </div>

        </div>
    </div>
    <!-- Card -->
</div>

<!-- Card deck -->
<div class="cardImages d-lg-flex justify-content-center">
    <!-- Card -->
    <div class="card card-index mt-5">

        <!--Card image-->
        <div class="view overlay">
            <img class="card-img-top card-properties img-fluid" src=<?= BASE_URI . 'images/img_galery/maison4.jfif' ?>
                 alt="Card image cap">
            <a href="#">
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>

        <!--Card content-->
        <div class="card-body">

            <!--Title-->
            <h4 class="card-title text-center">Card title</h4>
            <!--Text-->
            <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk
                of the
                card's
                content.</p>
            <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
            <div class="d-flex justify-content-between">
                <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                   href="<?= BASE_URI . 'index' ?>">Favoris</a>
                <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                   href="<?= BASE_URI . 'index' ?>">Messages</a>
            </div>
        </div>

    </div>
    <!-- Card -->
    <!-- Card -->
    <div class="card card-index mt-5">

        <!--Card image-->
        <div class="view overlay">
            <img class="card-img-top card-properties img-fluid" src=<?= BASE_URI . 'images/img_galery/maison3.jfif' ?>
                 alt="Card image cap">
            <a href="#">
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>

        <!--Card content-->
        <div class="card-body">

            <!--Title-->
            <h4 class="card-title text-center">Card title</h4>
            <!--Text-->
            <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk
                of the
                card's
                content.</p>
            <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
            <div class="d-flex justify-content-between">

                <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                   href="<?= BASE_URI . 'index' ?>">Favoris</a>
                <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                   href="<?= BASE_URI . 'index' ?>">Messages</a>
            </div>
        </div>

    </div>
    <!-- Card -->

    <!-- Card -->
    <div class="card card-index mt-5">

        <!--Card image-->
        <div class="view overlay">
            <img class="card-img-top card-properties img-fluid" src=<?= BASE_URI . 'images/img_galery/maison4.jfif' ?>
                 alt="Card image cap">
            <a href="#">
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>

        <!--Card content-->
        <div class="card-body">

            <!--Title-->
            <h4 class="card-title text-center">Card title</h4>
            <!--Text-->
            <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk
                of the
                card's
                content.</p>
            <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
            <div class="d-flex justify-content-between">

                <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                   href="<?= BASE_URI . 'index' ?>">Favoris</a>
                <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                   href="<?= BASE_URI . 'index' ?>">Messages</a>
            </div>
        </div>

    </div>
    <!-- Card -->
    <!-- Card -->
    <div class="card card-index mt-5">

        <!--Card image-->
        <div class="view overlay">
            <img class="card-img-top card-properties img-fluid" src=<?= BASE_URI . 'images/img_galery/maison5.jfif' ?>
                 alt="Card image cap">
            <a href="#">
                <div class="mask rgba-white-slight"></div>
            </a>
        </div>

        <!--Card content-->
        <div class="card-body">

            <!--Title-->
            <h4 class="card-title text-center">Card title</h4>
            <!--Text-->
            <p class="card-text text-center">Some quick example text to build on the card title and make up the bulk
                of the
                card's
                content.</p>
            <!-- Provides extra visual weight and identifies the primary action in a set of buttons -->
            <div class="d-flex justify-content-between">

                <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                   href="<?= BASE_URI . 'index' ?>">Favoris</a>
                <a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                   href="<?= BASE_URI . 'index' ?>">Messages</a>
            </div>
        </div>

    </div>
    <!-- Card -->

</div>
<!-- Card deck -->
</div>