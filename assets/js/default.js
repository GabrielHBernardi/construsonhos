$(document).ready(function(){

    validate_form_register_new_user();
    validate_form_login_user();
    validate_form_password_user();
    validate_form_login_admin();

    $('#telefone').mask('(99) 999999999');
    $('#cpf').mask('999.999.999-99');

    jQuery.validator.addMethod('confirm_password', function () {
        var password = $("#senha").val();
        var confirmPassword = $("#confirmar_senha").val();
        if (password != confirmPassword) {
           // $('#msgs-register').html('<span style="color: #c22d43;">As senhas não são iguais</span>');
            return false;
        }
        return true;
    });


    jQuery.validator.addMethod('celular', function (value, element) {
        value = value.replace("(","");
        value = value.replace(")", "");
        value = value.replace("-", "");
        value = value.replace(" ", "").trim();
        if (value == '0000000000') {
            return (this.optional(element) || false);
        } else if (value == '00000000000') {
            return (this.optional(element) || false);
        } 
        if (["00", "01", "02", "03", , "04", , "05", , "06", , "07", , "08", "09", "10"]
        .indexOf(value.substring(0, 2)) != -1) {
            return (this.optional(element) || false);
        }
        if (value.length < 10 || value.length > 11) {
            return (this.optional(element) || false);
        }
        if (["6", "7", "8", "9"].indexOf(value.substring(2, 3)) == -1) {
            return (this.optional(element) || false);
        }
        return (this.optional(element) || true);
    }, 'Informe um número de telefone celular válido!');
});

function validate_form_register_new_user(){
    $('#register-form').validate({
        rules: {
            'nome': { required: true},
            'cpf': { required: true},
            'email': { required: true, email: true},
            'telefone': { required: true, celular: true},
            'cep': { required: true},
            'estado': { required: true},
            'cidade': { required: true},
            'bairro': { required: true},
            'rua': { required: true},
            'numero': { required: true},
            'senha': { required: true},
            'confirmar_senha': { required: true, confirm_password: true},
        },
        messages: {
            'nome': { required: '<span style="color: #c22d43;"> Digite seu nome</span>' },
            'cpf': { required: '<span style="color: #c22d43;"> Digite seu CPF</span>' },
            'email': { required: '<span style="color: #c22d43;"> Digite seu e-mail</span>', email: '<span style="color: #c22d43">E-mail inv&aacute;lido</span>' },
            'telefone': { required: '<span style="color: #c22d43;"> Digite seu telefone</span>', celular: '<span style="color: #c22d43;">Digite um telefone válido</span>' },
            'cep': { required: '<span style="color: #c22d43;"> Digite seu CEP</span>' },
            'estado': { required: '<span style="color: #c22d43;"> Digite seu estado</span>' },
            'cidade': { required: '<span style="color: #c22d43;"> Digite sua cidade</span>' },
            'bairro': { required: '<span style="color: #c22d43;"> Digite seu bairro</span>' },
            'rua': { required: '<span style="color: #c22d43;"> Digite sua rua</span>' },
            'numero': { required: '<span style="color: #c22d43;"> Digite o número de sua residência (Obs: se não houver colocar: S/N)</span>' },
            'senha': { required: '<span style="color: #c22d43;"> Digite uma senha</span>' },
            'confirmar_senha': { required: '<span style="color: #c22d43;">Digite sua senha novamente</span>', confirm_password: '<span style="color: #c22d43;">As senhas não são iguais</span>' },
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
        errorLabelContainer: $('#msgs-register')
    });
    function showRequest(formData, jqForm, options) {
        $('#msgs-register').html('<span style="color: #01a620;">Cadastrando...</span>');
        $('#msgs-register').show();
    }
    function showResponse(data, jqForm) {
        switch ($.trim(data)) {
            case 'true':
                $('#msgs-register').html('<span style="color: #01a620;">Cadastro realizado com sucesso!</span>');
                $('#msgs-register').show();
                break;
            case 'false':
                $('#msgs-register').html('<span style="color: #c22d43;">Ocorreu um erro inesperado</span>');
                $('#msgs-register').show();
                break;
        }
        setTimeout(function () {
            $('#msgs-register').html('');
        }, 5000);
    }
}

function validate_form_login_user(){
    $('#login-form').validate({
        rules: {
            'email': { required: true, email: true},
            'senha': { required: true}
        },
        messages: {
            'email': { required: '<span style="color: #c22d43;"> Digite seu e-mail</span>', email: '<span style="color: #c22d43">E-mail inv&aacute;lido</span>' },
            'senha': { required: '<span style="color: #c22d43;">Digite sua senha</span>' }
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
        errorLabelContainer: $('#msgs-login')
    });
    function showRequest(formData, jqForm, options) {
        $('#msgs-login').html('<span style="color: #01a620;">Logando...</span>');
        $('#msgs-login').show();
    }
    function showResponse(data, jqForm) {
        switch ($.trim(data)) {
            case 'true':
                $('#msgs-login').html('<span style="color: #01a620;">Logado com sucesso!</span>');
                $('#msgs-login').show();
                break;
            case 'false':
                $('#msgs-login').html('<span style="color: #c22d43;">Ocorreu um erro inesperado</span>');
                $('#msgs-login').show();
                break;
        }
        setTimeout(function () {
            $('#msgs-login').html('');
        }, 5000);
    }
}

function validate_form_login_admin(){
    $('#login-form-admin').validate({
        rules: {
            'login': { required: true},
            'senha': { required: true}
        },
        messages: {
            'login': { required: '<span style="color: #c22d43;"> Digite seu login</span>'},
            'senha': { required: '<span style="color: #c22d43;">Digite sua senha</span>' }
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
        errorLabelContainer: $('#msgs-login-admin')
    });
    function showRequest(formData, jqForm, options) {
        $('#msgs-login-admin').html('<span style="color: #01a620;">Logando...</span>');
        $('#msgs-login-admin').show();
    }
    function showResponse(data, jqForm) {
        switch ($.trim(data)) {
            case 'true':
                $('#msgs-login-admin').html('<span style="color: #01a620;">Logado com sucesso!</span>');
                $('#msgs-login-admin').show();
                break;
            case 'false':
                $('#msgs-login-admin').html('<span style="color: #c22d43;">Ocorreu um erro inesperado</span>');
                $('#msgs-login-admin').show();
                break;
        }
        setTimeout(function () {
            $('#msgs-login').html('');
        }, 5000);
    }
}

function validate_form_password_user(){
    $('#password-form').validate({
        rules: {
            'email': { required: true, email: true}
        },
        messages: {
            'email': { required: '<span style="color: #c22d43;"> Digite seu e-mail</span>', email: '<span style="color: #c22d43">E-mail inv&aacute;lido</span>' }
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
        errorLabelContainer: $('#msgs-forgot-password')
    });
    function showRequest(formData, jqForm, options) {
        $('#msgs-forgot-password').html('<span style="color: #01a620;">Enviado...</span>');
        $('#msgs-forgot-password').show();
    }
    function showResponse(data, jqForm) {
        switch ($.trim(data)) {
            case 'true':
                $('#msgs-forgot-password').html('<span style="color: #01a620;">Enviado com sucesso! Verifique seu e-mail!</span>');
                $('#msgs-forgot-password').show();
                break;
            case 'false':
                $('#msgs-forgot-password').html('<span style="color: #c22d43;">Ocorreu um erro inesperado</span>');
                $('#msgs-forgot-password').show();
                break;
        }
        setTimeout(function () {
            $('#msgs-forgot-password').html('');
        }, 5000);
    }
}