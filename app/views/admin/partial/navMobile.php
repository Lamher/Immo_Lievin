<nav id="navMobile-admin" class="navbar navbar-expand-lg navbar-light">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
        <h3 class="navbar-brand">Menu Admin</h3>
        <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URI_ADMIN ?>">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URI_ADMIN . 'index/user_list' ?>">Gestion des utilisateurs</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URI_ADMIN . 'index/property_list' ?>">Gestion des biens</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URI_ADMIN . 'index/message_list' ?>">Gestion des messages</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URI_ADMIN . 'index/import_export' ?>">Import / Export</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?= BASE_URI_ADMIN . 'index/xml' ?>">XML</a>
            </li>

        </ul>
    </div>
</nav>