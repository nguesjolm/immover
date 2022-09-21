<div class="container-center mt-5 pt-5 p-0">
    <div class="card col-lg-6" style="margin-bottom:4%;margin-left:4%;margin-right:4%;">
        <div class="card-body">
         <h5 class="card-title">Compte offreur ImmOver</h5>
         <form method="POST" id="offreForm" enctype="multipart/form-data">
          @csrf
         <!-- Phase 1 : Identité -->
         <div class="card-text fs-sm identity">
            <div class="form-label fw-bold pt-3 pb-2">
                1- Quel est votre Identité ?
            </div>
            
            <div class="form-check">
                <input class="form-check-input" type="radio" id="physique" name="identity" value="personne physique">
                <label class="form-check-label" for="physique">Personne physique</br>(Agent Immobilier, Démarcheur, Propriétaire)</label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" id="morale" name="identity" value="personne morale">
                <label class="form-check-label" for="morale">Personne morale</br>(Agence Immobilière)</label>
            </div>
            <input type='hidden' class='checkId'>

            <!-- CNI :: Si personne physique -->
            </br><div class="col-sm-6 mb-3 Ncni">
             <label class="form-label" for="cni">Photo de votre CNI</label>
             <input class="form-control" type="file" id="cni" name='cni'>
            </div>
            <!-- Compte  contribuable :: si Morale -->
            <div class="col-sm-6 mb-3 Nimpot">
             <label class="form-label" for="impot">Photo de votre DFE</br>(Déclaration d'existence fiscale)</label>
             <input class="form-control" type="file" id="impot" name='impot'>
            </div>

            </br>
            <!-- Suivant -->
            <a href="#" class="step2"><span class="badge bg-info">
             <i class="fi-arrow-right"></i> Suivant
             </span>
            </a>

         </div>

         <!-- Phase 2 : Infos -->
         <div class="card-text fs-sm infos">
            <div class="form-label fw-bold pt-3 pb-2">
                2- Quels sont vos contacts ?
            </div>

            <div class="col-sm-6 mb-3">
             <label class="form-label" for="nom">Nom</label>
             <input class="form-control nom" type="text" id="nom" name="nom">
            </div>

            <div class="col-sm-6 mb-3">
             <label class="form-label" for="mail">Email</label>
             <input class="form-control mail" type="text" id="mail" name="mail">
            </div>

            <div class="col-sm-6 mb-3">
             <label class="form-label" for="tel">Téléphone</label>
             <input class="form-control" type="number" id="tel" name="tel">
            </div>

            <!-- Retour -->
            <a href="#" class="step1" 
               style="margin-left:2%;margin-right:2%;">
             <span class="badge bg-warning">
             <i class="fi-arrow-left"></i> Retour
             </span>
            </a>

            <!-- Suivant -->
            <a href="#" class="step3"><span class="badge bg-info">
             <i class="fi-arrow-right"></i> Suivant
             </span>
            </a>

         </div>

         <!-- Phase 3 : Profil ImmOver -->
         <div class="card-text fs-sm profil">
            <div class="form-label fw-bold pt-3 pb-2">
                3- Quel profil ImmOver optez-vous ?
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" id="agence-agree" name="profil" value="agence agree">
                <label class="form-check-label agence-agree" for="agence-agree">Agence Immobilière agréee</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" id="agence" name="profil" value="agence non agree">
                <label class="form-check-label agence" for="agence">Agence Immobilière non agréee</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" id="agent-immobilier" name="profil" value="agent immobilier">
                <label class="form-check-label agent-immobilier" for="agent-immobilier">Agent Immobilier</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" id="proprietaire" name="profil" value="proprietaire">
                <label class="form-check-label proprietaire" for="proprietaire">Propriétaire</label>
            </div>

            <div class="form-check">
                <input class="form-check-input" type="radio" id="demarcheur" name="profil" value="demarcheur">
                <label class="form-check-label demarcheur" for="demarcheur">Démarcheur</label>
            </div>
            
             <div class="form-check">
                <input class="form-check-input" type="radio" id="particulier" name="profil" value="particulier">
                <label class="form-check-label particulier" for="particulier">Particulier</label>
            </div>

            <input type="hidden" class="profilId">
            

             <!-- Agence agréee :: Numéro d'agrément -->
            <div class="col-sm-6 mb-3 agrement">
             <label class="form-label" for="agreenum">Numéro d'agréement</label>
             <input class="form-control" type="text" id="agreenum" name="agreenum">
            </div>

            </br>

            <!-- Retour -->
            <a href="#" class="step2" 
               style="margin-left:2%;margin-right:2%;">
             <span class="badge bg-warning">
             <i class="fi-arrow-left"></i> Retour
             </span>
            </a>
            
            <!-- Suivant -->
            <a href="#" class="create"><span class="badge bg-success alertT">
             <i class="fi-check"></i> Valider
             </span>
            </a>

         </div>

         </form>


         <!-- <a href="#" class="btn btn-sm btn-primary">Go somewhere</a> -->
        </div>
    </div>
</div>   