<!-- Tableau de board -->
<div class="card bg-light mb-3">
  <div class="card-body p-3">
      <p class="fs--1 mb-0"><a href="#!">
        <svg class="svg-inline--fa fa-chart-pie fa-w-17 text-warning" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="chart-pie" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 544 512" data-fa-i2svg=""><path fill="currentColor" d="M527.79 288H290.5l158.03 158.03c6.04 6.04 15.98 6.53 22.19.68 38.7-36.46 65.32-85.61 73.13-140.86 1.34-9.46-6.51-17.85-16.06-17.85zm-15.83-64.8C503.72 103.74 408.26 8.28 288.8.04 279.68-.59 272 7.1 272 16.24V240h223.77c9.14 0 16.82-7.68 16.19-16.8zM224 288V50.71c0-9.55-8.39-17.4-17.84-16.06C86.99 51.49-4.1 155.6.14 280.37 4.5 408.51 114.83 513.59 243.03 511.98c50.4-.63 96.97-16.87 135.26-44.03 7.9-5.6 8.42-17.23 1.57-24.08L224 288z"></path></svg>
        <strong class="text-warning">
        Type de biens immobiliers
        </strong>
      </a>, Historiques</strong>
      </p>
  </div>
</div>



<div class="card mb-3">
            <div class="card-header">
              <h5 class="mb-0">Nouveau types</h5>
            </div>

            <div class="card-body bg-light">
              <div class="row">
                <div class="col-12">
                    <form>
                        <!-- Types de biens -->
                        <div class="form-group">
                         <label for="biens">Types de biens</label>
                         <input class="form-control" name="biens" id="biens" type="text" required>
                        </div>

                        <div class="form-group">
                         <label for="icons">Icons</label>
                         <input class="form-control" name="icons" id="icons" type="text" required>
                        </div>

                        <button class="btn btn-primary mb-3 send" type="button">Ajouter</button>
                        <span class="text-danger alertSend"></span>
                    </form>
                </div>
              </div>
            </div>
</div>

<div class="card mb-3">

    <div class="card-header">
     <h5 class="mb-0">Types de biens immobiliers  => <b class="text-success">{{count(ReadTypebiens())}} biens</b></h5>
    </div>

    <div class="card-body bg-light px-0">
     <table class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100">
      <thead class="bg-200">
        <tr>
          <th class="sort">Libele</th>
          <th class="sort">Biens</th>
          <th class="sort">Details</th>
        </tr>
      </thead>
      <tbody class="bg-white">
       
      @foreach(ReadTypebiens() as $types)
        <tr>
          <td>{{$types->types}}</td>
          <td>{{typesBiens($types->idtypes)}} biens</td>
          <td>
            <a href="typebiensdel?id={{$types->idtypes}}">
              <span class="badge badge-pill badge-danger">
               Supprimer
              </span>
            </a>
          </td>
        </tr>
      @endforeach
           
      </tbody>
      <tfoot class="bg-200">
        <tr>
          <th>Libele</th>
          <th>Biens</th>
          <th>Détails</th>
        </tr>
      </tfoot>
     </table>
    </div>
</div>
