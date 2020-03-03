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
    <div class="container-fluid">
        <div class="row px-0">
            <?php foreach ($lists as $list) {
                echo "<div class='col-md-6 col-lg-4 col-xl-3 px-2 py-2'><div class='card shadow'>
            <div class='view overlay'>
                <img class='card-img-top card-properties img-fluid' src='" . BASE_IMG . $list['imageName'] . "' alt='Image pour {$list['name']}'>
                <a href='#'>
                    <div class='mask rgba-white-slight'></div>
                </a>
            </div>
            <div class='card-body'>
                <h4 class='card-title'>{$list['name']}</h4>
                <div class='d-flex'>
                <p class='col-6'>{$list['reference']}</p>
                <p class='col-6 font-weight-bold'>{$list['price']} €</p>
                </div>
                <p class='description'>{$list['description']}</p>
                <div class='d-flex justify-content-around'>
                <a href='" . BASE_URI . "index/detailAnnonce/{$list['id']}'><button type='button' class='btn btn-index text-light font-weight-bold'>Details</button></a>
                <form action='' method='POST'><input type='hidden' name='id' value='{$list['id']}'><button type='submit' name='favorite' class='btn btn-index text-light font-weight-bold'>Favoris</button>
                </div></form>
            </div>
        </div></div>";
            }
            ?>
        </div>
    </div>
</div>