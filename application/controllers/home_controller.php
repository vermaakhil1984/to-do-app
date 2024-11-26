<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home_controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Home_model');
        $this->load->helper(array('form'));
        $this->load->library('form_validation');
    }
    public function index()
    {
        $res['data'] = $this->Home_model->view_task();
        $this->load->view('home', $res);
    }
    public function insert_list()
    {
        $this->form_validation->set_rules('name', 'Name', 'required|trim|is_unique[app_list.task]');
        $data['task'] = $this->input->post('name');
        if ($this->form_validation->run() == true) {
            $res = $this->Home_model->insert_task($data);
            if ($res) {
                $this->session->set_flashdata('succMsg', 'Task Added Successfully');
                redirect('/');
            } else {
                $this->session->set_flashdata('errMsg', 'Please tray again');
                redirect('/');
            }
        } else {
            $this->session->set_flashdata('errMsg', 'Task Already exist');
            redirect('/');
        }
    }
    // public function edit_list($id)
    // {
    //     $res['single_data'] = $this->Home_model->view_single($id);
    //     if ($res) {
    //         $res['data'] = $this->Home_model->view_task();
    //         $this->load->view('home', $res);
    //     } else {
    //         return false;
    //     }
    // }
    public function update_list($id)
    {
        $data['status'] = 'success';
        $res = $this->Home_model->update_list($id, $data);
        if ($res) {
            redirect('/');
        } else {
            return false;
        }
    }
    public function delete_task($id)
    {
        $res['delete'] = $this->Home_model->delete_task($id);
        if ($res) {
            redirect('/');
        }
    }
}