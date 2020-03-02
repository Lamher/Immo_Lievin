<div id="content" class="listeAnnonces">
    <form action="" method="POST" class="mx-2  col-8 offest-2 ">
        <div class="d-md-flex filter">
            <div class="form-group col-2">
                <select class="form-control" id="type" name="type">
                    <option value="Vente">Vente</option>
                    <option value="Location">Location</option>
                </select>
            </div>
            <div class="form-group col-2">
                <input type="text" class="form-control" id="city" name="city" placeholder="Ville">
            </div>
            <div class="form-group col-2">
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
            <div class="form-group col-2">
                <input type="text" class="form-control" id="reference" name="reference" placeholder="Référence">
            </div>
            <div class="form-group col-2">
                <input type="number" class="form-control" id="minPrice" name="minPrice" placeholder="Prix Min">
            </div>
            <div class="form-group col-2">
                <input type="number" class="form-control" id="maxPrice" name="maxPrice" placeholder="Prix Min">
            </div>
        </div>
    </form>

    <?php
    foreach ($infos as $info) {

        echo " <div class='cardImages d-lg-flex justify-content-center'>
        <div class='card card-index mt-5'>
            <div class='view overlay'>
                <img class='card-img-top card-properties img-fluid' src='" . BASE_IMG_PROPERTIES . $info['name'] . "'
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