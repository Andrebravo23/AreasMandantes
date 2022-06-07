<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comun_model extends CI_Model {
    public function ObtenerRegistrosDesdeFuncion($functionName, ...$params)
    {
        $paramsToString = implode(', ', $params);
        $query = $this->db->query('SELECT '.$functionName.'('.$paramsToString.')');
        $functionName = explode('.', $functionName)[1];
        $json_result = $query->result();
        $result = [];
        if ($json_result != null) {
            foreach ($json_result as $item) {
                array_push($result, json_decode($item->$functionName, true));
            }
        }
        return $result;
    }
    
    public function MantenerRegistroDesdeFuncion($functionName, ...$params)
    {
        $paramsToString = "'" . implode ( "', '", $params) . "'";
        $query = $this->db->query('SELECT '.$functionName.'('.$paramsToString.')');
        $functionName = explode('.', $functionName)[1];
        $json_result = $query->result()[0]->$functionName;
        $result = json_decode($json_result, true);
        return $result;
    }
}