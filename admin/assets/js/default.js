$(document).ready(function(){
    new_provider();
    new_material();
    new_client();

    jQuery.validator.addMethod('validacpf', function (value, element) {
        value = jQuery.trim(value);

        value = value.replace('.', '');
        value = value.replace('.', '');
        cpf = value.replace('-', '');
        while (cpf.length < 11) cpf = "0" + cpf;
        var expReg = /^0+$|^1+$|^2+$|^3+$|^4+$|^5+$|^6+$|^7+$|^8+$|^9+$/;
        var a = [];
        var b = new Number;
        var c = 11;
        for (i = 0; i < 11; i++) {
            a[i] = cpf.charAt(i);
            if (i < 9) b += (a[i] * --c);
        }
        if ((x = b % 11) < 2) { a[9] = 0 } else { a[9] = 11 - x }
        b = 0;
        c = 11;
        for (y = 0; y < 10; y++) b += (a[y] * c--);
        if ((x = b % 11) < 2) { a[10] = 0; } else { a[10] = 11 - x; }
        if ((cpf.charAt(9) != a[9]) || (cpf.charAt(10) != a[10]) || cpf.match(expReg)) return false;
        return true;
    }, 'Informe um CPF válido!');

    $(function() {
      $('#reservation').daterangepicker({
        startDate: moment(),
        endDate: moment(),
        locale: {
          format: 'DD/MM/YYYY',
          cancelLabel: 'Cancelar',
          applyLabel: 'Aplicar'
        }
      });
    });

    $('#telefone').mask('(99) 999999999');
    $('#cpf').mask('999.999.999-99');
    $('#cep').mask('99999-999');
    $('#valorUnitario').mask('99.999.999,99', {reverse: true});

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

    $('a[data-confirm-material]').click(function(ev){
        var href = $(this).attr('href');
        if(!$('#confirm-delete').length){
            $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUIR MATERIAL<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o material selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Apagar</a></div></div></div></div>');
        }
        $('#dataComfirmOK').attr('href', href);
        $('#confirm-delete').modal({show: true});
        return false;    
    });

    $('a[data-confirm-client]').click(function(ev){
        var href = $(this).attr('href');
        if(!$('#confirm-delete').length){
            $('body').append('<div class="modal fade" id="confirm-delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header bg-danger text-white">EXCLUIR CLIENTE<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button></div><div class="modal-body">Tem certeza de que deseja excluir o cliente selecionado?</div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">Cancelar</button><a class="btn btn-danger text-white" id="dataComfirmOK">Apagar</a></div></div></div></div>');
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

function new_client(){
    $('#new-client').validate({
        rules: {
            'nomeCliente': { required: true },
            'cpfCliente': { required: true, validacpf: true },
            'telefoneCliente': { required: true },
            'emailCliente': { required: true, email: true }
        },
        messages: {
            'nomeCliente': { required: '<span style="color: #c22d43;"> Digite o nome</span>' },
            'cpfCliente': { required: '<span style="color: #c22d43;"> Digite o CPF</span>', validacpf: '<span style="color: #c22d43;"> CPF inválido</span>' },
            'telefoneCliente': { required: '<span style="color: #c22d43;"> Digite o telefone</span>' },
            'emailCliente': { required: '<span style="color: #c22d43;"> Digite o e-mail</span>', email: '<span style="color: #c22d43;"> Digite o e-mail corretamente</span>' }
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