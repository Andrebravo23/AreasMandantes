<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require FCPATH.'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Style\Border as StyleBorder;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Fill as StyleFill;
use PhpOffice\PhpSpreadsheet\Worksheet\Drawing as WorksheetDrawing;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

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
        if ($data['date'] == '') {
            $data['date'] = date('d-m-Y');
        } else {
            $data['date'] = date("d-m-Y", strtotime($data['date']));
        }
        $data['list'] = $this->comun_model->ObtenerRegistrosDesdeFuncion('planificacion.fn_select_plan_diario_formularios', "'".$data['date']."'", 14, 14, 1, 1, 'null');		
        $this->load->view('amsa/servicios_formularios/index.php', $data);
    }

    public function export()
    {
        $date = $this->input->get('fecha');
        $list = $this->comun_model->ObtenerRegistrosDesdeFuncion('planificacion.fn_select_plan_diario_formularios', "'".$date."'", 14, 14, 1, 1, 'null');		
        
        $table_header = [
            'font' => [
                'color' => [
                    'rgb' => 'FFFFFF'
                ]
            ],
            'fill'=> [
                'fillType' => StyleFill::FILL_SOLID,
                'startColor' => [
                    'rgb' => '538ED5'
                ]
            ]
        ];
        
        $alt_row = [
            'fill'=> [
                'fillType' => StyleFill::FILL_SOLID,
                'startColor' => [
                    'rgb' => 'dce6f1'
                ]
            ]
        ];

        if ($date != null) {
            $date_string = ' '.date("d-M-Y", strtotime($date));
        } else {
            $date_string = '';
        }


        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="Planilla de servicios MLP'.$date_string.'.xlsx"');
        
        $spreadsheet = new Spreadsheet();
        $spreadsheet->getProperties()->setCreator("Log Solution")->setLastModifiedBy("Log Solution");
        $sheet = $spreadsheet->getActiveSheet();
        
        $sheet->mergeCells('A1:E4');
        $drawing = new WorksheetDrawing();
        $drawing->setName('img');
        $drawing->setDescription('img');
        $drawing->setPath(__DIR__.'/../images/logoweb.png');
        $drawing->setHeight(70);
        $drawing->setCoordinates('B1');
        $drawing->setWorksheet($spreadsheet->getActiveSheet());

        $sheet->mergeCells('F1:T4');
        $sheet->setCellValue('F1', 'Servicios Formularios');
        $sheet->getStyle('F1')->getFont()->setSize(20);
        $sheet->getStyle('F1')->getFont()->setBold(true);
        $sheet->getStyle('F1')->getAlignment()->setVertical('center');

        $sheet->setCellValue('A5', 'nro_solicitud');
        $sheet->setCellValue('B5', 'fecha_servicio');
        $sheet->setCellValue('C5', 'hora_servicio');
        $sheet->setCellValue('D5', 'turno');
        $sheet->setCellValue('E5', 'nom_proveedor');
        $sheet->setCellValue('F5', 'nom_conductor');
        $sheet->setCellValue('G5', 'rut_conductor');
        $sheet->setCellValue('H5', 'patente');
        $sheet->setCellValue('I5', 'tipo_equipo');
        $sheet->setCellValue('J5', 'patente_remolque');
        $sheet->setCellValue('K5', 'tipo_equipo_remolque');
        $sheet->setCellValue('L5', 'tipo_carga');
        $sheet->setCellValue('M5', 'tipo_producto');
        $sheet->setCellValue('N5', 'material');
        $sheet->setCellValue('O5', 'tipo_servicio');
        $sheet->setCellValue('P5', 'clasif_servicio');
        $sheet->setCellValue('Q5', 'tipo_movimiento');
        $sheet->setCellValue('R5', 'lugar_retiro');
        $sheet->setCellValue('S5', 'lugar_destino');
        $sheet->setCellValue('T5', 'observaciones');
        $sheet->getStyle('A5:T5')->getFont()->setBold(true);
        $sheet->getStyle('A5:T5')->applyFromArray($table_header);

        $i = 5;
        foreach ($list as $item) {
            $i++;
            $sheet->setCellValue('A'.$i, $item['nro_solicitud']);
            $sheet->setCellValue('B'.$i, $item['fecha_servicio']);
            $sheet->setCellValue('C'.$i, $item['hora_servicio']);
            $sheet->setCellValue('D'.$i, $item['turno']);
            $sheet->setCellValue('E'.$i, $item['nom_proveedor']);
            $sheet->setCellValue('F'.$i, $item['nom_conductor']);
            $sheet->setCellValue('G'.$i, $item['rut_conductor']);
            $sheet->setCellValue('H'.$i, $item['patente']);
            $sheet->setCellValue('I'.$i, $item['tipo_equipo']);
            $sheet->setCellValue('J'.$i, $item['patente_remolque']);
            $sheet->setCellValue('K'.$i, $item['tipo_equipo_remolque']);
            $sheet->setCellValue('L'.$i, $item['tipo_carga']);
            $sheet->setCellValue('M'.$i, $item['tipo_producto']);
            $sheet->setCellValue('N'.$i, $item['material']);
            $sheet->setCellValue('O'.$i, $item['tipo_servicio']);
            $sheet->setCellValue('P'.$i, $item['clasif_servicio']);
            $sheet->setCellValue('Q'.$i, $item['tipo_movimiento']);
            $sheet->setCellValue('R'.$i, $item['lugar_retiro']);
            $sheet->setCellValue('S'.$i, $item['lugar_destino']);
            $sheet->setCellValue('T'.$i, $item['observaciones']);
            if ($i % 2 == 0) 
            {
                $sheet->getStyle('A'.$i.':T'.$i)->applyFromArray($alt_row);
            }
        }

        foreach (range('A','T') as $col) {
            $sheet->getColumnDimension($col)->setAutoSize(true);
        }

        $sheet->setAutoFilter('A5:T'.$i);
        $spreadsheet->getActiveSheet()->getStyle('A1:T'.$i)->getBorders()->getAllBorders()->setBorderStyle(StyleBorder::BORDER_THIN)->setColor(new Color('000000'));
        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }
}