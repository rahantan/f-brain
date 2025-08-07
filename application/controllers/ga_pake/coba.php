<?php
defined('BASEPATH') or exit('No direct script access allowed');

class coba extends CI_Controller{
    public function index(){
        $this->load->view('nyoba/login');
    }
}