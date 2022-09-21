@include('layouts.header')
  @include('clients.menu')
  @include('clients.demandes')
@include('layouts.footer')
 <!-- Filters sidebar toggle button (mobile)-->
 <button class="btn btn-primary btn-sm w-100 rounded-0 fixed-bottom d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#filters-sidebar"><i class="fi-filter me-2"></i>Filters</button>
 <!-- Back to top button-->
 <a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon fi-chevron-up"></i></a>

<script type="text/javascript">
//Boutton de soummission
$('.soumt').click(function(){
  var code = $('.codeP').val();
  var phone = $('.phoneP').val();
  //alert('Code: '+code+' Phone: '+phone);
  if (phone!='') {
    $('.info').text('');
    $.ajax({
     url:'saveSoumt',
     method:'get',
     data:{codeP:code,phoneP:phone},
     dataType:'json',
     beforeSend:function(){
      $('.soumt').text('chargement...');
      $('.soumt').prop('disabled', true);
     },
     success:function(data){
      $('.phoneP').val('');
      $('.soumt').text('SOUMETTRE');
      Swal.fire(data.msg);
      $('.soumt').prop('disabled', false);
     },
     error:function(){
       console.log('error');
     }
    });
  } else {
    $('.info').text('Veuillez saisir votre numéro de téléphone');
  }
  
});
//Soumettre un bien
$('.soumet').click(function(){
  var id = $(this).attr('id');
  $('.titreD').text("Code Demande: "+id);
  $('.codeP').val(id);
  $('#contact').modal('show');
});
//hide result search box
$('#searchRes').hide();
//Recherche automatique
$('.searchBiens').keyup(function(){
  var prod = $(this).val();
  console.log("produit: "+prod);
  var data = {prod:prod};
  if (prod=='') {
    $('#searchRes').hide();
  }else{
    $('#searchRes').show();
  }

  //Recherche Ajax
  $.ajax({
    url:'searchProd',
    method:'get',
    dataType:'html',
    data:data,
    beforeSend:function(){
      $('#searchRes').html('<li class="list-group-item d-flex justify-content-between align-items-center"><span>Chargement...</span></li>');
      $('#searchRes').show();
    },
    success:function(data){
      $('#searchRes').html(data);
      if (prod=='') {
       $('#searchRes').hide(); 
      }
    },
    error:function(){
      $('#searchRes').html('<li class="list-group-item d-flex justify-content-between align-items-center"><span>Problème de connection</span></li>');
    }
  });

});

//Pays by Ville
$('#paySelect').change(function(){
  var pays = $(this).children("option:selected").val();
  $('.paysFilt').val(pays);
  var datas = {pays:pays};
  console.log(pays);
  $.ajax({
    url:'villebypays',
    method:'get',
    data:datas,
    dataType:'html',
    beforeSend:function(){
      $('.villeLabel').text('Chargement...');
    },
    success:function(data){
      $('.villeLabel').text('Villes');
      $('#villes').html(data);
    },
    error:function(){
      $('.villeLabel').text('Problème de connection');
    }
  });
});

//Quartier by ville
$('#villes').change(function(){
  var ville = $(this).children("option:selected").val();
  $('.villeFilt').val(ville);
  console.log(ville);
  var datas = {villes:ville};
  $.ajax({
    url:'quartierville',
    method:'get',
    data:datas,
    dataType:'html',
    beforeSend:function(){
      $('.quartierLabel').text("Chargement...");
    },
    success:function(data){
      $('.quartierLabel').text("Quartier");
      $('#quartier').html(data);
    },
    error:function(){
      $('.quartierLabel').text("Problème de connection");
    }
  });
});

//Quartier Selected
$('#quartier').change(function(){
  var quartier = $(this).children("option:selected").val();
  $('.quartierFilt').val(quartier);
});

//Types de biens
$('#typebiens').change(function(){
  var typesbiens = $(this).children('option:selected').val();
  $('.typebiensFilt').val(typesbiens);
});

//Types d'operation
$('#operation').change(function(){
  var opera = $(this).children('option:selected').val();
  $('.operaFilt').val(opera);
});

//Finder search de demandes
$('.findSearch').click(function(){
   var typesbiens = $('.typebiensFilt').val();
   var quartier = $('.quartierFilt').val();
   var ville = $('.villeFilt').val();
   var pays = $('.paysFilt').val();
   var opera = $('.operaFilt').val();
   console.log("Types biens: "+typesbiens+" - Quartier: "+quartier+" - Ville:"+ville+" -Pays:"+pays+" -opera: "+opera);
   var datas = {typesbiens:typesbiens,quartier:quartier,ville:ville,pays:pays,opera:opera};
   $.ajax({
     url:'SearchFiltDemnd',
     method:'get',
     dataType:'html',
     data:datas,
     beforeSend:function(){
       $('.alerFilt').text('Chargement...');
       $('.produitFilt').html('<div class="alert alert-primary" role="alert">Chargement...</div>');
     },
     success:function(data){
       $('.alerFilt').html('<a href="#resultProd"><span class="badge bg-success" data-bs-dismiss="offcanvas">Resultat</span></a>');
       $('.produitFilt').html(data);
     },
     error:function(){
       $('.alerFilt').text('Problème de connection');
       $('.produitFilt').html("Error");
     }
   });
 });



</script>