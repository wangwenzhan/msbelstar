<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Belstar extends CI_Controller {

    public function index()
    {
        if (($_SERVER['PHP_AUTH_USER'] == 'belstar') && ($_SERVER['PHP_AUTH_PW'] == '20161122')) {
            $this->load->library('xmlrpc');
            $this->load->library('xmlrpcs');

            $config['functions']['add_blankrecord'] = array('function' => 'Belstar.add_blankrecord');
            $config['functions']['delete_record'] = array('function' => 'Belstar.delete_record');

            $config['functions']['get_msproduces'] = array('function' => 'Belstar.get_msproduces');
            $config['functions']['save_msproduce'] = array('function' => 'Belstar.save_msproduce');


            $this->xmlrpcs->initialize($config);
            $this->xmlrpcs->serve();
        } 
/*
        else {
            header("WWW-Authenticate: Basic realm=\"My Private Area\"");
            header("HTTP/1.0 401 Unauthorized");
            print "You need valid credentials to get access!\n";
            exit;
        }
*/
    }
    public function add_blankrecord($request){
        $this->load->model('belstar_m');
        $paras = $request->output_parameters();
        $result=$this->belstar_m->add_blankrecord($paras[0]);
        $response = array(htmlspecialchars(json_encode($result)));
        return $this->xmlrpc->send_response($response);
    }
    public function delete_record($request){
        $this->load->model('belstar_m');
        $paras = $request->output_parameters();
        $result=$this->belstar_m->delete_record($paras[0],$paras[1]);
        $response = array(htmlspecialchars(json_encode($result)));
        return $this->xmlrpc->send_response($response);
    }

    public function get_msproduces($request){
        $this->load->model('belstar_m');
        $paras = $request->output_parameters();
        $result=$this->belstar_m->get_msproduces();
        $response = array(htmlspecialchars(json_encode($result)));
        return $this->xmlrpc->send_response($response);
    }
    public function save_msproduce($request){
        $this->load->model('belstar_m');
        $paras = $request->output_parameters();
        $result=$this->belstar_m->save_msproduce($paras[0],$paras[1],$paras[2],$paras[3],$paras[4],$paras[5]);
        $response = array(htmlspecialchars(json_encode($result)));
        return $this->xmlrpc->send_response($response);
    }


    public function migrate()
    {
        $this->load->library('migration');
        if ($this->migration->current() === false){
            show_error($this->migration->error_string());
        }else{
            echo '数据库迁移成功';
        }
    }
    
}
