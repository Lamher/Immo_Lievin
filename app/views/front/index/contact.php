<div id="content" class="mt-10">
    <h1 class="text-center">Contact</h1>
    <form id="add_user_form" action="" method="POST" class="mx-2">
        <div class="d-md-flex">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="name">Nom</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Nom">
                </div>
                <div class="form-group">
                    <label for="surname">Prénom</label>
                    <input type="email" class="form-control" id="surname" name="surname" placeholder="Prénom">
                </div>
                <div class="form-group">
                    <label for="mail">Email</label>
                    <input type="email" class="form-control" id="mail" name="mail" aria-describedby="emailHelp"
                           placeholder="Email">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="textarea">Message</label>
                    <textarea class="form-control text-center" id="exampleFormControlTextarea1" rows="8"
                              placeholder="Ecrivez votre message !"></textarea>
                </div>
            </div>
            <div class=" mx-2 d-flex justify-content-end">
                <button id="btnInscription" name="add-user" type="submit" class="btn text-light font-weight-bold mb-5">
                    S' inscrire
                </button>
            </div>
    </form>
</div>