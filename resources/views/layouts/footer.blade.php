      <!-- MODAL CALCUL DE PRIX -->
      <div class="modal fade" id="cost-calculator" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header d-block position-relative border-0 px-sm-5 px-4">
              <h3 class="h4 modal-title mt-4 text-center">Dites-nous ce que vous voulez !</h3>
              <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 px-4">
            <form class="needs-validation" novalidate>
                
                <div class="mb-3">
                  <label class="form-label fw-bold mb-2" for="property-city">Type d'operation</label>
                  <select class="form-control form-select" id="property-city">
                    <option>Choisir</option>
                    <option value="8">Je veux louer</option>
                    <option value="9">Je veux acheter</option>
                  </select>
                  <input type="hidden" class="operaFilt">
                </div>
                
                <div class="mb-3">
                  <label class="form-label fw-bold mb-2" for="property-city">Pays</label>
                  <select class="form-select mb-2" id="paySelect">
                    <option>Choisir</option>
                    @foreach(ReadPaysAll() as $pays)
                     <option value="{{$pays->idpays}}">{{$pays->pays}}</option>
                    @endforeach
                  </select>
                  <input type="hidden" class="paysFilt">
                </div>

                <div class="mb-3">
                  <label class="form-label fw-bold mb-2 villeLabel" for="property-city">Ville</label>
                  <select class="form-select mb-2" id="villes">
                    <option>Choisir</option>
                      @foreach(ReadVille() as $ville)
                        <option value="{{$ville->idvilles}}">{{$ville->ville}}</option>
                      @endforeach
                  </select>
                  <input type="hidden" class="villeFilt">
                </div>

                <div class="mb-3">
                  <label class="form-label fw-bold mb-2 quartierLabel" for="property-city">Quartier</label>
                  <select class="form-select mb-2" id="quartier">
                    <option>Choisir</option>
                    @foreach(ReadQuart() as $quart)
                     <option value="{{$quart->idquartier}}">{{$quart->nom}}</option>
                    @endforeach
                  </select>
                  <input type="hidden" class="quartierFilt">
                </div>

                <div class="pt-2 mb-3">
                  <label class="form-label fw-bold mb-2">Type de bien</label>
                  <select class="form-select mb-2" id="typebiens">
                    <option>Choisir</option>
                    @foreach(ReadTypebiens() as $types)
                    <option value="{{$types->idtypes}}">{{$types->types}}</option>
                    @endforeach
                  </select>
                  <input type="hidden" class="typebiensFilt">
                </div>

                <!-- WhatsApp -->
                <div class="mb-3">
                  <label for="text-input" class="form-label">Votre WhatsApp</label>
                  <input class="form-control whatsap" type="number" id="text-input">
                </div>

                <!-- Email -->
                <div class="mb-3">
                  <label for="text-input" class="form-label">Votre Email(facultatif)</label>
                  <input class="form-control email" type="email" id="text-input">
                </div>

                <!-- Description du bien -->
                <div class="mb-3">
                  <label for="textarea-input" class="form-label">Description</label>
                  <textarea class="form-control descrp" id="textarea-input" rows="5" placeholder="Préciser nous votre budget et vos critères"></textarea>
                </div>

                <div class="result"></div>

                <button class="btn btn-outline-primary d-block mb-4 calculate text-dark" type="button"><i class="fi-download me-2"></i>Je soumets</button>
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- MODAL RECHERCHE AUTOMATIQUE -->
      <div class="modal fade" id="search-loop" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header d-block position-relative border-0 px-sm-5 px-4">
              <h3 class="h4 modal-title mt-4 text-center">RECHERCHE AUTOMATIQUE DE BIENS</h3>
              <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 px-4">
              <form class="needs-validation" novalidate>
                
                <div class="mb-3">
                  <label class="form-label fw-bold mb-2" for="property-city">Type d'operation</label>
                  <select class="form-control form-select" id="property-city" required>
                    <option value="" selected disabled hidden>Choisir</option>
                    <option value="1">Location immobilière</option>
                    <option value="2">Achat immobilier</option>
                  </select>
                  <div class="invalid-feedback">Svp, veuillez préciser l'opération</div>
                </div>
                
                <div class="mb-3">
                  <label class="form-label fw-bold mb-2" for="property-city">Pays</label>
                  <select class="form-control form-select" id="property-district" required>
                    <option value="" selected disabled hidden>Choisir</option>
                    <option value="ci">Côte d'ivoire</option>
                  </select>
                  <div class="invalid-feedback">Svp, veuillez préciser le pays</div>
                </div>

                <div class="mb-3">
                  <label class="form-label fw-bold mb-2" for="property-city">Ville</label>
                  <select class="form-control form-select" id="property-district">
                    <option value="" selected disabled hidden>Choisir</option>
                    <option value="abj">Abidjan</option>
                  </select>
                  <div class="invalid-feedback">Svp, veuillez préciser la Ville</div>
                </div>

                <div class="mb-3">
                  <label class="form-label fw-bold mb-2" for="property-city">Quartier</label>
                  <select class="form-control form-select" id="property-district">
                    <option value="" selected disabled hidden>Choisir</option>
                    <option value="abobo">Abobo</option>
                  </select>
                  <div class="invalid-feedback">Svp, veuillez préciser le quartier</div>
                </div>

                <div class="pt-2 mb-3">
                  <label class="form-label fw-bold mb-2">Type de bien</label>
                  <select class="form-control form-select" id="property-type" required>
                    <option value="" selected disabled hidden>Choisir</option>
                    <option value="Brooklyn">Maison</option>
                    <option value="Manhattan">Magasins</option>
                    <option value="Staten Island">Bureau</option>
                    <option value="The Bronx">Villa</option>
                  </select>
                  <div class="invalid-feedback">Svp, veuillez préciser la ville</div>
                </div>

                {{--<label class="form-label fw-bold mb-2">Intervalle de prix(Fcfa)</label>
                  <div class="d-flex align-items-center">
                    <div class="w-50 pe-2">
                      <div class="input-group">
                        <input class="form-control range-slider-value-min" type="number" placeholder="00">
                      </div>
                    </div>
                    <div class="text-muted">&mdash;</div>
                    <div class="w-50 ps-2">
                      <div class="input-group">
                        <input class="form-control range-slider-value-max" type="number" placeholder="00">
                      </div>
                    </div>
                  </div><br>--}}
               
               
                <button class="btn btn-primary d-block w-100 mb-4" type="submit"><i class="fi-search me-2"></i>TROUVER</button>
              </form>
            </div>
          </div>
        </div>
      </div>
     
  
      
    <!-- MODAL D'ALERTE IMMOBILIERE -->
      <div class="modal fade" id="alert-immo" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header d-block position-relative border-0 px-sm-5 px-4">
              <h3 class="h4 modal-title mt-4 text-center">Soumettre une demande</h3>
              <br><div class="alert alert-primary" role="alert">
                 Soyez notifié par mail des biens disponibles que vous cherchez
              </div>
              <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body px-sm-5 px-4">
            <form class="needs-validation" novalidate>
                
                <div class="mb-3">
                  <label class="form-label fw-bold mb-2" for="property-city">Type d'operation</label>
                  <select class="form-control form-select" id="operaDemnd">
                    <option>Choisir</option>
                    <option value="8">Je veux louer</option>
                    <option value="9">Je veux acheter</option>
                  </select>
                  <input type="hidden" class="operaDemndFilt">
                </div>
                
                <div class="mb-3">
                  <label class="form-label fw-bold mb-2" for="property-city">Pays</label>
                  <select class="form-select mb-2" id="payDemande">
                    <option>Choisir</option>
                    @foreach(ReadPaysAll() as $pays)
                     <option value="{{$pays->idpays}}">{{$pays->pays}}</option>
                    @endforeach
                  </select>
                  <input type="hidden" class="payDemandeFilt">
                </div>

                <div class="mb-3">
                  <label class="form-label fw-bold mb-2 villeDemadLabel" for="property-city">Ville</label>
                  <select class="form-select mb-2" id="villeDemande">
                    <option>Choisir</option>
                      @foreach(ReadVille() as $ville)
                        <option value="{{$ville->idvilles}}">{{$ville->ville}}</option>
                      @endforeach
                  </select>
                  <input type="hidden" class="villeDemandeFilt">
                </div>

                <div class="mb-3">
                  <label class="form-label fw-bold mb-2 quartierDemndLabel" for="property-city">Quartier</label>
                  <select class="form-select mb-2" id="quartierDemande">
                    <option>Choisir</option>
                    @foreach(ReadQuart() as $quart)
                     <option value="{{$quart->idquartier}}">{{$quart->nom}}</option>
                    @endforeach
                  </select>
                  <input type="hidden" class="quartierDemndFilt">
                </div>

                <div class="pt-2 mb-3">
                  <label class="form-label fw-bold mb-2">Type de bien</label>
                  <select class="form-select mb-2" id="typebiensDemnd">
                    <option>Choisir</option>
                    @foreach(ReadTypebiens() as $types)
                    <option value="{{$types->idtypes}}">{{$types->types}}</option>
                    @endforeach
                  </select>
                  <input type="hidden" class="typebiensDemndFilt">
                </div>
                
                <div class="pt-2 mb-3">
                   <label class="form-label fw-bold mb-2" for="property-city">Votre budget(40 000 Fcfa Minimum)</label>
                   <input class="form-control budget" type="number" id="text-input">
                </div>

                <div class="pt-2 mb-3">
                   <label class="form-label fw-bold mb-2" for="property-city">Votre Tel</label>
                   <input class="form-control tel" type="number" id="text-input">
                </div>

    
                <div class="pt-2 mb-3">
                   <label class="form-label fw-bold mb-2" for="property-city">Votre Email</label>
                   <input class="form-control mail" type="text" id="text-input">
                </div>


               
                <div class="result"></div>

                <div class="col-lg-6">
                  <button class="demandeAlerte btn btn-outline-primary rounded-pill text-dark" 
                   type="button"><i class="fi-download me-2"></i>
                   Soumettre
                  </button>  
                </div>
               
              </form>
            </div>
          </div>
        </div>
      </div>

      <!-- MODAL PROPOSITION DE BIENS -->
      <div class="modal fade" id="" tabindex="-1">
       <div class="modal-dialog modal-dialog-centered" role="document">
         <div class="modal-content">
            
            <div class="modal-header d-block position-relative border-0 px-sm-5 px-4">
              <h3 class="h4 modal-title mt-4 text-center">PROPOSER UN BIEN</h3>
              <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body px-sm-5 px-4">
             <form class="needs-validation" novalidate>
                <!-- Votre nom -->
                <div class="mb-3">
                  <label for="text-input" class="form-label">Votre Nom</label>
                  <input class="form-control nomp" type="text" id="text-input">
                </div>

                <!-- Votre telephone -->
               <div class="mb-3">
                  <label for="text-input" class="form-label">Votre WhatsApp / Votre Tél</label>
                  <input class="form-control telp" type="number" id="text-input">
                </div>

                <!-- lieu -->
                <div class="mb-3">
                  <label for="text-input" class="form-label">Où se trouve le bien ?</label>
                  <input class="form-control lieup" type="text" id="text-input">
                </div>

                <!-- Decrire -->
                <div class="mb-3">
                  <label for="text-input" class="form-label">Décrivez un peu le bien</label>
                  <textarea class="form-control morep" id="textarea-input" rows="5"></textarea>
                </div>

                <!-- Boutton Valider -->
                <button type="button" class="btn btn-outline-primary savebiens text-dark">Valider</button>

             </form>
            </div>

         </div>
       </div>
      </div>
      
      <!-- MODAL COMPTE OFFREUR ImmOver -->
      <div class="modal fade" id="givebiens" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
          <div class="modal-content">
            <div class="modal-body px-0 py-2 py-sm-0">
              <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal"></button>
              <div class="row mx-0 align-items-center">
                <div class="col-md-6 border-end-md p-4 p-sm-5">
                  <h2 class="h3 mb-4 mb-sm-5">
                    Compte Offreur ImmOver
                  </h2>
                  <img class="d-block mx-auto" src="img/signin-modal/signin.svg" width="344" alt="Illustartion">
                  
                </div>
                <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">
                  <a class="btn btn-outline-info w-100 mb-3" href="countgerant">Se connecter</a>
                  <a class="btn btn-outline-primary w-100 mb-3" href="countOffreur">Ouvrir mon compte Offreur</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>







