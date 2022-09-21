<?php updBienStat(); ?>
@include('layouts.header')
  @include('clients.menu')
  @include('clients.home')
@include('layouts.footer')

<script type="text/javascript">
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

//Operation type
$('#property-city').change(function(){
  var opera = $(this).children('option:selected').val();
  console.log('opera: '+opera);
  $('.operaFilt').val(opera);
});

//Calculate
$('.calculate').click(function(){
  var opera = $('.operaFilt').val();
  var typesbiens = $('.typebiensFilt').val();
  var quartier = $('.quartierFilt').val();
  var ville = $('.villeFilt').val();
  var pays = $('.paysFilt').val();
  var whatsap = $('.whatsap').val();
  var mail = $('.email').val();
  var descrp = $('.descrp').val();
  console.log('whatsap:'+whatsap+' mail:'+mail+'descrp: '+descrp+'Opera: '+opera+' Types biens: '+typesbiens+' Quartier: '+quartier+' ville: '+ville+' Pays: '+pays);
  var datas = {opera:opera,typesbiens:typesbiens,quartier:quartier,ville:ville,pays:pays,whatsap:whatsap,mail:mail,descrp:descrp};
  $.ajax({
     url:'calculate',
     method:'get',
     data:datas,
     dataType:'json',
     beforeSend:function(){
       $('.result').hide();
       $('.calculate').text('Chargement...');
       $('.calculate').prop('disabled', true); 
     },
     success:function(data){
      if (data.info=='0') {
        $('.result').show();
        $('.result').html('<div class="alert alert-primary" role="alert">'+data.msg+'</div>');
        $('.calculate').text('SOUMETTRE');
        $('.calculate').prop('disabled', false); 
      }
      if (data.info=='1') {
        $('.operaFilt').val('');
        $('.typebiensFilt').val('');
        $('.quartierFilt').val('');
        $('.villeFilt').val('');
        $('.paysFilt').val('');
        $('.whatsap').val('');
        $('.email').val('');
        $('.descrp').val('');
        Swal.fire('Guichet de Paiement en cours...');
        window.location.href=data.msg;
      }
      //Swal.fire('Guichet de Paiement en cours...'); 
      //window.location.href=data.msg;
       /*
       $('.result').show();
       $('.result').html('<div class="alert alert-primary" role="alert">'+data.msg+'</div>');
       
       $('.calculate').text('SOUMETTRE');
       $('.calculate').prop('disabled', false); 
      */
     },
     error:function(){
       $('.result').html("<p>Problème de connection</p>");
     }

  });
});

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

</script>

