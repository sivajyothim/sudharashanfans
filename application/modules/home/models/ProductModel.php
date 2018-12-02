<?php
defined('BASEPATH') or die("Something error occured");

class ProductModel extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
        $this->product_tbl='product_tbl';
    }

    public function all_fanTypeList() {
        $result = $this->crud->singleTableData(
                [
                    'table' => 'master_fantype',
                    'cols' => '*',
                    'order_by' => ['column' => 'fantype_title', 'sort' => 'ASC'],
                    'response_param' => 'fantype_result',
                    'description_message' => 'Getting Fan Type List',
                    'debug' => FALSE,
                ]
        );
        return $result;
    }
     public function productList() {
        $result = $this->crud->singleTableData(
                [
                    'table' => $this->product_tbl,
                    'cols' => '*',
                    'order_by' => ['column' => 'product_id', 'sort' => 'DESC'],
                    'response_param' => 'product_result',
                    'description_message' => 'Getting all product List',
                    'debug' => FALSE,
                ]
        );
        return $result;
    }
    public function productListByid($catid)
    {
        $response=[];
        $where=['fan_type'=>$catid];
        $cols="product_id as product_id,fan_type as category_id,product_title as title,mrp_price as market_price,selling_price as selling_price,discount as discount,display_pic as image_path,flag_status as product_status";
       $cols.=",default_color,color";
        $this->db->select($cols)->from($this->product_tbl);
        $sql = $this->db->where($where)->order_by('product_id','ASC')->get();
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
                $response[DESCRIPTION]=($count > 0)?'Getting the  product list':'No results found';
                $response['result_count']=$count;
                $response['product_result']=($count > 0)?$sql->result():[];
        }
        return  json_encode($response);
    }
    public function productDetails($productId)
    {
        $response=[];
        $where=['product_id'=>$productId];
        $cols="*";
        $this->db->select($cols)->from($this->product_tbl);
        $sql = $this->db->where($where)->order_by('product_id','ASC')->get();
        $dbError = $this->db->error();
        if($dbError['code']!=0)
        {
            $response[CODE] = FAIL_CODE;
            $response[MESSAGE] = 'Fail';
            $response[DESCRIPTION] =' Some thing error occured. Please inform to suppot team';
        }
        else
        {
                $count = $sql->num_rows();
                $response[CODE]=($count > 0)?SUCCESS_CODE:FAIL_CODE;
                $response[MESSAGE]=($count > 0)?'success':'fail';
                $response[DESCRIPTION]=($count > 0)?'Getting the  product list':'No results found';
                $response['result_count']=$count;
                $response['product_result']=($count > 0)?$sql->row():[];
                $response['product_sideimg_result']=$this->sideImagesList($productId);
        }
        return  json_encode($response);
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
        return $response;
    }

    public function realtedProducts($productId)
    {
        $response=[];
        $where=['product_id !='=>$productId];
        $case_status="fan_type WHEN 1 THEN 'Ceiling Fans' WHEN 1 THEN 'Table Fans'";
        $cols="product_id as product_id,fan_type as category_id,product_title as title,mrp_price as market_price,selling_price as selling_price,discount as discount,display_pic as image_path,flag_status as product_status";
       $cols.=",default_color,color,CASE $case_status  END as catName";
        $this->db->select($cols)->from($this->product_tbl);
        $sql = $this->db->where($where)->order_by('product_id','ASC')->get();
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
                $response[DESCRIPTION]=($count > 0)?'Getting the  product list':'No results found';
                $response['result_count']=$count;
                $response['product_result']=($count > 0)?$sql->result():[];
        }
        return  json_encode($response);
    }
    
}