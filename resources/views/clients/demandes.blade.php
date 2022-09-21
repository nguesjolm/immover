<div class="container-fluid mt-5 pt-5 p-0">
        <div class="row g-0 mt-n3">
          <!-- Filters sidebar (Offcanvas on mobile)-->
          <aside class="col-lg-4 col-xl-3 border-top-lg border-end-lg shadow-sm px-3 px-xl-4 px-xxl-5 pt-lg-2">
            <div class="offcanvas offcanvas-start offcanvas-collapse" id="filters-sidebar">
              
              <div class="offcanvas-header d-flex d-lg-none align-items-center">
                <h2 class="h5 mb-0">Filtrer</h2>
                <button class="btn-close" type="button" data-bs-dismiss="offcanvas"></button>
              </div>

              <div class="offcanvas-header d-block border-bottom pt-0 pt-lg-4 px-lg-0">
                <!-- Type d'operation -->
                <label for="select-input" class="form-label"><b>Type Operation</b></label>
                <select class="form-select" id="operation">
                  <option value="0">Choisir</option>
                  @foreach(ReadOpera() as $opera)
                   <option value="{{$opera->idtypesoperations}}">{{$opera->operation}}</option>
                  @endforeach
                </select>
                <input type="hidden" class="operaFilt">
              </div>

              <div class="offcanvas-body py-lg-4">

                <div class="pb-4 mb-2">
                  <h3 class="h6">Pays</h3>
                  <select class="form-select mb-2" id="paySelect">
                    <option>Choisir</option>
                    @foreach(ReadPaysAll() as $pays)
                     <option value="{{$pays->idpays}}">{{$pays->pays}}</option>
                    @endforeach
                  </select>
                  <input type="hidden" class="paysFilt">

                  <h3 class="h6 villeLabel">Ville</h3>
                  <select class="form-select mb-2" id="villes">
                    <option>Choisir</option>
                      @foreach(ReadVille() as $ville)
                        <option value="{{$ville->idvilles}}">{{$ville->ville}}</option>
                      @endforeach
                  </select>
                  <input type="hidden" class="villeFilt">

                  <h3 class="h6 quartierLabel">Quartier</h3>
                  <select class="form-select mb-2" id="quartier">
                    <option>Choisir</option>
                    @foreach(ReadQuart() as $quart)
                     <option value="{{$quart->idquartier}}">{{$quart->nom}}</option>
                    @endforeach
                  </select>
                  <input type="hidden" class="quartierFilt">

                  <h3 class="h6">Type de biens</h3>
                  <select class="form-select mb-2" id="typebiens">
                    <option>Choisir</option>
                    @foreach(ReadTypebiens() as $types)
                    <option value="{{$types->idtypes}}">{{$types->types}}</option>
                    @endforeach
                  </select>
                  <input type="hidden" class="typebiensFilt">

                 

                </div>

                <div class="border-top py-4">

                  <span class="text-danger alerFilt"></span>
                  <button class="btn btn-outline-primary findSearch" type="button"><i class="fi-search me-2"></i>
                    Trouver
                  </button>
                </div>
               

              </div>
            
            </div>
          </aside>
          <!-- Page content-->
          <div class="col-lg-8 col-xl-9 position-relative overflow-hidden pb-5 pt-4 px-3 px-xl-4 px-xxl-5">
            <!-- Map popup-->
            <div class="map-popup invisible" id="map">
              <button class="btn btn-icon btn-light btn-sm shadow-sm rounded-circle" type="button" data-bs-toggle-class="invisible" data-bs-target="#map"><i class="fi-x fs-xs"></i></button>
              <div class="interactive-map" data-map-options-json="json/map-options-real-estate-rent.json"></div>
            </div>
            <!-- Breadcrumb-->
            <nav class="mb-3 pt-md-2" aria-label="Breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="demandes">Toutes les demandes</a></li>
                <li class="breadcrumb-item active" aria-current="page">Location et Achat immobilier</li>
              </ol>
            </nav>
            <!-- Title-->
            <div class="d-sm-flex align-items-center justify-content-between pb-3 pb-sm-4" id="resultProd">
              <h1 class="h2 mb-sm-0">Demandes des locataires et acheteurs</h1>
            </div>
            
            <!-- Catalog grid::produit -->
            <div class="row g-4 py-4 produitFilt">
            
              <?php foreach(ReadDemand(3) as $demand) { ?>
                <!-- Item -->
                <div class="col-sm-6 col-xl-4">
                  <div class="card shadow-sm card-hover border-0 h-100">

                    <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="#"></a>
                      <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success">Dispo</span></div>
                      <div class="content-overlay end-0 top-0 pt-3 pe-3">
                        <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                      </div>
                      
                    </div>

                    <div class="card-body position-relative pb-3">
                      <h4 class="mb-1 fs-xs  text-uppercase text-primary">{{ReadOperaID($demand->opera)->operation}}</h4>
                      <h3 class="mb-2 fs-base"><a class="nav-link stretched-link" href="#">{{ReadTypesID($demand->typesbiens)->types}}</a></h3>
                      <p class="mb-2 fs-sm fw-bold">{{$demand->more}}</p>
                      <div class="fw-normal">
                        Code Demande: {{$demand->codes}}<br>
                        Pays: {{ReadpaysId($demand->pays)->pays}} <br> Ville: {{ReadVilleId($demand->villes)->ville}} <br>Quartier: {{ReadQuartierID($demand->quartier)->nom}}
                      </div>
                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap">
                      <a href="#" class="soumet" id="{{$demand->codes}}">
                        <button type="button" class="btn btn-outline-primary rounded-pill">
                         <i class="fi-cloud-upload ms-1 mt-n1 fs-lg text-muted"></i> Soumettre un bien
                        </button>
                      </a>
                    </div>

                  </div>
                </div>
              <?php } ?>
              

            </div>
           
          </div>
        </div>
      </div>


<!-- Modal markup -->
<div class="modal" tabindex="-1" role="dialog" id="contact">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title titreD"></h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <p>Si vous avez un bien qui correspond à cette demande, veuillez entrer votre numéro de téléphone,
          nous vous contactons dans 24H pour procéder à la transaction immobilière.
        </p>
        <div class="mb-3">
         <label for="text-input" class="form-label">Phone</label>
         <input class="form-control phoneP" type="number" id="text-input">
         <input class="form-control codeP" type="hidden" id="text-input">
        </div>
        <span class="info"></span>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Fermer</button>
        <button type="button" class="btn btn-primary btn-sm soumt">SOUMETTRE</button>
      </div>
    </div>
  </div>
</div>