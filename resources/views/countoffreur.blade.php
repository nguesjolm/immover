@include('layouts.header')
  @include('clients.menu')
  @include('clients.countoffreur')
@include('layouts.footer')

<script type="text/javascript">
//Chargement function
function charge(msg)
{
  let timerInterval
  Swal.fire({
   title: ''+msg+'',
   html: '...',
   timer: 3000,
   timerProgressBar: true,
   didOpen: () => {
    Swal.showLoading()
    const b = Swal.getHtmlContainer().querySelector('b')
    timerInterval = setInterval(() => {
      b.textContent = Swal.getTimerLeft()
    }, 100)
  },
  willClose: () => {
    clearInterval(timerInterval)
  }
  }).then((result) => {
   /* Read more about handling dismissals below */
   if (result.dismiss === Swal.DismissReason.timer) {
    console.log('I was closed by the timer')
   }
  })
}
//Create count offreur
$('.create').click(function(event){
  //check profil
  var profil = $('input[name="profil"]:checked').val();
  $('.profilId').val(profil);
  if ($('.profilId').val()=='') {
    Swal.fire('Préciser votre profil ImmOver');
  }else{
   event.preventDefault();
   var formData = new FormData(document.getElementById('offreForm'));
   console.log(formData);
   $.ajax({
     url:'saveprofil',
     method:'post',
     data:formData,
     dataType:'json',
     cache:false,
     processData:false,
     contentType:false,
     processData:false,
     contentType:false,
     beforeSend:function(){
       $('.alertT').text('Chargement...');
       $('.create').prop('disabled', true); 
     },
     success:function(data){
       Swal.fire(data.msg);
       //charge(data.msg);
       $('.create').prop('disabled', false);
       $('.alertT').text('Valider');
       /*if (data.count==1) {
         window.location.href='countgerant';
       }*/
     },
     error:function(){
      Swal.fire('Problème de connection');
     }
   });
  }

});
//Hide Agreement 
$('.agrement').hide(); 

$('.demarcheur').click(function(){
  $('.agrement').hide(); 
});

$('.proprietaire').click(function(){
  $('.agrement').hide(); 
});

$('.agent-immobilier').click(function(){
  $('.agrement').hide(); 
});

$('.agence').click(function(){
  $('.agrement').hide(); 
});

$('.agence-agree').click(function(){
  $('.agrement').hide(); 
});

//Show Agreement
$('.agence-agree').click(function(){
  $('.agrement').show(); 
});


//Hide Identity process
$('.Ncni').hide();
$('.Nimpot').hide();
//Show Identity process
$('#physique').click(function(){
  $('.Ncni').show();
  $('.Nimpot').hide();
});
$('#morale').click(function(){
  $('.Nimpot').show();
  $('.Ncni').hide();
});

//Hide All steps
$('.infos').hide();
$('.profil').hide();
//Show step 2
$('.step2').click(function(){
    var identity = $('input[name="identity"]:checked').val();
    console.log(identity);
    $('.checkId').val(identity);
    if ($('.checkId').val()=='') {
      Swal.fire('Préciser votre identité');
    }else{
     $('.identity').hide();
     $('.profil').hide();
     $('.infos').show();
    }
});
//Show step 1
$('.step1').click(function(){
    $('.identity').show();
    $('.profil').hide();
    $('.infos').hide();
});
//Show step 3
$('.step3').click(function(){
    $('.identity').hide();
    //Check Infos
    var mail = $('.mail').val();
    var nom = $('.nom').val();
    var tel = $('#tel').val();
    console.log('mail:'+mail+' nom:'+nom+' tel:'+tel);
    if (mail!=''&&nom!=''&&tel!='') {
      $('.infos').hide();
      $('.profil').show();
    }else{
      //$('.infos').show();
      Swal.fire('Veuillez fournir vos infos');
    }
});

</script>
