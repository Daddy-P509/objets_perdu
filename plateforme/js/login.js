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

    $("#modepasse").keyup(function(){
        var modepasse = $('#modepasse').val();
        var valid = modepasse.length;

        if(!valid){
            $('#modepasse').css("border", "solid 1px #CACBCA");  
        }else if(valid <= 3){
            $('#modepasse').css("border", "solid 1.4px #BF0000");  
        }else if(valid <= 6){
            $('#modepasse').css("border", "solid 1.4px #D5A71B");
        }else if(valid <= 8){
            $('#modepasse').css("border", "solid 1.4px #003AD4");
        }else{
            $('#modepasse').css("border", "solid 1.4px #019C1B");
            
        }
    });
    
    $("#rep_modepasse").keyup(function(){
        var repModepasse = $('#rep_modepasse').val();
        var repValid = repModepasse.length;
        
        if(!repValid){
            $('#rep_modepasse').css("border", "solid 1px #CACBCA");  
        }else if(repValid <= 3){
            $('#rep_modepasse').css("border", "solid 1.4px #BF0000");  
        }else if(repValid <= 6){
            $('#rep_modepasse').css("border", "solid 1.4px #D5A71B ");
        }else if(repValid <= 8){
            $('#rep_modepasse').css("border", "solid 1.4px #003AD4");
        }else{
            $('#rep_modepasse').css("border", "solid 1.4px #019C1B");
            
        }
        
    });

    $(".oeuil1").on('click',function() {
        var $pwd = $("#modepasse");
        if ($pwd.attr('type') === 'password') {
            $pwd.attr('type', 'text');
        } else {
            $pwd.attr('type', 'password');
        }
    });
    
    $(".oeuil").on('click',function() {
        var $pwd = $("#rep_modepasse");
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
        var form = {
            nome,
            email,
            telefone,
            pays,
            adresse,
            numero,
            modepasse
        }

        if(!nome || !email || !telefone || !pays || !adresse || !numero || !modepasse || !repModepasse){
            alert('Tous les champs son obligatoir')
        }else{
            if(modepasse != repModepasse){
                $('#rep_modepasse').css("border", "solid 1px red");
                alert('modepasse diferant')
            }else{
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: './plateforme/php/creer_compt.php',
                    async: false,
                    data: form,
                    success: function (response) {
                        retorno = response
                    },
                });
                return retorno;
            }
        }

    });

});