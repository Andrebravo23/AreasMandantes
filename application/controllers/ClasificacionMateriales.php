<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ClasificacionMateriales extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('comun_model', '', TRUE);
        $this->load->helper('url');
    }


    public function index()
    {   
        $data['list'] = $this->comun_model->ObtenerRegistrosDesdeFuncion('planificacion.fn_listar_clasificacion_material', 14, 14, 1, 1, 'null');
		$this->load->view('amsa/clasificacion_materiales/index.php', $data);
    }

    public function new()
    {   
        $data = ['item' => null, 'title' => 'Registrar Clasificación de Material'];
        $this->load->view('amsa/clasificacion_materiales/form.php', $data);
    }

    public function create()
    {
        $cod_clasif_material = $this->input->post('cod_clasif_material');
        $des_clasif_material = $this->input->post('des_clasif_material');
        $gls_clasif_material = $this->input->post('gls_clasif_material');
        $data['response'] = $this->comun_model->MantenerRegistroDesdeFuncion(
                                            'planificacion.fn_insert_clasificacion_material',
                                            $cod_clasif_material,
                                            14,
                                            14,
                                            1,
                                            $des_clasif_material,
                                            $gls_clasif_material,
                                            1
                                        );
        $this->load->view('amsa/clasificacion_materiales/mensaje_exito.php', $data);
    }

    public function edit($id)
    {   
        $item = $this->comun_model->MantenerRegistroDesdeFuncion(
            'planificacion.fn_select_clasificacion_material',
            $id,
            14,
            14,
            1,
            1,
            0
        );
        $data = ['item' => $item, 'title' => 'Editar clasificación de material'];
        $this->load->view('amsa/clasificacion_materiales/form.php', $data);
    }

    public function update()
    {
        $id_clasif_material = $this->input->post('id_clasif_material');
        $cod_clasif_material = $this->input->post('cod_clasif_material');
        $des_clasif_material = $this->input->post('des_clasif_material');
        $gls_clasif_material = $this->input->post('gls_clasif_material');
        $data['response'] = $this->comun_model->MantenerRegistroDesdeFuncion(
            'planificacion.fn_update_clasificacion_material',
            $id_clasif_material,
            $cod_clasif_material,
            14,
            14,
            1,
            $des_clasif_material,
            $gls_clasif_material,
            1
        );
        $this->load->view('amsa/clasificacion_materiales/mensaje_exito.php', $data);
    }

    public function delete($id)
    {
        $data['response'] = $this->comun_model->MantenerRegistroDesdeFuncion(
            'planificacion.fn_desactivar_clasificacion_material',
            $id,
            14,
            14,
            1,
            1
        );
        $this->load->view('amsa/clasificacion_materiales/mensaje_exito.php', $data);
    }

    public function show()
    {   
        $item = $this->comun_model->MantenerRegistroDesdeFuncion(
            'planificacion.fn_select_clasificacion_material',
            $this->input->post('id_clasif_material'),
            14,
            14,
            1,
            1,
            0
        );
        echo json_encode($item);
    }
}