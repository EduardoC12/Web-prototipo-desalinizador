<?php 
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\Datos;

class HistorialController extends BaseController{

    private $db;

    public function __construct()
    {
        $this->db = db_connect();
    }

    public function historial() 
    {
        helper(['form', 'html']); 

        $DatosModel = new Datos();
        $data ['historial'] = $DatosModel->findAll();

        echo view('user/historial',$data);

    }

    public function historialInfo(){
        helper(['form', 'html']);

        if ($this->request->getMethod()=='post'){
            $EspModel = new Datos();
            $Data = ['temp'=> $this->request->getVar('temp')];
            $EspModel->insert($Data);
            return redirect()->to('/historial');
         
        }
    }
}