<div id="content-admin" class="">
    <h1 class="text-center">Liste des messages</h1>
    <div class="d-flex align-content-center justify-content-center flex-column mx-3">

        <table id="table-admin" class="table table-bordered" cellspacing="0" width="100%">
            <thead class="text-center">
                <tr>
                    <th class="th-sm font-weight-bold">Nom

                    </th>
                    <th class="th-sm font-weight-bold">Prénom

                    </th>
                    <th class="th-sm font-weight-bold">Objet

                    </th>
                    <th class="th-sm font-weight-bold">Voir

                    </th>
                    <th class="th-sm font-weight-bold">Archiver

                    </th>

                </tr>
            </thead>
            <tbody class="text-center">

                <?php
                foreach ($lists as $list) {
                    echo"<tr class='";
                    if($list['seen'] == 0){
                        echo "bg-unseen";
                    }
                    echo "'>
                    <td>{$list['username']}</td>
                    <td>{$list['surname']}</td>
                    <td>{$list['object']}";
                    if($list['seen'] == 0){
                        echo " - Non lu";
                    }
                    echo "</td>
                    <td><a href='".BASE_URI_ADMIN . "index/message_detail/{$list['id']}'><i class='icon-table fas fa-search'></i></a></td>
                    <td><form action='' method='POST'><input type='hidden' name='id' value='{$list['id']}'><button type='submit' name='delete' class='btn-delete'><i class='icon-table fas fa-trash-alt'></i></button></form></td>
                    </tr>";
                
                }

                ?>
                
            </tbody>

        </table>

    </div>
</div>