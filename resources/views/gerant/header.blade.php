<div class="card mb-3">
        <!-- <img class="card-img-top" src="assets/img/generic/lograpid.png" alt="" /> -->
            <div class="card-body">
              <div class="row justify-content-between align-items-center">
                <div class="col">
                  <div class="media">
                    <div class="media-body fs--1">
                      <h5 class="fs-0">{{ReadgerantID($_SESSION['gerantID'])->nom}}</h5>
                     <span class="fs-0 text-warning font-weight-semi-bold">Nouvelles visites : {{count(VisiteGerant($_SESSION['gerantID'],0))}}</span>
                    </div>
                  </div>
                </div>
                <div class="col-md-auto mt-4 mt-md-0">
                  <button class="btn btn-falcon-default btn-sm mr-2" type="button"><a href="countgerant"  class="text-warning"><span class="fas fa-home  mr-1"></span> Dashboard</a></button>
                  <button class="btn btn-falcon-default btn-sm mr-2" type="button"><a href="DemandeG"  class="text-info"><span class="fas fa-bell  mr-1"></span> Demandes</a></button>
                  <button class="btn btn-falcon-default btn-sm mr-2" type="button"><a href="BiensG"  class="text-success"><span class="far fa-building  mr-1"></span> Biens</a></button>
                  <button class="btn btn-falcon-default btn-sm mr-2" type="button"><a href="VisiteG" class="text-primary"><span class="fas fa-hand-sparkles mr-1"></span> Visites</a></button>
                  <button class="btn btn-falcon-danger btn-sm px-4 px-sm-5" type="button"><a href="logoutAgt" class="text-danger"><span class="far fa-arrow-alt-circle-left"></span> Quitter</a></button>
                </div>
              </div>
            </div>
          </div>