<!-- Footer-->
<footer class="footer bg-secondary pt-5">
      <div class="container pt-lg-4 pb-4">
        <!-- Links-->
        <div class="row mb-5 pb-md-3 pb-lg-4">
          <div class="col-lg-6 mb-lg-0 mb-4">
            <div class="d-flex flex-sm-row flex-column justify-content-between mx-n2">

              <div class="mb-sm-0 mb-4 px-2">
                <h4 class="h5">Mon Compte</h4>
                <ul class="nav flex-column">
                  <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="count"><i class="fi-user mt-n1 me-2 fs-base"></i> Mes Infos</a></li>
                  <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="visitesNew"><i class="fi-star mt-n1 me-2 fs-base"></i>Visite Nouvelle</a></li>
                  <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="visitesEffect"><i class="fi-rotate-right mt-n1 me-2 fs-base"></i> Visite Effectuée</a></li>
                  <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="visitesSold"><i class="fi-check-circle mt-n1 me-2 fs-base"></i> Visite Soldée</a></li>
                  <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="visitesAnnul"><i class="fi-credit-card-off mt-n1 me-2 fs-base"></i> Visite Annulée</a></li>
                </ul>
              </div>

              <div class="mb-sm-0 mb-4 px-2">
                <a class="d-inline-block mb-4" href="/">
                  <!--<img src="img/logo/logo-dark.svg" width="116" alt="logo">-->
                  ImmOver
                </a>
                <ul class="nav flex-column mb-sm-4 mb-2">
                  <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="mailto:info@immover.io">
                      <i class="fi-mail mt-n1 me-2 align-middle opacity-70"></i>info@immover.io</a>
                  </li>
                      
                  <li class="nav-item"><a class="nav-link p-0 fw-normal" href="tel:0798081047"><i class="fi-device-mobile mt-n1 me-2 align-middle opacity-70"></i>+225 07 98 08 10 47</a></li>
                  <li class="nav-item"><a class="nav-link p-0 fw-normal" href="#"><i class="fi-map mt-n1 me-2 align-middle opacity-70"></i>Abidjan, Angré 8ème tranche</a></li>
					        <!-- <li class="nav-item"><a class="nav-link p-0 fw-normal" href="https://www.facebook.com/Immover2022" target="_blank"><i class="fi-facebook-square mt-n1 me-2 align-middle opacity-70"></i> Immover2022</a></li> -->
                  <!--<li class="nav-item"><a class="nav-link p-0 fw-normal" href="https:://www.facebook.com/Immover"><i class="fi-facebook-square mt-n1 me-2 align-middle opacity-70"></i>Immover</a></li>-->
                </ul>
              </div>

             

              <div class="px-2">
                <h4 class="h5">A propos</h4>
                <ul class="nav flex-column">
                  <li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="about">Qui sommes-nous ?</a></li>
                  <!--<li class="nav-item mb-2"><a class="nav-link p-0 fw-normal" href="cgu">CGU</a></li>-->
                </ul>
              </div>
            </div>
          </div>
          <div class="col-xl-5 col-lg-6 offset-xl-1">
            <h4 class="h5">Offre recentes</h4>
            @foreach(TwoBiensLimit(0) as $biens)
              <article class="d-flex align-items-start" style="max-width: 640px;"><a class="d-none d-sm-block flex-shrink-0 me-sm-4 mb-sm-0 mb-3" href="single?biens={{$biens->idbiens}}"><img class="rounded-3" src="img/real-estate/blog/th01.jpg" width="100" alt="Blog post"></a>
                <div>
                  <h6 class="mb-1 fs-xs fw-normal text-uppercase text-primary">{{$biens->libele}}</h6>
                  <h5 class="mb-2 fs-base"><a class="nav-link" href="single?biens={{$biens->idbiens}}">{{$biens->resume}}</a></h5>
                </div>
              </article>
              <hr class="text-dark opacity-10 my-4">
            @endforeach
            
          </div>
        </div>

    </footer>
    <!-- Back to top button-->
    <a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon fi-chevron-up">   </i></a>
    
