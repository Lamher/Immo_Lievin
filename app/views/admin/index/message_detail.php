<div id="content-admin" class="mt-10">
    <h1 class="text-center">Message detail</h1>
    <div class="mx-2">
        <div class="d-flex align-items-center">
            <div class="col-md-6">
                <span class="mx-2"><?= $username ?></span>
                <span class="mx-2"><?= $surname ?></span>
                <span class="mx-2"><?= $mail ?></span>
            </div>
            <form action="" method="POST" class="col-md-6">
                <div class=" mx-2 d-flex justify-content-end">

                <form action='' method='POST'><input type='hidden' name='id' value='<?= $id ?>'><button id="btn-delete" name="delete" type="submit" class="btn text-light font-weight-bold">Archiver</button></form>

                    
                </div>
            </form>
        </div>
        <h3 class="mx-2"><?= $object ?></h3>
        <p class="text-justify mx-2"><?= $content ?></p>
    </div>
</div>