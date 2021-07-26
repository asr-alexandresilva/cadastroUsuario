<link href="<?php echo plugin_dir_url(__DIR__); ?>views/utils/css/iziToast.min.css" rel="stylesheet" type="text/css" />
<link href="<?php echo plugin_dir_url(__DIR__); ?>views/css/style_geral_plugin.css?<?php echo rand(); ?>" rel="stylesheet" type="text/css" />
<link href="<?php echo plugin_dir_url(__DIR__); ?>views/css/cad_usuario.css?<?php echo rand(); ?>" rel="stylesheet" type="text/css" />


<script>
	const url_portal_ok = '<?php echo plugin_dir_url(__DIR__); ?>';
	const oper = 1;
	const produto = 'Mentoria 4.0';
	const tipo_produto = 'curso_mentoria';
	const status_produto = 'lista_espera';
</script>

<!-- modal -->
<div id="modal_cad_usuario" class="modal_cadastro" style="display: none">
	<div class="row">
		<div class="col-md-12">
			<form class="form_cad_informacoes" id="form_cad_sgc_solicitacao" name="form_cad_sgc_solicitacao">
				<div class="row">
					<div class="col-md-12">
						<div class="form-group">
							<label class="label_required" for="campo_custom_0">Nome</label>
							<input type="text" id="nome_usuario" name="nome" maxlength="100" class="form-control" required>
						</div>
					</div>
					<div class="col-md-8">
						<div class="form-group">
							<label class="label_required" for="campo_custom_0">E-mail</label>
							<input type="email" id="email_usuario" name="email" maxlength="100" class="form-control" required>
						</div>
					</div>
					<div class="col-md-4">
						<div class="form-group">
							<label for="campo_custom_0">Celular</label>
							<input type="tel" id="celular_usuario" data-celular="celular" name="celular" maxlength="11" class="form-control">
						</div>
					</div>
				</div>
			</form>
			<div class="row">
				<div class="col-md-12">
					<span id="btn_cadastrar_usuario" class="btn btn-primary my-4 btn_gravar"><i class="fa fa-save"></i> Gravar</span>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- fim modal -->

<script src="<?php echo plugin_dir_url(__DIR__); ?>views/utils/js/jquery.validate.min.js" type="text/javascript"></script>
<script src="<?php echo plugin_dir_url(__DIR__); ?>views/utils/js/jquery.mask.min.js" type="text/javascript"></script>
<script src="<?php echo plugin_dir_url(__DIR__); ?>views/utils/js/iziToast.min.js" type="text/javascript"></script>
<script src="<?php echo plugin_dir_url(__DIR__); ?>views/scripts/apoio.js?<?php echo rand(); ?>"></script>
<script src="<?php echo plugin_dir_url(__DIR__); ?>views/scripts/cad_usuario.js?<?php echo rand(); ?>"></script>