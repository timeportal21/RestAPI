<?php
use Restserver\Libraries\REST_Controller;
defined('BASEPATH') OR exit('No direct script access allowed');

header('Access-Control-Allow-Origin: *');

if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Methods: GET, PUT, POST, DELETE, OPTIONS');
    header('Access-Control-Allow-Headers: Content-Type');
    exit;
}

require APPPATH . 'libraries/REST_Controller.php';
require APPPATH . 'libraries/Format.php';

class Student extends REST_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('students_model');
        header('Access-Control-Allow-Origin: *');
        
    }

    public function getStudent_get()
    {

        // $info = array(
        //     [
        //     'name'      => 'rabin',
        //     'address'   => 'kathmandu'
        // ]
        // ) ;
        $info = $this->students_model->getStudents();

        $this->response($info, REST_Controller::HTTP_OK);
    }

    public function addStudent_post()
    {


        $info = [
            'name'      => $this->post('name'),
            'address'   => $this->post('address')
        ];

        echo json_encode($info);
        // exit;

        // $this->response($info, REST_Controller::HTTP_OK);
    }


}