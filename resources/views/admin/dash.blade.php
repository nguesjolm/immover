<!-- Tableau de board -->
<div class="card bg-light mb-3">
  <div class="card-body p-3">
      <p class="fs--1 mb-0"><a href="#!">
        <svg class="svg-inline--fa fa-chart-pie fa-w-17 text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-pie" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" data-fa-i2svg=""><path fill="currentColor" d="M527.79 288H290.5l158.03 158.03c6.04 6.04 15.98 6.53 22.19.68 38.7-36.46 65.32-85.61 73.13-140.86 1.34-9.46-6.51-17.85-16.06-17.85zm-15.83-64.8C503.72 103.74 408.26 8.28 288.8.04 279.68-.59 272 7.1 272 16.24V240h223.77c9.14 0 16.82-7.68 16.19-16.8zM224 288V50.71c0-9.55-8.39-17.4-17.84-16.06C86.99 51.49-4.1 155.6.14 280.37 4.5 408.51 114.83 513.59 243.03 511.98c50.4-.63 96.97-16.87 135.26-44.03 7.9-5.6 8.42-17.23 1.57-24.08L224 288z"></path></svg>
        <strong class="text-warning">
          Administrateur
        </strong>
      </a>, Veuillez consulter ci-dessous les statistiques du service</strong>
      </p>
  </div>
</div>
<!-- Statistic -->
<div class="row no-gutters">
    

 
  <div class="col-md-6 col-xxl-3 mb-3 pl-md-2 pr-xxl-2">
    <div class="card h-md-100">
      <div class="card-header pb-0">
        <h6 class="mb-0 mt-2">Total Abonnés</h6>
      </div>
      <div class="card-body pt-0">
        <div class="row h-100">
          <div class="col align-self-end">
            <div class="fs-4 font-weight-normal text-sans-serif text-700 line-height-1 mb-1">
              {{count(ReadClientAll())}}
            </div><span class="badge badge-pill fs--2 bg-200 text-primary"><span class="fas fa-caret-up mr-1"></span>comptes ouverts</span>
          </div>
          <div class="col-auto pl-0">
            <div class="echart-line-total-order h-100"></div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-6 col-xxl-3 mb-3 pr-md-2 pl-xxl-2">
    <div class="card h-md-100">
      <div class="card-body">
        <div class="row h-100 justify-content-between no-gutters">
          <div class="col-5 col-sm-6 col-xxl pr-2">
            <h6 class="mt-1">Biens Immobilier</h6>

            <span class="badge badge-pill fs--2 bg-200 text-primary">
              <a href="#" class="activImmo">
               <span class="far fa-clock mr-1"></span>Boutton d'activiation
              </a>
            </span>

            <div class="fs--2 mt-3">
              <div class="d-flex flex-between-center mb-1">
                <div class="d-flex align-items-center"><span class="dot bg-primary"></span><span class="font-weight-semi-bold">Actifs</span></div>
                <div class="d-xxl-none"><b>{{count(Allbiens(0))}}</b> </div>
              </div>
              <div class="d-flex flex-between-center mb-1">
                <div class="d-flex align-items-center"><span class="dot bg-info"></span><span class="font-weight-semi-bold">Desactivés</span></div>
                <div class="d-xxl-none"><b>{{count(Allbiens(1))}}</b> </div>
              </div>
			
				     
				
            </div>
          </div>
          
        </div>
      </div>
    </div>
  </div>



  <div class="col-md-6 col-xxl-3 mb-3 pr-md-2 pl-xxl-2">
      <div class="card h-md-100">
        <div class="card-body">
          <div class="row h-100 justify-content-between no-gutters">
            <div class="col-5 col-sm-6 col-xxl pr-2">
              <h6 class="mt-1">Demande & SMS</h6>
              <div class="fs--2 mt-3">
                <div class="d-flex flex-between-center mb-1">
                  <div class="d-flex align-items-center"><span class="dot bg-primary"></span>
                    <span class="font-weight-semi-bold">Demandes actives</span></div>
                  <div class="d-xxl-none">{{count(DemandeAll(0))}} alerte</div>
                </div>
                <hr>

                <div class="d-flex flex-between-center mb-1">
                  <div class="d-flex align-items-center"><span class="dot bg-success"></span>
                    <span class="font-weight-semi-bold">Volume SMS</span></div>
                  <div class="d-xxl-none"> 
                  <?php 
                    try {
                      echo SMSVolume();
                    } catch (\Throwable $th) {
                      //throw $th;
                      echo 'Offline';
                    }
               ?>
                  </div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    

    <div class="col-md-6 col-xxl-3 mb-3 pr-md-2 pl-xxl-2">
      <div class="card h-md-100">
        <div class="card-body">
          <div class="row h-100 justify-content-between no-gutters">
            <div class="col-5 col-sm-6 col-xxl pr-2">
              <h6 class="mt-1">Visites & Offreurs</h6>
              <div class="fs--2 mt-3">
                <div class="d-flex flex-between-center mb-1">
                  <div class="d-flex align-items-center"><span class="dot bg-primary"></span>
                    <span class="font-weight-semi-bold">Nouvelles Visites</span></div>
                  <div class="d-xxl-none">{{count(AllVisites(0))}} visites</div>
                </div>
                <hr>

                <div class="d-flex flex-between-center mb-1">
                  <div class="d-flex align-items-center"><span class="dot bg-success"></span>
                    <span class="font-weight-semi-bold">Offreur actifs</span></div>
                  <div class="d-xxl-none"> {{count(ReadgerantStat(0))}}</div>
                </div>
                
                <div class="d-flex flex-between-center mb-1">
                  <div class="d-flex align-items-center"><span class="dot bg-dark"></span>
                    <span class="font-weight-semi-bold">agence agree</span></div>
                  <div class="d-xxl-none"> {{count(ReadgerantProf('agence agree'))}}</div>
                </div>
                
                <div class="d-flex flex-between-center mb-1">
                  <div class="d-flex align-items-center"><span class="dot bg-dark"></span>
                    <span class="font-weight-semi-bold">agence non agree</span></div>
                  <div class="d-xxl-none"> {{count(ReadgerantProf('agence non agree'))}}</div>
                </div>
                
                <div class="d-flex flex-between-center mb-1">
                  <div class="d-flex align-items-center"><span class="dot bg-dark"></span>
                    <span class="font-weight-semi-bold">agent immobilier</span></div>
                  <div class="d-xxl-none"> {{count(ReadgerantProf('agent immobilier'))}}</div>
                </div>
                
                <div class="d-flex flex-between-center mb-1">
                  <div class="d-flex align-items-center"><span class="dot bg-dark"></span>
                    <span class="font-weight-semi-bold">proprietaire</span></div>
                  <div class="d-xxl-none"> {{count(ReadgerantProf('proprietaire'))}}</div>
                </div>
                
                <div class="d-flex flex-between-center mb-1">
                  <div class="d-flex align-items-center"><span class="dot bg-dark"></span>
                    <span class="font-weight-semi-bold">demarcheur</span></div>
                  <div class="d-xxl-none"> {{count(ReadgerantProf('demarcheur'))}}</div>
                </div>
                
                <div class="d-flex flex-between-center mb-1">
                  <div class="d-flex align-items-center"><span class="dot bg-dark"></span>
                    <span class="font-weight-semi-bold">particulier</span></div>
                  <div class="d-xxl-none"> {{count(ReadgerantProf('particulier'))}}</div>
                </div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

</div>
  

   
