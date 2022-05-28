<?php
ob_start();
defined('BASEPATH') OR exit('No direct script access allowed');

class AreasMandantes extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('areasmandantes_model', '', TRUE);
        $this->load->helper('url');
    }

    public function index()
    {
        $data['list'] = $this->areasmandantes_model->list();
		$this->load->view('amsa/areas_mandantes/index.php', $data);
    }

    public function new()
    {
        $data = ['item' => null, 'title' => 'Registrar área mandante'];
        $this->load->view('amsa/areas_mandantes/form.php', $data);
    }

    public function create()
    {
        $new = [
            'cod_area' => $this->input->post('cod_area'),
            'des_area' => $this->input->post('des_area'),
            'gls_area' => $this->input->post('gls_area')
        ];
        $data['response'] = $this->areasmandantes_model->insert($new);
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
        $item = [
            'id_areas_mandantes' => $this->input->post('id_areas_mandantes'),
            'cod_area' => $this->input->post('cod_area'),
            'des_area' => $this->input->post('des_area'),
            'gls_area' => $this->input->post('gls_area')
        ];
        $data['response'] = $this->areasmandantes_model->update($item);
        $this->load->view('amsa/areas_mandantes/confirmacion.php', $data);
    }

    public function delete($id)
    {
        $data['response'] = $this->areasmandantes_model->delete($id);
        $this->load->view('amsa/areas_mandantes/confirmacion.php', $data);
    }
}