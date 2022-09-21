<div class="card mb-3">
    <div class="bg-holder d-none d-lg-block bg-card" style="background-image:url(../assets/img/illustrations/corner-4.png);">
    </div>
    <!--/.bg-holder-->
    <div class="card-body">
        <div class="row">
            <div class="col-lg-8">
                <h3 class="mb-0">Lancer une campagne commerciale</h3>
                <p class="mt-2">
                Envoyer à la base de données LogRapid une promotion des biens touristiques disponibles afin d'inciter de potentiels clients.
                </p>
            </div>
        </div>
    </div>
</div>


<div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Nouvelle campagne</h5>
            </div>
            <div class="card-body bg-light">
              <div class="row">
                <div class="col-12">

                    <form>

                        <!-- Cible -->
                        <div class="form-group">
                         <label for="cible">Cible</label>
                         <select class="form-control cible" id="cible">
                            <option></option>
                            <option value='abonne'>Abonnés LogRapid</option>
                            <option value='abone'>Marchand LogRapid</option>
                            <option value='abone'>Gérant LogRapid</option>
                         </select>
                         <input type='hidden' class='cibleInput'>
                        </div>

                        <!-- Type SMS/MAIL -->
                        <div class="form-group">
                         <label for="pays">Type de campagne</label>
                         <select class="form-control typecamp" id="typecamp">
                            <option></option>
                            <option value='sms'>SMS</option>
                            <option value='mail'>Email</option>
                         </select>
                         <input type='hidden' class='typecampInput'>
                        </div>

                        <!-- Sender ID -->
                        <div class="form-group">
                         <label for="sender">Sender</label>
                         <select class="form-control sender" id="sender">
                            <option></option>
                            <option value='Shepha'>LogRapid</option>
                         </select>
                         <input type='hidden' class='senderInput'>
                        </div>

                        <!-- Libelle -->
                        <div class="form-group">
                         <label for="name">Titre</label>
                         <input class="form-control title" id="titre" type="text">
                        </div>

                        <!-- Message -->
                        <div class="form-group">
                         <label for="description">Message</label>
                         <textarea class="form-control msg" id="description" rows="3"></textarea>
                        </div>
                        
                        <button class="btn btn-primary mb-3 sendCamp" type="button">Envoyer</button>
                        <span class='text-danger alertMsg'></span>

                    </form>
                  
                </div>