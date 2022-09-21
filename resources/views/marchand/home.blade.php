        <div class="row no-gutters">
            <!-- Signaler un accident -->
            <div class="col-lg-6 col-xl-6 col-xxl-8 mb-3 pr-lg-2 mb-3">
              <div class="card h-lg-100">
                <div class="card-body d-flex align-items-center">

                  <div class="w-100">
                    <h6>Revenue<span class="badge badge-soft-success rounded-capsule ml-2">{{VisiteMarchd($_SESSION['marchdPASS'])}} visites</span></h6>
                    <div class="display-4 fs-4 mb-2 font-weight-normal text-sans-serif" 
                         data-countup='{"count":{{SoldMarchd($_SESSION["marchdPASS"])}},"format":"comma","prefix":""}'>
                         {{formatPrice(SoldMarchd($_SESSION['marchdPASS']))}} 
                    </div>fcfa
                  </div>

                </div>
              </div>
            </div>

            <!-- Signaler un accident -->
            <div class="col-lg-6 col-xl-6 col-xxl-8 mb-3 pr-lg-2 mb-3">
              <div class="card h-lg-100">
                <div class="card-body d-flex align-items-center">

                  <div class="w-100">
                    <h6>Infos Marchand</h6>
                    <span><b>Nom :</b> {{marchdID($_SESSION['marchdID'])->nom}}</span><br>
                    <span><b>Phone :</b> {{marchdID($_SESSION['marchdID'])->phone}} </span><br>
                    <span><b>Email :</b> {{marchdID($_SESSION['marchdID'])->mail}}</span><br>
                    <span><b>Pass :</b> {{marchdID($_SESSION['marchdID'])->pass}}</span><br>
                  </div>

                </div>
              </div>
            </div>


        </div>