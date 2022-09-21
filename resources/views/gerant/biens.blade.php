<!-- Tableau de board -->
<div class="card bg-light mb-3">
  <div class="card-body p-3">
      <p class="fs--1 mb-0"><a href="#!">
        <svg class="svg-inline--fa fa-chart-pie fa-w-17 text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-pie" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" data-fa-i2svg=""><path fill="currentColor" d="M527.79 288H290.5l158.03 158.03c6.04 6.04 15.98 6.53 22.19.68 38.7-36.46 65.32-85.61 73.13-140.86 1.34-9.46-6.51-17.85-16.06-17.85zm-15.83-64.8C503.72 103.74 408.26 8.28 288.8.04 279.68-.59 272 7.1 272 16.24V240h223.77c9.14 0 16.82-7.68 16.19-16.8zM224 288V50.71c0-9.55-8.39-17.4-17.84-16.06C86.99 51.49-4.1 155.6.14 280.37 4.5 408.51 114.83 513.59 243.03 511.98c50.4-.63 96.97-16.87 135.26-44.03 7.9-5.6 8.42-17.23 1.57-24.08L224 288z"></path></svg>
        <strong class="text-warning">
          Biens immobilier
        </strong><br></a>
        <a href="countgerant"><span class="badge badge-warning"><span class='fas fa-home'></span> Dashboard</span></a>
        <a href="BiensG"><span class="badge badge-primary">Biens dispo({{count(BiensGerant($_SESSION['gerantID'],0))}})</span></a>
        <a href="bienIndispoG"><span class="badge badge-danger">Biens indispo({{count(BiensGerant($_SESSION['gerantID'],1))}})</span></a>
        <a href="bienGnew"><span class="badge badge-secondary">Ajouter</span></a>
      </p>
  </div>
</div>

<div class="card mb-3">

    <div class="card-header">
     <h5 class="mb-0">Biens disponibles  => <b class="text-success">{{count(BiensGerant($_SESSION['gerantID'],0))}} biens dispos</b></h5>
    </div>

    <div class="card-body bg-light px-0">
     <table class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100">
      <thead class="bg-200">
        <tr>
          <th class="sort">Libele</th>
          <th class="sort">opérations</th>
          <th class="sort">Coût</th>
          <th class="sort">Types</th>
          <th class="sort">Gérants</th>
          <th class="sort">Localisation</th>
          <th class="sort">Détails</th>
        </tr>
      </thead>
      <tbody class="bg-white">

      @foreach(BiensGerant($_SESSION['gerantID'],0) as $biens)
       <tr>
          <td><b>Code: {{$biens->codebiens}} <br> </b>{{$biens->libele}}</td>
          <td>{{ReadOperaID($biens->typesoperations_idtypesoperations)->operation}}</td>
          <td>{{$biens->prix}} Fcfa</td>
          <td>{{ReadTypesID($biens->typesbiens_idtypes)->types}}</td>
          <td><b>{{ReadgerantID($biens->gerants_idgerant)->nom}} <br> {{ReadgerantID($biens->gerants_idgerant)->phone}} <br> {{ReadgerantID($biens->gerants_idgerant)->mail}}</b></td>
          <td>{{ReadPaysID($biens->pays)->pays}} <br> {{ReadVillID($biens->villes)->ville}} <br> <b>{{ReadQuartierID($biens->quartier)->nom}}</b></td>
          <td>
              <!--<a href="DelBiens?id={{$biens->idbiens}}&&url=dispBiens">
                <span class="badge badge-pill badge-danger">
                Supprimer
                </span>
              </a>-->

              <a href="bienSoldG?biens={{$biens->idbiens}}&&act=1&&url=BiensG">
                <span class="badge badge-pill badge-danger">
               Indispo
                </span>
              </a>

              <a href="single?biens={{$biens->idbiens}}&act=1" target="_blank">
                <span class="badge badge-pill badge-info">
                Détails
                </span>
              </a>

              <a href="updBiens?biens={{$biens->idbiens}}&act=1&&url=BiensG">
                <span class="badge badge-pill badge-warning">
                Modifier
                </span>
              </a>

          </td>
       </tr>
      @endforeach
       
           
      </tbody>
      <tfoot class="bg-200">
        <tr>
          <th>Libele</th>
          <th>Coût</th>
          <th>opérations</th>
          <th>Types</th>
          <th>Gérants</th>
          <th>Localisation</th>
          <th>Détails</th>
        </tr>
      </tfoot>
     </table>
    </div>
</div>