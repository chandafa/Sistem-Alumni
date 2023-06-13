
    var nama = $('.validate-input input[name="nama"]');
    var gender = $('.validate-input select[name="gender"]');
    var namauniver = $('.validate-input input[name="namauniver"]');
    var jurusan = $('.validate-input input[name="jurusan"]');


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
        if($(namauniver).val().trim() == ''){
            showValidate(namauniver);
            check=false;
        }
        if($(jurusan).val().trim() == ''){
            showValidate(jurusan);
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