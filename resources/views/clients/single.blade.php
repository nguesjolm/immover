    <!-- Page header-->
    <section class="container pt-5 mt-5">
        <!-- Breadcrumb-->
        <nav class="mb-3 pt-md-3" aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="morehome">Voir tous</a></li>
            <li class="breadcrumb-item"><a href="morehome">{{ReadOperaID(ReadBiensID($biens)->typesoperations_idtypesoperations)->operation}}</a></li>
            <li class="breadcrumb-item active" aria-current="page">{{ReadBiensID($biens)->libele}}</li>
          </ol>
        </nav>
        <h1 class="h2 mb-2">{{ReadBiensID($biens)->libele}}</h1>
        <p class="mb-2 pb-1 fs-lg">{{ReadBiensID($biens)->resume}}</p>
    </section>

    <!-- Gallery-->
    <section class="container overflow-auto mb-4 pb-3" data-simplebar>
        <div class="row g-2 g-md-3 gallery" data-thumbnails="true" style="min-width: 30rem;">
          <div class="col-8"><a class="gallery-item rounded rounded-md-3" href="{{ReadBiensID($biens)->img1}}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Photo 1&lt;/h6&gt;"><img src="{{ReadBiensID($biens)->img1}}" alt="Gallery thumbnail"></a></div>

          <div class="col-4">
            <a class="gallery-item rounded rounded-md-3 mb-2 mb-md-3" href="{{ReadBiensID($biens)->img2}}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Photo 2&lt;/h6&gt;"><img src="{{ReadBiensID($biens)->img2}}" alt="Gallery thumbnail"></a>
            <a class="gallery-item rounded rounded-md-3" href="{{ReadBiensID($biens)->img3}}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Photo 3&lt;/h6&gt;"><img src="{{ReadBiensID($biens)->img3}}" alt="Photo 2"></a>
          </div>
          
          <div class="col-12">
            <div class="row g-2 g-md-3">
              <div class="col"><a class="gallery-item rounded-1 rounded-md-2" href="{{ReadBiensID($biens)->img4}}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Photo 4&lt;/h6&gt;"><img src="{{ReadBiensID($biens)->img4}}" alt="Gallery thumbnail"></a></div>
              <div class="col"><a class="gallery-item rounded-1 rounded-md-2" href="{{ReadBiensID($biens)->img5}}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Photo 5&lt;/h6&gt;"><img src="{{ReadBiensID($biens)->img5}}" alt="Gallery thumbnail"></a></div>
              <div class="col"><a class="gallery-item rounded-1 rounded-md-2" href="{{ReadBiensID($biens)->img6}}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Photo 6&lt;/h6&gt;"><img src="{{ReadBiensID($biens)->img6}}" alt="Gallery thumbnail"></a></div>
              <div class="col"><a class="gallery-item rounded-1 rounded-md-2" href="{{ReadBiensID($biens)->img7}}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Photo 7&lt;/h6&gt;"><img src="{{ReadBiensID($biens)->img7}}" alt="Gallery thumbnail"></a></div>
              <div class="col"><a class="gallery-item more-item rounded-1 rounded-md-2" href="{{ReadBiensID($biens)->img8}}" data-sub-html="&lt;h6 class=&quot;fs-sm text-light&quot;&gt;Photo 8&lt;/h6&gt;"><img src="{{ReadBiensID($biens)->img8}}" alt="Gallery thumbnail"><span class="gallery-item-caption fs-base">+5 <span class='d-none d-md-inline'>photos</span></span></a></div>
            </div>
          </div>

        </div>
    </section>

    <!-- Post content-->
    <section class="container mb-5 pb-1">
        <div class="row">
          <div class="col-md-7 mb-md-0 mb-4">
              <span class="badge bg-success me-2 mb-3">Disponible</span>

              <a href="#"  data-bs-toggle="modal" data-bs-target="#modalshare">
                <span class="badge bg-info me-2 mb-3"><i class="fi-share"></i> Partager</span>
              </a>

              <a href="#" class="imagesBiens">
                <span class="badge bg-warning me-2 mb-3"><i class="fi-eye-on"></i> Voir les photos</span>
              </a>

            <h2 class="h3 mb-4 pb-4 border-bottom">{{formatPrice(ReadBiensID($biens)->prix)}} Fcfa<span class="d-inline-block ms-1 fs-base fw-normal text-body"></span></h2>
            <!-- Property Localisation-->
            <div class="mb-4 pb-md-3">
              <h3 class="h4">Localisation</h3>
              <ul class="list-unstyled mb-0">
                <li><b>Pays: </b>{{ReadpaysId(ReadBiensID($biens)->pays)->pays}}</li>
                <li><b>Villes: </b>{{ReadVilleId(ReadBiensID($biens)->villes)->ville}}</li>
                <li><b>Quartier: </b>{{ReadQuartierID(ReadBiensID($biens)->quartier)->nom}}</li>
              </ul>
            </div>

            <!-- Overview-->
            <div class="mb-4 pb-md-3">
              <h3 class="h4">Détails</h3>
              <p class="mb-1">
                  {{ReadBiensID($biens)->descript}}
              </p>
            </div>
            

           
          </div>
          <!-- Sidebar-->
          <aside class="col-lg-4 col-md-5 ms-lg-auto pb-1">
            <!-- Contact card-->
            <div class="card shadow-sm mb-4">
              <div class="card-body">
                <div class="d-flex align-items-start justify-content-between">
                    <a class="text-decoration-none" href="real-estate-vendor-properties.html">
                     <img class="rounded-circle mb-2" src="assets/img/favicons/mstile-150x150.png" width="60" alt="Avatar">
                     <h5 class="mb-1">Prenez un rendez-vous pour la visite</h5>
                     <div class="mb-1">
                        <span class="star-rating">
                         <i class="star-rating-icon fi-star-filled active"></i>
                         <i class="star-rating-icon fi-star-filled active"></i>
                         <i class="star-rating-icon fi-star-filled active"></i>
                         <i class="star-rating-icon fi-star-filled active"></i>
                         <i class="star-rating-icon fi-star-filled active"></i>
                        </span>
                        <span class="ms-1 fs-sm text-muted"></span>
                     </div>
                     <p class="text-body">
                         
                     </p>
                    </a>
                </div>
                <ul class="list-unstyled border-bottom mb-4 pb-4">
                  <li><a class="nav-link fw-normal p-0"><i class="fi-cash mt-n1 me-2 align-middle opacity-60"></i>Gratuit</a></li>
                  <li><a class="nav-link fw-normal p-0"><i class="fi-alarm mt-n1 me-2 align-middle opacity-60"></i>48 H (2 jrs)</a></li>
                </ul>
                <!-- Contact form-->
                <form class="needs-validation" novalidate>
                    @if(!isset($_SESSION['clientID']))
                    <div>
                        <div class="mb-3">
                            <input class="form-control" id="nomRdv" type="text" placeholder="Votre Nom">
                        </div>

                        <div class="mb-3">
                            <input class="form-control" id="mailRdv" type="email" placeholder="Votre Email">
                        </div>

                        <div class="mb-3">
                          <!--
                            <input class="form-control" id="phoneRdv" type="number" placeholder="Votre Numéro de téléphone">
                          -->
                          <div class="input-group"><span class="input-group-text fs-base">225</span>
                           <input class="form-control" id="phoneRdv" type="number" placeholder="Votre Numéro de téléphone" type="text">
                          </div>
                        </div>
                    </div>
                    @endif


                  <!-- Confirmation moi même -->
                  <!-- <div class="form-check">
                    <input class="form-check-input my" id="form-radio-1" type="radio" name="radios-stacked" checked>
                    <label class="form-check-label" for="form-radio-1">Confrimer moi même</label>
                  </div> -->
                  <!-- Confirmation via un marchand -->
                  <!-- <div class="form-check">
                    <input class="form-check-input yours" id="form-radio-2" type="radio" name="radios-stacked">
                    <label class="form-check-label" for="form-radio-2">Confirmer via un Marchand LogRapid</label>
                  </div> -->
                  <!-- Confirmation Agent LogRapid -->
                  <!-- <div class="form-check">
                    <input class="form-check-input agent" id="form-radio-3" type="radio" name="radios-stacked">
                    <label class="form-check-label" for="form-radio-3">Confirmer via un Agent LogRapid</label>
                  </div> -->

                  <!-- Coupons Immover -->
                  <!-- <div class="form-check">
                    <input class="form-check-input coupon" id="form-radio-4" type="radio" name="radios-stacked">
                    <label class="form-check-label" for="form-radio-4">Coupon Immover</label>
                  </div> -->
                 
                  <!-- Code marchand -->
                  <div class="mb-3">
                    <input class="codemarchd form-control codemarchd" type="number" placeholder="Code Marchand">
                    <div class="invalid-feedback">Code Marchand</div>
                  </div>

                  <!-- Code Agent LogRapid -->
                  <div class="mb-3">
                    <input class="form-control codeagent" type="number" placeholder="Code Agent LogRapid">
                    <div class="invalid-feedback">Code Agent LogRapid</div>
                  </div>

                  <!-- Coupons Immover -->
                  <!-- <div class="mb-3">
                    <input class="form-control couponImv" type="number" placeholder="Coupon">
                    <div class="invalid-feedback">Coupons Immover</div>
                  </div> -->

                  <!-- Code biens -->
                  <input type="hidden" id="codebiens" value="{{ReadBiensID($biens)->idbiens}}">
                  
                  <span class="text-danger infos"></span>
                  @if(ReadBiensID($biens)->statut==0)
                   <button class="btn btn-lg btn-primary d-block w-100 takerdv" type="button">Valider</button>
                  @else
                   <button class="btn btn-lg btn-success d-block w-100" type="button">Indisponible</button>
                  @endif
                 
                  
                </form>
              </div>
            </div>
            
          </aside>
        </div>
    </section>

