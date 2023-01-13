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

    var id = null;
    $(document).on('click', '.modifier_pub', function(){
        $('#mod_formulaire').modal('show')
        let idP = $(this).closest('div[idPub]');
        let idPub = idP.attr('idPub');
        const result = doc.find( array => array.id == idPub)
        
        $('#nom').val(result.nome);
        $('#select_pais').val(result.pays);
        $('#categorie').val(result.categorie);
        $('#description').val(result.description);
        $('#telefone').val(result.telefone);
        $('#observation').val(result.observation);
        $('#imgVisor').attr('src', result.url);
        id = idPub

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
            user:idUs,
            id
        }
            
        if(!nom || !telefone || !pays || !description){
            alert('Tous les champs son obligatoir')
        }else{

            if(id){
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: '../../plateforme/php/modificar_objets.php',
                    async: false,
                    data: form_objet,
                    success: function (response) {
                        retorno = response
                        var idOb = id;
                        salvarArquivo(idOb)
                        // window.location.reload();
                    },
                });
                return retorno;
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
                        window.location.reload();
                    },
                });
                return retorno;
            }

        }

    });

    /* ####################### SALVAR IMAGES ########################### */

    function salvarArquivo( idOb){
        var formData = new FormData();
        var files = arquivo;

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

    /* ####################### IMPRIMIR LISTAR DE DOCUMENTO ########################### */

    function buscarListaDocumentos(){
        var retorno = false;
        $.ajax({
            type: 'GET',
            dataType: 'json',
            url: `../../plateforme/php/buscar_lista_documentos.php`,
            async: false,
            data: null,
            success: function (data) {
                retorno = data
                imprimirListarDocumentos(data)
            }
        });

        return retorno;
    }
    
    var doc = buscarListaDocumentos()

    function imprimirListarDocumentos(data){
        var linhas = [];
        var img = "../../img/article.jpg";
        data.forEach( el => {

            if(el.url == "../../plateforme/php/abrir_arquivos.php?id="){
                src = img;
            }else{
                src = el.url;
            }

            var linha = `<div idPub=${el.id} id="doc" class="row g-0 shadow-3">`;
                linha +=`<div class="col-md-4 img_pub">`;
                    linha +=`<img src="${src}" alt="" class="img-fluid rounded-start imgP"/>`;
                linha +=`</div>`;

                linha +=`<div class="col-md-8">`;
                    linha +=`<div class="card-body">`;
                        linha +=`<div class="tetre_pub">`;
                            linha +=`<h5 class="fw-bold mb-0">${el.nome}</h5>`;
                            linha +=`<div class="card-text">
                                <small class="text-muted me-lg-3"> <i class="fas fa-ellipsis-h modifier_pub" title="Clique pour modifier la publication"></i></small>
                                <small class="text-muted"> <i idPub=${el.id} class="fas fa-times delete_pub" title="Clique pour suprimer la publication"></i></small>
                            </div>`;
                        linha +=`</div>`;

                        linha +=`<p class="card-text">${el.description}</p>`;

                        linha +=`<p class="card-text"><small class="text-muted">${el.observation}</small></p>`;
                        
                        linha +=`<hr>`;

                        linha +=`<p class="card-text">
                            <small class="text-muted me-lg-2"> <i class="fas fa-phone"></i> ${el.telefone}</small> <small class="text-muted me-lg-2">|</small>  
                            <small class="text-muted me-lg-2"> <i class="fas fa-calendar-check"></i> ${el.date_} </small> <small class="text-muted me-lg-3">|</small>
                            <small class="text-muted me-lg-3"> <i class="far fa-heart like_pub" title="Clique pour j'aime la publication"></i> 10</small>
                            <small class="text-muted "> <i class="far fa-comment-dots comment_pub" title="Clique pour faire et voir les commentaires"></i> 25</small>
                        </p>`;

                        linha +=`<small class="text-muted me-lg-2"> <i class="fas fa-user-edit auteur_pub" title="Publier par..."></i> ${el.user}</small>`;

                    linha +=`</div>`;
                linha +=`</div>`;
            linha +=`</div>`;
            linhas.push(linha);
        })

        $('.linhas').append(linhas);
    }

    $('#abril_form').click(function(){
        $('#mod_formulaire').modal('show')
    });

    /* SUPRIME REGISTRE DANS LE TABLEAU */

    function loadModal(title, content, callBack){
    
        const modal = $('#modal'),
        oui =  modal.find('button#oui'),
        non = modal.find('button#non');

        modal.find('.modal-header h5').text(title||'');
        modal.find('.modal-body h6').text(content||'');
        
        oui.unbind( "click" );
        non.unbind( "click" );
        oui.click(callBack);
        non.click(callBack);

        modal.modal('show');
    }

    $(document).on('click', '.delete_pub', function(){
        const $this = $(event.currentTarget);
        $('#con_delete').modal('show')
        let id = $(this).closest('i');
        let idPub = id.attr('idPub');

        loadModal("Confirmé", "Cliqué oui si vous voulez suprimé", (event)=>{
            if( $(event.currentTarget).attr('value') == 'true' ){
                $.ajax({
                    type: 'POST',
                    dataType: 'json',
                    url: `../../plateforme/php/delete_doc.php?idPub=${idPub}`,
                    async: false,
                    data: null,
                    success: function (response) {
                        // debugger;
                        $('#doc').remove();
                        setTimeout(() => {
                            location.reload();
                        }, 300);
                    },
                    complete: function(){
                        $('#modal').modal('hide');
                    }
                    
                });
            }else{
                alert('Ação cancelada, não vou excluir')
                $('#modal').modal('hide');
            }
        });
    });

});