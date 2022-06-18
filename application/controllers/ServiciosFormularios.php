<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ServiciosFormularios extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('comun_model', '', TRUE);
        $this->load->helper('url');
    }


    public function index()
    {  
        $data['date'] = $this->input->post('fecha');
        $data['list'] = $this->comun_model->ObtenerRegistrosDesdeFuncion('planificacion.fn_select_plan_diario_formularios', "'".$data['date']."'", 14, 14, 1, 1, 'null');		
        $this->load->view('amsa/servicios_formularios/index.php', $data);
    }


}