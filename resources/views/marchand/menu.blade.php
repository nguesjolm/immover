<div class="card mb-3"><img class="card-img-top" src="assets/img/generic/lograpid.png" alt="" />
            <div class="card-body">
              <div class="row justify-content-between align-items-center">

                <div class="col">
                  <div class="media">
                    <div class="media-body fs--1">
                      <a href="/"><h5 class="fs-0 text-warning"><b><span class="fas fa-home mr-1"></span> LogRapid - Marchand</b></h5></a>
                      <p class="mb-0"> <a href="#!"></a></p>
                      <span class="fs-0  font-weight-semi-bold">
                       Trouver un bien rapidement
                      </span>
                    </div>

                  </div>
                </div>

                
                <div class="col-md-auto mt-4 mt-md-0">
                  
                  <a href="#"><button class="btn btn-falcon-default btn-sm mr-2" type="button">
                    <span class="far fa-handshake mr-1"></span>{{marchdID($_SESSION['marchdID'])->nom}}
                  </button></a>
                  
                  
                   <a href="logoutMarchd"><button class="btn btn-falcon-danger btn-sm px-4 px-sm-5" type="button">
                     <span class="fas fa-outdent"></span> Quitter</button>
                    </a>
                
                   <!-- <a href="@com"><button class="btn btn-falcon-default btn-sm px-4 px-sm-5" type="button">Se connecter</button></a> -->
                 
                  
                </div>

                

              </div>
            </div>
          </div>