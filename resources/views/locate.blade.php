@include('layouts.header')
  @include('clients.menu')
  @include('clients.locate')
@include('layouts.footer')
 <!-- Filters sidebar toggle button (mobile)-->
 <button class="btn btn-primary btn-sm w-100 rounded-0 fixed-bottom d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#filters-sidebar"><i class="fi-filter me-2"></i>Filters</button>
 <!-- Back to top button-->
 <a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon fi-chevron-up"></i></a>

<script type="text/javascript">
  //Proposer une bien
$('.savebiens').click(function(){
  //Recuperation des données
  var nomp = $('.nomp').val();
  var telp = $('.telp').val();
  var morep = $('.morep').val();
  var lieup = $('.lieup').val();
  console.log('nom:'+nom+'telp:'+telp+'lieup:'+lieup);
  var datas = {nom:nomp,tel:telp,lieu:lieup,more:morep};
  $.ajax({
    url:'savebiens',
    method:'get',
    data:datas,
    dataType:'json',
    beforeSend:function(){
      $('.savebiens').text('Chargement...');
      $('.savebiens').prop('disabled', true); 
    },
    success:function(data){
      Swal.fire(data.msg);
      $('.savebiens').text('valider');
      $('.savebiens').prop('disabled', false); 
      $('.nomp').val('');
      $('.telp').val('');
      $('.morep').val('');
      $('.lieup').val('');
    },
    error:function(){
      Swal.fire('Erreur : Problème de connection internet');
      $('.savebiens').text('valider');
      $('.savebiens').prop('disabled', false); 
    }

  });
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

//Finder search
$('.findSearch').click(function(){
   var typesbiens = $('.typebiensFilt').val();
   var quartier = $('.quartierFilt').val();
   var ville = $('.villeFilt').val();
   var pays = $('.paysFilt').val();
   var minprice = $("#minprice").val();
   var maxprice = $("#maxprice").val();
   console.log("Types biens: "+typesbiens+" - Quartier: "+quartier+" - Ville:"+ville+" -Pays:"+pays+" -Minprice: "+minprice+" -maxprice: "+maxprice);
   var datas = {typesbiens:typesbiens,quartier:quartier,ville:ville,pays:pays,minprice:minprice,maxprice:maxprice};
   $.ajax({
     url:'searchProdLocate',
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