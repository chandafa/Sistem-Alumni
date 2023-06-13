
    var nama = $('.validate-input input[name="nama"]');
    var gender = $('.validate-input select[name="gender"]');
    var namauniver = $('.validate-input input[name="namauniver"]');
    var jurusan = $('.validate-input input[name="jurusan"]');
    var namaperusahaan = $('.validate-input input[name="namaperusahaan"]');
    var jabatan = $('.validate-input input[name="jabatan"]');
    var tahun = $('.validate-input input[name="tahun"]');


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
        if($(namaperusahaan).val().trim() == ''){
            showValidate(namaperusahaan);
            check=false;
        }
        if($(jabatan).val().trim() == ''){
            showValidate(jabatan);
            check=false;
        }
        if($(tahun).val().trim() == ''){
            showValidate(tahun);
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