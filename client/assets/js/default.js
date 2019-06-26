$(document).ready(function(){
    change_password_client();
    change_my_account();
    new_service();
    load_service_items();
    load_service_items_collection_letter();

    $('#valorUnitario').mask('99.999.999,99', {reverse: true});
    $('#valorMaterialServico').mask('99.999.999,99', {reverse: true});
    $('#valorTotal').mask('99.999.999,99', {reverse: true});

    setTimeout(function () {
        $('.msgLogin').hide();
    }, 5000);

    $('#telefone').mask('(99) 999999999');
    $('#cpf').mask('999.999.999-99');
    $('#cep').mask('99999-999');

    setTimeout(function () {
        $('.msgsPassword').hide();
    }, 5000);

    setTimeout(function () {
        $('.msgsMyAccount').hide();
    }, 5000);

    $('a[data-confirm-cancel-service]').click(function(ev){
        var href = $(this).attr('href');
        if(!$('#confirm-delete').length){
            $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">CANCELAR SERVIÇO<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja cancelar o serviço selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Não cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Cancelar</a></div></div></div></div>');
        }
        $('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
        return false;    
    });

    $('a[data-confirm-accept-service]').click(function(ev){
        var href = $(this).attr('href');
        if(!$('#confirm-accept').length){
            $('body').append('<div class="modal fade" id="confirm-accept" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">ACEITAR SERVIÇO/ORÇAMENTO<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja aceitar o serviço/orçamento selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-danger" data-dismiss="modal">Não aceitar</button><a class="btn btn-success text-white" id="dataComfirmOKAccept">Aceitar</a></div></div></div></div>');
        }
        $('#dataComfirmOKAccept').attr('href', href);
        $('#confirm-accept').modal({show: true});
        return false;    
    });
    
});

function new_service(){
    $('#new-service').validate({
        rules: {
            'idCliente': { required: true },
            'tipoServico': { required: true },
            'dataServico': { required: true },
            'statusServico': { required: true },
            'cepServico': { required: true },
            'estadoServico': { required: true },
            'cidadeServico': { required: true },
            'bairroServico': { required: true },
            'ruaServico': { required: true },
            'numeroServico': { required: true },
            'metroQuadradoServico': { required: true },
            'valorMaoDeObraServico': { required: true },
            'tagsinput': { required: true }
        },
        messages: {
            'idCliente': { required: '<span style="color: #c22d43;"> Selecione o cliente</span>' },
            'tipoServico': { required: '<span style="color: #c22d43;"> Selecione o tipo de serviço</span>' },
            'dataServico': { required: '<span style="color: #c22d43;"> Selecione a data</span>' },
            'statusServico': { required: '<span style="color: #c22d43;"> Selecione o status do serviço</span>' },
            'cepServico': { required: '<span style="color: #c22d43;"> Digite o CEP</span>' },
            'estadoServico': { required: '<span style="color: #c22d43;"> Digite o estado</span>' },
            'cidadeServico': { required: '<span style="color: #c22d43;"> Digite a cidade</span>' },
            'bairroServico': { required: '<span style="color: #c22d43;"> Digite o bairro</span>' },
            'ruaServico': { required: '<span style="color: #c22d43;"> Digite a rua</span>' },
            'numeroServico': { required: '<span style="color: #c22d43;"> Digite o número</span>' },
            'metroQuadradoServico': { required: '<span style="color: #c22d43;"> Digite a quantidade total de metros quadrados</span>' },
            'valorMaoDeObraServico': { required: '<span style="color: #c22d43;"> Digite o valor da mão de obra</span>' },
            'tagsinput': { required: '<span style="color: #c22d43;"> Digite no mínimo 1 item</span>' },
        },
        submitHandler: function (form) {
            var options = {
                beforeSubmit: showRequest,
                success: showResponse,
                resetForm: true
            };
            $(form).ajaxSubmit(options);
            return false;
        },
        errorLabelContainer: $('#msgs-new-provider')
    });
    function showRequest(formData, jqForm, options) {
        $('#msgs-new-provider').html('<span style="color: #01a620;">Enviado...</span>');
        $('#msgs-new-provider').show();
    }
    function showResponse(data, jqForm) {
        switch ($.trim(data)) {
            case 'true':
                $('#msgs-new-provider').html('<span style="color: #01a620;">Enviado com sucesso! Verifique seu e-mail!</span>');
                $('#msgs-new-provider').show();
                break;
            case 'false':
                $('#msgs-new-provider').html('<span style="color: #c22d43;">Ocorreu um erro inesperado</span>');
                $('#msgs-new-provider').show();
                break;
        }
        setTimeout(function () {
            $('#msgs-new-provider').html('');
        }, 5000);
    }
}

function change_password_client(){
    $('#change-password-client').validate({
        rules: {
            'senha_atual': { required: true },
            'nova_senha': { required: true },
            'confirmar_nova_senha': { required: true },
        },
        messages: {
            'senha_atual': { required: '<span style="color: #c22d43;"> Digite sua senha atual</span>' },
            'nova_senha': { required: '<span style="color: #c22d43;"> Digite sua nova senha</span>' },
            'confirmar_nova_senha': { required: '<span style="color: #c22d43;"> Confirme sua nova senha</span>' },
        },
        submitHandler: function (form) {
            var options = {
                beforeSubmit: showRequest,
                success: showResponse,
                resetForm: true
            };
            $(form).ajaxSubmit(options);
            return false;
        },
        errorLabelContainer: $('#msgs-change-password')
    });
    function showRequest(formData, jqForm, options) {
        $('#msgs-change-password').html('<span style="color: #01a620;">Enviado...</span>');
        $('#msgs-change-password').show();
    }
    function showResponse(data, jqForm) {
        switch ($.trim(data)) {
            case 'true':
                $('#msgs-change-password').html('<span style="color: #01a620;">Enviado com sucesso! Verifique seu e-mail!</span>');
                $('#msgs-change-password').show();
                break;
            case 'false':
                $('#msgs-change-password').html('<span style="color: #c22d43;">Ocorreu um erro inesperado</span>');
                $('#msgs-change-password').show();
                break;
        }
        setTimeout(function () {
            $('#msgs-change-password').html('');
        }, 5000);
    }
}

function change_my_account(){
    $('#my-account-client').validate({
        rules: {
            'nome': { required: true },
            'cpf': { required: true },
            'telefone': { required: true },
            'email': { required: true, email: true },
            'cep': { required: true, minlength: 9 },
            'estado': { required: true },
            'cidade': { required: true },
            'bairro': { required: true },
            'rua': { required: true },
            'numero': { required: true },
        },
        messages: {
            'nome': { required: '<span style="color: #c22d43;"> Digite seu nome</span>' },
            'cpf': { required: '<span style="color: #c22d43;"> Digite seu CPF</span>' },
            'telefone': { required: '<span style="color: #c22d43;"> Digite seu telefone</span>' },
            'email': { required: '<span style="color: #c22d43;"> Digite seu e-mail</span>', email: '<span style="color: #c22d43;"> E-mail inválido</span>' },
            'cep': { required: '<span style="color: #c22d43;"> Digite seu CEP</span>', minlength: '<span style="color: #c22d43;"> Digite seu CEP completo</span>' },
            'estado': { required: '<span style="color: #c22d43;"> Digite seu estado</span>' },
            'cidade': { required: '<span style="color: #c22d43;"> Digite sua cidade</span>' },
            'bairro': { required: '<span style="color: #c22d43;"> Digite seu bairro</span>' },
            'rua': { required: '<span style="color: #c22d43;"> Digite sua rua</span>' },
            'numero': { required: '<span style="color: #c22d43;"> Digite o numero de sua residência (Obs: caso não possuir número, digite: S/N)</span>' },
        },
        submitHandler: function (form) {
            var options = {
                beforeSubmit: showRequest,
                success: showResponse,
                resetForm: true
            };
            $(form).ajaxSubmit(options);
            return false;
        },
        errorLabelContainer: $('#msgs-my-account')
    });
    function showRequest(formData, jqForm, options) {
        $('#msgs-my-account').html('<span style="color: #01a620;">Enviado...</span>');
        $('#msgs-my-account').show();
    }
    function showResponse(data, jqForm) {
        switch ($.trim(data)) {
            case 'true':
                $('#msgs-my-account').html('<span style="color: #01a620;">Enviado com sucesso! Verifique seu e-mail!</span>');
                $('#msgs-my-account').show();
                break;
            case 'false':
                $('#msgs-my-account').html('<span style="color: #c22d43;">Ocorreu um erro inesperado</span>');
                $('#msgs-my-account').show();
                break;
        }
        setTimeout(function () {
            $('#msgs-my-account').html('');
        }, 5000);
    }
}

var getParams = function () {
    var params = {};
    var parser = document.createElement('a');
    parser.href = window.location.href;
    var query = parser.search.substring(1);
    var vars = query.split('&');
    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split('=');
        params[pair[0]] = decodeURIComponent(pair[1]);
    }
    return params;
};

function load_service_items() {
    var path = window.location.pathname;
    path = path.split("/");
    path = path[3];
    var pages = ["viewService.php"];

    if($.inArray(path, pages) != -1) {
        var params = getParams();

        $.ajax({
            url: "/construsonhos/client/loadServicesItems.php",
            type: "POST",
            dataType: "json",
            data: ({
                service_id: params["idServico"]
            }),
            success: function(data) {
                $.each(data, function(i, item) {
                    $("#tagsinput").addTag(item.descr);
                });
            }
        })
    }
}




function load_service_items_collection_letter() {
    var path = window.location.pathname;
    path = path.split("/");
    path = path[3];
    var pages = ["newCollectionLetter.php"];

    if($.inArray(path, pages) != -1) {
        var params = getParams();

        $.ajax({
            url: "/construsonhos/client/loadServicesItems.php",
            type: "POST",
            dataType: "json",
            data: ({
                service_id: params["idServico"]
            }),
            success: function(data) {
                $.each(data, function(i, item) {
                    $("#li-itens-servicos").addTag(item.descr);
                });
            }
        })
    }
}