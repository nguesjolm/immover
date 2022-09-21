@include('layouts.header')
  @include('clients.menu')
  @include('clients.single')
@include('layouts.footer')

<script type='text/javascript'>
  $(function(){
    //Rechargement automatique
    $('.imagesBiens').click(function(){
      window.location.reload();
    });
    //Cacher code marchand
    $('.codemarchd').hide();
    //Cacher code agent
    $('.codeagent').hide();
    //Cacher coupon
    $('.couponImv').hide();
    //Confirmation moi même
    $('.my').click(function(){
       console.log("Confirmer moi même");
       $('.codemarchd').hide();
       $('.codeagent').hide();
       $('.couponImv').hide();
    });
    //Confirmation marchand
    $('.yours').click(function(){
       console.log("Compte marchand");
       $('.codemarchd').show();
       $('.codeagent').hide();
       $('.couponImv').hide();
    });
    //Confirmation Agent LogRapid
    $('.agent').click(function(){
      console.log("Compte Agent LogRapid");
      $('.codemarchd').hide();
      $('.codeagent').show();
      $('.couponImv').hide();
    });
    //Coupons immover
    $('.coupon').click(function(){
      console.log("Coupon Immover");
      $('.codemarchd').hide();
      $('.codeagent').hide();
      $('.couponImv').show();
    });

    //Prenez un rdv
    $('.alertVisite').hide();
    $('.takerdv').click(function(){
       var codebiens = $('#codebiens').val();
       var codemarchd = $('.codemarchd').val();
       var codeagent = $('.codeagent').val();
       var coupon = $('.couponImv').val();
       var phone = $('#phoneRdv').val();
       var mail = $('#mailRdv').val();
       var nom = $('#nomRdv').val();
       var data = {nomV:nom,phoneV:phone,mailV:mail,codemarchdV:codemarchd,codeagentV:codeagent,codebiensV:codebiens,couponImov:coupon};
       console.log(data);
       //Envoie Ajax
       $.ajax({
         url:'saveRdv',
         method:'get',
         dataType:'json',
         data:data,
         beforeSend:function(){
           $('.takerdv').text('Chargement...');
           $('.takerdv').prop('disabled', true); 
         },
         success:function(data){
           $('.takerdv').text('Valider');
           $('.takerdv').prop('disabled', false);
           console.log(data);
           if (data.info=='0') {
             $('.infos').text(data.msg);
             //Swal.fire(data.msg); 
             //window.location.href='visitesNew';
           }else{
             Swal.fire(data.msg); 
             //window.location.href=data.msg;
             window.location.href='visitesNew';
           }
         },
         error:function(data){
           console.log("Error");
         }
       });
              
    });
  });
</script>


