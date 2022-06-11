<?php
    $this->load->helper('url');
?>
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
    <link rel="stylesheet" href="<?php if ($item != null) { echo "../"; } ?>../ace/ace.min.css" />

    <title>Titulo</title>
</head>
<body>
    <div class="col-xs-12 widget-container-col" id="widget-container-col-6">    
        <form action="<?php if ($item != null) { echo base_url('transportistas-material/actualizar'); } else { echo base_url('transportistas-material/crear'); }?>" method="post">
            <input type="hidden" name="id_transportista_material2" value="<?php if ($item != null) { echo $item['id_transportista_material2']; } ?>">
            <div class="widget-box" id="widget-box-6">
                <div class="widget-header widget-header-small">
                    <h5 class="widget-title smaller"><?= $title ?></h5>
                </div>
                <div class="panel-body toggle-heading">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="id_proveedor_transporte">Transportista: </label>
                                <select class="form-control" name="id_proveedor_transporte">
                                    <option value=""></option>
                                    <?php foreach ($transportistas as $transportista) { ?>
                                        <option
                                            value=<?php echo '"'.$transportista["id_proveedor_transporte2"].'"';
                                                if ($item != null && $transportista["id_proveedor_transporte2"] == $item["id_proveedor_transporte"]) echo 'selected';?>>
                                                <?=$transportista["nombre_proveedor"]?>
                                        </option> 
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group">
                                <label for="id_material">Material: </label>
                                <select class="form-control" name="id_material">
                                    <option value=""></option>
                                    <?php foreach ($materiales as $material) { ?>
                                        <option
                                            value=<?php echo '"'.$material["id_suministros"].'"';
                                                if ($item != null && $material['id_suministros'] == $item["id_material"]) echo 'selected';?>>
                                                <?=$material["descripcion"]?>
                                        </option> 
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-xs-12" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="http://localhost/TablaMantenedora/transportistas-material"
                                style="margin-left:20px" class="btn btn-danger">Cancelar</a>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</body>
</html>