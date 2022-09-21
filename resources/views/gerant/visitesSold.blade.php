<!-- Tableau de board -->
<div class="card bg-light mb-3">
  <div class="card-body p-3">
      <p class="fs--1 mb-0"><a href="#!">
        <svg class="svg-inline--fa fa-chart-pie fa-w-17 text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-pie" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" data-fa-i2svg=""><path fill="currentColor" d="M527.79 288H290.5l158.03 158.03c6.04 6.04 15.98 6.53 22.19.68 38.7-36.46 65.32-85.61 73.13-140.86 1.34-9.46-6.51-17.85-16.06-17.85zm-15.83-64.8C503.72 103.74 408.26 8.28 288.8.04 279.68-.59 272 7.1 272 16.24V240h223.77c9.14 0 16.82-7.68 16.19-16.8zM224 288V50.71c0-9.55-8.39-17.4-17.84-16.06C86.99 51.49-4.1 155.6.14 280.37 4.5 408.51 114.83 513.59 243.03 511.98c50.4-.63 96.97-16.87 135.26-44.03 7.9-5.6 8.42-17.23 1.57-24.08L224 288z"></path></svg>
        <strong class="text-warning">
          Visites
        </strong><br></a>
        <a href="countgerant"><span class="badge badge-warning"><span class='fas fa-home'></span> Dashboard</span></a>
        <a href="VisiteG"><span class="badge badge-primary">Nouvelle({{count(VisiteGerant($_SESSION['gerantID'],0))}})</span></a>
        <a href="EffectVisiteG"><span class="badge badge-danger">Effectuées({{count(VisiteGerant($_SESSION['gerantID'],3))}})</span></a>
        <a href="SoldVisiteG"><span class="badge badge-success">Soldées({{count(recouverteG(0,4,$_SESSION['gerantID']))}})</span></a>
        <a href="RecouVisiteG"><span class="badge badge-info">Recouvertes({{count(recouverteG(1,4,$_SESSION['gerantID']))}})</span></a>
      </p>
  </div>
</div>

<div class="card mb-3">

    <div class="card-header">
     <h5 class="mb-0"><span class="text-success">Visites Soldées</span>  => <b> {{count(recouverteG(0,4,$_SESSION['gerantID']))}} </b></h5>
    </div>

    <div class="card-body bg-light px-0">
     <table class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100">
      <thead class="bg-200">
        <tr>
          <th class="sort">Clients</th>
          <th class="sort">Biens</th>
          <th class="sort">Infos Biens</th>
          <th class="sort">Gérants</th>
          <th class="sort">Agent</th>
          <th class="sort">Date visite</th>
          <th class="sort">Date commande </th>
          <th class="sort">Détails</th>
        </tr>
      </thead>
      <tbody class="bg-white">
       @foreach(recouverteG(0,4,$_SESSION['gerantID']) as $visite)
        <tr>
          <td><b class="text-danger">Code visite:{{$visite->codevisites}}</b><br>{{ReadClientID($visite->idclients)->nom}} <br> {{ReadClientID($visite->idclients)->phone}} <br> {{ReadClientID($visite->idclients)->mail}}</td>
          <td><b>Code : {{ReadBiensID($visite->idbiens)->codebiens}}</b></td>
          <td>{{ReadBiensID($visite->idbiens)->libele}}</td>
          <td>{{ReadgerantID($visite->idgerants)->nom}} <br> {{ReadgerantID($visite->idgerants)->phone}} <br> {{ReadgerantID($visite->idgerants)->mail}}</td>
          @if($visite->codeagent==0)
           <td><b>LogRapid</b></td>
          @else
           <td><b>{{ReadAgentCode($visite->codeagent)->statut}}</b> <br>{{ReadAgentCode($visite->codeagent)->nomagent}} <br> {{ReadAgentCode($visite->codeagent)->phone}} <br> {{ReadAgentCode($visite->codeagent)->mail}}</td>
          @endif
          
          <td>{{$visite->daterdvprise}} <br> {{$visite->datevisite}}</td>
          <td>{{$visite->created_at}}</td>
          <td>
              <!--<a href="visiteReport?id={{$visite->idbiensclient}}&&url=newVisite&&idbiens={{$visite->idbiens}}">
                <span class="badge badge-pill badge-info">
                Reporter
                </span>
              </a>-->
             
              <!--<a href="visiteAnnul?id={{$visite->idbiensclient}}&&url=VisiteG&&idbiens={{$visite->idbiens}}">
                <span class="badge badge-pill badge-info">
                Annuler
                </span>
              </a>-->

              <!--<a href="visiteEffect?id={{$visite->idbiensclient}}&&url=VisiteG&&idbiens={{$visite->idbiens}}">
                <span class="badge badge-pill badge-danger">
                Effectuer
                </span>
              </a>-->

              <!--<a href="visiteSold?id={{$visite->idbiensclient}}&&url=VisiteG&&idbiens={{$visite->idbiens}}">
                <span class="badge badge-pill badge-success">
                solder
               </span>
              </a>-->

            <a href="single?biens={{$visite->idbiens}}&act=1">
             <span class="badge badge-pill badge-secondary">
               voir
             </span>
            </a>

          </td>
        </tr>
       @endforeach
      </tbody>
      <tfoot class="bg-200">
        <tr>
          <th>Clients</th>
          <th>Biens</th>
          <th>Infos Biens</th>
          <th>Gérants</th>
          <th>Agent</th>
          <th>Date visite</th>
          <th>Date rdv</th>
          <th>Détails</th>
        </tr>
      </tfoot>
     </table>
    </div>
</div>