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
        <div class="col-xs-12 widget-container-col" id="widget-container-col-6" style="width: fit-content;">
            <div class="widget-box" id="widget-box-6">
                <div class="widget-header widget-header-small center">
                    <h5 class="widget-title smaller">
                        Reporte "Servicios Suministros Estratégicos"
                    </h5>
                </div>
                <div class="panel-body toggle-heading">
                    <div class="row">
                        <div class="col-xs-12">
                            <form action="<?= base_url('servicios-suministros-estrategicos');?>" method="POST" style="display: flex; align-items: center">
                                <div class="col-xs-2">
                                    <div class="form-group">
                                        <label for="fecha">Fecha: </label>
                                        <input class="form-control" type="date" name="fecha" id="fecha"
                                            value="<?= $date ?>"
                                        >
                                    </div>
                                </div>
                                <div class="col-xs-2">
                                    <button type="submit" class="btn btn-primary">Buscar</button>
                                </div>
                                <div class="col-xs-10">
                                    <a id="btn-export" href="<?=base_url('servicios-suministros-estrategicos/exportar?fecha='.$date)?>" target="_blank" class="btn btn-success pull-right"><i class="fa fa-file-excel-o me-2" aria-hidden="true"></i> Exportar</a>
                                </div>
                            </form>
                            <table id="simple-table" class="table table-bordered table-hover">
								<thead>
									<tr>
                                        <th class="detail-col">nro_solicitud</th>
                                        <th>fecha_servicio</th>
                                        <th>hora_servicio</th>
                                        <th>turno</th>
                                        <th>nom_proveedor</th>
                                        <th>nom_conductor</th>
                                        <th>rut_conductor</th>
                                        <th>patente</th>
                                        <th>tipo_equipo</th>
                                        <th>patente_remolque</th>
                                        <th>tipo_equipo_remolque</th>
                                        <th>tipo_carga</th>
                                        <th>tipo_producto</th>
                                        <th>material</th>
                                        <th>tipo_servicio</th>
                                        <th>clasif_servicio</th>
                                        <th>tipo_movimiento</th>
                                        <th>lugar_retiro</th>
                                        <th>lugar_destino</th>
                                        <th>observaciones</th>
									</tr>
								</thead>
								<tbody>
                                    <?php foreach ($list as $item) { ?>
									<tr>
                                        <td class="center"><?= $item['nro_solicitud'] ?></td>
                                        <td class="center"><?= date("d/m/Y", strtotime($item['fecha_servicio'])) ?></td>
                                        <td class="center"><?= $item['hora_servicio'] ?></td>
                                        <td class="center"><?= $item['turno'] ?></td>
                                        <td class="center"><?= $item['nom_proveedor'] ?></td>
                                        <td class="center"><?= $item['nom_conductor'] ?></td>
                                        <td class="center"><?= $item['rut_conductor'] ?></td>
                                        <td class="center"><?= $item['patente'] ?></td>
                                        <td class="center"><?= $item['tipo_equipo'] ?></td>
                                        <td class="center"><?= $item['patente_remolque'] ?></td>
                                        <td class="center"><?= $item['tipo_equipo_remolque'] ?></td>
                                        <td class="center"><?= $item['tipo_carga'] ?></td>
                                        <td class="center"><?= $item['tipo_producto'] ?></td>
                                        <td class="center"><?= $item['material'] ?></td>
                                        <td class="center"><?= $item['tipo_servicio'] ?></td>
                                        <td class="center"><?= $item['clasif_servicio'] ?></td>
                                        <td class="center"><?= $item['tipo_movimiento'] ?></td>
                                        <td class="center"><?= $item['lugar_retiro'] ?></td>
                                        <td class="center"><?= $item['lugar_destino'] ?></td>
                                        <td class="center"><?= $item['observaciones'] ?></td>
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
                    </div>
                </div>
            </div>
        </div>
        
    </body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</html>