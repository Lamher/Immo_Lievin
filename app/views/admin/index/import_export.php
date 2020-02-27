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
            <button id="btn-export" name="export" type="submit" class="btn text-light font-weight-bold">Exporter</button>
        </div>
    </form>
    <?php if (isset($lists)) {
        $count = 0;
        foreach ($lists as $list) {
            $count++;
        }
        echo "<p class='text-center'>Votre liste de $count biens a été exportée.</p>";
    } ?>
</div>