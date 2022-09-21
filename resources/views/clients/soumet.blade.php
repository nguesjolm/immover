 <!-- Page container-->
 <div class="container mt-5 mb-md-4 py-5 center">

        <div class="row">
          <!-- Page content-->
          <div class="col-lg-8">
            <!-- Breadcrumb-->
            <nav class="mb-3 pt-md-3" aria-label="Breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="demandes">Toutes les demandes</a></li>
                <li class="breadcrumb-item active" aria-current="page"></li>
              </ol>
            </nav>
            <!-- Title-->
            <div class="mb-4">
              <h1 class="h2 mb-0">Code Demande : {{$demandID}}</h1>
              <div class="d-lg-none pt-3 mb-2"></div>
              <div class="progress d-lg-none mb-4" style="height: .25rem;">
                <div class="progress-bar bg-warning" role="progressbar" style="width: 100%" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
              </div>
            </div>
            <!-- Basic info-->
            <section class="card card-body border-0 shadow-sm p-4 mb-4" id="basic-info">
              <p class=" mb-4"><i class="fi-info-circle text-primary fs-5 mt-n1 me-2"></i>
               Si vous avez un bien qui correspond à cette demande, veuillez entrer votre numéro de téléphone, nous vous contactons dans 24H pour procéder à la transaction immobilière.
              </p>

              <div class="mb-3">
                <label class="form-label" for="ap-title">Votre numéro de téléphone <span class="text-danger">*</span></label>
                <input class="form-control phoneP" type="text" id="ap-title"  required><span class="form-text"></span>
              </div>
              <input class="form-control codeP" type="hidden" value="{{$demandID}}"><span class="form-text"></span>

              <div class="col-lg-6">
               <span class="info text-danger"></span>
                <a href="#" class="" id="{{$demandID}}">
                   <button type="button" class="btn btn-outline-primary rounded-pill soumt">SOUMETTRE</button>
                </a>
              </div>
            </section>

        </div>
          
        </div>
      </div>