<?php
defined('BASEPATH') or die('Some thing error occured');

class HomeModel extends CI_Model
{

        public function sliderList()
        {
            $slider_path = base_url().'uploads/slider/';
            $cols ="CONCAT('".$slider_path."',slider_image) as slider_image,slider_link as slider_link,slider_description as description";
            $result =  $this->crud->singleTableData(
                [
                    'table'=>'master_sliders',
                    'cols'=>$cols,
                    'order_by'=>['column'=>'slider_id','sort'=>'ASC'],
                    'response_param'=>'slider_result',
                    'description_message'=>'Getting slider list',
                    'debug'=>FALSE,
                    'where_condition'=>['flag_status'=>1],
                ]
            );
            return $result;
        }
            //Insert quick enquiry
        public function insertQuickEnquiry($params)
        {
            $response=[];
            $enquirySql= $this->db->insert_string('quick_enquires',$params);
            $enquiry= $this->db->query($enquirySql);
            $insertStatus = $this->db->affected_rows();
            $response[CODE] = ($insertStatus > 0)?SUCCESS_CODE:FAIL_CODE;
            $response[MESSAGE] =($insertStatus > 0)?'success':'fail';
            $response[DESCRIPTION] =($insertStatus > 0)?'Requested sended successfully out team will support you soon':'Some thing went wrong.';
            return json_encode($response);
        }
        //Our Spl List
        public function ourSpecialList()
        {
            $menu_image_path = base_url().'uploads/catering/menus/';
            $cols="menu_id as  menu_id,menu_unique_id as menu_unique_id,vendor_id as vendor_id,menu_title as menu_name,veg_type as veg_type,";
            $cols.="CONCAT('".$menu_image_path."',menu_image) as menu_image_path,menu_image as menu_image,price_per_plate as price,delivery_location as delivery_location,flag_status as flag_status,";
            $result = $this->crud->singleTableData(
                                        [
                                            'table'=>'catering_vendor_menulist',
                                            'cols'=>$cols,
                                            'order_by'=>['column'=>'menu_id','sort'=>'ASC'],
                                            'response_param'=>'menu_result',
                                            'description_message'=>'Getting Menu list',
                                            'debug'=>FALSE,
                                            'where_condition'=>[],
                                            'limit'=>5,
                                        ]
                                            );
            return $result;
        }
}