$(document).ready(function () {

    // ################### API PAYS ##################### //

    function buscarAllPais() {
        var retorno = false;

        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: 'https://servicodados.ibge.gov.br/api/v1/localidades/paises?lang=EN',
            async: false,
            data: null,
            success: function (response) {
                retorno = response
            },
        });
        return retorno;
    }

    var allPais = buscarAllPais();

    var op = '';
    for (var i = 0; i < allPais.length; i++) {
        op += '<option value="' + allPais[i].nome + '">' + allPais[i].nome + '</option>'
    }

    $("#select_pais").append(op);

    // ########################################### //

    const signUpButton = document.getElementById('Inscrever');
    const signInButton = document.getElementById('signIn');
    const container = document.getElementById('container');

    signUpButton.addEventListener('click', () => {
        container.classList.add("right-panel-active");
    });

    signInButton.addEventListener('click', () => {
        container.classList.remove("right-panel-active");
    });

    $("#cpf_cnpj").keydown(function(){
        try {
            $("#cpf_cnpj").unmask();
        } catch (e) {}
    
        var tamanho = $("#cpf_cnpj").val().length;
    
        if(tamanho < 11){
            $("#cpf_cnpj").mask("999.999.999-99");
        } else {
            $("#cpf_cnpj").mask("99.999.999/9999-99");
        }
    
        var elem = this;
        setTimeout(function(){
            elem.selectionStart = elem.selectionEnd = 10000;
        }, 0);
        
        var currentValue = $(this).val();
        $(this).val('');
        $(this).val(currentValue);
    });

    $("#cpfCnpj").keydown(function(){
        try {
            $("#cpfCnpj").unmask();
        } catch (e) {}
    
        var tamanho2 = $("#cpfCnpj").val().length;
    
        if(tamanho2 < 11){
            $("#cpfCnpj").mask("999.999.999-99");
        } else {
            $("#cpfCnpj").mask("99.999.999/9999-99");
        }
    
        var elem = this;
        setTimeout(function(){
            elem.selectionStart = elem.selectionEnd = 10000;
        }, 0);
        
        var currentValue = $(this).val();
        $(this).val('');
        $(this).val(currentValue);
    });

    $("#senha").keyup(function(){
        var modepasse = $('#senha').val();
        var valid = modepasse.length;
        console.log(modepasse)
        if(!valid){
            $('#senha').css("border", "solid 1px #CACBCA");  
        }else if(valid <= 3){
            $('#senha').css("border", "solid 1.4px #BF0000");  
        }else if(valid <= 6){
            $('#senha').css("border", "solid 1.4px #D5A71B");
        }else if(valid <= 8){
            $('#senha').css("border", "solid 1.4px #003AD4");
        }else{
            $('#senha').css("border", "solid 1.4px #019C1B");
            
        }
    });
    
    $("#repet_senha").keyup(function(){
        var repModepasse = $('#repet_senha').val();
        var repValid = repModepasse.length;
        
        if(!repValid){
            $('#repet_senha').css("border", "solid 1px #CACBCA");  
        }else if(repValid <= 3){
            $('#repet_senha').css("border", "solid 1.4px #BF0000");  
        }else if(repValid <= 6){
            $('#repet_senha').css("border", "solid 1.4px #D5A71B ");
        }else if(repValid <= 8){
            $('#repet_senha').css("border", "solid 1.4px #003AD4");
        }else{
            $('#repet_senha').css("border", "solid 1.4px #019C1B");
            
        }
        
    });

    $(".oeuil1").on('click',function() {
        var $pwd = $("#senha");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
    });
    
    $(".oeuil").on('click',function() {
        var $pwd = $("#repet_senha");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
    });

    $('#inscrever').click(function(){
        var retorno = false;
        var nome = $('#nome').val();
        var email = $('#e_mail').val();
        var telefone = $('#telefone').val();
        var pays = $('#select_pais').val();
        var adresse = $('#adresse').val();
        var numero = $('#numero').val();
        var modepasse = $('#modepasse').val();
        var repModepasse = $('#rep_modepasse').val();

        if(!nome || !email || !telefone || !pays || !adresse || !numero || modepasse || repModepasse){

            alert('Todos os campos estão obligatorio');

        }else if(repet_senha != senha){
    
            $('#repet_senha').css("border", "solid 1px red");
            alert('Senha estão diferente')

        }else{
    
            var form = {
                nome,
                email,
                telefone,
                pays,
                adresse,
                numero,
                modepasse
            }
    
            // $.ajax({
            //     type: 'POST',
            //     dataType: 'json',
            //     url: 'php/registra_usuario.php',
            //     async: false,
            //     data: registro,
            //     success: function (response) {
            //         setTimeout(function () {
            //             window.location.reload();
            //         }, 1000);
                    
            //     },
            // });

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: './plateforme/php/creer_compt.php',
                async: false,
                data: form,
                success: function (response) {
                    setTimeout(function () {
                        window.location.reload();
                    }, 1000);
                },
            });
        }

    });

});