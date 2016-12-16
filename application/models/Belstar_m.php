<?php
class Belstar_m extends CI_Model {

    public function __construct(){
//        $this->load->database();
        $this->rdb = $this->load->database('rdb',TRUE);
        $this->wdb = $this->load->database('wdb',TRUE);
    }
    //general
    public function getId($scaleout){//扩展code为3~9位数字表示唯一业务对象
        usleep(200);  
        $dt=new DateTime();
        list($usec, $sec) = explode(" ", microtime()); 
        $msec=round($usec*10000);  
        $this->load->helper('string');
        $tempid=$dt->format('YmdHis').$msec;//18位时间戳代表的字符串
        $result=$tempid.$scaleout;
        return $result;//唯一编码
    }
    //产生日志
    public function gen_stafflog($id,$content){
        $dt=new DateTime();
        $data = array(
            'id' => $this->getId('ULOG'),
            'staff_id' => $id,
            'content' => $content,
            'createdt' => $dt->format('Y-m-d H:i:s'),
        );
        $this->wdb->insert('bel_stafflog', $data);
    }        
    public function add_blankrecord($tname){
        $resultno=1;
        
        $pdata=array(
            'name'=>'******',
        );
        $this->wdb->insert('bel_'.$tname,$pdata);

        return $resultno;
    }
    public function delete_record($id,$tname){
        $resultno=1;
        
        $sql='delete from bel_'.$tname.' where id = '.$id;
        $this->wdb->query($sql);

        return $resultno;
    }
    //生产处理微服务
    public function get_msproduces(){
        $sql = 'SELECT * FROM bel_msproduce';
        $query=$this->rdb->query($sql);

        return $query->result_array();
    }
    public function save_msproduce($id,$name,$url,$port,$user,$pass){
        $resultno=1;
        $this->wdb->set('name',$name);
        $this->wdb->set('url',$url);
        $this->wdb->set('port',$port);
        $this->wdb->set('user',$user);
        $this->wdb->set('pass',$pass);
        $this->wdb->where('id',$id);
        $this->wdb->update('bel_msproduce');

        return $resultno;
    }

  
}