@include('layouts.header')
  @include('clients.menu')
  @include('clients.morehome')
@include('layouts.footer')
 <!-- Filters sidebar toggle button (mobile)-->
 <button class="btn btn-primary btn-sm w-100 rounded-0 fixed-bottom d-lg-none" type="button" data-bs-toggle="offcanvas" data-bs-target="#filters-sidebar"><i class="fi-filter me-2"></i>Filtrer</button>
 <!-- Back to top button-->
 <a class="btn-scroll-top" href="#top" data-scroll><span class="btn-scroll-top-tooltip text-muted fs-sm me-2">Top</span><i class="btn-scroll-top-icon fi-chevron-up"></i></a>

 <!-- MODALE DE TRAITEMENT DES DEMANDES -->

    <!-- Extra large modal-->
    <div class="modal fade" id="modalXL" tabindex="-1" role="dialog">
      <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title">Traitement de votre demande</h4>
            <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body">

           <p class="DemandReturn"></p>

           <div class="row g-4 py-4  biensDemnd">
            
           </div>

          </div>

          <div class="modal-footer">
           <button class="btn btn-secondary btn-sm" type="button" data-bs-dismiss="modal">Fermer</button>
           <!-- <button class="btn btn-primary btn-shadow btn-sm" type="button">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>




<script type="text/javascript">
/**
 * -------------------------------
 * SOUMISSION DE DEMANDE 
 * -------------------------------
 */
//Filtre Pays by demande
$('#payDemande').change(function(){
  var paysD = $(this).children("option:selected").val();
  $('.payDemandeFilt').val(paysD);
  var datas = {pays:paysD};
  console.log('Pays: '+paysD);
  $.ajax({
    url:'villebypays',
    method:'get',
    data:datas,
    dataType:'html',
    beforeSend:function(){
      $('.villeDemadLabel').text('chargement...');
    },
    success:function(data){
      $('.villeDemadLabel').text('Ville');
      $('#villeDemande').html(data);
    },
    error:function(){
      $('.villeDemadLabel').text('Problème de connection');
    }
  });
});
//Filtre Ville by demande
$('#villeDemande').change(function(){
  var ville = $(this).children("option:selected").val();
  $('.villeDemandeFilt').val(ville);
  var datas = {villes:ville};
  console.log(ville);
  $.ajax({
    url:'quartierville',
    method:'get',
    data:datas,
    dataType:'html',
    beforeSend:function(){
      $('.quartierDemndLabel').text('Chargement...');
    },
    success:function(data){
      $('.quartierDemndLabel').text('Quartier');
      $('#quartierDemande').html(data);
    },
    error:function(){
      $('.quartierDemndLabel').text('Problème de connection');
    }
    
  });
});
//Filtre Quartier by demande
$('#quartierDemande').change(function(){
  var quartier = $(this).children("option:selected").val();
  $('.quartierDemndFilt').val(quartier);
});
//Filtre type de bien by demande
$('#typebiensDemnd').change(function(){
  var typesbiens = $(this).children('option:selected').val();
  $('.typebiensDemndFilt').val(typesbiens);
});
//Filtre type d'operation
$('#operaDemnd').change(function(){
 var opera = $(this).children('option:selected').val();
 $('.operaDemndFilt').val(opera);
});
//Save demande
$('.demandeAlerte').click(function(){
  var typesbiens = $('.typebiensDemndFilt').val();
  if (typesbiens=='') {
    Swal.fire({
     icon: 'error',
     title: 'Oops...',
     text: 'Préciser le type de biens',
     footer: '<b>Il est temps d\'ImmOver</b>'
    })
  }
  var quartier = $('.quartierDemndFilt').val();
  if (quartier=='') {
    Swal.fire({
     icon: 'error',
     title: 'Oops...',
     text: 'Préciser le quartier',
     footer: '<b>Il est temps d\'ImmOver</b>'
    })
  }
  var ville = $('.villeDemandeFilt').val();
  if (ville=='') {
    Swal.fire({
     icon: 'error',
     title: 'Oops...',
     text: 'Préciser la ville',
     footer: '<b>Il est temps d\'ImmOver</b>'
    })
  }
  var pays = $('.payDemandeFilt').val();
  if (pays=='') {
    Swal.fire({
     icon: 'error',
     title: 'Oops...',
     text: 'Préciser le pays',
     footer: '<b>Il est temps d\'ImmOver</b>'
    })
  }
  var mail = $('.mail').val();
  if (mail=='') {
    Swal.fire({
     icon: 'error',
     title: 'Oops...',
     text: 'Préciser le mail de notification',
     footer: '<b>Il est temps d\'ImmOver</b>'
    })
  }

  
  var tel = $('.tel').val();
  if (tel=='') {
    Swal.fire({
     icon: 'error',
     title: 'Oops...',
     text: 'Téléphone Obligatoire',
     footer: '<b>Il est temps d\'ImmOver</b>'
    });
  }
  
   var budget = $('.budget').val();
   var opera = $('.operaDemndFilt').val();
  
  console.log('typesbiens: '+typesbiens+' Quartier: '+quartier+' Ville: '+ville+' Pays:'+pays+' Mail: '+mail);
  if (opera!=''&&typesbiens!=''&&quartier!=''&&ville!=''&&pays!=''&&mail!=''&&tel!='')
  {
    
    $.ajax({
      url:'savealerte',
      method:'get',
      dataType:'html',
      data:{operA:opera,typeA:typesbiens,quartierA:quartier,villeA:ville,paysA:pays,mailA:mail,telA:tel,budgA:budget},
      beforeSend:function(){
       $('.demandeAlerte').text('Chargement...');
       $('.demandeAlerte').prop('disabled', true); 
      },
      success:function(data){
        /*Swal.fire(
         ''+data.msg+'',
         'Demande ImmOver',
         ''+data.alert+''
        );*/
        $('.DemandReturn').html(data);
        $('#modalXL').modal('show');
        //
        $('.demandeAlerte').prop('disabled', false);
        $('.demandeAlerte').text('Soumettre'); 
        $('.budget').val('');
        $('.mail').val('');
        $('.tel').val('');
      },
      error:function(data){
        $('.DemandReturn').html('Error');
      }
    });
  }else{
   Swal.fire({
     icon: 'error',
     title: 'Oops...',
     text: 'Remplissez correctement le formulaire',
     footer: '<b>Il est temps d\'ImmOver</b>'
   })
  }
});

