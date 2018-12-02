<?php

defined('BASEPATH') or die('Some thing error occured');

class Product_model extends CI_Model {

    public $adminid;

    public function __construct() {
        parent::__construct();
        $this->product_tbl = "product_tbl";
        $this->adminid = $this->session->userdata(ADMIN_SESS_CODE . 'adminid');
    }

    
    public function colorList() {
            $result = $this->crud->singleTableData(
                    [
                        'table' => 'colors_tbl',
                        'cols' => '*',
                        'order_by' => ['column' => 'color_title', 'sort' => 'DESC'],
                        'response_param' => 'color_result',
                        'description_message' => 'Getting colors List',
                        'debug' => FALSE,
                    ]
            );
            return $result;
        }
    public function all_fanTypeList() {
        $result = $this->crud->singleTableData(
                [
                    'table' => 'master_fantype',
                    'cols' => '*',
                    'order_by' => ['column' => 'fantype_title', 'sort' => 'DESC'],
                    'response_param' => 'fantype_result',
                    'description_message' => 'Getting Fan Type List',
                    'debug' => FALSE,
                ]
        );
        return $result;
    }

    //Insert Section
    public function insertBulkFanType($params) {
        $table_name = 'master_fantype';
        $duplication_data = '';
        $response = [];
        $insertData = [];
        $total_count = $params['total_count'];
        $title = $params['title'];
        $title_code = $params['title_code'];
        $created_by = $params['created_by'];
        for ($i = 0; $i < $total_count; $i++) {
            $i_title = strtolower($title[$i]);
            $i_title_code = strtolower($title_code[$i]);
            if (!empty($i_title) && !empty($i_title_code)) {
                $title_duplication = $this->crud->duplicationCheck(
                        array(
                            'table' => $table_name,
                            'column' => 'fantype_id',
                            'condition' => array('fantype_title' => $i_title),
                        )
                );
                if ($title_duplication == 0) {
                    $insertData[] = array(
                        'fantype_unique_id' => 'FT' . md5(uniqid() . '_' . time() . '_' . $i),
                        'fantype_title' => $i_title,
                        'fantype_code' => $i_title_code,
                        'created_on' => DATE,
                        'created_by' => $created_by,
                    );
                } else {
                    $duplication_data .= $i_title . ',';
                }
            }
        }
        $duplication_data = trim($duplication_data, ',');
        if (is_array($insertData) && (count($insertData) > 0)) {
            $insert = $this->db->insert_batch($table_name, $insertData);
            $response[CODE] = ($insert) ? SUCCESS_CODE : FAIL_CODE;
            $response[MESSAGE] = ($insert) ? 'Success' : 'Fail';
            $disp_message = 'Fan Types  added successfully';
            $response[DESCRIPTION] = ($insert) ? $disp_message : 'Some thing error occured while inserting data';
        } else {
            $response[CODE] = VALIDATION_CODE;
            $response[MESSAGE] = 'Validation';
            $response[DESCRIPTION] = 'Some thing error occured. or ' . $duplication_data . ' duplication fan types found';
        }
        return json_encode($response);
    }

    //Insert Function hall (Venue)
    public function createProduct($params) {
        $response = [CODE => VALIDATION_CODE, MESSAGE => 'Invalid format'];
        if (is_array($params)) {
            $title = $params['product_title'];
            /* >> Checking duplication section code statrt */
            $duplication_venue = $this->crud->duplicationCheck([
                'table' => $this->product_tbl,
                'column' => 'product_id',
                'condition' => ['product_title' => $title]
            ]);

            /* >> Checking duplication section code end */
            if ($duplication_venue > 0) {

                $response[CODE] = FAIL_CODE;
                $response[MESSAGE] = 'Exists';
                $response[DESCRIPTION] = $title . ' fan  already exists ';
            } else {
                $productAuthId = sha1(substr($title, 0, 6) . substr($this->adminid, 8, 10) . time() . mt_rand(1000, 99999));
                $productUId = substr($title, 0, 4);
                $params['product_unique_id'] = $productAuthId;
                $params['product_code'] = 'SF' . $productUId;
                $productInsertSql = $this->db->insert_string($this->product_tbl, $params);
                $productInsertString = $this->db->query($productInsertSql);
                $productInsertStatus = $this->db->affected_rows();
                $response[CODE] = ($productInsertStatus > 0) ? SUCCESS_CODE : FAIL_CODE;
                $response[MESSAGE] = ($productInsertStatus > 0) ? 'success' : 'fail';
                $response[DESCRIPTION] = ($productInsertStatus > 0) ? 'Product  created successfully.Please upload images' : 'Some thing went wrong to add product info,try again.';
                $response['product_id'] = ($productInsertStatus > 0) ? $productAuthId : 0;
            }
        }
        return json_encode($response);
    }

