<div id="carouselExampleIndicators " class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner mt-4">
        <div class="carousel-item active">
            <img class="d-block w-100" src=<?= BASE_URI . 'images/img_carousel/maison1.png' ?> alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?= BASE_URI . 'images/img_carousel/maison2.png' ?>" alt="Second slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src=<?= BASE_URI . 'images/img_carousel/maison3.png' ?> alt="Third slide">
        </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div id="infosDetail" class="d-md-flex col-12">

    <div class="imgDetailLg d-flex col-12 col-lg-4 justify-content-around flex-wrap pt-5 shadow-sm" id="descLg">
        <div class=" product-prewiew1 col-12 text-center">
            <img id="product-preview1" class="img-fluid"
                 src="<?= BASE_URI . 'images/img_galery/maison5.jfif' ?>" alt="">
        </div>
        <div class=" d-flex justify-content-around pt-3">
            <div class="col-6"><img id="product-preview2" class="img-fluid"
                                    src="<?= BASE_URI . 'images/img_galery/maison2.jfif' ?>" alt=""></div>
            <div class="col-6"><img id="product-preview3" class="img-fluid"
                                    src="<?= BASE_URI . 'images/img_galery/maison4.jfif' ?>" alt=""></div>
        </div>
    </div>


    <div class="detailAnnonce d-flex col-12 col-lg-3 row pl-0 pr-0">

        <div id="detailAnnonce  col-12 col-lg-4 ">
            <div class="col-12 ">
                <p class="display-sm-5 display-lg-1">Infos sur le bien</p>
                <div class="md-form form-lg col-4 pt-1 ">
                    <p class="mt-4 " >réf :</p>
                    <p class="mt-4 ">Lieu :</p>
                    <p class="mt-4 ">Surface :</p>
                    <p class="mt-4 " >Nbre de pieces :</p>
                    <p class="mt-4 " >Nbre de chambre :</p>

                </div>
            </div>
        </div>
    </div>
    <div class="description   col-12 col-lg-5 ml-20">
        <div class="d-lg-flex justify-content-around pt-1">
            <p class="display-6 " >Prix :</p>
            <p>156899 euros</p>
            <div class="col-2"><a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                                  href="<?= BASE_URI . 'index' ?>">Favoris</a></div>
            <div class="col-2"><a id="btnProposeLg" type="button" class="btn text-dark  font-weight-bold"
                                  href="<?= BASE_URI . 'index' ?>">Messages</a></div>
        </div>
        <div class="pt-5">
            <p><span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid blanditiis consequatur dolore dolorem, enim eum eveniet expedita illo numquam, officia omnis perspiciatis praesentium quisquam quos ratione ut veritatis voluptas voluptatum?</span><span>Ab ad alias architecto assumenda at atque, autem consectetur deleniti dolores error id ipsam, itaque maiores modi necessitatibus nemo nihil omnis porro provident quasi, quos ratione reiciendis sapiente tempore unde.</span><span>Accusamus cum, cumque cupiditate deserunt earum fugit laboriosam neque quasi saepe unde! Accusantium dolores doloribus eaque eos facere inventore ipsum, iure minima nam non pariatur possimus, quo sapiente similique veritatis!</span><span>Culpa est eum fugit illo in molestias mollitia, nulla quas quia saepe unde vel. Doloremque doloribus eaque earum excepturi ipsa minus quibusdam quidem quis ullam voluptatem? Laudantium quam recusandae voluptate?</span><span>Aliquid aperiam at consequatur deleniti earum eos, est exercitationem illo iste iure iusto magni molestias mollitia officiis totam voluptas voluptatibus! Animi at consectetur deserunt eius illo neque quod. Ab, consequatur.</span>
            </p>
        </div>
    </div>

</div>
