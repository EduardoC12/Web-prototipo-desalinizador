<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Datos;

class DatosController extends BaseController
{

    private $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    // Funciones de interfaz

    public function lineGraphic()
    {

        helper(['html']);

        echo view('charts/lineGraphic');

    }

    public function gaugeView()
    {

        echo view('charts/gauge');

    }

    public function graphicView()
    {

        echo view('charts/areaGraphic');

    }

    public function barView()
    {

        echo view('charts/barGraphic');

    }

    // Funciones de consulta

    public function gauge()
    {
        $data = [];
        $gaugeModel = new Datos();
        $data = $gaugeModel->orderBy('id', 'desc')->first();
        echo json_encode($data);
    }

    public function lines()
    {
        $json = array();
        $builder = $this->db->table('temperatura');
        $builder->select('id, temp, fecha');
        $data = $builder->get()->getResult();
        $json = $data;
        echo json_encode($data);
    }

    public function graphic()
    {
        $json = array();
        $builder = $this->db->table('temperatura');
        $builder->select('id, temp, fecha');
        $data = $builder->get()->getResult();
        $json = $data;
        echo json_encode($data);
    }
}