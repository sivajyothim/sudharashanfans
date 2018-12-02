<?php
class OrderModel extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->adminid=  $this->session->userdata(ADMIN_SESS_CODE.'adminid');
    }
      public function all_orderlist($params)
    {
        //print_r($params);exit;
        $order_type = $params['order_type'];
        $response=[];
        $cols="o.*,";
        $cols .="count(c.cart_id) as item_qty,sum(c.sub_total) as price";
        $this->db->select($cols)->from('orders_tbl o')
                ->join('cart_tbl c','c.order_id=o.order_id','inner')
                ->group_by('o.order_id');
        if($order_type=='recent')
        {
            $this->db->where('Date(o.created_on)',date('Y-m-d'));        
        }
        if($order_type=='complete')
        {
            $this->db->where('o.order_status',1);        
        }
        if($order_type=='pending')
        {
            $this->db->where('o.order_status',0);        
        }
        $sql = $this->db->order_by('o.order_id','ASC')->get();
        //echo $this->db->last_query();
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
                $response[DESCRIPTION]=($count > 0)?'Getting the  orders list':'No results found';
                $response['result_count']=$count;
                $response['order_list']=$sql->result();
        }
        return  json_encode($response);
    }
    public function orderDetails($order_id)
    {
        $response=[];
        $where=['order_id'=>$order_id,'cart_status'=>1];
        $cols="c.*,";
        $cols .="p.product_id,p.product_code as product_code,p.display_pic as product_image";
        $this->db->select($cols)->from('cart_tbl c')
                ->join('product_tbl p','p.product_id=c.item_id','inner');
        $sql = $this->db->where($where)->order_by('cart_id','ASC')->get();
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
                $response[DESCRIPTION]=($count > 0)?'Getting the  orders Details':'No results found';
                $response['result_count']=$count;
                $response['order_result']=($count > 0)?$sql->result():[];
        }
        return json_encode($response);
    }
    
}