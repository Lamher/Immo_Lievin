<div id="content" class='pt-2'>
    <div class="container-fluid">
        <div id="content-list" class="row px-0">
            <?php foreach ($lists as $list) {
                echo "<div class='col-md-6 col-lg-4 col-xl-3 px-2 py-2'><div class='card shadow-sm'>
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
                <a href='" . BASE_URI . "index/detailAnnonce/{$list['id']}'><button type='button' class='btn btn-index text-light font-weight-bold shadow'>Details</button></a>
                <form action='' method='POST'><input type='hidden' name='id' value='{$list['id']}'><button type='submit' name='favorite' class='btn btn-index text-light font-weight-bold shadow'>Favoris</button>
                </div></form>
            </div>
        </div></div>";
            }
            ?>
        </div>
    </div>
</div>