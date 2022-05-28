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
    <link rel="stylesheet" href="<?php if ($item != null) { echo "../"; } ?>ace/ace.min.css" />

    <title>Formulario</title>
</head>
<body>
    <div class="col-xs-12 widget-container-col" id="widget-container-col-6">    
        <form action="<?php if ($item != null) { echo base_url('actualizar'); } else { echo base_url('crear'); }?>" method="post">
            <input type="hidden" name="id_areas_mandantes" value="<?php if ($item != null) { echo $item['id_areas_mandantes']; } ?>">
            <div class="widget-box" id="widget-box-6">
                <div class="widget-header widget-header-small">
                    <h5 class="widget-title smaller"><?= $title ?></h5>
                </div>
                <div class="panel-body toggle-heading">
                    <div class="row">
                        <div class="col-xs-2">
                            <div class="form-group">
                                <label for="cod_area">Código del Área: </label>
                                <input class="form-control" type="text" name="cod_area" <?php if ($item != null) { echo 'value="'.$item['cod_area'].'"'; } ?>>
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="form-group">
                                <label for="des_area">Área: </label>
                                <input  class="form-control" type="text" name="des_area" <?php if ($item != null) { echo 'value="'.$item['des_area'].'"'; } ?>>
                            </div>
                        </div>
                        <div class="col-xs-5">
                            <div class="form-group">
                                <label for="gls_area">GLS Área: </label>
                                <input  class="form-control" type="text" name="gls_area" <?php if ($item != null) { echo 'value="'.$item['gls_area'].'"'; } ?>>
                            </div>
                        </div>
                        <div class="col-xs-12" style="margin-top: 20px;">
                            <button type="submit" class="btn btn-primary">Guardar</button>
                            <a href="http://localhost/TablaMantenedora"
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