<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="ace/ace.min.css" />

        <title>Titulo</title>
    </head>

    <body>
        <div class="col-xs-12 widget-container-col" id="widget-container-col-6">
            <div class="widget-box" id="widget-box-6">
                <div class="widget-header widget-header-small">
                    <h5 class="widget-title smaller">
                        Clasificación de Materiales
                    </h5>
                </div>
                <div class="panel-body toggle-heading">
                    <div class="row">
                        <div class="col-xs-12">
                            <table id="simple-table" class="table table-bordered table-hover">
								<thead>
									<tr>
										<th class="detail-col">ID</th>
										<th>Cod. Clasificación de Material</th>
										<th>Des. Clasificación de Material</th>
										<th>Gls. Clasificación de Material</th>
                                        <th>Acciones</th>
									</tr>
								</thead>
								<tbody>
                                    <?php foreach ($list as $item) { ?>
									<tr>
										<td class="center"><?= $item['id_clasif_material'] ?></td>
										<td class="center"><?= $item['cod_clasif_material'] ?></td>
										<td class="center"><?= $item['des_clasif_material'] ?></td>
										<td class="center"><?= $item['gls_clasif_material'] ?></td>
										<td class="center">
											<div class="btn-group">
												<a item-id='<?= $item['id_clasif_material'] ?>' data-toggle="modal" href="#my_modal" class="btn btn-xs btn-success show-data">
													<i class="ace-icon fa fa-check bigger-120"></i>
												</a>
												<a href="<?= base_url('clasificacion-materiales/editar/'.$item['id_clasif_material']) ?>" class="btn btn-xs btn-info">
													<i class="ace-icon fa fa-pencil bigger-120"></i>
												</a>
												<a href="<?= base_url('clasificacion-materiales/eliminar/'.$item['id_clasif_material']) ?>" class="btn btn-xs btn-danger">
													<i class="ace-icon fa fa-trash-o bigger-120"></i>
												</a>
											</div>
										</td>
									</tr>
                                    <?php } if (count($list) == 0) { ?>
                                        <tr>
                                            <td class="center" colspan="13">No hay registros.</td>
                                        </tr>
                                    <?php } ?>
								</tbody>
							</table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-6">
                            <span><?= count($list) ?> resultados.</span>
                        </div>
                        <div class="col-xs-6" style="text-align: right;">
                            <a href="http://localhost/TablaMantenedora/clasificacion-materiales/formulario" class="btn btn-primary">Nuevo</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="modal fade" id="my_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Cerrar</span>
                        </button>
                        <h4 class="modal-title" id="myModalLabel">Detalle del registro</h4>
                    </div>
                    <div class="modal-body">
                        <div class="row" style="padding:0 15px">
                            <h5 class="col-xs-6" id="modal-id-ts"></h5>
                            <h5 class="col-xs-6" id="modal-cod-ts"></h5>
                            <h5 class="col-xs-6" id="modal-des-ts"></h5>
                            <h5 class="col-xs-6" id="modal-gls-ts"></h5>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </body>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script>
        $('.show-data').click(function() {
            $.ajax({
                url:'<?=base_url()?>clasificacion-materiales/mostrar/',
                method: 'POST',
                data: "id_clasif_material="+$(this).attr('item-id'),
                success: function(response){
                    response = JSON.parse(response);
                    $('#modal-id-ts','#modal-cod-ts','#modal-des-ts','#modal-gls-ts').text('');
                    $('#modal-id-ts').html('<b>ID de la clasificación de material:</b> ' + response["id_clasif_material"]);
                    $('#modal-cod-ts').html('<b>Código de la clasificación de material:</b> ' + response['cod_clasif_material']);
                    $('#modal-des-ts').html('<b>Clasificación de material:</b> ' + response['des_clasif_material']);
                    $('#modal-gls-ts').html('<b>GLS Clasificación de material:</b> ' + response['gls_clasif_material']);
                },
                error: function (XMLHttpRequest, textStatus, errorThrown) {
                    alert(textStatus, errorThrown);
                }
            });
        });
    </script>
</html>