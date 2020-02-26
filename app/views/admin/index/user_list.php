<div id="content-admin" class="mt-10">
    <h1 class="text-center">Liste des utilisateurs</h1>
    <div class="d-flex align-content-center justify-content-center flex-column mx-3">
        <a id="btn-add" type="button" class="btn text-light font-weight-bold" href="<?= BASE_URI_ADMIN . 'index/user_create' ?>">Ajouter un utilisateur</a>
        <table id="table-admin" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead class="text-center">
                <tr>
                    <th class="th-sm font-weight-bold">Nom

                    </th>
                    <th class="th-sm font-weight-bold">Prénom

                    </th>
                    <th class="th-sm font-weight-bold">Modifier

                    </th>
                    <th class="th-sm font-weight-bold">Supprimer

                    </th>

                </tr>
            </thead>
            <tbody class="text-center">
                <?php
                foreach ($lists as $list) {
                    echo"<tr>
                    <td>{$list['name']}</td>
                    <td>{$list['surname']}</td>
                    <td><a href='".BASE_URI_ADMIN . "index/user_update/{$list['id']}'><i class='icon-table fas fa-pen'></i></a></td>
                    <td><form action='' method='POST'><input type='hidden' name='id' value='{$list['id']}'><button type='submit' name='delete' class='btn-delete'><i class='icon-table fas fa-trash-alt'></i></button></form></td>
                    </tr>";
                
                }

                ?>



            </tbody>

        </table>

    </div>
</div>