<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Migration_Belstar extends CI_Migration {
    public function up()
    {
        //stafflog
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'varchar','constraint' => 32),
            'staff_id'=>array('type' => 'bigint','constraint' => 20),
            'content'=>array('type' => 'varchar','constraint' => 128,'default'=>''),//操作的描述
            'status'=>array('type' => 'int','constraint' => 11,'default'=>1),//1成功；2失败
            'createdt'=>array('type' => 'datetime','null' => true),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bel_stafflog');
        //Produce微服务
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'int','constraint' => 11,'auto_increment' => true),
            'name'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'url'=>array('type' => 'varchar','constraint' => 128,'default'=>'192.168.0.1'),
            'port'=>array('type' => 'int','constraint' => 11,'default'=>'80'),
            'user'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'pass'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bel_msproduce');

        //Deliverer物流服务商
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'bigint','constraint' => 20,'auto_increment' => true),
            'code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'name'=>array('type' => 'varchar','constraint' => 64,'default'=>''),
            'memo'=>array('type' => 'varchar','constraint' => 256,'default'=>''),
            'isactive'=>array('type' => 'int','constraint' => 11,'default'=>1),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bel_deliverer');
        //Presstation
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'bigint','constraint' => 20,'auto_increment' => true),
            'code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'name'=>array('type' => 'varchar','constraint' => 64,'default'=>''),
            'memo'=>array('type' => 'varchar','constraint' => 256,'default'=>''),
            'opcenter_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'ipaddress'=>array('type' => 'varchar','constraint' => 32,'default'=>'192.168.1.10'),
            'isactive'=>array('type' => 'int','constraint' => 11,'default'=>1),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bel_presstation');
        //Printer
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'bigint','constraint' => 20,'auto_increment' => true),
            'code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'name'=>array('type' => 'varchar','constraint' => 64,'default'=>''),
            'memo'=>array('type' => 'varchar','constraint' => 256,'default'=>''),
            'opcenter_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'ipaddress'=>array('type' => 'varchar','constraint' => 32,'default'=>'192.168.1.10'),
            'aliasname'=>array('type' => 'varchar','constraint' => 32,'default'=>'PrinterBJ01'),
            'isactive'=>array('type' => 'int','constraint' => 11,'default'=>1),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bel_printer');
        //Integrator: 所有哑终端的数据处理功能
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'bigint','constraint' => 20,'auto_increment' => true),
            'code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'name'=>array('type' => 'varchar','constraint' => 64,'default'=>''),
            'memo'=>array('type' => 'varchar','constraint' => 256,'default'=>''),
            'isactive'=>array('type' => 'int','constraint' => 11,'default'=>1),
            'modulename'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'functionname'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'para1'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'para2'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'para3'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'para4'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'para5'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'para6'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'para7'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'para8'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'para9'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'para10'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'para11'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'para12'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bel_integrator');
        //SiteIntegrator
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'bigint','constraint' => 20,'auto_increment' => true),
            'site_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//所属制作中心；可为NULL，0为未分配
            'integrator_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'isactive'=>array('type' => 'int','constraint' => 11,'default'=>1),
            'workinghour'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'para1'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'para2'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'para3'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'para4'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'para5'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'para6'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'para7'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'para8'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'para9'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'para10'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'para11'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'para12'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bel_siteintegrator');

        //Material物料：
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'bigint','constraint' => 20,'auto_increment' => true),
            'code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'name'=>array('type' => 'varchar','constraint' => 64,'default'=>''),
            'memo'=>array('type' => 'varchar','constraint' => 256,'default'=>''),
            'isactive'=>array('type' => 'int','constraint' => 11,'default'=>1),
            'customer_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//为0为通用物料
            'needauth'=>array('type' => 'int','constraint' => 11,'default'=>0),
            'inspectionoroutput'=>array('type' => 'int','constraint' => 11,'default'=>0),//0:无;1:验货;2:输出
            'resfile1name'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'resfile2name'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'resfile3name'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'resfile4name'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bel_material');

        //Templet模板：一套一般对应一个数据源
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'bigint','constraint' => 20,'auto_increment' => true),
            'code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'name'=>array('type' => 'varchar','constraint' => 64,'default'=>''),
            'memo'=>array('type' => 'varchar','constraint' => 256,'default'=>''),
            'isactive'=>array('type' => 'int','constraint' => 11,'default'=>1),
            'customer_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'updatedt'=>array('type' => 'datetime','null' => true),
            'startdt'=>array('type' => 'datetime','null' => true),
            'stopdt'=>array('type' => 'datetime','null' => true),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bel_templet');
        //Business source业务源：数据源
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'bigint','constraint' => 20,'auto_increment' => true),
            'code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'name'=>array('type' => 'varchar','constraint' => 64,'default'=>''),
            'memo'=>array('type' => 'varchar','constraint' => 256,'default'=>''),
            'isactive'=>array('type' => 'int','constraint' => 11,'default'=>1),
            'templet_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'customer_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'scaleout'=>array('type' => 'varchar','constraint' => 22,'default'=>''),//每个数据源都唯一
            'msproduce_id'=>array('type' => 'bigint','constraint' => 20,'default'=>1),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->add_key('scaleout');
        $this->dbforge->create_table('bel_bsource');
        //Policy 客户产品
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'bigint','constraint' => 20,'auto_increment' => true),
            'code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'name'=>array('type' => 'varchar','constraint' => 64,'default'=>''),
            'memo'=>array('type' => 'varchar','constraint' => 256,'default'=>''),
            'isactive'=>array('type' => 'int','constraint' => 11,'default'=>1),
            'bsource_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'customer_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'datadtstr'=>array('type' => 'varchar','constraint' => 32,'default'=>''),//当天数据确认时间字符串: 6点0600
            'ptype'=>array('type' => 'int','constraint' => 11,'default'=>1),//实物输出：0不输出；1签收机构排序输出
            'etype'=>array('type' => 'int','constraint' => 11,'default'=>0),//电子版输出：0不输出；1输出
            'conts1'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'conts2'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'conts3'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'conts4'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'conts5'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
            'conts6'=>array('type' => 'varchar','constraint' => 128,'default'=>''),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bel_policy');
        //Product 生产产品--生产线概念取消，机构/直邮放在具体信息中区分
        $this->dbforge->add_field(array(
            'id'=>array('type' => 'bigint','constraint' => 20,'auto_increment' => true),
            'code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'name'=>array('type' => 'varchar','constraint' => 64,'default'=>''),
            'memo'=>array('type' => 'varchar','constraint' => 256,'default'=>''),
            'isactive'=>array('type' => 'int','constraint' => 11,'default'=>1),
            'bsource_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'customer_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),
            'invoiceno1'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'invoiceno2'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'invoiceno3'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'i1material_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//物料1
            'i1qty'=>array('type' => 'int','constraint' => 11,'default'=>0),//单证1数量
            'i2material_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//物料1
            'i2qty'=>array('type' => 'int','constraint' => 11,'default'=>0),//单证1数量
            'i3material_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//物料1
            'i3qty'=>array('type' => 'int','constraint' => 11,'default'=>0),//单证1数量
            'detailinvoiceno1'=>array('type' => 'varchar','constraint' => 32,'default'=>''),//明细表单证名称
            'detailinvoiceno2'=>array('type' => 'varchar','constraint' => 32,'default'=>''),//明细表单证名称
            'di1material_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//物料1
            'di1qty'=>array('type' => 'int','constraint' => 11,'default'=>0),//单证1数量
            'di2material_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//物料1
            'di2qty'=>array('type' => 'int','constraint' => 11,'default'=>0),//单证1数量

            'paper1_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//物料1
            'paper2_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//物料2
            'paper3_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//物料3
            'paper4_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//物料4
            'paper5_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//物料5
            'paper6_id'=>array('type' => 'bigint','constraint' => 20,'default'=>0),//物料6
            'part1code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'part2code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'part3code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'part4code'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'part1name'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'part2name'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'part3name'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
            'part4name'=>array('type' => 'varchar','constraint' => 32,'default'=>''),
        ));
        $this->dbforge->add_key('id',true);
        $this->dbforge->create_table('bel_product');
        
        //Init Center data
        $this->db->insert('bel_msproduce',array('id'=>'1','name'=>'微服务一号','url'=>'localhost/output/mspolicy/policy','port'=>'88','user'=>'belstar','pass'=>'20161122'));
        $this->db->insert('bel_deliverer',array('id'=>'1','code'=>'EMS','name'=>'邮政速递EMS','memo'=>''));
        $this->db->insert('bel_presstation',array('id'=>'1','code'=>'BJpres01','name'=>'北京1号PRES','opcenter_id'=>'1'));
        $this->db->insert('bel_printer',array('id'=>'1','code'=>'BJprinter01','name'=>'北京1号打印机','opcenter_id'=>'1'));
        $this->db->insert('bel_integrator',array('id'=>'1','code'=>'NCI01','name'=>'NCI保单入库集成器','memo'=>''));
        $this->db->insert('bel_siteintegrator',array('id'=>'1','site_id'=>'1','integrator_id'=>'1','workinghour'=>''));

        $this->db->insert('bel_material',array('id'=>'1','code'=>'11111','name'=>'通用80g白纸','customer_id'=>0));
        $this->db->insert('bel_material',array('id'=>'2','code'=>'NCI01','name'=>'新华北京发票','customer_id'=>1));

        $this->db->insert('bel_templet',array('id'=>'1','code'=>'NCI01','name'=>'NCI新华保单模板','memo'=>''));
        $this->db->insert('bel_bsource',array('id'=>'1','code'=>'NCI01','name'=>'NCI新华保单数据','templet_id'=>'1','customer_id'=>'1','scaleout'=>'NCI01'));
        $this->db->insert('bel_policy',array('id'=>'1','code'=>'NCI01','name'=>'NCI新华团险保单','bsource_id'=>'1','customer_id'=>'1','datadtstr'=>'0600'));
        $this->db->insert('bel_product',array('id'=>'1','code'=>'NCI01','name'=>'NCI新华北京保单','bsource_id'=>'1','customer_id'=>'1'));

    }
    
    public function down()
    {
        $this->dbforge->drop_table('bel_product');
        $this->dbforge->drop_table('bel_policy');
        $this->dbforge->drop_table('bel_bsource');
        $this->dbforge->drop_table('bel_templet');
        $this->dbforge->drop_table('bel_material');

        $this->dbforge->drop_table('bel_siteintegrator');
        $this->dbforge->drop_table('bel_integrator');

        $this->dbforge->drop_table('bel_printer');
        $this->dbforge->drop_table('bel_presstation');
        $this->dbforge->drop_table('bel_deliverer');

        $this->dbforge->drop_table('bel_msproduce');
        $this->dbforge->drop_table('bel_stafflog');
    }
    
}