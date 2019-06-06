$(document).ready(function(){
    new_provider();
    new_material();

    $('#telefone').mask('(99) 999999999');
    $('#cpf').mask('999.999.999-99');
    $('#cep').mask('99999-999');
    $('#valorUnitario').mask('000.000.000.000.000,00', {reverse: true});

    setTimeout(function () {
        $('#msgs-edit-provider').hide();
    }, 5000);

    setTimeout(function () {
        $('.msgsNewProvider').hide();
    }, 5000);

    $('a[data-confirm-provider]').click(function(ev){
        var href = $(this).attr('href');
        if(!$('#confirm-delete').length){
            $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUIR FORNECEDOR<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o fornecedor selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Apagar</a></div></div></div></div>');
        }
        $('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
        return false;    
    });
    
});

function new_provider(){
    $('#new-provider').validate({
        rules: {
            'nome': { required: true },
            'telefone': { required: true },
            'email': { required: true, email: true },
            'cep': { required: true },
            'estado': { required: true },
            'cidade': { required: true },
            'bairro': { required: true },
            'rua': { required: true },
            'numero': { required: true },
        },
        messages: {
            'nome': { required: '<span style="color: #c22d43;"> Digite o nome</span>' },
            'telefone': { required: '<span style="color: #c22d43;"> Digite o telefone</span>' },
            'email': { required: '<span style="color: #c22d43;"> Digite o e-mail</span>', email: '<span style="color: #c22d43;"> E-mail inválido</span>' },
            'cep': { required: '<span style="color: #c22d43;"> Digite o cep</span>' },
            'estado': { required: '<span style="color: #c22d43;"> Digite o estado</span>' },
            'cidade': { required: '<span style="color: #c22d43;"> Digite a cidade</span>' },
            'bairro': { required: '<span style="color: #c22d43;"> Digite o bairro</span>' },
            'rua': { required: '<span style="color: #c22d43;"> Digite a rua</span>' },
            'numero': { required: '<span style="color: #c22d43;"> Digite o número</span>' }
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

function new_material(){
    $('#new-material').validate({
        rules: {
            'nomeMaterial': { required: true },
            'marcaMaterial': { required: true },
            'idFornecedor': { required: true },
            'valorUnitarioMaterial': { required: true }
        },
        messages: {
            'nomeMaterial': { required: '<span style="color: #c22d43;"> Digite o nome</span>' },
            'marcaMaterial': { required: '<span style="color: #c22d43;"> Digite a marca</span>' },
            'idFornecedor': { required: '<span style="color: #c22d43;"> Selecione o fornecedor</span>' },
            'valorUnitarioMaterial': { required: '<span style="color: #c22d43;"> Digite o valor unitário</span>' }
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