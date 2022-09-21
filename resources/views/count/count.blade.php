<!-- Page container-->
<div class="container mt-5 mb-md-4 py-5">
      
        <!-- Account header-->
        <div class="d-flex align-items-center justify-content-between pb-4 mb-2">
          <div class="d-flex align-items-center">
            <div class="position-relative flex-shrink-0"><img class="rounded-circle border border-white" src="assets/img/favicons/mstile-150x150.png" width="100" alt="Annette Black">
              <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm position-absolute end-0 bottom-0" type="button" data-bs-toggle="tooltip" title="Change image"><i class="fi-heart-filled fs-xs text-primary"></i></button>
            </div>
            <div class="ps-3 ps-sm-4">
              <h3 class="h4 mb-2">{{ReadClientID($_SESSION['clientID'])->nom}}</h3>
              <span class="star-rating"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i></span>
            </div>
          </div><a class="nav-link p-0 d-none d-md-block" href="logoutLog"><i class="fi-logout mt-n1 me-2"></i>Se déconnecter</a>
        </div>
        <!-- Page content-->
        <div class="card card-body p-4 p-md-5 shadow-sm">
          <!-- Account nav-->
          <div class="mt-md-n3 mb-4"><a class="btn btn-outline-primary btn-lg rounded-pill w-100 d-md-none" href="#account-nav" data-bs-toggle="collapse"><i class="fi-align-justify me-2"></i>Menu</a>
            <div class="collapse d-md-block" id="account-nav">
                
              <ul class="nav nav-pills flex-column flex-md-row pt-3 pt-md-0 pb-md-4 border-bottom-md">
                <li class="nav-item mb-md-0 me-md-2 pe-md-1"><a class="nav-link active" href="count"><i class="fi-user mt-n1 me-2 fs-base"></i> Mon Compte</a></li>
                <li class="nav-item mb-md-0 me-md-2 pe-md-1"><a class="nav-link" href="visitesNew" aria-current="page"><i class="fi-star mt-n1 me-2 fs-base"></i> Visite Nouvelle ({{count(AllVisiteClient($_SESSION['clientID'],0))}})</a></li>
                <li class="nav-item mb-md-0 me-md-2 pe-md-1"><a class="nav-link" href="visitesEffect"><i class="fi-check-circle mt-n1 me-2 fs-base"></i> Visite Effectuée ({{count(AllVisiteClient($_SESSION['clientID'],3))}})</a></li>
                <li class="nav-item mb-md-0 me-md-2 pe-md-1"><a class="nav-link" href="visitesSold"><i class="fi-wallet mt-n1 me-2 fs-base"></i> Visite Soldée ({{count(AllVisiteClient($_SESSION['clientID'],4))}})</a></li>
                <li class="nav-item mb-md-0 me-md-2 pe-md-1"><a class="nav-link" href="visitesAnnul"><i class="fi-credit-card-off mt-n1 me-2 fs-base"></i> Visite Annulée ({{count(AllVisiteClient($_SESSION['clientID'],2))}})</a></li>
                <li class="nav-item mb-md-0 me-md-2 pe-md-1"><a class="nav-link" href="coupons"><i class="fi-entertainment mt-n1 me-2 fs-base"></i> Mes coupons</a></li>
                <li class="nav-item d-md-none"><a class="nav-link" href="logoutLog"><i class="fi-logout mt-n1 me-2 fs-base"></i>Se déconnecter</a></li>
              </ul>
            </div>
          </div>

          <div class="alert alert-primary" role="alert">
             <i class="fi-user mt-n1 me-2 fs-base"></i> Mon Compte Immover
           </div>
         
            <div class="border rounded-3 p-3 mb-4" id="personal-info">

              <!-- Nom  client -->
              <div class="border-bottom pb-3 mb-3">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="pe-2">
                    <label class="form-label fw-bold">Mon Nom</label>
                    <div id="name-value">{{ReadClientID($_SESSION['clientID'])->nom}}</div>
                  </div>
                  <div class="me-n3" data-bs-toggle="tooltip" title="Edit"><a class="nav-link py-0" href="#name-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                </div>
                <div class="collapse" id="name-collapse" data-bs-parent="#personal-info">
                  <input class="nom form-control mt-3" type="text" data-bs-binded-element="#name-value" data-bs-unset-value="Not specified" value="{{ReadClientID($_SESSION['clientID'])->nom}}">
                </div>
              </div>

              <!-- Email client -->
              <div class="border-bottom pb-3 mb-3">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="pe-2">
                    <label class="form-label fw-bold">Mon Email</label>
                    <div id="email-value">{{ReadClientID($_SESSION['clientID'])->mail}}</div>
                  </div>
                  <div class="me-n3" data-bs-toggle="tooltip" title="Edit"><a class="nav-link py-0" href="#email-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                </div>
                <div class="collapse" id="email-collapse" data-bs-parent="#personal-info">
                  <input class="mail form-control mt-3" type="email" data-bs-binded-element="#email-value" data-bs-unset-value="Not specified" value="{{ReadClientID($_SESSION['clientID'])->mail}}">
                </div>
              </div>

              <!-- Phone number client -->
              <div class="border-bottom pb-3 mb-3">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="pe-2">
                    <label class="form-label fw-bold">Mon Téléphone</label>
                    <div id="phone-value">{{ReadClientID($_SESSION['clientID'])->phone}}</div>
                  </div>
                  <div class="me-n3" data-bs-toggle="tooltip" title="Edit"><a class="nav-link py-0" href="#phone-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                </div>
                <div class="collapse" id="phone-collapse" data-bs-parent="#personal-info">
                  <input class="phone form-control mt-3" type="text" data-bs-binded-element="#phone-value" data-bs-unset-value="Not specified" value="{{ReadClientID($_SESSION['clientID'])->phone}}">
                </div>
              </div>

              <!-- Mot de passe Client -->
              <div class="border-bottom pb-3 mb-3">
                <div class="d-flex align-items-center justify-content-between">
                  <div class="pe-2">
                    <label class="form-label fw-bold">Mot de Passe</label>
                    <div id="company-value">{{ReadClientID($_SESSION['clientID'])->pass}}</div>
                  </div>
                  <div class="me-n3" data-bs-toggle="tooltip" title="Edit"><a class="nav-link py-0" href="#company-collapse" data-bs-toggle="collapse"><i class="fi-edit"></i></a></div>
                </div>
                <div class="collapse" id="company-collapse" data-bs-parent="#personal-info">
                  <input class="pass form-control mt-3" type="text" data-bs-binded-element="#company-value" data-bs-unset-value="Not specified" value="{{ReadClientID($_SESSION['clientID'])->pass}}">
                </div>
              </div>
             
            </div>

            <!-- Boutton de Mise à jour -->
            <div class="col-6">
              <span class="alertcount"></span><br>
              <button type="button" class="updcount btn btn-outline-primary rounded-pill"><i class="fi-edit"></i> Mettre à jour</button>
            </div>

        </div>
      </div>