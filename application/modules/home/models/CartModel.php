<?php 
defined("BASEPATH") or die('Some thing error occuerd');

class CartModel extends CI_Model
{
        public function addToCart($params)
        {
            $response=[];
            $itemid= $params['itemid'];
            $cart_session= $params['cart_session'];
            $item_color= $params['item_color'];
            $item_qty= $params['item_qty'];
            $suborder_id = $params['suborder_id'];
            $duplication_check = $this->crud->duplicationCheck([
                                'table'=>'cart_tbl',
                                'column'=>'cart_id',
                                'condition'=>['item_color'=>$item_color,'item_id'=>$itemid,'cart_session_id'=>$cart_session]
                                ]);
            if($duplication_check==1)
            {
                $response[CODE] = FAIL_CODE;
                $response[MESSAGE] = 'Fail';
                $response[DESCRIPTION] ='Item already exists in your cart';
            }
            else
            {
                        $itemSql = $this->db->select('product_id,product_title,selling_price as product_price')
                        ->from('product_tbl')->where('product_id',$itemid)->get();
                        $itemCount =  $itemSql->num_rows();
                        if($itemCount == 0)
                        {
                            $response[CODE]=FAIL_CODE;
                            $response[MESSAGE]='FAIL';
                            $response[DESCRIPION]='Item details not found. Please refresh page and try again';
                        }
                        else
                        {   
                            $itemRes =  $itemSql->row();
                            $item_id = $itemRes->product_id;
                            $item_title = $itemRes->product_title;
                            $price = $itemRes->product_price;
                            if(number_check($price))
                            {
                                    $insertData=[
                                        'item_id'=>$item_id,
                                        'cart_session_id'=>$cart_session,
                                        'created_date'=>DATE,
                                        'cart_status'=>0,
                                        'item_color'=>$item_color,
                                        'item_name'=>$item_title,
                                        'item_price'=>$price,
                                        'sub_total'=>$price,
                                        'suborder_id'=>$suborder_id,
                                        'item_qty'=>$item_qty,
                                    ];
                                $insertString = $this->db->insert_string('cart_tbl',$insertData);  
                                $insert= $this->db->query($insertString);
                                $insertStatus = $this->db->affected_rows();
                                $response[CODE]=($insertStatus > 0)?SUCCESS_CODE:FAIL_CODE;
                                $response[MESSAGE]=($insertStatus > 0)?'success':'fail';
                                $response[DESCRIPTION]=($insertStatus > 0)?'Item added to Cart':'Some thing error occured';  
                            }
                            else
                            {
                                $response[CODE]=FAIL_CODE;
                            $response[MESSAGE]='FAIL';
                            $response[DESCRIPTION]='Sorry we cant add item to cart. Please try another';
                            }
                          
                       
                        }
            }
            return json_encode($response);
        }

