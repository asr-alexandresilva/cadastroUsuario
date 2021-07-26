jQuery(document).ready(function ($) {
    buscar_usuarios_cadastrados();
});

function buscar_usuarios_cadastrados() {

    jQuery.ajax({
        type: "POST",
        url: url_portal_ok + 'controller/controller_usuario.php',
        data: {
            oper: 2,
            tipo_produto: 'curso_estrategia_warzone',
        },

        beforeSend: function (xhr) {
            //iziToast
            iziToast.info({
                timeout: 0000,
                drag: false,
                close: false,
                icon: "",
                overlay: true,
                displayMode: 'once',
                zindex: 9999999,
                title: "Por favor aguarde.",
                message: "Carregando dados...<br><br><i class='fa fa-spinner fa-spin fa-3x fa-fw'></i> ",
                position: 'center',

                onClosing: function (instance, toast, closedBy) {
                    console.info('Closing | closedBy: ' + closedBy);
                },
                onClosed: function (instance, toast, closedBy) {
                    console.info('Closed | closedBy: ' + closedBy);
                }
            });
            jQuery('#tabela_usuarios_novo_curso').fadeOut(300);
            jQuery("#tabela_usuarios_novo_curso").dataTable().fnDestroy();
            jQuery('#tabela_usuarios_novo_curso tbody').html('');
        },
        complete: function (e, xhr, result) {
            if (e.readyState == 4 && e.status == 200) {
                iziToast.destroy();
                try { //Converte a resposta HTTP JSON em um objeto JavaScript
                    var Obj = JSON.parse(e.responseText); //Combo OS


                } catch (err) {
                    console.log("Erro na conversão do objeto JSON em Javascript!!!");
                    console.log(err);
                }

                if (Obj.codigo == 1) {

                    Obj.dados.forEach(usuario => {
                        jQuery('#tabela_usuarios_novo_curso tbody').append(`
                            <tr>
                                <td>${tratar_valor_nulo_vazio(usuario.nome, '-')}</td>
                                <td>${tratar_valor_nulo_vazio(usuario.email, '-')}</td>
                                <td>${tratar_valor_nulo_vazio(usuario.celular, '-')}</td>
                                <td>${formata_data_apresentacao(usuario.data_criacao, false, true)}</td>
                                <td>${tratar_valor_status_curso(usuario.status_produto)}</td>
                            </tr>
                        `);
                    });

                    montar_datatable();
                    jQuery('#tabela_usuarios_novo_curso').fadeIn(300);
                }

            } else {
                iziToast.error({
                    title: "Erro!",
                    message: 'Erro ao fazer requisição Servidor',
                });
            }
        }
    });
}

function montar_datatable() {
    var tabela = jQuery("#tabela_usuarios_novo_curso").DataTable({
        "lengthChange": true,
        "lengthMenu": [
            [25, 50, 100, -1],
            [25, 50, 100, "All"]
        ],
        dom: 'Bfrtip',
        buttons: ['excel'],
        "language": {
            "sEmptyTable": "Nenhum registro encontrado",
            "sInfo": "Mostrando de _START_ até _END_ de _TOTAL_ registros",
            "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
            "sInfoFiltered": "(Filtrados de _MAX_ registros)",
            "sInfoPostFix": "",
            "sInfoThousands": ".",
            "sLengthMenu": "Resultados por página _MENU_",
            "sLoadingRecords": "Carregando...",
            "sProcessing": "Processando...",
            "sZeroRecords": "Nenhum registro encontrado",
            "sSearch": "Pesquisar",
            "oPaginate": {
                "sNext": "Próximo",
                "sPrevious": "Anterior",
                "sFirst": "Primeiro",
                "sLast": "Último"
            },
            "oAria": {
                "sSortAscending": ": Ordenar colunas de forma ascendente",
                "sSortDescending": ": Ordenar colunas de forma descendente"
            }
        },
    });
}