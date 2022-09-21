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
                <ul class="nav nav-tabs mb-0">
                  <!--<li class="nav-item text-primary"><a class="nav-link" href="locate"><i class="fi-rent fs-base me-2"></i>Location</a></li>-->
                  <li class="nav-item"><a class="nav-link active" href="locate"><i class="fi-rent fs-base me-2"></i>Location</a></li>

                  <li class="nav-item"><a class="nav-link" href="buy"><i class="fi-home fs-base me-2"></i>Achat</a></li>
                </ul>
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

                  {{--<h3 class="h6">Intervalle de prix (Fcfa)</h3>
                  <div class="d-flex align-items-center">
                    <div class="w-50 pe-2">
                      <div class="input-group">
                        <input id="minprice" class="form-control range-slider-value-min" type="number" placeholder="00">
                      </div>
                    </div>
                    <div class="text-muted">&mdash;</div>
                    <div class="w-50 ps-2">
                      <div class="input-group">
                        <input id="maxprice" class="form-control range-slider-value-max" type="number" placeholder="00">
                      </div>
                    </div>
                  </div> --}}

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
                <li class="breadcrumb-item"><a href="morehome">Tous voir</a></li>
                <li class="breadcrumb-item active" aria-current="page">Location de biens immobilier</li>
              </ol>
            </nav>
            <!-- Title-->
            <div class="d-sm-flex align-items-center justify-content-between pb-3 pb-sm-4" id="resultProd">
              <h1 class="h2 mb-sm-0">Biens disponibles</h1>
            </div>
            <!-- Barre de recherche -->
            <div class="d-flex flex-sm-row flex-column align-items-sm-center align-items-stretch my-2">
              
              <div class="form-floating mb-3 col-lg-6">
                <input class="form-control searchBiens" id="floating-input" type="text" placeholder="John">
                <label for="floating-input">Rechercher</label>

                <!-- Result of search -->
                <ul class="list-group" id="searchRes">
                  
                </ul>

              </div>

              

            </div>
            <!-- Catalog grid::produit -->
            <div class="row g-4 py-4 produitFilt">
            @if(count(AllbiensOpera(8))!=0)
              <?php foreach(AllbiensOpera(8) as $biens) { ?>
                <!-- Item-->
                <div class="col-sm-6 col-xl-4">
                  <div class="card shadow-sm card-hover border-0 h-100">
                    <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="#"></a>
                      <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success">Dispo</span></div>
                      <div class="content-overlay end-0 top-0 pt-3 pe-3">
                        <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                      </div>
                      <div class="tns-carousel-inner">
                        <img src="{{$biens->img1}}" alt="Image">
                        <img src="{{$biens->img3}}" alt="Image">
                      </div>
                    </div>
                    <div class="card-body position-relative pb-3">
                      <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">{{ReadOperaID($biens->typesoperations_idtypesoperations)->operation}}</h4>
                      
                      <span class="text-success"><i class="fi-map-pin mt-n1 me-2 lead align-middle opacity-70"></i>{{ReadPaysID($biens->pays)->pays}} - {{ReadVillID($biens->villes)->ville}} - {{ReadQuartierID($biens->quartier)->nom}} </span>


                      <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="#">{{$biens->libele}}</a></h3>
                      <p class="mb-2 fs-sm text-muted">{{$biens->resume}}</p>
                      <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>{{$biens->prix}} Fcfa</div>
                    </div>

                    <div class="card-footer d-flex align-items-center justify-content-center mx-3 pt-3 text-nowrap">
                      <a href="single?biens={{$biens->idbiens}}">
                        <button type="button" class="btn btn-outline-primary rounded-pill">
                         <i class="fi-heart-filled ms-1 mt-n1 fs-lg text-muted"></i> Visiter
                        </button>
                      </a>
                    </div>

                  </div>
                </div>
              <?php } ?>
            @else
            <div class="alert alert-primary" role="alert">
              Aucun biens immobiliers disponible pour la location
            </div>
            @endif

            </div>
           
          </div>
        </div>
      </div>