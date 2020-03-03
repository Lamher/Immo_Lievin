<div class="bg-filter py-2">

    <form action="" method="POST" id="filter" class="d-md-flex justify-content-around mx-5 py-2 mb-2 shadow-sm">

        <div class="col-md-2 align-self-center px-1">
            <select class="form-control" id="type" name="type">
                <option value="Vente">Vente</option>
                <option value="Location">Location</option>
            </select>
        </div>
        <div class="col-md-2 align-self-center px-1">
            <input type="text" class="form-control" id="city" name="city" placeholder="Ville">
        </div>
        <div class="col-md-2 align-self-center px-1">
            <select class="form-control" id="category" name="category">
                <option value="">Catégorie</option>
                <option value="1">Maison</option>
                <option value="2">Appartement</option>
                <option value="3">Terrain à bâtir</option>
                <option value="4">Jardin</option>
                <option value="5">Garage</option>
                <option value="6">Parking</option>
                <option value="7">Immobilier professionnel</option>
            </select>
        </div>
        <div class="col-md-2 align-self-center px-1">
            <input type="text" class="form-control" id="reference" name="reference" placeholder="Référence">
        </div>
        <div class="col-md-2 align-self-center px-1">
            <input type="number" class="form-control" id="minPrice" name="minPrice" placeholder="Prix Min">
        </div>
        <div class="col-md-2 align-self-center px-1">
            <input type="number" class="form-control" id="maxPrice" name="maxPrice" placeholder="Prix Max">
        </div>

    </form>

</div>