<div id="content-admin" class="mt-10">
    <h1 class="text-center">Import / Export</h1>
    <form action="" method="POST">
        <h3 class="mx-2 text-center">Exportation</h3>
        <div class="d-md-flex mx-2 justify-content-center">
            <p class="mx-1">Biens enregistrés du</p>
            <input class="mx-1" type="text" id="datepicker-start" name="start">
            <p class="mx-1">au </p>
            <input class="mx-1" type="text" id="datepicker-end" name="end">
        </div>

        <div class=" mx-3 d-flex justify-content-end">
            <button id="btn-preview" name="preview" type="submit" class="btn text-light font-weight-bold">Prévisualiser</button>
        </div>
    </form>
    <?php if (isset($lists)) { ?>
        <div class="d-flex align-content-center justify-content-center flex-column mx-3">
            <h5>Prévisualisation</h5>
            <table id="list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                <thead class="text-center ">
                    <tr>
                        <th class="th-sm font-weight-bold">Référence</th>
                        <th class="th-sm font-weight-bold">Nom</th>
                        <th class="th-sm font-weight-bold">Vendeur</th>
                        <th class="th-sm font-weight-bold">Type</th>
                        <th class="th-sm font-weight-bold">Catégorie</th>
                        <th class="th-sm font-weight-bold">Prix</th>
                        <th class="th-sm font-weight-bold">Surface</th>
                        <th class="th-sm font-weight-bold">Pièces</th>
                        <th class="th-sm font-weight-bold">Chambres</th>
                        <th class="th-sm font-weight-bold">Classe énergétique</th>
                        <th class="th-sm font-weight-bold">Adresse</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    <?php foreach ($lists as $list) {
                        echo "<tr>
                    <td>{$list['reference']}</td>
                    <td>{$list['name']}</td>
                    <td>{$list['surname']} {$list['username']}</td>
                    <td>{$list['type']}</td>
                    <td>";
                        switch ($list['idCategory']) {
                            case 1:
                                echo "Maison";
                                break;
                            case 2:
                                echo "Appartement";
                                break;
                            case 3:
                                echo "Terrain";
                                break;
                            case 4:
                                echo "Jardin";
                                break;
                            case 5:
                                echo "Garage";
                                break;
                            case 6:
                                echo "Parking";
                                break;
                            case 7:
                                echo "Immobilier professionnel";
                                break;
                            default:
                                echo "Inconnue";
                        }
                        echo "</td>
                    <td>{$list['price']} €</td>
                    <td>{$list['surfaceArea']} m²</td>
                    <td>{$list['rooms']}</td>
                    <td>{$list['bedrooms']}</td>
                    <td>{$list['energyClass']}</td>
                    <td>{$list['streetNumber']} {$list['streetName']} {$list['postalCode']} {$list['city']} - {$list['country']}</td></tr>";
                    } ?>
                </tbody>
            </table>
            <form action="" method="POST">
                <div class=" mx-3 d-flex justify-content-end">
                    <button id="btn-export" name="export" type="submit" class="btn text-light font-weight-bold">Exporter</button>
                </div>
            </form>
        </div> 
        <?php } ?>
</div>