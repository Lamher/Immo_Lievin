<div class="listeAnnonces">
    <div id="formListeLg" class=" d-flex align-center justify-content-center ml-200">
        <form class="align-self-center ">
            <div class="form-check form-check-inline ">
                <select class="form-check-input" name="venteLocation" id="venteLocation" value="" placeholder="Type">
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
            <div class="form-check form-check-inline">>
                <input class="form-check-input" type="text" id="reference" value="" placeholder="Référence">
            </div>
            <div class="form-check form-check-inline">
                <input type="hidden" id="mini_price" value="0">
                <input class="form-check-input" name="budgetMini" type="number" id="mini" value=""
                       placeholder="Budget mini">
            </div>
            <div class="form-check form-check-inline">
                <input type="hidden" id="maxi_price" value="600000">
                <input class="form-check-input" name="budgetMax" type="number" id="maxi" value=""
                       placeholder="Budget maxi">
            </div>
        </form>
    </div>
    <?php
    foreach ($infos as $info) {

        echo " <div class='cardImages d-lg-flex justify-content-center'>
        <div class='card card-index mt-5'>
            <div class='view overlay'>
                <img class='card-img-top card-properties img-fluid' src='".BASE_IMG_PROPERTIES .$info['name']."'
                     alt='Card image cap'>
                </a>
            </div>
            <div class='card-body'>
                <h4 class='card-title text-center'>{$info['name']}</h4>
                <div class='infosProperty d-flex'>
                    <p class='card-text  '>{$info['description']}</p>
                    <p>{$info['price']} €</p>
                </div>
                <div class='d-flex justify-content-between'>
                    <a type='button' class='btn text-dark font-weight-bold'
                       href='" . BASE_URI . " index'>Favoris</a>
                    <a type='button' class='btn text-dark font-weight-bold'
                       href='" . BASE_URI . " index'>Messages</a>
                </div>
            </div>
        </div>
    </div>";


    }
    ?>
</div>