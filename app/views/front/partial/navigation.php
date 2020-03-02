
<!--navbar pour desktop-->
<div id="nav-desktop">
    <div class="d-flex justify-content-center">
    <div><a class="nav-link text-dark font-weight-bold"  href="<?= BASE_URI . 'index/notreAgence' ?>">Notre agence</a></div>
    <div><a class="nav-link text-dark font-weight-bold" href="<?= BASE_URI . 'index/listeAnnonces/Location' ?>">Location</a></div>
    <div><a class="nav-link text-dark font-weight-bold" href="<?= BASE_URI . 'index/listeAnnonces/Vente' ?>">Ventes</a></div>
    </div>
</div>
<!--Navbar pour telehonne-->

<nav id="nav-mobile" class="navbar navbar-expand-lg navbar-light">
    <!-- Collapse button -->
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#mobile" aria-controls="mobile" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <!-- Collapsible content -->
    <div class="collapse navbar-collapse" id="mobile">

        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link text-center" href="<?= BASE_URI . 'index/notreAgence' ?>">Notre agence</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center" href="<?= BASE_URI . 'index/listeAnnonces' ?>">Locations</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-center" href="<?= BASE_URI . 'index/listeAnnonces' ?>">Ventes</a>
            </li>
        </ul>

    </div>
</nav>
<!-- Collapsible content -->



