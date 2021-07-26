function tratar_valor_nulo_vazio(valor, valor_retorno) {
	try {
		if (valor != '' && valor != null && typeof (valor) != 'undefined') {
			return valor;
		} else {
			return valor_retorno;
		}
	} catch (error) {
		console.log(error);
	}
}

function traduzir_erros_jquery_validate() {
	jQuery.extend(jQuery.validator.messages, {
		required: "Este campo &eacute; obrigatório.",
		remote: "Por favor, corrija este campo.",
		email: "Por favor, fornaça um endereço de e-mail válido.",
		url: "Por favor, forne&ccedil;a uma URL v&aacute;lida.",
		date: "Por favor, forne&ccedil;a uma data v&aacute;lida.",
		dateISO: "Por favor, forne&ccedil;a uma data v&aacute;lida (ISO).",
		number: "Por favor, forne&ccedil;a um n&uacute;mero v&aacute;lido.",
		digits: "Por favor, forne&ccedil;a somente d&iacute;gitos.",
		creditcard: "Por favor, forne&ccedil;a um cart&atilde;o de cr&eacute;dito v&aacute;lido.",
		equalTo: "Por favor, forne&ccedil;a o mesmo valor novamente.",
		accept: "Por favor, forne&ccedil;a um valor com uma extens&atilde;o v&aacute;lida.",
		maxlength: jQuery.validator.format("Por favor, forne&ccedil;a n&atilde;o mais que {0} caracteres."),
		minlength: jQuery.validator.format("Por favor, forne&ccedil;a ao menos {0} caracteres."),
		rangelength: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1} caracteres de comprimento."),
		range: jQuery.validator.format("Por favor, forne&ccedil;a um valor entre {0} e {1}."),
		max: jQuery.validator.format("Por favor, forne&ccedil;a um valor menor ou igual a {0}."),
		min: jQuery.validator.format("Por favor, forne&ccedil;a um valor maior ou igual a {0}.")
	});
}


function aplicar_mascaras_formulario(){
	jQuery('input[data-celular]').mask("(00) 00000-0000"); // Máscara para "celular"
	jQuery('input[data-cpf]').mask("000.000.000.00"); // Máscara para "cpf"
	jQuery('input[data-rg]').mask("00.000.000-0"); // Máscara para "rg"
	jQuery("input[data-cnpj]").mask("00.000.000/0000-00"); // Máscara para "cnpj"
}

function tratar_data(data, formato_data) {

	var data_now = jQuery.format.date(data, formato_data);

	return data_now;
}

// obtem a data de qualquer dia da semana
function pegar_data_dia_semana(d) {
	d = new Date(d);
	var day = d.getDay(),
		diff = d.getDate() - day + (day == 0 ? -6 : 1); // aceita dias de [0 à 6]
	return new Date(d.setDate(diff));
}
// trata data banco para apresentacao
function formata_data_apresentacao(data, data_com_horas, horas_existe) {
	if (data != '') {
		try {
			var trata_data;
			// exibi data com hoas do banco
			if (data_com_horas) {
				trata_data = data.split(' ');
				trata_data = trata_data[0];
				trata_data = trata_data.split('-');
			} 
			// exibi data sem horas do banco
			else {
				// verifica se horas existe na variavel, para nao exibir data errada
				if(horas_existe){
					trata_data = data.split(' ');
					trata_data = trata_data[0].split('-');
				}else{
					trata_data = data.split('-');
				}
			}
			var ano = trata_data[0];
			var mes = trata_data[1];
			var dia = trata_data[2];
			var data_tratada = dia + '/' + mes + '/' + ano;

			return data_tratada;
		} catch (e) {
			alert(e);
			return "-";
		}
	} else {
		return "-";
	}

}

function ativa_card_cmdb(template) {
	jQuery('#card_' + template + '.toggle_cmdb .card_header_cmdb').addClass('card_header_cmdb_active');
	jQuery('#card_' + template + '.toggle_cmdb').addClass('card_cmdb_active').removeClass('normal_card_cmdb');
	jQuery('#card_' + template + '.toggle_cmdb .card_body_cmdb').show(500);
}

function trata_string_banco(string) {
	var string_ok = string.replace('_', ' ');

	String.prototype.capitalize = function () {
		return this.charAt(0).toUpperCase() + this.slice(1);
	}

	return string_ok.capitalize();
}

function tratar_valor_status_curso(status_curso) {

    var status_curso_map = new Map();
    status_curso_map.set('inscricao', 'Fase de Inscrição');
	status_curso_map.set('espera', 'Fase de Espera');
	status_curso_map.set('compra_efetuada', 'Compra Efetuada');

    return status_curso_map.get(status_curso);
}
