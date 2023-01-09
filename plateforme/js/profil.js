$(document).ready(function(){

    var myVar = setInterval(myTimer, 1000);
    function myTimer(){
        var d = new Date();
        var x = d.toLocaleTimeString();
        $('.heur').html(x);
        var o = $('.heur').text();
        if(o === '14:19:00'){
            //alert('bonjour ceci est une alert pour vous avertir ...');
        }
    }
    
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

    $("#sel_pais").append(op);
    
    // $('#sel_pais').val('Brazil');
    // ################### USUERS BY ID ##################### //

    function buscarUserPorId() {
        var retorno = false;
        var id = $('#idUs').val();
        
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: `../plateforme/php/buscar_usuario_por_id.php?id=${id}`,
            async: false,
            data: null,
            success: function (response) {
                retorno = response
                $('#nom').val(response.nome);
                $('select#sel_pais').val(response.pays)
                $('#adresse').val(response.adresse);
                $('#telefone').val(response.telefone);
                $('#email').val(response.email);
                $('#numero').val(response.numero);
            },
        });
        return retorno;
    }

    buscarUserPorId();

    $('#update_profil').click(function(){
        var retorno = false;
        var profil = {
            nome: $('#nom').val(),
            email: $('#email').val(),
            telefone: $('#telefone').val(),
            pays: $('#sel_pais').val(),
            adresse: $('#adresse').val(),
            numero: $('#numero').val(),
            id: $('#idUs').val()
        }

        $.ajax({
            type: 'POST',
            dataType: 'json',
            url: `../plateforme/php/modificar_profil_usuario.php`,
            async: false,
            data: profil,
            success: function (response) {
                retorno = response
            },
        });
        return retorno;
    });

    function buscarAllUsers() {
        var retorno = false;
        
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: `../plateforme/php/buscar_usuari.php`,
            async: false,
            data: null,
            success: function (response) {
                retorno = response
            },
        });
        return retorno;
    }

    var allUsers = buscarAllUsers();

    var users = '';
    for (var i = 0; i < allUsers.length; i++) {
        users += '<option value="' + allUsers[i].id + '">' + allUsers[i].nome + '</option>'
    }

    $("#sel_users").append(users);

    $('#update_password').click(function(){

        var users = $('#sel_users').val()
        var retorno = false;

        var objPass = {
            modepass: $('#altr_password').val(),
            users
        }

        if(!users){
            alert('Obligatoire')
        }else{
            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: `../plateforme/php/resetar_senha.php`,
                async: false,
                data: objPass,
                success: function (response) {
                    retorno = response
                    window.location.reload();
                },
            });
            return retorno;
        }
    });

    $('#limparMod').click(function(){
        $('#sel_users').val('');
        $('#altr_password').val('');
    });

});