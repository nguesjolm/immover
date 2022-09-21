    <!-- Google Tag Manager (noscript)-->
    <noscript>
      <iframe src="http://www.googletagmanager.com/ns.html?id=GTM-WKV3GT5" height="0" width="0" style="display: none; visibility: hidden;"></iframe>
    </noscript>


    <!-- Page loading spinner-->
    <div class="page-loading active">
      <div class="page-loading-inner">
        <div class="page-spinner"></div><span>Loading...</span>
      </div>
    </div>
    <main class="page-wrapper">
      <!-- Sign In Modal-->
      <div class="modal fade" id="signin-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
          <div class="modal-content">
            <div class="modal-body px-0 py-2 py-sm-0">
              <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal"></button>
              <div class="row mx-0 align-items-center">
                <div class="col-md-6 border-end-md p-4 p-sm-5">
                  <h2 class="h3 mb-4 mb-sm-5">AKWABA ImmOver !<br>Content de te revoir</h2><img class="d-block mx-auto" src="img/signin-modal/signin.svg" width="344" alt="Illustartion">
                  <div class="mt-4 mt-sm-5"><a href="#signup-modal" data-bs-toggle="modal" data-bs-dismiss="modal">Rejoins la communauté ImmOver Ici</a></div>
                </div>
                <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">
                  <div class="d-flex align-items-center py-3 mb-3">
                    <hr class="w-100">
                    <div class="px-3"><b>ImmOver</b></div>
                    <hr class="w-100">
                  </div>
                  <form class="needs-validation" novalidate>

                    <div class="mb-4">
                      <label class="form-label mb-2" for="email">Mon Email</label>
                      <input class="form-control" type="email" id="email" placeholder="">
                    </div>

                    <div class="mb-4">
                      <div class="d-flex align-items-center justify-content-between mb-2">
                        <label class="form-label mb-0" for="password">Mon Mot de passe</label><a class="fs-sm" href="#passforgotmodal" data-bs-toggle="modal" data-bs-dismiss="modal">Mot de passe oublié ?</a>
                      </div>
                      <div class="password-toggle">
                        <input class="form-control" type="password" id="password" placeholder="">
                        <label class="password-toggle-btn" aria-label="Show/hide password">
                          <input class="password-toggle-check" type="checkbox"><span class="password-toggle-indicator"></span>
                        </label>
                      </div>
                    </div>

                    <span class="text-danger alertInfsign"></span>
                    <button class="btn btn-primary btn-lg rounded-pill w-100 signbtn" type="button">Se connecter</button>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Sign Up Modal-->
      <div class="modal fade" id="signup-modal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
          <div class="modal-content">
            <div class="modal-body px-0 py-2 py-sm-0">
              <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal"></button>
              <div class="row mx-0 align-items-center">
                <div class="col-md-6 border-end-md p-4 p-sm-5">
                  <h2 class="h3 mb-4 mb-sm-5">Pourquoi ImmOver ?<br></h2>
                  <ul class="list-unstyled mb-4 mb-sm-5">
                    <li class="d-flex mb-2"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Disponibilité des biens immobiliers</span></li>
                    <li class="d-flex mb-2"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Pas de frais de visite</span></li>
                    <li class="d-flex mb-0"><i class="fi-check-circle text-primary mt-1 me-2"></i><span>Prise de rendez-vous</span></li>
                  </ul><img class="d-block mx-auto" src="img/signin-modal/signup.svg" width="344" alt="Illustartion">
                  <div class="mt-sm-4 pt-md-3"><a href="#signin-modal" data-bs-toggle="modal" data-bs-dismiss="modal">Se connecter</a></div>
                </div>
                <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">
                  <div class="d-flex align-items-center py-3 mb-3">
                    <hr class="w-100">
                    <div class="px-3"><b>Devenir ImmOver</b></div>
                    <hr class="w-100">
                  </div>
                  <form class="needs-validation" novalidate>

                    <div class="mb-4">
                      <label class="form-label" for="pays">Mon Pays</label>
                      <select class="form-select pays" id="select-input" id="pays">
                        <option value="225" selected>Côte d'ivoire</option>
                        <option value="93">Afghanistan</option>
                        <option value="27">Afrique du Sud</option>
                        <option value="355">Albanie</option>
                        <option value="213">Algérie</option>
                        <option value="49">Allemagne</option>
                        <option value="376">Andorre</option>
                        <option value="244">Angola</option>
                        <option value="1264">Anguilla</option>
                        <option value="1268">Antigua-et-Barbuda</option>
                        <option value="599">Antigua-et-Barbuda</option>
                        <option value="966">Arabie saoudite</option>
                        <option value="54">Argentine</option>
                        <option value="374">Arménie</option>
                        <option value="297">Aruba</option>
                        <option value="61">Australie</option>
                        <option value="43">Autriche</option>
                        <option value="994">Azerbaïdjan</option>
                        <option value="12421">Bahamas</option>
                        <option value="973">Bahreïn</option>
                        <option value="880">Bangladesh</option>
                        <option value="12461">Barbade</option>
                        <option value="32">Belgique</option>
                        <option value="501">Belize</option>
                        <option value="229">Bénin</option>
                        <option value="14411">Bermudes</option>
                        <option value="975">Bhoutan</option>
                        <option value="375">Biélorussie</option>
                        <option value="95">Birmanie</option>
                        <option value="591">Bolivie</option>
                        <option value="387">Bosnie-Herzégovine</option>
                        <option value="267">Botswana</option>
                        <option value="55">Brésil</option>
                        <option value="673">Brunei</option>
                        <option value="359">Bulgarie</option>
                        <option value="226">Burkina Faso</option>
                        <option value="257">Burundi</option>
                        <option value="855">Cambodge</option>
                        <option value="237">Cameroun</option>
                        <option value="1">Canada</option>
                        <option value="238">Cap-Vert</option>
                        <option value="13451">Îles Caïmans</option>
                        <option value="236">République centrafricaine
                        </option>
                        <option value="56">Chili
                        </option>
                        <option value="86">Chine(République Populaire de Chine)
                        </option>
                        <option value="357">Chypre</option>
                        <option value="57">Colombie</option>
                        <option value="243">République démocratique du Congo</option>
                        <option value="242">République du Congo</option>
                        <option value="682">Îles Cook</option>
                        <option value="850">Corée du Nord</option>
                        <option value="82">Corée du Sud</option>
                        <option value="506">Costa Rica</option>
                        <option value="225">Côte d'Ivoire</option>
                        <option value="385">Croatie</option>
                        <option value="53">Cuba</option>
                        <option value="45">Danemark</option>
                        <option value="246">Diego Garcia</option>
                        <option value="253">Djibouti</option>
                        <option value="1">République dominicaine</option>
                        <option value="17671">Dominique</option>
                        <option value="20">Égypte</option>
                        <option value="971">Émirats arabes unis</option>
                        <option value="593">Équateur</option>
                        <option value="291">Érythrée</option>
                        <option value="34">Espagne</option>
                        <option value="372">Estonie</option>
                        <option value="1">États-Unis</option>
                        <option value="251">Éthiopie</option>
                        <option value="298">Îles Féroé</option>
                        <option value="679">Fidji</option>
                        <option value="358">Finlande</option>
                        <option value="33">France</option>
                        <option value="241">Gabon</option>
                        <option value="220">Gambie</option>
                        <option value="995">Géorgie</option>
                        <option value="233">Ghana</option>
                        <option value="350">Gibraltar</option>
                        <option value="30">Grèce</option>
                        <option value="1473">Grenade</option>
                        <option value="590">Guadeloupe</option>
                        <option value="1671">Guam</option>
                        <option value="224">Guinée</option>
                        <option value="240">Guinée équatoriale</option>
                        <option value="245">Guinée-Bissau</option>
                        <option value="592">Guyana</option>
                        <option value="594">Guyane</option>
                        <option value="509">Haïti</option>
                        <option value="504">Honduras</option>
                        <option value="852">Hong Kong</option>
                        <option value="36">Hongrie</option>
                        <option value="91">Inde</option>
                        <option value="62">Indonésie</option>
                        <option value="964">Irak</option>
                        <option value="98">Iran</option>
                        <option value="353">Irlande</option>
                        <option value="354">Islande</option>
                        <option value="972">Israël</option>
                        <option value="39">Italie</option>
                        <option value="1876">Jamaïque</option>
                        <option value="81">Japon</option>
                        <option value="962">Jordanie</option>
                        <option value="7">Kazakhstan</option>
                        <option value="254">Kenya</option>
                        <option value="996">Kirghizistan</option>
                        <option value="686">Kiribati</option>
                        <option value="965">Koweït</option>
                        <option value="856">Laos</option>
                        <option value="266">Lesotho</option>
                        <option value="371">Lettonie</option>
                        <option value="961">Liban</option>
                        <option value="231">Liberia</option>
                        <option value="218">Libye</option>
                        <option value="423">Liechtenstein</option>
                        <option value="370">Lituanie</option>
                        <option value="352">Luxembourg</option>
                        <option value="853">Macao</option>
                        <option value="389">Macédoine</option>
                        <option value="261">Madagascar</option>
                        <option value="60">Malaisie</option>
                        <option value="265">Malawi</option>
                        <option value="960">Maldives</option>
                        <option value="223">Mali</option>
                        <option value="500">Malouines</option>
                        <option value="356">Malte</option>
                        <option value="1670">Îles Mariannes du Nord</option>
                        <option value="212">Maroc</option>
                        <option value="692">Îles Marshall</option>
                        <option value="596">Martinique</option>
                        <option value="230">Maurice</option>
                        <option value="222">Mauritanie</option>
                        <option value="262">Mayotte</option>
                        <option value="52">Mexique</option>
                        <option value="691">États fédérés de Micronésie
                        </option>
                        <option value="373">Moldavie</option>
                        <option value="377">Monaco</option>
                        <option value="976">Mongolie</option>
                        <option value="382">Monténégro</option>
                        <option value="1664">Montserrat</option>
                        <option value="258">Mozambique</option>
                        <option value="264">Namibie</option>
                        <option value="674">Nauru</option>
                        <option value="977">Népal</option>
                        <option value="505">Nicaragua</option>
                        <option value="227">Niger</option>
                        <option value="234">Nigeria</option>
                        <option value="683">Niue</option>
                        <option value="47">Norvège</option>
                        <option value="687">Nouvelle-Calédonie</option>
                        <option value="64">Nouvelle-Zélandee</option>
                        <option value="968">Oman</option>
                        <option value="256">Ouganda</option>
                        <option value="998">Ouzbékistan</option>
                        <option value="92">Pakistan</option>
                        <option value="680">Palaos</option>
                        <option value="970">Palestine</option>
                        <option value="507">Panama</option>
                        <option value="675">Papouasie-Nouvelle-Guinée
                        </option>
                        <option value="595">Paraguay</option>
                        <option value="31">Pays-Bas</option>
                        <option value="51">Pérou</option>
                        <option value="63">Philippines</option>
                        <option value="48">Pologne</option>
                        <option value="689">Polynésie française</option>
                        <option value="1">Porto Rico</option>
                        <option value="351">Portugal</option>
                        <option value="974">Qatar</option>
                        <option value="262">La Réunion</option>
                        <option value="40">Roumanie</option>
                        <option value="44">Royaume-Uni</option>
                        <option value="7">Russie</option>
                        <option value="250">Rwanda</option>
                        <option value="1869">Saint-Christophe-et-Niévès
                        </option>
                        <option value="1758">Sainte-Lucie</option>
                        <option value="378">Saint-Marin</option>
                        <option value="378">Saint-Pierre-et-Miquelon
                        </option>
                        <option value="1784">Saint-Vincent-et-les-Grenadines
                        </option>
                        <option value="677">Salomon</option>
                        <option value="503">Salvador</option>
                        <option value="685">Samoa</option>
                        <option value="1684">Samoa américaines</option>
                        <option value="239">Sao Tomé-et-Principe</option>
                        <option value="221">Sénégal</option>
                        <option value="381">Serbie</option>
                        <option value="248">Seychelles</option>
                        <option value="65">Sierra Leone</option>
                        <option value="421">Slovaquie</option>
                        <option value="386">Slovénie</option>
                        <option value="252">Somalie</option>
                        <option value="249">Soudan</option>
                        <option value="211">Soudan du Sud</option>
                        <option value="94">Sri Lanka</option>
                        <option value="46">Suède</option>
                        <option value="41">Suisse</option>
                        <option value="597">Suriname</option>
                        <option value="268">Eswatini</option>
                        <option value="963">Syrie</option>
                        <option value="992">Tadjikistan</option>
                        <option value="255">Tanzanie</option>
                        <option value="886">Taïwan</option>
                        <option value="235">Tchad</option>
                        <option value="420">République tchèque</option>
                        <option value="66">Thaïlande</option>
                        <option value="670">Timor oriental</option>
                        <option value="228">Togo</option>
                        <option value="690">Tokelau</option>
                        <option value="676">Tonga</option>
                        <option value="1868">Trinité-et-Tobago</option>
                        <option value="216">Tunisie</option>
                        <option value="993">Turkménistan</option>
                        <option value="1649">Îles Turques-et-Caïques
                        </option>
                        <option value="90">Turquie</option>
                        <option value="688">Tuvalu</option>
                        <option value="380">Ukraine</option>
                        <option value="598">Uruguay</option>
                        <option value="678">Vanuatu</option>
                        <option value="379">Vatican (Saint-Siège)</option>
                        <option value="58">Venezuela</option>
                        <option value="1340">Îles Vierges des États-Unis
                        </option>
                        <option value="1284">Îles Vierges britanniques
                        </option>
                        <option value="84">Viêt Nam</option>
                        <option value="681">Wallis-et-Futuna</option>
                        <option value="967">Yémen</option>
                        <option value="260">Zambie</option>
                        <option value="263">Zimbabwe</option>
                        <option value="228">Togo</option>
                        <option value="229">Benin</option>
                        <option value="226">Burkina-Faso</option>
                        <option value="223">Mali</option>
                        <option value="224">Guinée</option>
                        <option value="233">Ghana</option>
                      </select>
                    </div>

                    <div class="mb-4">
                      <label class="form-label" for="nom">Mon Nom</label>
                      <input class="form-control" type="text" id="nom" placeholder="">
                    </div>

                    <div class="mb-4">
                      <label class="form-label" for="phone">Mon Téléphone</label>
                      <div class="input-group"><span class="input-group-text fs-base prfix">225</span>
                        <input class="form-control range-slider-value-min" id="phone" type="number">
                      </div>
                      <input type="hidden" id="telPrf" value="225">
                    </div>

                    <div class="mb-4">
                      <label class="form-label" for="nom">Mon Email</label>
                      <input class="form-control" type="text" id="mail" placeholder="">
                    </div>
                   
                    <div class="form-check mb-4">
                      <input class="form-check-input" type="checkbox" id="agree-to-terms" checked>
                      <label class="form-check-label" for="agree-to-terms">En nous rejoignant, vous devenez <a href='morehome'>ImmOver</a></label>
                    </div>

                    <span class="text-danger alertInf"></span>
                    <button class="rejoinsus btn btn-primary btn-lg rounded-pill w-100" type="button">Rejoindre</button>

                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <!-- Forgot password Modal -->
      <div class="modal fade" id="passforgotmodal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered p-2 my-0 mx-auto" style="max-width: 950px;">
          <div class="modal-content">
            <div class="modal-body px-0 py-2 py-sm-0">
              <button class="btn-close position-absolute top-0 end-0 mt-3 me-3" type="button" data-bs-dismiss="modal"></button>
              <div class="row mx-0 align-items-center">
                <div class="col-md-6 border-end-md p-4 p-sm-5">
                  <h2 class="h3 mb-4 mb-sm-5">Compte ImmOver !<br>Mot de passe oublié</h2><img class="d-block mx-auto" src="img/signin-modal/signin.svg" width="344" alt="Illustartion">
                </div>
                <div class="col-md-6 px-4 pt-2 pb-4 px-sm-5 pb-sm-5 pt-md-5">
                  <div class="d-flex align-items-center py-3 mb-3">
                    <hr class="w-100">
                    <div class="px-3"><b>ImmOver</b></div>
                    <hr class="w-100">
                  </div>
                  <form class="needs-validation" novalidate>
                    <div class="mb-4">
                      <label class="form-label mb-2" for="emailForgot">Mon Email</label>
                      <input class="form-control" type="email" id="emailForgot" placeholder="">
                    </div>
                    <span>Recevez votre mot de passe sur votre Email</span><br><br>

                    <span class="text-danger passAlert"></span>
                    <button class="btn btn-primary btn-lg rounded-pill w-100 recupPass" type="button">Récupérer</button>
                   
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Navbar-->
      <header class="navbar navbar-expand-lg navbar-light fixed-top" data-scroll-header>
        <div class="container">
           
            <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" 
                  aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
            </button>
            @if(isset($_SESSION['clientID']) AND $_SESSION['clientID']!='')
              <a class="btn btn-sm text-primary d-none d-lg-block order-lg-3" href="count">
                <i class="fi-user me-2"></i>Mon compte
              </a>
            @else
              <a class="btn btn-sm text-primary d-none d-lg-block order-lg-3" href="#signin-modal"
                data-bs-toggle="modal"><i class="fi-user me-2"></i>Se connecter
              </a>
            @endif
            

            <a class="btn btn-primary btn-sm rounded-pill ms-2 order-lg-3" href="/">
             <i class="fi-building me-2"></i><span class='d-none d-sm-inline'> ImmOver</span>
            </a>

          <div class="collapse navbar-collapse order-lg-2" id="navbarNav">
            <ul class="navbar-nav navbar-nav-scroll" style="max-height: 35rem;">
              <!-- Demos switcher-->
              <!--<li class="nav-item dropdown py-2 me-lg-2"><a class="nav-link dropdown-toggle align-items-center border-end-lg py-1 pe-lg-4" href="#" data-bs-toggle="dropdown" role="button" aria-expanded="false"><i class="fi-layers me-2"></i>Demos</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="real-estate-home.html"><i class="fi-building fs-base opacity-50 me-2"></i>Real Estate Demo</a></li>
                  <li class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="car-finder-home.html"><i class="fi-car fs-base opacity-50 me-2"></i>Car Finder Demo</a></li>
                  <li class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="job-board-home-v1.html"><i class="fi-briefcase fs-base opacity-50 me-2"></i>Job Board Demo</a></li>
                  <li class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="city-guide-home-v1.html"><i class="fi-map-pin fs-base opacity-50 me-2"></i>City Guide Demo</a></li>
                  <li class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="index-2.html"><i class="fi-home fs-base opacity-50 me-2"></i>Main Page</a></li>
                  <li><a class="dropdown-item" href="components/typography.html"><i class="fi-list fs-base opacity-50 me-2"></i>Components</a></li>
                  <li><a class="dropdown-item" href="docs/dev-setup.html"><i class="fi-file fs-base opacity-50 me-2"></i>Documentation</a></li>
                </ul>
              </li>-->
              <!-- Menu items-->

              <!--<li class="nav-item dropdown active"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Home</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="city-guide-home-v1.html">Homepage v1</a></li>
                  <li><a class="dropdown-item" href="city-guide-home-v2.html">Homepage v2</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Catalog</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="city-guide-catalog.html">Grid with Filters</a></li>
                  <li><a class="dropdown-item" href="city-guide-single.html">Single Place - Gallery</a></li>
                  <li><a class="dropdown-item" href="city-guide-single-info.html">Single Place - Info</a></li>
                  <li><a class="dropdown-item" href="city-guide-single-reviews.html">Single Place - Reviews</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Account</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="city-guide-account-info.html">Personal Info</a></li>
                  <li><a class="dropdown-item" href="city-guide-account-favorites.html">Favorites</a></li>
                  <li><a class="dropdown-item" href="city-guide-account-reviews.html">Reviews</a></li>
                  <li><a class="dropdown-item" href="city-guide-account-notifications.html">Notifications</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Vendor</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="city-guide-add-business.html">Add Business</a></li>
                  <li><a class="dropdown-item" href="city-guide-business-promotion.html">Business Promotion</a></li>
                  <li><a class="dropdown-item" href="city-guide-vendor-businesses.html">My Businesses</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pages</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="city-guide-about.html">About</a></li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Blog</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="city-guide-blog.html">Blog Grid</a></li>
                      <li><a class="dropdown-item" href="city-guide-blog-single.html">Single Post</a></li>
                    </ul>
                  </li>
                  <li><a class="dropdown-item" href="city-guide-contacts.html">Contacts</a></li>
                  <li class="dropdown"><a class="dropdown-item dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">Help Center</a>
                    <ul class="dropdown-menu">
                      <li><a class="dropdown-item" href="city-guide-help-center.html">Help Topics</a></li>
                      <li><a class="dropdown-item" href="city-guide-help-center-single-topic.html">Single Topic</a></li>
                    </ul>
                  </li>
                  <li><a class="dropdown-item" href="city-guide-404.html">404 Not Found</a></li>
                </ul>
              </li>-->
              @if(isset($_SESSION['clientID']) AND $_SESSION['clientID']!='')
               <li class="nav-item d-lg-none"><a class="nav-link" href="count"><i class="fi-user me-2"></i>Mon compte</a></li>
              @else
               <li class="nav-item d-lg-none"><a class="nav-link" href="#signin-modal" data-bs-toggle="modal"><i class="fi-user me-2"></i>Se connecter</a></li>
              @endif
            </ul>
          </div>
        </div>
      </header>