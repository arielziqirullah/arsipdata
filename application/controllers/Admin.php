<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('file_model');
    }

    public function index()
    {
        $data['title'] = "Dashboard";
        $this->load->view('template/meta', $data);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('dashboard');
        $this->load->view('template/footer');
    }

    public function excel()
    {
        $data['title'] = "File Excel";
        $data['file'] = $this->file_model->showfile();
        $this->load->view('template/meta', $data);
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('excel', $data);
        $this->load->view('template/footer');
    }

    public function uploadfile()
    {
        $config['upload_path']          = './uploads/';
        $config['allowed_types']        = '*';
        $config['max_size']             = 0;

        $this->load->library('upload', $config);
        $this->upload->initialize($config);

        if (!$this->upload->do_upload('filename')) {
            $data['title'] = $this->upload->display_errors();
            $data['file'] = $this->file_model->showfile();

            $this->load->view('template/meta', $data);
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('excel', $data);
            $this->load->view('template/footer');
        } else {
            $upload_data = $this->upload->data();
            $data = array(
                // 'user_id' => $this->session->userdata('id'),
                'name' => $upload_data['file_name'],
                // 'time' => date('Y M d')
            );
            $this->file_model->insert($data);
            redirect('admin/excel');
        }
    }
}
