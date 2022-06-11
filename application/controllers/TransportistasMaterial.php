<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TransportistasMaterial extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->model('comun_model', '', TRUE);
        $this->load->helper('url');
    }


    public function index()
    {   
        $data['list'] = $this->comun_model->ObtenerRegistrosDesdeFuncion('planificacion.fn_listar_transportista_material', 14, 14, 1, 1, 'null');		
        $data['materiales'] = $this->comun_model->ObtenerRegistrosDesdeFuncion('planificacion.fn_listar_suministros', 14, 14, 1, 1, 'null');
        $data['transportistas'] = $this->comun_model->ObtenerRegistrosDesdeFuncion('planificacion.fn_listar_proveedores_transporte', 14, 14, 1, 1, 'null');
        $this->load->view('amsa/transportistas_material/index.php', $data);
    }

    public function new()
    {   
        $data = ['item' => null, 'title' => 'Registrar Transportista Material'];
		$data['materiales'] = $this->comun_model->ObtenerRegistrosDesdeFuncion('planificacion.fn_listar_suministros', 14, 14, 1, 1, 'null');
        $data['transportistas'] = $this->comun_model->ObtenerRegistrosDesdeFuncion('planificacion.fn_listar_proveedores_transporte', 14, 14, 1, 1, 'null');
        $this->load->view('amsa/transportistas_material/form.php', $data);
    }

    public function create()
    {
        $id_proveedor_transporte = $this->input->post('id_proveedor_transporte');
        $id_material = $this->input->post('id_material');
        $data['response'] = $this->comun_model->MantenerRegistroDesdeFuncion(
                                            'planificacion.fn_insert_transportista_material',
                                            14,
                                            14,
                                            1,
                                            $id_proveedor_transporte,
                                            $id_material,
                                            1
                                        );
        $this->load->view('amsa/transportistas_material/mensaje_exito.php', $data);
    }

    public function edit($id)
    {   
        $item = $this->comun_model->MantenerRegistroDesdeFuncion(
            'planificacion.fn_select_transportista_material',
            $id,
            14,
            14,
            1,
            1,
            0
        );
        $data = ['item' => $item, 'title' => 'Editar Transportista Material'];
        $data['materiales'] = $this->comun_model->ObtenerRegistrosDesdeFuncion('planificacion.fn_listar_suministros', 14, 14, 1, 1, 'null');
        $data['transportistas'] = $this->comun_model->ObtenerRegistrosDesdeFuncion('planificacion.fn_listar_proveedores_transporte', 14, 14, 1, 1, 'null');
        $this->load->view('amsa/transportistas_material/form.php', $data);
    }

    public function update()
    {
        $id_transportista_material2 = $this->input->post('id_transportista_material2');
        $id_proveedor_transporte = $this->input->post('id_proveedor_transporte');
        $id_material = $this->input->post('id_material');
        $data['response'] = $this->comun_model->MantenerRegistroDesdeFuncion(
            'planificacion.fn_update_transportista_material',
            $id_transportista_material2,
            14,
            14,
            1,
            $id_proveedor_transporte,
            $id_material,
            1
        );
        $this->load->view('amsa/transportistas_material/mensaje_exito.php', $data);
    }

    public function delete($id)
    {
        $data['response'] = $this->comun_model->MantenerRegistroDesdeFuncion(
            'planificacion.fn_desactivar_transportista_material',
            $id,
            14,
            14,
            1,
            1
        );
        $this->load->view('amsa/transportistas_material/mensaje_exito.php', $data);
    }

    public function show()
    {   
		$materiales = $this->comun_model->ObtenerRegistrosDesdeFuncion('planificacion.fn_listar_suministros', 14, 14, 1, 1, 'null');
        $transportistas = $this->comun_model->ObtenerRegistrosDesdeFuncion('planificacion.fn_listar_proveedores_transporte', 14, 14, 1, 1, 'null');
        $item = $this->comun_model->MantenerRegistroDesdeFuncion(
            'planificacion.fn_select_transportista_material',
            $this->input->post('id_transportista_material2'),
            14,
            14,
            1,
            1,
            0
        );
        $i = array_search($item['id_proveedor_transporte'], array_column($transportistas,"id_proveedor_transporte2"));
        $item['transportista'] = $transportistas[$i]["nombre_proveedor"];
        $i = array_search($item['id_material'], array_column($materiales,"id_suministros"));
        $item['material'] = $materiales[$i]["descripcion"];  
        echo json_encode($item);
    }
}