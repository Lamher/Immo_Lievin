<div id="content" class="mt-10">

    <h1 class="text-center">Contact</h1>
    <form id="add_user_form" action="" method="POST" class="mx-2">
    <input type="hidden" name="token" value="<?= (isset($_SESSION['token']))?$_SESSION['token']:'' ?>">
        <div class="col-md-8 offset-md-2">
            <div class="form-group">
                <label for="object">Objet</label>
                <input type="text" class="form-control" id="object" name="object" placeholder="Objet">
                <?= isset($errors['object'])?"{$errors['object']}":"" ?>
            </div>
            <div class="form-group">
                <label for="textarea">Message</label>
                <textarea class="form-control" id="content" name="content" rows="8" placeholder="Ecrivez votre message !"></textarea>
                <?= isset($errors['content'])?"{$errors['content']}":"" ?>
            </div>
            <div class=" mx-2 d-flex justify-content-end">
                <button id="btn-contact" name="send" type="submit" class="btn text-light font-weight-bold shadow-sm">Envoyer</button>
            </div>

        </div>
    </form>
</div>