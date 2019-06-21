$(document).ready(function(){

    validate_form_register_new_user();
    validate_form_login_user();
    validate_form_password_user();
    validate_form_login_admin();
    contact_form();
    first_password_form();

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

    jQuery.validator.addMethod('confirm_first_password', function () {
        var password = $("#primeira_senha").val();
        var confirmPassword = $("#confirmar_primeira_senha").val();
        if (password != confirmPassword) {
           // $('#msgs-register').html('<span style="color: #c22d43;">As senhas não são iguais</span>');
            return false;
        }
        return true;
    });

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

});

function contact_form(){
        $('#contact-form').validate({
            rules: {
                'nomeContato': { required: true },
                'emailContato': { required: true, email: true },
                'mensagemContato': { required: true },
            },
            messages: {
                'nomeContato': { required:  '<span style="color: #ed3340">Digite seu nome</span>' },
                'emailContato': { required:  '<span style="color: #ed3340">Digite seu e-mail</span>', email: '<span style="color: #ed3340">E-mail inválido</span>'},
                'mensagemContato': { required:  '<span style="color: #ed3340">Digite sua mensagem</span>' },
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
            errorLabelContainer: $('#contact-form-msgs')
        });
        function showRequest(formData, jqForm, options) {
            $('#contact-form-msgs').html('<span style="color: #464c49">Enviando...</span><br/>',);
                $('#contact-form-msgs').show();
        }
        function showResponse(data, jqForm) {
            switch ($.trim(data)) {
                case 'true':
                    $('#contact-form-msgs').html('<span style="color: #017744;">Mensagem enviada com sucesso</span><br/>');
                    $('#contact-form-msgs').show();
                    break;
                case 'false':
                    $('#contact-form-msgs').html('<span style="color: #ed3340;">Erro inesperado</span><br/>');
                    $('#contact-form-msgs').show();
                    break;
            }
            setTimeout(function () {
                $('#contact-form-msgs').html('');
            }, 5000);
        }
    }

function validate_form_register_new_user(){
    $('#register-form').validate({
        rules: {
            'nome': { required: true},
            'cpf': { required: true, validacpf: true},
            'email': { required: true, email: true},
            'telefone': { required: true},
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
            'cpf': { required: '<span style="color: #c22d43;"> Digite seu CPF</span>', validacpf: '<span style="color: #c22d43;"> CPF inválido</span>' },
            'email': { required: '<span style="color: #c22d43;"> Digite seu e-mail</span>', email: '<span style="color: #c22d43">E-mail inv&aacute;lido</span>' },
            'telefone': { required: '<span style="color: #c22d43;"> Digite seu telefone</span>' },
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

function first_password_form(){
    $('#first-password-form').validate({
        rules: {
            'email_fp': { required: true, email: true},
            'cpf_fp': { required: true, validacpf: true},
            'senha_fp': { required: true},
            'confirmar_senha_fp': { required: true, confirm_first_password: true},
        },
        messages: {
            'email_fp': { required: '<span style="color: #c22d43;"> Digite seu e-mail</span>', email: '<span style="color: #c22d43;"> E-mail inválido</span>' },
            'cpf_fp': { required: '<span style="color: #c22d43;"> Digite seu CPF</span>', validacpf: '<span style="color: #c22d43;"> CPF inválido</span>' },
            'senha_fp': { required: '<span style="color: #c22d43;"> Digite uma senha</span>' },
            'confirmar_senha_fp': { required: '<span style="color: #c22d43;">Digite sua senha novamente</span>', confirm_first_password: '<span style="color: #c22d43;">As senhas não são iguais</span>' },
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
        errorLabelContainer: $('#msgs-first-password')
    });
    function showRequest(formData, jqForm, options) {
        $('#msgs-first-password').html('<span style="color: #01a620;">Enviado...</span>');
        $('#msgs-first-password').show();
    }
    function showResponse(data, jqForm) {
        switch ($.trim(data)) {
            case 'true':
                $('#msgs-first-password').html('<span style="color: #01a620;">Enviado com sucesso! Verifique seu e-mail!</span>');
                $('#msgs-first-password').show();
                break;
            case 'false':
                $('#msgs-first-password').html('<span style="color: #c22d43;">Ocorreu um erro inesperado</span>');
                $('#msgs-first-password').show();
                break;
        }
        setTimeout(function () {
            $('#msgs-first-password').html('');
        }, 5000);
    }
}