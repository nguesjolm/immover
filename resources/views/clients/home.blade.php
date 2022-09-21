
<!-- Page content-->
      <!-- Hero-->
      <section class="container pt-5 my-5 pb-lg-4">
        <div class="row pt-0 pt-md-2 pt-lg-0">
          <div class="col-xl-7 col-lg-6 col-md-5 order-md-2 mb-4 mb-lg-3"><img src="img/real-estate/hero-image.jpg" alt="Hero image"></div>
          <div class="col-xl-5 col-lg-6 col-md-7 order-md-1 pt-xl-5 pe-lg-0 mb-3 text-md-start text-center">
            <h1 class="display-4 mt-lg-5 mb-md-4 mb-3 pt-md-4 pb-lg-2">Trouver un bien immobilier n'a jamais été aussi simple et rapide ! <br></h1>
            <p class="position-relative lead me-lg-n5">
              - Disponibilité<br>
              - Voir les photos des biens<br>
              - Frais de visite : <b>00 Fcfa</b><br>
              - Agences immobilières agrées<br>
            </p>
          </div>
          
        </div>
      </section>
      
      <!-- Property cost calculator-->
      <section class="container mb-5 pb-2 pb-lg-4">
        <div class="row align-items-center">
          <div class="col-md-5"><img class="d-block mx-md-0 mx-auto mb-md-0 mb-4" src="img/real-estate/illustrations/calculator.svg" width="416" alt="Illustration"></div>
          <div class="col-xxl-6 col-md-7 text-md-start text-center">
            <h2>Dites nous ce que vous chercher !</h2>
            <p class="pb-3 fs-lg text-left">
            Vous cherchez une maison ?</br> 
            un terrain ?</br>
            un bureau commercial ?</br>
            une villa ? </br>
            un magasin ?</br> 
            Dites-nous ce que vous chercher, nous le trouvons pour vous rapidement. </br> 
            Nous vous contactons pour de belle propositions immobilière fiables selon vos goûts</br> 
            NB : La soumission est à 150 Fcfa
            </p>
           
              <a class="btn btn-sm btn-outline-success rounded-pill" href="#cost-calculator" data-bs-toggle="modal">
                <i class="fi-download me-2"></i>Je soumets ma demande
              </a>
            
             <a class="btn btn-sm btn-outline-primary rounded-pill" href="demandes"><i class="fi-grid me-2"></i>Voir les demandes</a>
           

          </div>
        </div>
      </section>


      <!-- Property categories-->
      <section class="container mb-5">
        <div class="row row-cols-lg-6 row-cols-sm-3 row-cols-2 g-3 g-xl-4">
         @foreach(ReadTypebiens() as $typesbiens)
          <div class="col"><a class="icon-box card card-body h-100 border-0 shadow-sm card-hover h-100 text-center" href="biens?types={{$typesbiens->idtypes}}">
              <div class="icon-box-media bg-faded-primary text-primary rounded-circle mb-3 mx-auto"><i class="{{$typesbiens->icons}}"></i></div>
              <h3 class="icon-box-title fs-base mb-0">{{$typesbiens->types}}</h3></a>
          </div>
         @endforeach
        </div>
      </section>

      <!-- Search property form group-->
      <section class="container mb-5 pb-xl-5 pb-md-2">
        <h2 class="h3 mb-3 text-center">
          <a  class="btn btn-outline-primary rounded-pill" href="morehome">
             <i class="fi-search"></i> Rechercher un biens
          </a>

          <a  class="btn btn-outline-success rounded-pill" href="#givebiens" data-bs-toggle="modal">
             <i class="fi-apartment"></i> Proposer un bien
          </a>
        </h2>
      </section>


      <!-- Services-->
      <!-- <section class="container mb-5 mt-n3 mt-lg-0">
        <div class="tns-carousel-wrapper tns-nav-outside tns-nav-outside-flush mx-n2">
          <div class="tns-carousel-inner row gx-4 mx-0 py-3" data-carousel-options="{&quot;items&quot;: 3, &quot;controls&quot;: false, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3}}}">
            <div class="col">
              <div class="card card-hover border-0 h-100 pb-2 pb-sm-3 px-sm-3 text-center"><img class="d-block mx-auto my-3" src="img/real-estate/illustrations/buy.svg" width="256" alt="Illustration">
                <div class="card-body">
                  <h2 class="h4 card-title">Acheter un bien</h2>
                  <p class="card-text fs-sm">Profiter de belle opportunités d'achats</p>
                </div>
                <div class="card-footer pt-0 border-0"><a class="btn btn-outline-primary stretched-link" href="buy">Acheter</a></div>
              </div>
            </div>
           
            <div class="col">
              <div class="card card-hover border-0 h-100 pb-2 pb-sm-3 px-sm-3 text-center"><img class="d-block mx-auto my-3" src="img/real-estate/illustrations/rent.svg" width="256" alt="Illustration">
                <div class="card-body">
                  <h2 class="h4 card-title">Louer un bien</h2>
                  <p class="card-text fs-sm">Bénéficier d'une belle visualisation pour orienter vos choix</p>
                </div>
                <div class="card-footer pt-0 border-0"><a class="btn btn-outline-primary stretched-link" href="locate">Louer</a></div>
              </div>
            </div>

            <div class="col">
              <div class="card card-hover border-0 h-100 pb-2 pb-sm-3 px-sm-3 text-center"><img class="d-block mx-auto my-3" src="img/real-estate/illustrations/sell.svg" width="256" alt="Illustration">
                <div class="card-body">
                  <h2 class="h4 card-title">Gestion immobilière</h2>
                  <p class="card-text fs-sm">Confier nous la gestion de votre bien pour  optimiser la rentabilité</p>
                </div>
                <div class="card-footer pt-0 border-0"><a class="btn btn-outline-primary stretched-link" href="soumis">Soumettre</a></div>
              </div>
            </div>

          </div>
        </div>
      </section> -->

      

      <hr class="mt-n1 mb-5 d-md-none">
      <!-- Top offers (carousel)-->
      <!-- <section class="container mb-5 pb-md-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
          <h2 class="h3 mb-0">Meilleure offres</h2><a class="btn btn-link fw-normal p-0" href="morehome">Voir tous<i class="fi-arrow-long-right ms-2"></i></a>
        </div>
        <div class="tns-carousel-wrapper tns-controls-outside-xxl tns-nav-outside tns-nav-outside-flush mx-n2">
          <div class="tns-carousel-inner row gx-4 mx-0 pt-3 pb-4" data-carousel-options="{&quot;items&quot;: 4, &quot;responsive&quot;: {&quot;0&quot;:{&quot;items&quot;:1},&quot;500&quot;:{&quot;items&quot;:2},&quot;768&quot;:{&quot;items&quot;:3},&quot;992&quot;:{&quot;items&quot;:4}}}">

            <?php 
             $nb = count(AllbiensLimit(0));
             if ($nb!=0) {
               foreach(AllbiensLimit(0) as $biens) { 
            ?>
        
            <div class="col">
              <div class="card shadow-sm card-hover border-0 h-100">

                <div class="tns-carousel-wrapper card-img-top card-img-hover"><a class="img-overlay" href="#"></a>
                      <div class="position-absolute start-0 top-0 pt-3 ps-3"><span class="d-table badge bg-success">Dispo</span></div>
                      <div class="content-overlay end-0 top-0 pt-3 pe-3">
                        <button class="btn btn-icon btn-light btn-xs text-primary rounded-circle" type="button" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Wishlist"><i class="fi-heart"></i></button>
                      </div>
                      <div class="tns-carousel-inner">
                        <img src="{{$biens->img1}}" alt="Image">
                        <img src="{{$biens->img2}}" alt="Image">
                      </div>
                </div>


                <div class="card-body position-relative pb-3">
                      <h4 class="mb-1 fs-xs fw-normal text-uppercase text-primary">{{ReadOperaID($biens->typesoperations_idtypesoperations)->operation}}</h4>
                      <h3 class="h6 mb-2 fs-base"><a class="nav-link stretched-link" href="#">{{$biens->libele}}</a></h3>
                      <p class="mb-2 fs-sm text-muted">{{$biens->resume}}</p>
                      <div class="fw-bold"><i class="fi-cash mt-n1 me-2 lead align-middle opacity-70"></i>{{formatPrice($biens->prix)}} Fcfa</div>
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
           <?php
              } 
            }else {
              echo '
              <div class="col-lg-12 alert alert-primary" role="alert">
               Aucun biens immobiliers disponibles 
              </div>';
            } 
            ?>
          </div>
        </div>
      </section> -->


      
      <!-- Créer une alerte d'infos 
      <section class="container mb-5 pb-2 pb-lg-4">
        <div class="row align-items-center">
          <div class="col-md-5"><img class="d-block mx-md-0 mx-auto mb-md-0 mb-4" src="img/real-estate/illustrations/find.svg" width="416" alt="Illustration"></div>
          <div class="col-xxl-6 col-md-7 text-md-start text-center">
            <h2>Créer une alerte immobilière </h2>
            <p class="pb-3 fs-lg">
            Rester informer des nouvelles offres immobilières correspondants  à ce que vous cherchez ou à vos exigences !
            </p>
            <a class="btn btn-lg btn-primary" href="#alert-immo" data-bs-toggle="modal"><i class="fi-alert-octagon me-2"></i>Alerte immobilière</a>
          </div>
        </div>
      </section> -->


      <!-- Top agents (lnked carousel)
      <section class="container mb-5 pb-2 pb-lg-4" id="testi">
        <h2 class="h3 mb-4 pb-3 text-center text-md-start">Les meilleurs agents immobiliers</h2>
        <div class="tns-carousel-wrapper">
          <div class="tns-carousel-inner" data-carousel-options="{&quot;items&quot;: 1, &quot;mode&quot;: &quot;gallery&quot;, &quot;controlsContainer&quot;: &quot;#agents-carousel-controls&quot;, &quot;nav&quot;: false}">
            <div>
              <div class="row align-items-center">
                <div class="col-xl-4 d-none d-xl-block"><img class="rounded-3" src="img/real-estate/agents/05.jpeg" alt="Agent picture"></div>
                <div class="col-xl-4 col-md-5 col-sm-4"><img class="rounded-3" src="img/real-estate/agents/08.jpeg" alt="Agent picture"></div>
                <div class="col-xl-4 col-md-7 col-sm-8 px-4 px-sm-3 px-md-0 ms-md-n4 mt-n5 mt-sm-0 py-3">
                  <div class="card border-0 shadow-sm ms-sm-n5">
                    <blockquote class="blockquote card-body">
                      <h4 style="max-width: 22rem;">&quot;Je sélectionnerai le meilleur logement pour vous&quot;</h4>
                      
                      <footer class="d-flex justify-content-between">
                        <div class="pe-3"><a class="text-decoration-none" href="#testi">
                            <h6 class="mb-0">TAN GOGBEU HERVE</h6>
                            <div class="text-muted fw-normal fs-sm mb-3"></div></a>
                        <div><span class="star-rating"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i></span>
                          <div class="text-muted fs-sm mt-1"></div>
                        </div>
                      </footer>
                    </blockquote>
                  </div>
                </div>
              </div>
            </div>
           
            <div>
              <div class="row align-items-center">
                <div class="col-xl-4 d-none d-xl-block"><img class="rounded-3" src="img/real-estate/agents/08.jpeg" alt="Agent picture"></div>
                <div class="col-xl-4 col-md-5 col-sm-4"><img class="rounded-3" src="img/real-estate/agents/05.jpeg" alt="Agent picture"></div>
                <div class="col-xl-4 col-md-7 col-sm-8 px-4 px-sm-3 px-md-0 ms-md-n4 mt-n5 mt-sm-0 py-3">
                  <div class="card border-0 shadow-sm ms-sm-n5">
                    <blockquote class="blockquote card-body">
                      <h4 style="max-width: 22rem;">&quot;Nous vous garantissons la fiabilité, la disponibilité. Faites-nous confiance !&quot;</h4>
                      <footer class="d-flex justify-content-between">
                        <div class="pe-3"><a class="text-decoration-none" href="#testi">
                            <h6 class="mb-0">KOUAME N'GUES</h6>
                        <div><span class="star-rating"><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i><i class="star-rating-icon fi-star-filled active"></i></span>
                        </div>
                      </footer>
                    </blockquote>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="tns-carousel-controls justify-content-center justify-content-md-start my-2 mt-md-4" id="agents-carousel-controls">
          <button class="mx-2" type="button"><i class="fi-chevron-left"></i></button>
          <button class="mx-2" type="button"><i class="fi-chevron-right"></i></button>
        </div>
      </section>-->

      
      
      <!-- TEMOIGNAGES -->
      <section class="container mb-5 pb-xl-5 pb-md-2">
        <h2 class="h3 mb-3 text-center">Témoignages</h2>
        <!-- Testimonials carousel-->
        <div class="tns-carousel-wrapper tns-controls-outside-lg tns-nav-outside tns-nav-outside-flush col-lg-10 mx-auto px-0">
          <div class="tns-carousel-inner" data-carousel-options="{&quot;gutter&quot;: 24}">
            <!-- Testimonial slide-->
            <div class="d-flex flex-md-row flex-column align-items-md-start mx-3 py-3">
				<img class="d-md-block d-none me-4 rounded-3" 
					 src="img/lograpid.png"
					 width="306" alt="Customer image">
              <div class="card border-0 shadow-sm h-100">
                <blockquote class="blockquote card-body">
                  <p>
					  Grâce à LogRapid j'ai pu trouver rapidement un studio dans lequel je réside actuellement à Angré.
					  Merci beaucoup à l'Equipe LogRapid pour la disponibilité et l'efficacité.
				  </p>
                  <footer class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6 class="fs-base mb-0">Locataire</h6>
                      <div class="text-muted fw-normal fs-sm">Kouamé Adjoua Marie</div>
                    </div>
                  </footer>
                </blockquote>
              </div>
            </div>
            <!-- Testimonial slide-->
             <div class="d-flex flex-md-row flex-column align-items-md-start mx-3 py-3">
				<img class="d-md-block d-none me-4 rounded-3" 
					 src="img/lograpid.png"
					 width="306" alt="Customer image">
              <div class="card border-0 shadow-sm h-100">
                <blockquote class="blockquote card-body">
                  <p>
					  LogRapid me permet de facilement trouver des clients et vendre rapidement mes biens immobiliers. 
					  Bon job à l'équipe LogRapid notre fidèle partenaire.
				 </p>
                  <footer class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6 class="fs-base mb-0"> Agent Immobilier</h6>
                      <div class="text-muted fw-normal fs-sm">Touré Mamadou Ali</div>
                    </div>
                  </footer>
                </blockquote>
              </div>
            </div>
          </div>
        </div>
      </section>