<!-- Page container-->
<div class="container mt-5 mb-md-4 py-5">
      
        <!-- Account header-->
        <div class="d-flex align-items-center justify-content-between pb-4 mb-2">
          <div class="d-flex align-items-center">
            <div class="position-relative flex-shrink-0"><img class="rounded-circle border border-white" src="assets/img/favicons/mstile-150x150.png" width="100" alt="Annette Black">
              <button class="btn btn-icon btn-light btn-xs rounded-circle shadow-sm position-absolute end-0 bottom-0" type="button" data-bs-toggle="tooltip" title="Change image"><i class="fi-heart-filled fs-xs text-primary"></i></button>
            </div>
            <div class="ps-3 ps-sm-4">
              <h3 class="h4 mb-2">{{ReadClientID($_SESSION['clientID'])->nom}}</h3><span class="star-rating"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i></span>
            </div>
          </div><a class="nav-link p-0 d-none d-md-block" href="logoutLog"><i class="fi-logout mt-n1 me-2"></i>Se déconnecter</a>
        </div>
        <!-- Page content-->
        <div class="card card-body p-4 p-md-5 shadow-sm">
          <!-- Account nav-->
          <div class="mt-md-n3 mb-4"><a class="btn btn-outline-primary btn-lg rounded-pill w-100 d-md-none" href="#account-nav" data-bs-toggle="collapse"><i class="fi-align-justify me-2"></i>Menu</a>
            <div class="collapse d-md-block" id="account-nav">
                
              <ul class="nav nav-pills flex-column flex-md-row pt-3 pt-md-0 pb-md-4 border-bottom-md">
                <li class="nav-item mb-md-0 me-md-2 pe-md-1"><a class="nav-link" href="count"><i class="fi-user mt-n1 me-2 fs-base"></i> Mon Compte</a></li>
                <li class="nav-item mb-md-0 me-md-2 pe-md-1"><a class="nav-link" href="visitesNew" aria-current="page"><i class="fi-star mt-n1 me-2 fs-base"></i> Visite Nouvelle ({{count(AllVisiteClient($_SESSION['clientID'],0))}})</a></li>
                <li class="nav-item mb-md-0 me-md-2 pe-md-1"><a class="nav-link active" href="visitesEffect"><i class="fi-check-circle mt-n1 me-2 fs-base"></i> Visite Effectuée ({{count(AllVisiteClient($_SESSION['clientID'],3))}})</a></li>
                <li class="nav-item mb-md-0 me-md-2 pe-md-1"><a class="nav-link" href="visitesSold"><i class="fi-wallet mt-n1 me-2 fs-base"></i> Visite Soldée ({{count(AllVisiteClient($_SESSION['clientID'],4))}})</a></li>
                <li class="nav-item mb-md-0 me-md-2 pe-md-1"><a class="nav-link" href="visitesAnnul"><i class="fi-credit-card-off mt-n1 me-2 fs-base"></i> Visite Annulée ({{count(AllVisiteClient($_SESSION['clientID'],2))}})</a></li>
                <li class="nav-item mb-md-0 me-md-2 pe-md-1"><a class="nav-link" href="coupons"><i class="fi-entertainment mt-n1 me-2 fs-base"></i> Mes coupons</a></li>
                <li class="nav-item d-md-none"><a class="nav-link" href="logoutLog"><i class="fi-logout mt-n1 me-2 fs-base"></i>Se déconnecter</a></li>
              </ul>
            </div>
          </div>

          <div class="alert alert-primary" role="alert">
             <i class="fi-check-circle mt-n1 me-2 fs-base"></i> Visites Effectuées({{count(AllVisiteClient($_SESSION['clientID'],3))}})
           </div>
          
          @if(count(AllVisiteClient($_SESSION['clientID'],3))!=0)
          <!-- Favorites grid-->
          <div class="row row-cols-lg-3 row-cols-sm-2 row-cols-1 gy-4 gx-3 gx-lg-4">
            <?php foreach (AllVisiteClient($_SESSION['clientID'],3) as $visite) { ?>
            <!-- Item-->
            <div class="col pt-2">
              <div class="position-relative">
                <div class="position-relative mb-3">
                  <button class="btn btn-icon btn-primary btn-xs text-white rounded-circle position-absolute top-0 end-0 m-3 zindex-5" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Remove from Favorites"><i class="fi-check-circle"></i></button><img class="rounded-3" src="{{ReadBiensID($visite->idbiens)->img1}}" alt="Article img">
                </div>
                <span class="text-danger"><b>{{ReadOperaID(ReadBiensID($visite->idbiens)->typesoperations_idtypesoperations)->operation}}</b></span>
                <h3 class="mb-2 fs-lg"><a class="nav-link" href="single?biens={{$visite->idbiens}}">{{ReadBiensID($visite->idbiens)->libele}}</a></h3>
                
                <span>Code visite : {{$visite->codevisites}} </span><br>
                <span>Code du biens: {{ReadBiensID($visite->idbiens)->codebiens}}</span>
                
                <ul class="list-inline mb-0 fs-xs">
                  <li class="list-inline-item pe-1"><i class="fi-phone mt-n1 me-1 fs-base text-warning align-middle"></i><span class="text-muted"> <b>{{ReadgerantID($visite->idgerants)->phone}}</b></span></li>
                  <li class="list-inline-item pe-1"><i class="fi-mail mt-n1 me-1 fs-base text-warning align-middle"></i><span class="text-muted"> <b>{{ReadgerantID($visite->idgerants)->mail}}</b></span></li>
                  <li class="list-inline-item pe-1"><i class="fi-map-pin mt-n1 me-1 fs-base text-warning align-middle"></i> {{ReadVilleId(ReadBiensID($visite->idbiens)->villes)->ville}} - {{ReadQuartierID(ReadBiensID($visite->idbiens)->quartier)->nom}}</li>
                  <li class="list-inline-item pe-1"><i class="fi-credit-card mt-n1 me-1 fs-base text-warning align-middle"></i>{{formatPrice(ReadBiensID($visite->idbiens)->prix)}} Fcfa</li>
                  <b><li class="list-inline-item pe-1"><i class="fi-alarm mt-n1 me-1 fs-base text-warning align-middle"></i> Rdv : Du {{$visite->daterdvprise}} au {{$visite->datevisite}}</li></b>
                </ul>
                <span class="badge rounded-pill bg-warning">Effectué</span>
              </div>
            </div>
            <?php } ?>
          </div>
          @else
          <span>Aucune visites effectuées</span>
          @endif
        </div>
      </div>