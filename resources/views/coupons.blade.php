@include('layouts.header')
  @include('clients.menu')
  @include('count.coupons')
@include('layouts.footer')

<script type="text/javascript">

 //Create new coupons
 $('.newcoupons').click(function(){
    var codevisite = $('.codevisite').val();
    var datas = {code:codevisite}
    console.log('code: '+codevisite);
    if (codevisite!='') {
       $.ajax({
        url:'savecoupon',
        method:'get',
        datatype:'json',
        data:datas,
        beforeSend:function(){
         console.log('before');
         $('.newcoupons').text('Chargement...');
         $('.newcoupons').prop('disabled', true); 
        },
        success:function(data){
            if (data.res=='1') {
                Swal.fire(
                    'Coupons Immover',
                    ''+data.msg+'',
                    ''+data.alert+''
                ) ;
                //Redirection
                $('.codevisite').val('');
                window.location.href='coupons';
            }else{
                Swal.fire(
                    'Coupons Immover',
                    "Ce code de visite n'existe pas",
                    'error'
                ) 
            }
            $('.newcoupons').text('Générer');
            $('.newcoupons').prop('disabled', false); 
        },
        error:function(data){
            console.log('error');
        }
       });
    } else {
     Swal.fire(
      'Coupons Immover',
      'Veuillez saisir le code de visite',
      'error'
     ) 
    }
 });

</script>