          <div class="card-deck">
            <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
              <div class="bg-holder bg-card" style="background-image:url(assets/img/illustrations/corner-1.png);">
              </div>
              <!--/.bg-holder-->
              <div class="card-body position-relative">
                <h6>Biens dispos</h6>
                <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-warning" data-countupp='{"count":58386,"format":"alphanumeric"}'>{{count(BiensGerant($_SESSION['gerantID'],0))}}</div><a class="font-weight-semi-bold fs--1 text-nowrap" href="BiensG">Voir<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
              </div>
            </div>
            <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
              <div class="bg-holder bg-card" style="background-image:url(assets/img/illustrations/corner-2.png);">
              </div>
              <!--/.bg-holder-->

              <div class="card-body position-relative">
                <h6>Nouvelles visites</h6>
                <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-info" data-countupp='{"count":73,"format":"alphanumeric"}'>{{count(VisiteGerant($_SESSION['gerantID'],0))}}</div><a class="font-weight-semi-bold fs--1 text-nowrap" href="VisiteG">Voir<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
              </div>
            </div>

            <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
              <div class="bg-holder bg-card" style="background-image:url(assets/img/illustrations/corner-3.png);">
              </div>
              <!--/.bg-holder-->
              <div class="card-body position-relative">
                <h6>Visites Soldées</h6>
                <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif">{{count(recouverteG(0,4,$_SESSION['gerantID']))}}</div>
                <span><a class="font-weight-semi-bold fs--1 text-nowrap" href="SoldVisiteG">Voir<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a></span>
              </div>
            </div>

            <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
              <div class="bg-holder bg-card" style="background-image:url(assets/img/illustrations/corner-3.png);">
              </div>
              <!--/.bg-holder-->
              <div class="card-body position-relative">
                <h6>Visites Recouvertes</h6>
                <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif">{{count(recouverteG(1,4,$_SESSION['gerantID']))}}</div>
                <span><a class="font-weight-semi-bold fs--1 text-nowrap" href="RecouVisiteG">Voir<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a></span>
              </div>
            </div>

            <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
              <div class="bg-holder bg-card" style="background-image:url(assets/img/illustrations/corner-3.png);">
              </div>
              <!--/.bg-holder-->
              <div class="card-body position-relative">
                <h6>Infos Compte Immover</h6>
                <span>Nom: <b>{{ReadgerantID($_SESSION['gerantID'])->nom}}</b></span><br>
                <span>Email: <b>{{ReadgerantID($_SESSION['gerantID'])->mail}}</b></span><br>
                <span>Tel: <b>{{ReadgerantID($_SESSION['gerantID'])->phone}}</b></span><br>
                <span>Pass: <b>{{ReadgerantID($_SESSION['gerantID'])->pass}}</b></span><br>
              </div>
            </div>

          </div>