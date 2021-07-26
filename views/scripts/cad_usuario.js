jQuery(document).ready(function ($) {
    // mensagens jQuerry validade
    traduzir_erros_jquery_validate();
    aplicar_mascaras_formulario();
    console.log();

    jQuery(document).on('click', '.btn_cad_produto.active', function () {
        jQuery('#modal_cad_usuario').iziModal("open");
    });
    jQuery(document).on('click', '.btn_gravar', function () {
        if (jQuery('.form_cad_informacoes').valid({})) {

            jQuery('.form_cad_informacoes').submit();

        } else {
            iziToast.error({
                title: 'Erro de preenchimento!',
                message: 'Por favor verifique os campos do formulário.',
                zindex: 999999,
            });
        }
    });

    jQuery('#modal_cad_usuario').iziModal({
        title: "Cadastro de Usuário",
        width: 800,
        icon: 'fa fa-user',
        padding: 15,
        top: 90,
        botom: 20,
        zindex: 999999,
        headerColor: 'rgb(228, 65, 33)',
        background: '#f3eae7',
        fullscreen: true,
        overlayClose: false,
        onOpened: function () { },
        onOpening: function(){
            if(window.innerWidth <= 767.98){
                jQuery('#modal_cad_usuario').iziModal('setFullscreen', true);
            }
        },
        onClosed: function () { },
    });

    jQuery("form.form_cad_informacoes").on("submit", function (e) {
        var formData = new FormData(this);
        formData.set('oper', oper);
        formData.set('produto', produto);
        formData.set('tipo_produto', tipo_produto);
        formData.set('status_produto', status_produto);
        e.preventDefault();

        cadastrarInformacoes(formData);
    });


});

function cadastrarInformacoes(formData) {

    jQuery.ajax({
        type: "POST",
        url: url_portal_ok + 'controller/controller_usuario.php',
        processData: false,
        cache: false,
        contentType: false,
        data: formData,
        beforeSend: function (xhr) {
            //iziToast
            jQuery("#status_pesquisa").html("<i class='fa fa-spinner fa-spin fa-5x fa-fw'></i> ");
            iziToast.info({
                timeout: 0000,
                drag: false,
                close: false,
                icon: "",
                overlay: true,
                displayMode: 'once',
                zindex: 9999999,
                title: "Por favor aguarde...",
                message: "Cadastrando informações<br><br><i class='fa fa-spinner fa-spin fa-3x fa-fw'></i> ",
                position: 'center',

                onClosing: function (instance, toast, closedBy) {
                    console.info('Closing | closedBy: ' + closedBy);
                },
                onClosed: function (instance, toast, closedBy) {
                    console.info('Closed | closedBy: ' + closedBy);
                }
            });
        },
        complete: function (e, xhr, result) {
            iziToast.destroy();
            if (e.readyState == 4 && e.status == 200) {

                try { //Converte a resposta HTTP JSON em um objeto JavaScript
                    var Obj = JSON.parse(e.responseText);
                } catch (err) {
                    //location.reload();
                    console.log(err);
                }
                jQuery('.modal_cadastro').iziModal('close');
                if (Obj.codigo == 1) {
                    iziToast.success({
                        title: 'Parabéns!',
                        message: Obj.mensagem,
                        theme: 'light',
                        position: 'center',
                        zindex: 99999999,
                        icon: 'fas fa-thumbs-up',
                        overlay: true,
                    });
                    jQuery('.preco .info_cadastro_cliente').html(`
                        <div>
                            <h4><span>Cadastro realizado com sucesso!</span></h4>
                            <h4>Quando as aulas forem liberadas</h4>
                            <h4>Entraremos em contato com você!</h4>
                        </div>
                    `);
                    jQuery('.preco_principal').remove();

                    jQuery('.btn_cad_produto').addClass('disabled').removeClass('active');

                } else {
                    iziToast.error({
                        title: 'Erro!',
                        message: 'Erro ao realizar cadastro!',
                        theme: 'light',
                        position: 'center',
                        zindex: 99999999,
                        overlay: true,
                    });

                }

            } else {
                jQuery('.modal_cadastro').iziModal('close');
                iziToast.error({
                    title: 'Erro!',
                    message: 'Erro ao processar solicitação!',
                    theme: 'light',
                    position: 'center',
                    zindex: 99999999,
                });
            }
        }
    });
}