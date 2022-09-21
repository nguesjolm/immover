@include('layouts.header')
  @include('clients.menu')
  @include('clients.soumis')
@include('layouts.footer')

<script type="text/javascript">
//préciser le type de personne
$('.typesPers2').click(function(){
    var res = $('.typesPers2').attr('stat');
    console.log(res);
    if (res==1) {
     $('.pers').val("Je suis un propriétaire immobilier");
    }
});

$('.typesPers1').click(function(){
    var res = $('.typesPers1').attr('stat');
    console.log(res);
    if (res==0) {
     $('.pers').val("Je suis un agent immobilier");
    }
});
//Enregistrer un partenaire
$('.savePart').click(function(){
  var nom = $('.nom').val();
  var phone = $('.phone').val();
  var mail = $('.mail').val();
  var ville = $('.ville').val();
  var quartier = $('.quartier').val();
  var pers = $('.pers').val();
  console.log("Nom: "+nom+" Phone: "+phone+" Mail: "+mail+" Ville: "+ville+" pers: "+pers);
  var datas = {nom:nom,phone:phone,mail:mail,ville:ville,pers:pers,quartier:quartier};
  if (nom!=''&&phone!=''&&mail!=''&&ville!=''&&quartier!=''&&pers!='')
  {
      console.log("Devenez partenaire");
      $('.infoAlert').text('');
      $.ajax({
          url:'AddPart',
          method:'get',
          dataType:'json',
          data:datas,
          beforeSend:function(){
             $('.infoAlert').text('Chargement...');
          },
          success:function(data){
            $('.infoAlert').text('');
            Swal.fire(data.msg);
            $('.nom').val("");
            $('.phone').val("");
            $('.mail').val("");
            $('.ville').val("");
            $('.quartier').val("");
          },
          error:function(){
            $('.infoAlert').text('Erreur de connection');  
          }
      });
  }else{
     $('.infoAlert').text('Veuillez remplir correctement le formulaire');
  }
});
</script>
 