    public function productList() {
        $result = $this->crud->singleTableData(
                [
                    'table' => 'product_tbl',
                    'cols' => '*',
                    'order_by' => ['column' => 'product_title', 'sort' => 'DESC'],
                    'response_param' => 'fan_result',
                    'description_message' => 'Getting Products List',
                    'debug' => FALSE,
                ]
        );
        return $result;
    }
   
    //Upload profile picture
    public function uploadProfilePicture($params)
    {
        $response=[];
        $venue_id = $params['venue_id'];
        $venue_image = $params['venue_image'];
        $venue_original_pic = $params['venue_original_pic'];
        $vendor_id = $params['vendor_id'];
        $updateData=['venue_original_pic'=>$venue_original_pic,'venue_image'=>$venue_image,'venue_pic_updated_on'=>DATE];
        $updateWhere=['venue_unique_id'=>$venue_id,'vendor_id'=>$vendor_id];
        $venueUpdateSql= $this->db->update_string($this->functionhall_tbl,$updateData,$updateWhere);
        $venueUpdateString = $this->db->query($venueUpdateSql);
        $venueUpdateStatus = $this->db->affected_rows();
        $response[CODE] = ($venueUpdateStatus > 0)?SUCCESS_CODE:FAIL_CODE;
        $response[MESSAGE] =($venueUpdateStatus > 0)?'success':'fail';
        $response[DESCRIPTION] =($venueUpdateStatus > 0)?'Function hall - image uploaded successfully':'Some thing went wrong.Please try again later.';
        return json_encode($response);
    }
    public function sideImagesList($product_id)
    {
        $response=[];
        $where=['product_id'=>$product_id];
        $cols="title as image_path";
        $this->db->select($cols)->from('product_side_images');
        $sql = $this->db->where($where)->order_by('product_sideimage_id','ASC')->get();
        $dbError = $this->db->error();
        if($dbError['code']!=0)
        {
            $response[CODE] = FAIL_CODE;
            $response[MESSAGE] = 'Fail';
            $response[DESCRIPTION] =' Some thing error occured. Please inform to suppot team';
            //Send email of exception pening..
        }
        else
        {
                $count = $sql->num_rows();
                $response[CODE]=($count > 0)?SUCCESS_CODE:FAIL_CODE;
                $response[MESSAGE]=($count > 0)?'success':'fail';
                $response[DESCRIPTION]=($count > 0)?'Getting the  gallery list':'No results found';
                $response['result_count']=$count;
                $response['side_images_result']=($count > 0)?$sql->result():[];
        }
        return  json_encode($response);
    }
    

    public function productDetails($product_id)
    {
        $response=[];
        $where=['product_id'=>$product_id];
        $cols="title as image_path";
        $this->db->select('*')->from('product_tbl');
        $sql = $this->db->where($where)->get();
        $dbError = $this->db->error();
        if($dbError['code']!=0)
        {
            $response[CODE] = FAIL_CODE;
            $response[MESSAGE] = 'Fail';
            $response[DESCRIPTION] =' Some thing error occured. Please inform to suppot team';
            //Send email of exception pening..
        }
        else
        {
                $count = $sql->num_rows();
                $response[CODE]=($count > 0)?SUCCESS_CODE:FAIL_CODE;
                $response[MESSAGE]=($count > 0)?'success':'fail';
                $response[DESCRIPTION]=($count > 0)?'Getting the product details':'No results found';
                $response['result_count']=$count;
                $response['product_result']=($count > 0)?$sql->row():[];
        }
        return  json_encode($response);
    }
}
