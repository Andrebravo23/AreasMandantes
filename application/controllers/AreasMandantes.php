<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class AreasMandantes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('areasmandantes_model', '', TRUE);
        $this->load->model('comun_model', '', TRUE);
        $this->load->helper('url');
    }

    public function index()
    {
        $data['list'] = $this->comun_model->ObtenerRegistrosDesdeFuncion('fn_listar_areas_mandantes', 14, 14, 1, 1, 'null');
		$this->load->view('amsa/areas_mandantes/index.php', $data);
    }

    public function new()
    {
        $data = ['item' => null, 'title' => 'Registrar área mandante'];
        $this->load->view('amsa/areas_mandantes/form.php', $data);
    }

    public function create()
    {
        $cod_area = $this->input->post('cod_area');
        $des_area = $this->input->post('des_area');
        $gls_area = $this->input->post('gls_area');
        $data['response'] = $this->comun_model->MantenerRegistroDesdeFuncion(
                                            'fn_insert_areas_mandantes',
                                            $cod_area,
                                            14,
                                            14,
                                            1,
                                            $des_area,
                                            $gls_area,
                                            1
                                        );
        $this->load->view('amsa/areas_mandantes/confirmacion.php', $data);
    }

    public function edit($id)
    {
        $item = $this->areasmandantes_model->show($id);
        $data = ['item' => $item, 'title' => 'Editar área mandante'];
        $this->load->view('amsa/areas_mandantes/form.php', $data);
    }

    public function update()
    {
        $id_areas_mandantes = $this->input->post('id_areas_mandantes');
        $cod_area = $this->input->post('cod_area');
        $des_area = $this->input->post('des_area');
        $gls_area = $this->input->post('gls_area');
        $data['response'] = $this->comun_model->MantenerRegistroDesdeFuncion(
            'fn_update_areas_mandantes',
            $id_areas_mandantes,
            $cod_area,
            14,
            14,
            1,
            $des_area,
            $gls_area,
            1
        );
        $this->load->view('amsa/areas_mandantes/confirmacion.php', $data);
    }

    public function delete($id)
    {
        $data['response'] = $this->comun_model->MantenerRegistroDesdeFuncion(
            'fn_desactivar_areas_mandantes',
            $id,
            14,
            14,
            1,
            1
        );
        $this->load->view('amsa/areas_mandantes/confirmacion.php', $data);
    }
}