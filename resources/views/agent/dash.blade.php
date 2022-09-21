<div class="card-deck">

            <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
              <div class="bg-holder bg-card" style="background-image:url(assets/img/illustrations/corner-2.png);">
              </div>
              <!--/.bg-holder-->
              <div class="card-body position-relative">
                <h6>Nouvelles visites</h6>
                <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif text-info" data-countupp='{"count":73,"format":"alphanumeric"}'>{{count(VisiteAgent($_SESSION['agentCD'],0))}}</div><a class="font-weight-semi-bold fs--1 text-nowrap" href="NewvisiteAg">Voir<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a>
              </div>
            </div>

            <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
              <div class="bg-holder bg-card" style="background-image:url(assets/img/illustrations/corner-3.png);">
              </div>
              <!--/.bg-holder-->
              <div class="card-body position-relative">
                <h6>Visites Effectuées</h6>
                <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif">{{count(VisiteAgent($_SESSION['agentCD'],3))}}</div>
                <span><a class="font-weight-semi-bold fs--1 text-nowrap" href="EffectVisiteAg">Voir<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a></span>
              </div>
            </div>

            <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
              <div class="bg-holder bg-card" style="background-image:url(assets/img/illustrations/corner-3.png);">
              </div>
              <!--/.bg-holder-->
              <div class="card-body position-relative">
                <h6>Visites Soldées</h6>
                <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif">{{count(visiteRecouv(0,4,$_SESSION['agentCD']))}}</div>
                <span><a class="font-weight-semi-bold fs--1 text-nowrap" href="SoldVisiteAg">Voir<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a></span>
              </div>
            </div>

            <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
              <div class="bg-holder bg-card" style="background-image:url(assets/img/illustrations/corner-3.png);">
              </div>
              <!--/.bg-holder-->
              <div class="card-body position-relative">
                <h6>Visites Recouvertes</h6>
                <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif">{{count(visiteRecouv(1,4,$_SESSION['agentCD']))}}</div>
                <span><a class="font-weight-semi-bold fs--1 text-nowrap" href="RecouVisiteAg">Voir<span class="fas fa-angle-right ml-1" data-fa-transform="down-1"></span></a></span>
              </div>
            </div>

            <div class="card mb-3 overflow-hidden" style="min-width: 12rem">
              <div class="bg-holder bg-card" style="background-image:url(assets/img/illustrations/corner-3.png);">
              </div>
              <!--/.bg-holder-->
              <div class="card-body position-relative">
                <h6>Infos Agent LogRapid</h6>
                <span>Nom: <b>{{CheckAgent($_SESSION['agentCD'])->nomagent}}</b></span><br>
                <span>Email: <b>{{CheckAgent($_SESSION['agentCD'])->mail}}</b></span><br>
                <span>Tel: <b>{{CheckAgent($_SESSION['agentCD'])->phone}}</b></span><br>
                <span>Pass: <b>{{CheckAgent($_SESSION['agentCD'])->codeagent}}</b></span><br>
              </div>
            </div>

          </div>