<!-- Share button Modal -->
<div class="modal" tabindex="-1" role="dialog" id="modalshare">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title">Partager à Mes amis</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body">
       <div class="sharethis-inline-share-buttons"></div>
      </div>
      
    </div>
  </div>
</div>

    <!-- Script js Gallery -->
    <script src="vendor/lightgallery.js/dist/js/lightgallery.min.js"></script>
    <script src="vendor/lg-fullscreen.js/dist/lg-fullscreen.min.js"></script>
    <script src="vendor/lg-zoom.js/dist/lg-zoom.min.js"></script>
    <script src="vendor/lg-thumbnail.js/dist/lg-thumbnail.min.js"></script>
    <script src="vendor/flatpickr/dist/flatpickr.min.js"></script>
    
    <!-- Vendor scrits: js libraries and plugins-->
    <script src="vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="vendor/simplebar/dist/simplebar.min.js"></script>
    <script src="vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js"></script>
    <script src="vendor/nouislider/dist/nouislider.min.js"></script>
    <script src="vendor/tiny-slider/dist/min/tiny-slider.js"></script>
    <!-- SweetAlert -->
    <script src="js/sweetalert2.min.js"></script>
    <!-- Main theme script-->
    <script src="js/theme.min.js"></script>
    <!-- Jquery -->
    <script src="js/jquery.min.js"></script>
    <!-- Select 2 -->
    <script src="lib/select2/select2.min.js"></script>


    <!-- Custum JavaScript -->
    <script type='text/javascript'>
      //Récuperation de Mot de Passe
      $('.recupPass').click(function(){
        var mail = $("#emailForgot").val();
        console.log("Email: "+mail);
        $.ajax({
           url:'recupPass',
           method:'get',
           data:{mail:mail},
           dataType:'json',
           beforeSend:function(){
             $('.recupPass').text('Chargement...');
             $('.recupPass').prop('disabled', true); 
           },
           success:function(data){
             $('.recupPass').text('Récupérer');
             $('.recupPass').prop('disabled', false); 
             $('.passAlert').text(data.msg);
           },
           error:function(){
             $('.passAlert').text("Problème de connection");
           }
        });
      });
      //Connection compte client
      $('.signbtn').click(function(){
         var mail = $('#email').val();
         var password = $('#password').val();
         console.log("Mail: "+mail+" Pass: "+password);
         var datas = {mail:mail,password:password};
         $.ajax({
           url:'signClient',
           method:'get',
           data:datas,
           dataType:'json',
           beforeSend:function(){
             $('.signbtn').text('Chargement...');
             $('.signbtn').prop('disabled', true); 
           },
           success:function(data){
             $('.signbtn').text('Se connecter');
             $('.signbtn').prop('disabled', false); 
             console.log(data);
             if (data.res==1) {
               Swal.fire(data.msg);
               window.location.href='count';
             }else{
               $('.alertInfsign').text(data.msg);
             }
           },
           error:function(){
              console.log("Error");
           }
         });
      });

      //Inscription
      $('.rejoinsus').click(function(){
         var prfx = $('#telPrf').val();
         var tel = $('#phone').val();
         var nom = $('#nom').val();
         var mail = $('#mail').val();
         console.log('Nom: '+nom+' Tel: '+tel+' Mail: '+mail);
         var datas = {nom:nom,prfx:prfx,tel:tel,mail:mail};
         $.ajax({
           url:'Signup',
           method:'get',
           dataType:'json',
           data:datas,
           beforeSend:function(){
             $('.rejoinsus').text('Chargement...');
             $('.rejoinsus').prop('disabled', true); 
           },
           success:function(data){
             if (data.res==1) {
               Swal.fire('Ouverture de compte en cours...');
               $('.rejoinsus').prop('disabled', false);
               window.location.href='count';
             }else{
               $('.rejoinsus').text('Rejoindre');
               $('.alertInf').text(data.msg);
               $('.rejoinsus').prop('disabled', false);
             }
             
           },
           error:function(){
             console.log("Error");
             $('.rejoinsus').text('Rejoindre');
             $('.rejoinsus').prop('disabled', false);
             $('.alertInf').text("Problème de connection");
           }
         });
      });

      // Préfixe du numéro
      $("select.pays").change(function(){
        var prf = $(this).children("option:selected").val();
        $('.prfix').text(prf);
        $("#telPrf").val(prf);
      });

      //Select 2 Pays
      $('#pays').select2();
      
    </script>

  </body>
</html>