<div id="content-admin" class="mt-10">
    <h1 class="text-center">Liste des biens</h1>
    <?= isset($imageErrors)?'Erreur':''; ?>
    <div class="d-flex align-content-center justify-content-center flex-column mx-3">
    <?= isset($errors['name'])?"{$errors['name']}":"" ?>
        <a id="btn-add" type="button" class="btn text-light font-weight-bold" href="<?= BASE_URI_ADMIN . 'index/property_create' ?>">Ajouter un bien</a>
        <table id="table-admin" class="table table-striped table-bordered" cellspacing="0" width="100%">
            <thead class="text-center ">
                <tr>
                    <th class="th-sm font-weight-bold">Référence

                    </th>
                    <th class="th-sm font-weight-bold">Vendeur

                    </th>
                    <th class="th-sm font-weight-bold">Mettre en avant

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
                        echo "<tr>
                    <td>{$list['reference']}</td>
                    <td>{$list['surname']} {$list['username']}</td>
                    <td>
                        <div class='form-check'>
                            <form action='' method='POST'><input type='hidden' name ='id' value='{$list['id']}'><input type='checkbox' class='form-check-input' id='indexTop{$list['id']}' name='indexTop' onChange='submit()'";
                        echo ($list["indexTop"] == 1) ? "checked" : "";
                        echo "></form>
                        </div>
                    </td>
                    <td><a href='" . BASE_URI_ADMIN . "index/property_update/{$list['id']}'><i class='icon-table fas fa-pen'></i></a></td>
                    <td><form action='' method='POST'><input type='hidden' name='id' value='{$list['id']}'><button type='submit' name='delete' class='btn-delete'><i class='icon-table fas fa-trash-alt'></i></button></form></td>
                </tr>";
                    
                }

                ?>
            </tbody>

        </table>

    </div>
</div>