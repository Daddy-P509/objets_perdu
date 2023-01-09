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

    var idUs = $('#idUs').val()

    $('#imgVisor').attr('src', '../../img/article.jpg');
    var extensionesValidas = ".png, .gif, .jpeg, .jpg";
    var pesoPermitido = 1024;

    // Quand #fichier change
    $("#fichero").change(function () {
        $('#alertMessage').text('');
        $('#imgVisor').attr('src', '');

        if (validarExtension(this)) {
            if (validarPeso(this)) {
                verImagen(this);
            }
        }
    });

    // Validation des extensions autorisées
    function validarExtension(datos) {
        var ruta = datos.value;
        var extension = ruta.substring(ruta.lastIndexOf('.') + 1).toLowerCase();
        var extensionValida = extensionesValidas.indexOf(extension);

        if (extensionValida < 0) {
            // $('#alertMessage').text("L'extension n'est pas valide Votre fichier porte l'extension: ." + extension + ", notre systheme n'accepte que l'extension: " + extensionesValidas);
            $('#alertMessage').html(`L'extension n'est pas valide Votre fichier porte l'extension: <b>. ${extension} </b> , notre systheme n'accepte que l'extension: <b> ${extensionesValidas} </b>`);
            return false;
        } else {
            return true;
        }
    }

    // Validation du poids des fichiers dans kbs
    function validarPeso(datos) {

        if (datos.files && datos.files[0]) {
            var pesoFichero = datos.files[0].size / 1024;
            if (pesoFichero > pesoPermitido) {
                $('#alertMessage').html('El peso maximo permitido del fichero es: ' + pesoPermitido + ' KBs Su fichero tiene: ' + pesoFichero + ' KBs');
                return false;
            } else {
                return true;
            }
        }
    }

    // Aperçu de l'image.
    var arquivo = '';
    function verImagen(datos) {
        console.log(datos)
        if (datos.files && datos.files[0]) {

            var reader = new FileReader();
            reader.onload = function (e) {
                $('#imgVisor').attr('src', e.target.result);
            };

            reader.readAsDataURL(datos.files[0]);
            arquivo = datos.files[0];

        }
    }

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

    $('#recupere').change(function(){
        if($(this).is(':checked')){
            $('#recupere').val('1');
        } else {
            $('#recupere').val('0');
        }
    });

    $('#publier').click(function(){
        var retorno = false;
        var nom = $('#nom').val();
        var pays = $('#select_pais').val();
        var categorie = $('#categorie').val();
        var description = $('#description').val();
        var telefone = $('#telefone').val();
        var observation = $('#observation').val();
        var recupere = $('#recupere').val();

        var form_objet = {
            nom,
            pays,
            categorie,
            description,
            telefone,
            observation,
            recupere,
            user:idUs
        }
            
        if(!nom || !telefone || !pays || !description){
            alert('Tous les champs son obligatoir')
        }else{

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: '../../plateforme/php/publier_objet.php',
                async: false,
                data: form_objet,
                success: function (response) {
                    retorno = response
                    var idOb = `${response.lastId}`;
                    salvarArquivo(idOb)
                },
            });
        return retorno;
        }

    });

    /* ####################### SALVAR IMAGES ########################### */

    function salvarArquivo( idOb){
        var formData = new FormData();
        var files = arquivo;

        console.log( idOb);
 
        formData.append('file', files);

        $.ajax({
            type: 'POST',
            url: `../../plateforme/php/salvar_image.php?idOb=${idOb}`,
            data: formData,
            processData: false,
            contentType: false,
            success: function (response) {
                console.log(response)
            }, error: e => {
                console.log(e)
            }
        });
    }

});