
    var nama = $('.validate-input input[name="nama"]');
    var gender = $('.validate-input select[name="gender"]');
    var jenisusaha = $('.validate-input input[name="jenisusaha"]');
    var alamatusaha = $('.validate-input input[name="alamatusaha"]');
    var tahunusaha = $('.validate-input input[name="tahunusaha"]');

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
        if($(jenisusaha).val().trim() == ''){
            showValidate(jenisusaha);
            check=false;
        }
        if($(alamatusaha).val().trim() == ''){
            showValidate(alamatusaha);
            check=false;
        }
        if($(tahunusaha).val().trim() == ''){
            showValidate(tahunusaha);
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