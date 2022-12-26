$(document).ready(function(){

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

    $('#creer').click(function(){
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
                alert('modepasse diferant')
            }else{

                console.log(form);
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