        public function cartList($params)
        {
                $response=[];
                $cartsession = $params['cart_session'];
                $cartWhere = ['cart_session_id'=>$cartsession,'cart_status'=>0];
                $cols="c.cart_id,c.item_id,c.item_name,c.item_price,c.item_color,c.item_qty,c.cart_status,c.sub_total,p.display_pic as image_path";
                $this->db->select($cols)->from('cart_tbl c')->where($cartWhere)
                        ->join("product_tbl p","p.product_id=c.item_id","left");
                $sql = $this->db->order_by('cart_id','DESC')->get();
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
                        $response[DESCRIPTION]=($count > 0)?'Getting the cart list':'No results found';
                        $response['result_count']=$count;
                        $response['cart_result']=($count > 0)?$sql->result():(object)(null);
                       
                }
                 return json_encode($response);
        }

        public function cartStatistics($params)
        {
            $cartsession = $params['cart_session'];
            $response=['order_total'=>0,'order_item_count'=>0];
            $where=['cart_session_id'=>$cartsession,'cart_status'=>0];
            $this->db->select('SUM(sub_total) as order_total,COUNT(cart_id) as order_item_count')->from('cart_tbl')->where($where);
            $sql = $this->db->get();
            $details = $sql->row();
            $subtotal = (number_check($details->order_total))?$details->order_total:0;
            $orderItemCount = (number_check($details->order_item_count))?$details->order_item_count:0;
            $response=['order_total'=>$subtotal,'order_item_count'=>$orderItemCount];
            return json_encode($response);
        }

        // Delete - cart item 
        public function deleteCartItem($params)
        {
           // print_r($params);exit;
            $response=[];
            $cartsession = $params['cart_session'];
            $cartid = $params['cartid'];
            $where=['cart_id'=>$cartid,'cart_session_id'=>$cartsession];
            $deleteSql = $this->db->delete('cart_tbl',$where);
            $deleteStatus = $this->db->affected_rows();
            $cartWhere=['cart_session_id'=>$cartsession,'cart_status'=>0];
            $this->db->select('SUM(sub_total) as order_total')->from('cart_tbl')->where($cartWhere);
            $sql = $this->db->get();
            $details = $sql->row();
            $subtotal = (number_check($details->order_total))?$details->order_total:0;
            $response=['order_total'=>$subtotal];
            $response[CODE]=($deleteStatus > 0)?SUCCESS_CODE:FAIL_CODE;
            $response[MESSAGE]=($deleteStatus > 0)?'success':'fail';
            $response[DESCRIPTION]=($deleteStatus > 0)?'Item has been deleted form Cart':'Some thing error occured';       
            return json_encode($response);
        }

        //create New order 

        public function createNewOrder($params)
        {
            $userdata = $params['userdata'];
            $cartdata = $params['cartdata'];
              $paymentmode=$userdata['payment_mode'];
            $itemCount = 0;
            $total = 0;
            $cartsession = $userdata['cartsesstion'];
            $orderNumber = 'SFO'.mt_rand(0000,9999);
            $userdata['order_number']=$orderNumber;
            $userdata['created_on']=DATE;
            $userdata['deliver_date']=DATE;
            $insertOrder = $this->db->insert_string('orders_tbl',$userdata);
            $insert = $this->db->query($insertOrder);
            
            $orderId = $this->db->insert_id();
            foreach($cartdata as $cart_res)
            {
                $cart_id = $cart_res['cartid'];
                $cart_qty = $cart_res['qty'];
                
                //Get cart details 
                $cartWhere=['cart_id'=>$cart_id,'cart_status'=>0];
                $sql = $this->db->select('item_price')
                ->from('cart_tbl')->where($cartWhere)->get();
                $cartres = $sql->row();
                $item_price = $cartres->item_price;

                $updateWhere =  ['cart_session_id'=>$cartsession,'cart_id'=>$cart_id,'cart_status'=>0];
                $updateData= ['user_id'=>'','order_number'=>$orderNumber,'cart_status'=>1,'item_qty'=>$cart_qty,'sub_total'=>( $cart_qty * $item_price),'order_id'=>$orderId];
                $cartUpdate = $this->db->update_string('cart_tbl',$updateData,$updateWhere);
                $upadte_cart_details=$this->db->query($cartUpdate);
                $set_new_session=md5(CS_EXT.time().rand(3,99999));
                $this->session->set_userdata('cartsession',$set_new_session);
            }
            $response[CODE]=($orderId > 0)?SUCCESS_CODE:FAIL_CODE;
            $response[MESSAGE]=($orderId > 0)?'success':'fail';
            $response[DESCRIPTION]=($orderId > 0)?'Order has been placed successfully. You will soon receive a confirmation mail soon':'Some thing error occured';       
            $response['orderId']= $orderId;
            $response['order_number']=$orderNumber;
            $response['paymentmode']=$paymentmode;
            return json_encode($response);
        }
        
        public function updateCartDetails($params)
        {
           
            $cartdata = $params['cartdata'];
            $cartsession = $params['cart_session'];
            $itemCount = 0;
            $total = 0;
            
            foreach($cartdata as $cart_res)
            {
                $cart_id = $cart_res['cartid'];
                $cart_qty = $cart_res['qty'];
                
                //Get cart details 
                $cartWhere=['cart_id'=>$cart_id,'cart_status'=>0];
                $sql = $this->db->select('item_price')
                ->from('cart_tbl')->where($cartWhere)->get();
                $cartres = $sql->row();
                $item_price = $cartres->item_price;
                $updateWhere =  ['cart_session_id'=>$cartsession,'cart_id'=>$cart_id,'cart_status'=>0];
                $updateData= ['item_qty'=>$cart_qty,'sub_total'=>( $cart_qty * $item_price)];
                $cartUpdate = $this->db->update_string('cart_tbl',$updateData,$updateWhere);
                $upadte_cart_details=$this->db->query($cartUpdate);
                
            }
            $response[CODE]=SUCCESS_CODE;
            $response[MESSAGE]='success';
            $response[DESCRIPTION]='cart updated successfully';
            return json_encode($response);
        }
    public function orderDetails($orderid)
    {
        $response=[];
        $cols="o.*,";
        $cols .="count(c.cart_id) as item_qty,sum(c.sub_total) as price";
        $this->db->select($cols)->from('orders_tbl o')
                ->join('cart_tbl c','o.cartsesstion=c.cart_session_id','inner')
                ->where('o.order_id',$orderid);
        $sql = $this->db->order_by('o.order_id','ASC')->get();
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
                $response['order_result']=$sql->row();
        }
        return  json_encode($response);
    }
    public function orderItems($order_id)
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
                $response['item_result']=($count > 0)?$sql->result():[];
        }
        return json_encode($response);
    }

    public function checkPincode($pincode)
    {
        $response=[];
        $where = [
            'pincode'=>$pincode,
        ];
        $sql = $this->db->select('*')->from('master_pincodes')->where($where)->get();
        $count = $sql->num_rows();
        $response[CODE]=($count > 0)?SUCCESS_CODE:FAIL_CODE;
        $response[MESSAGE]=($count > 0)?'success':'fail';
        $response[DESCRIPTION]=($count > 0)?'Getting pincode details':'No details found';
        $response['pincode_result']=($count > 0)?$sql->row():[];
        return json_encode($response);
    }
    public function stateList() {
        $result = $this->crud->singleTableData(
                [
                    'table' => 'master_states',
                    'cols' => '*',
                    'order_by'=>['column'=>'state_id','sort'=>'ASC'],
                    'response_param' => 'state_result',
                    'description_message' => 'Getting state List',
                    'debug' => FALSE,
                ]
        );
        return $result;
}
}