<link href="<?php echo plugin_dir_url(__DIR__); ?>views/utils/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo plugin_dir_url(__DIR__); ?>views/utils/css/iziToast.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo plugin_dir_url(__DIR__); ?>views/css/style_geral_plugin.css?<?php echo rand(); ?>" rel="stylesheet" type="text/css" />


<script>
	const url_portal_ok = '<?php echo plugin_dir_url(__DIR__); ?>';
</script>
<div id="conteudo_pagina">
	<div class="row">
		<div class="col-md-12">

			<div class="card_cmdb card_tabela">
				<div class="card_body_cmdb">
					<div class="container_titulo_tabela titulo_principal">
						<div>
							<h4 class="titulo_tabela">Usuários Curso - Estratégia Warzone</h4>
						</div>
						<!-- <div class="container_status">
							<label for="">Mostrar itens fechados</label>
							<div class="container_btn_toggle_status">
								<input class="" type="checkbox" id="btn_status_sgc_solicitacao" />
								<label class="slider-v2" for="btn_status_sgc_solicitacao"></label>
							</div>
						</div> -->
					</div>
					<div class="table-responsive">
						<table class="table_bull tabela_normal" id="tabela_usuarios_novo_curso" style="display: none;">
							<thead>
								<tr>
									<th>Nome</th>
									<th>E-mail</th>
									<th>Celular</th>
									<th>Data de Cadastro</th>
									<th>Status Curso</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
									<td>-</td>
								</tr>
							</tbody>
						</table>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- modal -->
<!-- ----- -->


<script src="<?php echo plugin_dir_url(__DIR__); ?>views/utils/js/jquery-dateFormat.js"></script>
<script src="<?php echo plugin_dir_url(__DIR__); ?>views/utils/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js" type="text/javascript"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js" type="text/javascript"></script>
<script src="<?php echo plugin_dir_url(__DIR__); ?>views/utils/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo plugin_dir_url(__DIR__); ?>views/utils/js/jquery.mask.min.js" type="text/javascript"></script>
<script src="<?php echo plugin_dir_url(__DIR__); ?>views/utils/js/iziToast.min.js" type="text/javascript"></script>
<script src="<?php echo plugin_dir_url(__DIR__); ?>views/scripts/apoio.js?<?php echo rand(); ?>"></script>
<script src="<?php echo plugin_dir_url(__DIR__); ?>views/scripts/relatorio_usuarios.js?<?php echo rand(); ?>"></script>