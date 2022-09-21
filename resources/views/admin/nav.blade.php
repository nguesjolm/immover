<nav class="navbar navbar-vertical navbar-expand-xl navbar-light">
          <div class="d-flex align-items-center">
            <div class="toggle-icon-wrapper">

              <button class="btn navbar-toggler-humburger-icon navbar-vertical-toggle" data-toggle="tooltip" data-placement="left" title="Toggle Navigation"><span class="navbar-toggle-icon"><span class="toggle-line"></span></span></button>

            </div><a class="navbar-brand" href="/">
              <div class="d-flex align-items-center py-3"><span class="text-sans-serif text-warning">ImmOver</span>
              </div>
            </a>
          </div>
          <div class="collapse navbar-collapse" id="navbarVerticalCollapse">
            <div class="navbar-vertical-content perfect-scrollbar scrollbar">
              <ul class="navbar-nav flex-column">

                <!-- Tableau de board -->
                <li class="nav-item">
                    <a class="nav-link" href="dash" role="button" >
                     <div class="d-flex align-items-center"><span class="nav-link-icon">
                        <span class="fas fa-chart-pie"></span></span><span class="nav-link-text">Home</span>
                     </div>
                    </a>
                </li>


                <!-- Gérant:: Gestion des gérants de biens immobiliers -->
                  <li class="nav-item"><a class="nav-link dropdown-indicator" href="#pages" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="pages">
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="far fa-user-circle"></span></span><span class="nav-link-text">Offreurs</span>
                      </div>
                    </a>
                    <ul class="nav collapse" id="pages" data-parent="#navbarVerticalCollapse">
                      <!-- <li class="nav-item"><a class="nav-link" href="gerantNew">Nouveau</a></li> -->
                      <li class="nav-item"><a class="nav-link" href="gerantStory">Activés</a></li>
                      <li class="nav-item"><a class="nav-link" href="gerantStoryoff">Desactivés</a></li>
                    </ul>
                  </li>

                <!-- Types :: Gestion des types de biens et operations -->
                <li class="nav-item"><a class="nav-link dropdown-indicator" href="#types" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="pages">
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="far fa-list-alt"></span></span><span class="nav-link-text">Types</span>
                      </div>
                    </a>
                    <ul class="nav collapse" id="types" data-parent="#navbarVerticalCollapse">
                      <li class="nav-item"><a class="nav-link" href="biensType">Biens</a></li>
                      <li class="nav-item"><a class="nav-link" href="operaType">Opérations</a></li>
                    </ul>
                  </li>
                

                <!-- Localisation :: Gestion de la localisations des biens -->
                  <li class="nav-item"><a class="nav-link dropdown-indicator" href="#email" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="email">
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-map-marked-alt"></span></span><span class="nav-link-text">Localisation</span>
                      </div>
                    </a>
                    <ul class="nav collapse" id="email" data-parent="#navbarVerticalCollapse">
                      <li class="nav-item"><a class="nav-link" href="newLocal">Pays & Villes</a></li>
                      <li class="nav-item"><a class="nav-link" href="storLocal">Quartier</a></li>
                    </ul>
                  </li>
                

                <!-- Biens :: Gestion des biens immobiliers  -->
                 <li class="nav-item"><a class="nav-link dropdown-indicator" href="#authentication" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="authentication">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-store-alt"></span></span><span class="nav-link-text">Biens</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="authentication" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item"><a class="nav-link" href="newBiens">Nouveau</a></li>
                    <li class="nav-item"><a class="nav-link" href="dispBiens">Dispo</a></li>
                    <li class="nav-item"><a class="nav-link" href="indispBiens">Indispo</a></li>
                  </ul>
                 </li>
                
                <!-- Visites :: Gestion des visites immobilières  -->
                  <li class="nav-item"><a class="nav-link dropdown-indicator" href="#visites" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="authentication">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-theater-masks"></span></span><span class="nav-link-text">Visites</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="visites" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item"><a class="nav-link" href="newVisite">Nouveau</a></li>
                    <li class="nav-item"><a class="nav-link" href="reportVisites">Reportée</a></li>
                    <li class="nav-item"><a class="nav-link" href="okVisites">Effectuée</a></li>
                    <li class="nav-item"><a class="nav-link" href="inVisites">Soldée</a></li>
                    <li class="nav-item"><a class="nav-link" href="recouvremnt">Recouvertes</a></li>
                    <li class="nav-item"><a class="nav-link" href="noVisites">Annulée</a></li>
                  </ul>
                 </li>
                
              </ul>

              <div class="navbar-vertical-divider">
                <hr class="navbar-vertical-hr my-2" />
              </div>
              <!-- <ul class="navbar-nav flex-column"> -->

                <!-- Soumissions :: Gestion des biens soumis -->
                 <!-- <li class="nav-item"><a class="nav-link dropdown-indicator" href="#soumis" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="email">
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-vote-yea"></span></span><span class="nav-link-text">Biens Soumis</span>
                      </div>
                    </a>
                    <ul class="nav collapse" id="soumis" data-parent="#navbarVerticalCollapse">
                      <li class="nav-item"><a class="nav-link" href="newSoumis">Nouveau</a></li>
                      <li class="nav-item"><a class="nav-link" href="accepSoumis">Accepté</a></li>
                      <li class="nav-item"><a class="nav-link" href="refuseSoumis">Refusé</a></li>
                    </ul>
                  </li> -->
                
                <!-- Marchand :: Gestion des points marchands -->
                <!-- <li class="nav-item"><a class="nav-link dropdown-indicator" href="#marchand" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="email">
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-user-tag"></span></span><span class="nav-link-text">Marchands</span>
                      </div>
                    </a>
                    <ul class="nav collapse" id="marchand" data-parent="#navbarVerticalCollapse">
                      <li class="nav-item"><a class="nav-link" href="newMarchd">Nouveau</a></li>
                      <li class="nav-item"><a class="nav-link" href="storyMarchd">Historique</a></li>
                      <li class="nav-item"><a class="nav-link" href="soldMarchd">Solde</a></li>

                    </ul>
                  </li> -->
                
                <!-- Paiements :: Gestion des paiements de partenaires -->
                 <!-- <li class="nav-item"><a class="nav-link dropdown-indicator" href="#payment" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="email">
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-comment-dollar"></span></span><span class="nav-link-text">Paiements</span>
                      </div>
                    </a>
                    <ul class="nav collapse" id="payment" data-parent="#navbarVerticalCollapse">
                      <li class="nav-item"><a class="nav-link" href="storPay">Rapport</a></li>
                      <li class="nav-item"><a class="nav-link" href="soldPay">LogRapid</a></li>
                      <li class="nav-item"><a class="nav-link" href="soldtriumph">Triumph-K</a></li>
                    </ul>
                  </li> -->

              <!-- </ul> -->

              <!-- <div class="navbar-vertical-divider">
                <hr class="navbar-vertical-hr my-2" />
              </div> -->
              <ul class="navbar-nav flex-column">
                <!-- Agent LogRapid :: Gestion des Agents LogRapid -->
                 <li class="nav-item"><a class="nav-link dropdown-indicator" href="#agent" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="email">
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-address-card"></span></span><span class="nav-link-text">Agent</span>
                      </div>
                    </a>
                    <ul class="nav collapse" id="agent" data-parent="#navbarVerticalCollapse">
                      <!--<li class="nav-item"><a class="nav-link" href="storPay">Rapport</a></li>-->
                      <li class="nav-item"><a class="nav-link" href="newAgent">Nouveau</a></li>
                      <li class="nav-item"><a class="nav-link" href="storyAgent">Historique</a></li>
                    </ul>
                 </li>
				  
				<!-- Historique des demandes -->
                <li class="nav-item"><a class="nav-link dropdown-indicator" href="#demandes" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="email">
                      <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-cloud-download-alt"></span></span><span class="nav-link-text">Demandes</span>
                      </div>
                    </a>
                    <ul class="nav collapse" id="demandes" data-parent="#navbarVerticalCollapse">
                      <!--<li class="nav-item"><a class="nav-link" href="storPay">Rapport</a></li>-->
                      <!-- <li class="nav-item"><a class="nav-link" href="newDemand">Nouveau</a></li>
                      <li class="nav-item"><a class="nav-link" href="PubDemandAll">Publier</a></li>
                      <li class="nav-item"><a class="nav-link" href="soumisDemand">Soumission</a></li>
                      <li class="nav-item"><a class="nav-link" href="solvDemand">Trouver</a></li>
                      <li class="nav-item"><a class="nav-link" href="annulDemand">Annuler</a></li> -->
                      <li class="nav-item"><a class="nav-link" href="newDemand">Activées</a></li>
                      <li class="nav-item"><a class="nav-link" href="annulDemand">Desactivées</a></li>

                    </ul>
                 </li> 
                <!-- Abonnés::Gestion des abonnés -->
                 <li class="nav-item"><a class="nav-link" href="abones" role="button">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-users"></span></span><span class="nav-link-text">Abonnés</span>
                    </div>
                  </a>
                 </li>
               

               <!-- Campagne::Gestion des campagnes marketing SMS -->
                <!--<li class="nav-item"><a class="nav-link dropdown-indicator" href="#components" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="components">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-bullhorn"></span></span><span class="nav-link-text">Camp. marketing</span>
                    </div>
                  </a>
                  <ul class="nav collapse" id="components" data-parent="#navbarVerticalCollapse">
                    <li class="nav-item"><a class="nav-link" href="campNew">Campagne</a>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="campStory">Historique</a>
                    </li>
                  </ul>
                </li> -->

               <!-- SMS::Gestion des SMS => Rechargement + Solde -->
               <!--<li class="nav-item"><a class="nav-link" href="sms" role="button" aria-expanded="false" aria-controls="plugins">
                    <div class="d-flex align-items-center"><span class="nav-link-icon"><span class="fas fa-sms"></span></span><span class="nav-link-text">SMS</span>
                    </div>
                  </a>
                </li>-->

              
              <!-- <div class="settings px-3 px-xl-0">
                <div class="navbar-vertical-divider px-0">
                  <hr class="navbar-vertical-hr my-3" />
                </div><a class="btn btn-sm btn-block btn-purchase mb-3 bg-warning" href="logoutadmin">
                Quitter</a>
              </div> -->
            </div>
          </div>
        </nav>
