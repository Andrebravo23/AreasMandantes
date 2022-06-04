<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TiposServicio extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('comun_model', '', TRUE);
        $this->load->helper('url');
    }


    public function index()
    {   
        $data['list'] = $this->comun_model->ObtenerRegistrosDesdeFuncion('fn_listar_tipo_servicio', 14, 14, 1, 1, 'null');
		$this->load->view('amsa/tipos_servicio/index.php', $data);
    }

    public function new()
    {   
        $data = ['item' => null, 'title' => 'Registrar Tipo de Servicio'];
        $this->load->view('amsa/tipos_servicio/form.php', $data);
    }

    public function create()
    {
        $cod_tipo_servicio = $this->input->post('cod_tipo_servicio');
        $des_tipo_servicio = $this->input->post('des_tipo_servicio');
        $gls_tipo_servicio = $this->input->post('gls_tipo_servicio');
        $data['response'] = $this->comun_model->MantenerRegistroDesdeFuncion(
                                            'fn_insert_tipo_servicio',
                                            $cod_tipo_servicio,
                                            14,
                                            14,
                                            1,
                                            $des_tipo_servicio,
                                            $gls_tipo_servicio,
                                            1
                                        );
        $this->load->view('amsa/tipos_servicio/mensaje_exito.php', $data);
    }

    public function edit($id)
    {   
        $item = $this->comun_model->MantenerRegistroDesdeFuncion(
            'fn_select_tipo_servicio',
            $id,
            14,
            14,
            1,
            1,
            0
        );
        $data = ['item' => $item, 'title' => 'Editar tipo de servicio'];
        $this->load->view('amsa/tipos_servicio/form.php', $data);
    }

    public function update()
    {
        $id_tipo_servicio = $this->input->post('id_tipo_servicio');
        $cod_tipo_servicio = $this->input->post('cod_tipo_servicio');
        $des_tipo_servicio = $this->input->post('des_tipo_servicio');
        $gls_tipo_servicio = $this->input->post('gls_tipo_servicio');
        $data['response'] = $this->comun_model->MantenerRegistroDesdeFuncion(
            'fn_update_tipo_servicio',
            $id_tipo_servicio,
            $cod_tipo_servicio,
            14,
            14,
            1,
            $des_tipo_servicio,
            $gls_tipo_servicio,
            1
        );
        $this->load->view('amsa/tipos_servicio/mensaje_exito.php', $data);
    }

    public function delete($id)
    {
        $data['response'] = $this->comun_model->MantenerRegistroDesdeFuncion(
            'fn_desactivar_tipo_servicio',
            $id,
            14,
            14,
            1,
            1
        );
        $this->load->view('amsa/tipos_servicio/mensaje_exito.php', $data);
    }

    public function show($id)
    {   
        $item = $this->comun_model->MantenerRegistroDesdeFuncion(
            'fn_select_tipo_servicio',
            $id,
            14,
            14,
            1,
            1,
            0
        );
        return $item;
    }
}