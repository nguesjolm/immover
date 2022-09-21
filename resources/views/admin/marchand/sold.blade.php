<!-- Tableau de board -->
<div class="card bg-light mb-3">
  <div class="card-body p-3">
      <p class="fs--1 mb-0"><a href="#!">
        <svg class="svg-inline--fa fa-chart-pie fa-w-17 text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-pie" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" data-fa-i2svg=""><path fill="currentColor" d="M527.79 288H290.5l158.03 158.03c6.04 6.04 15.98 6.53 22.19.68 38.7-36.46 65.32-85.61 73.13-140.86 1.34-9.46-6.51-17.85-16.06-17.85zm-15.83-64.8C503.72 103.74 408.26 8.28 288.8.04 279.68-.59 272 7.1 272 16.24V240h223.77c9.14 0 16.82-7.68 16.19-16.8zM224 288V50.71c0-9.55-8.39-17.4-17.84-16.06C86.99 51.49-4.1 155.6.14 280.37 4.5 408.51 114.83 513.59 243.03 511.98c50.4-.63 96.97-16.87 135.26-44.03 7.9-5.6 8.42-17.23 1.57-24.08L224 288z"></path></svg>
        <strong class="text-warning">
          LogRapid
        </strong>
      </a>, Veuillez consulter l'Historique des soldes marchands</strong>
      </p>
  </div>
</div>

<div class="card mb-3">

    <div class="card-header">
     <h5 class="mb-0">Solde Marchand Total  => <b class="text-success">{{formatPrice(SoldMarchdAll())}} Fcfa</b></h5>
    </div>

    <div class="card-body bg-light px-0">
     <table class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100">
      <thead class="bg-200">
        <tr>
          <th class="sort">Nom</th>
          <th class="sort">Pays</th>
          <th class="sort">Villes</th>
          <th class="sort">Infos</th>
          <th class="sort">Solde</th>
          <th class="sort">Détails</th>
        </tr>
      </thead>
      <tbody class="bg-white">
       <?php //dd(ReadMarchd()); ?> 
       @foreach(ReadMarchd() as $marchd)
       <?php //dd($marchd->idmarchand); ?>
        @if(SoldMarchd($marchd->pass)!=0)
         <tr>
            <td>{{$marchd->nom}}</td>
            <td>{{$marchd->pays}}</td>
            <td>{{$marchd->ville}}</td>
            <td>{{$marchd->phone}}<br>{{$marchd->mail}}<br><b>Pass: {{$marchd->pass}}</b></td>
            <td>{{formatPrice(SoldMarchd($marchd->pass))}} Fcfa</td>
            <td>
              <a href="marchdSold?id={{$marchd->pass}}">
               <span class="badge badge-pill badge-success">
                Solder
               </span>
              </a>
            </td>
         </tr>
        @endif
       @endforeach
      </tbody>
      <tfoot class="bg-200">
        <tr>
          <th>Nom</th>
          <th>Pays</th>
          <th>Villes</th>
          <th>Infos</th>
          <th>Solde</th>
          <th>Details</th>
        </tr>
      </tfoot>
     </table>
    </div>
</div>