/**
 * ---------------------------
 * RECHERCHE GLOBAL PAR PHRASE
 * ---------------------------
 */

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

/**
 * -------------------------------
 * RECHERCHE FILTRER PAR SELECTION
 * -------------------------------
 */

//Ville by Pays
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

//Type d'operation
$('#OperaR').change(function(){
  var opera = $(this).children('option:selected').val();
  console.log(opera);
  $('.operaFiltR').val(opera);
});

//Finder search
$('.findSearch').click(function(){
  var  opera = $('.operaFiltR').val();
   var typesbiens = $('.typebiensFilt').val();
   var quartier = $('.quartierFilt').val();
   var ville = $('.villeFilt').val();
   var pays = $('.paysFilt').val();
   var minprice = '';
   var maxprice = '';
   console.log("Types biens: "+typesbiens+" - Quartier: "+quartier+" - Ville:"+ville+" -Pays:"+pays+" -Minprice: "+minprice+" -maxprice: "+maxprice+" opera:"+opera);
   var datas = {typesbiens:typesbiens,quartier:quartier,ville:ville,pays:pays,minprice:minprice,maxprice:maxprice,opera:opera};
    if (opera==0) {
      /*Swal.fire({
       icon: 'error',
       title: 'Recherche de biens',
       text: "Préciser le type d'operation",
       footer: '<b>Il est temps d\'ImmOver</b>'
      });*/
      $('.alerFilt').text("Préciser le type d'operation");
    }else{
      $.ajax({
        url:'SearchFilt',
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
    }
  
 });


</script>