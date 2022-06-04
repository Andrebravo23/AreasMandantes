<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class AreasMandantes_model extends CI_Model {
    public function list()
    {
        $query = $this->db->query('SELECT fn_listar_areas_mandantes(14, 14, 1, 1, null)');
        $json_result = $query->result();
        $result = [];
        if ($json_result != null) {
            foreach ($json_result as $item) {
                array_push($result, json_decode($item->fn_listar_areas_mandantes, true));
            }
        }
        return $result;
    }

    public function insert($new)
    {
        $query = $this->db->query("SELECT fn_insert_areas_mandantes(?,14,14,1,?,?,1)", $new);
        $json_result = $query->result()[0]->fn_insert_areas_mandantes;
        $result = json_decode($json_result, true);
        return $result;
    }

    public function update($item)
    {
        $query = $this->db->query("SELECT fn_update_areas_mandantes(?,?,14,14,1,?,?,1)", $item);
        $json_result = $query->result()[0]->fn_update_areas_mandantes;
        $result = json_decode($json_result, true);
        return $result;
    }
    
    public function delete($id)
    {
        $query = $this->db->query("SELECT fn_desactivar_areas_mandantes(?,14,14,1,1)", $id);
        $json_result = $query->result()[0]->fn_desactivar_areas_mandantes;
        $result = json_decode($json_result, true);
        return $result;
    }
    
    public function show($id)
    {
        $this->db->where('id_areas_mandantes', $id);
        $q = $this->db->get('areas_mandantes');
        $item = $q->result_array();
        return $item[0];
    }

}