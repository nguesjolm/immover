<div class="card mb-3">
  <div class="bg-holder d-none d-lg-block bg-card"
   style="background-image:url(../assets/img/illustrations/corner-4.png);">
  </div>
  <!--/.bg-holder-->

    <div class="card-body">
      <div class="row">
        <div class="col-lg-8">
          <h3 class="mb-0 text-primary"> <i class="fas fa-grin-stars"></i> Campg. Marketing >Historique</h3>
          <p class="mt-2">Ciblez efficacement vos futurs clients par SMS ou EMAIL</p>
        </div>
      </div>
    </div>
</div>

<div class="card mb-3">

    <div class="card-header">
     <h5 class="mb-0">Campagne envoyés   => <b class="text-success">100 Campagnes</b></h5>
    </div>

    <div class="card-body bg-light px-0">
     <table class="table table-sm table-dashboard data-table no-wrap mb-0 fs--1 w-100">
      <thead class="bg-200">
        <tr>
          <th class="sort">Titre</th>
          <th class="sort">Cible</th>
          <th class="sort">Type</th>
          <th class="sort">Nb atteint</th>
          <th class="sort">Date</th>
          <th class="sort">Actions</th>
        </tr>
      </thead>
      <tbody class="bg-white">
       
      </tbody>
      <tfoot class="bg-200">
        <tr>
          <th>Titre</th>
          <th>Cible</th>
          <th>Type</th>
          <th>Msg</th>
          <th>Date</th>
          <th>Actions</th>
        </tr>
      </tfoot>
     </table>
    </div>
</div>
<script src="{{ asset('assets/js/theme.js') }}"></script>
<script type="text/javascript">
  $('.deleteSMS').click(function(){
    var idS = $(this).attr('id');
    Swal.fire({
      title: 'SMS Marketing',
      text: "Voulez-vous supprimer cette campagne?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'oui, supprimer!'
    }).then((result) => {
      if (result.isConfirmed) {
        /*Swal.fire(
          'Deleted!',
          'Your file has been deleted.',
          'success'
        );*/
        $.ajax({
         url:"emptySMS",
         method:"get",
         data:{idsms:idS},
         dataType:'html',
         success:function(data){
           Swal.fire('Supprimer avec succès');
           $("#main_content").load("/CampgList");
         },
         error:function(){
           Swal.fire('erreur de connection');
         }
        });
      }
    })



  });

</script>
