
    var nama = $('.validate-input input[name="nama"]');
    var gender = $('.validate-input select[name="gender"]');
    var alamat = $('.validate-input input[name="alamat"]');
    var alasan = $('.validate-input textarea[name="alasan"]');
    var kontak = $('.validate-input input[name="kontak"]');


    $('.validate-form').on('submit',function(){
        var check = true;

        if($(nama).val().trim() == ''){
            showValidate(nama);
            check=false;
        }
        if($(gender).val().trim() == ''){
            showValidate(gender);
            check=false;
        }
        if($(alamat).val().trim() == ''){
            showValidate(alamat);
            check=false;
        }
        if($(alasan).val().trim() == ''){
            showValidate(alasan);
            check=false;
        }
        if($(kontak).val().trim() == ''){
            showValidate(kontak);
            check=false;
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
       });
    });

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }