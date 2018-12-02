<?php

defined('BASEPATH') or die('Some thing error occured');

class Cart extends CI_Controller
{
public $data, $cartsession, $userid;
public function __construct()
{
parent::__construct();
$this->data = [];$params=[];
$this->load->model(['CartModel' => 'cart', 'ProductModel' => 'product']);
$this->cartsession=$this->session->userdata('cartsession');
$this->data['cartsession'] = $this->session->userdata('cartsession');
$this->data['product_menu_details'] = $this->product->all_fanTypeList();
$this->userid = $this->session->userdata(US_EXT.'userid');


}

public function checkout()
{
$params = [];
$params['cart_session'] = $this->data['cartsession'];
$this->data['cartList'] = $this->cart->cartList($params);
$this->data['cartStatistics'] = $this->cart->cartStatistics($params);
$this->data['stateList'] = $this->cart->stateList();
$this->load->view('shipping', $this->data);
}
public function cart()
{
$params = [];
$params['cart_session'] = $this->data['cartsession'];
$this->data['cartList'] = $this->cart->cartList($params);
$this->data['cartStatistics'] = $this->cart->cartStatistics($params);
$this->load->view('cart', $this->data);
}

public function itemAddToCart()
{
$response = [];
$error = 1;
$url_itemid = $this->input->post('itemid');
$item_color = $this->input->post('selected_color') != ""?$this->input->post('selected_color'):$this->input->post('default_color');
$item_qty = $this->input->post('qty') != ""?$this->input->post('qty'):"1";
$itemid_decode = base64_decode($url_itemid);
$item_id = str_replace(CS_SECURITY, '', $itemid_decode);
if(!number_check($item_id)){ $error = 0;
$error_msg = 'Item is missing';
}
if($error == 0)
{
$response[CODE] = FAIL_CODE;
$response[MESSAGE] = 'Fail';
$response[DESCRIPTION] = 'Some thing error occured';
}
else
{
        $suborderid='SOC'.$item_id.mt_rand(0000,9999).time();
        $cartData = [
                        'itemid' => $item_id,
                        'cart_session' => $this->data['cartsession'],
                        'item_color' => $item_color,
                        'item_qty' => $item_qty,
                        'suborder_id'=>$suborderid,
                    ];
        /*>>Generate QR code start */
        $this->load->library('ciqrcode');
        $qr_image=$suborderid.'.png';
        $params['data'] = base_url().'suborderdetails/'.$suborderid;
        $params['level'] = 'H';
        $params['size'] = 8;
        $params['savename'] =FCPATH."uploads/orders/suborders_qrcodes/".$qr_image;
        $this->ciqrcode->generate($params);
        /*>>Generate QR code end */
        $addToCart = $this->cart->addToCart($cartData);
        echo $addToCart; exit;
}
return json_encode($response);
}

public function deletecartitem()
{
$response = [];
$error = 1;
$cartid = $this->input->post('cartid');
if(!number_check($cartid)){ $error = 0;
$error_msg = 'cart id is missing';
}
if($error == 0)
{
$response[CODE] = FAIL_CODE;
$response[MESSAGE] = 'Fail';
$response[DESCRIPTION] = 'Some thing error occured';
}
else
{
$cartData = [
'cartid' => $cartid,
 'cart_session' => $this->data['cartsession']
];

$deleteCart = $this->cart->deleteCartItem($cartData);
echo $deleteCart;
exit;
}
return json_encode($response);
}
public function insertOrder(){
$response = array();
$error_message = '';
$error = 0;
$req_input = file_get_contents('php://input');
if (!isJson($req_input))
{
$response[CODE] = VALIDATION_CODE;
$response[MESSAGE] = 'Validation';
$response[DESCRIPTION] = 'Input data should be in JSON format only';
}
else
{
$req_response = json_decode($req_input);

$cartid = (isset($req_response->cartid)) ? ($req_response->cartid) : '';
$cartid = (is_array($cartid))?$cartid:[$cartid];
$qty = (isset($req_response->qty)) ? ($req_response->qty) : '';
$qty = (is_array($qty))?$qty:[$qty];
$username = (isset($req_response->shipping_name)) ? input_data($req_response->shipping_name) : '';
$email = (isset($req_response->shipping_email)) ? input_data($req_response->shipping_email) : '';
$mobile = (isset($req_response->shipping_mobile)) ? input_data($req_response->shipping_mobile) : '';
$address = (isset($req_response->shipping_address)) ? input_data($req_response->shipping_address) : '';
$landmark = (isset($req_response->shipping_landmark)) ? input_data($req_response->shipping_landmark) : '';
$area = (isset($req_response->shipping_area)) ? input_data($req_response->shipping_area) : '';
$city = (isset($req_response->shipping_city)) ? input_data($req_response->shipping_city) : '';
$state = (isset($req_response->shipping_state)) ? input_data($req_response->shipping_state) : '';
$pincode = (isset($req_response->shipping_pincode)) ? input_data($req_response->shipping_pincode) : '';
$paymentmode = (isset($req_response->payment_mode)) ? input_data($req_response->payment_mode) : '';
//            $moofpersons = (isset($req_response->consolidatednoofpersons)) ? input_data($req_response->consolidatednoofpersons) : '';  
//            $deliver_date = (isset($req_response->deliver_date)) ? input_data($req_response->deliver_date) : '';  
//            $deliver_time = (isset($req_response->deliver_time)) ? input_data($req_response->deliver_time) : '';  
$order_note = (isset($req_response->order_note)) ? input_data($req_response->order_note) : '';
/* Validatio Section */
if ($cartid == '') {$error_message .= '* cart id is missing ,';
$error = 1;
}
if ($qty == '') {$error_message .= '* quantity is missing ,';
$error = 1;
}
if ($address == '') {$error_message .= 'address id is missing ,';
$error = 1;
}
if ($username == '') {$error_message .= 'user name is missing ,';
$error = 1;
}
if ($mobile == '') {$error_message .= 'mobile is missing ,';
$error = 1;
}
if ($address == '') {$error_message .= 'address is missing ,';
$error = 1;
}
if ($landmark == '') {$error_message .= 'landmark is missing ,';
$error = 1;
}
if ($area == '') {$error_message .= 'area is missing ,';
$error = 1;
}
if ($city == '') {$error_message .= 'city is missing ,';
$error = 1;
}
if ($state == '') {$error_message .= 'state is missing ,';
$error = 1;
}
if ($pincode == '') {$error_message .= 'pincode is missing ,';
$error = 1;
}
if ($paymentmode == '') {$error_message .= 'please select payment ,';
$error = 1;
}
if(!mobile_check($mobile)){$error_message .= 'invalid mobile number ,';
$error = 1;
}
if(!pincode_check($pincode)){$error_message .= 'invalid pincode ,';
$error = 1;
}
/* Validation Section ends here */
//print_r($cartid);exit;
if($error == 1)
{
$response[CODE] = VALIDATION_CODE;
$response[MESSAGE] = 'Validation';
$response[DESCRIPTION] = rtrim($error_message, ',');
}
else
{
$cartData = [];
$userData = [
'shipping_name' => $username,
 'shipping_mobile' => $mobile,
 'shipping_address' => $address,
 'shipping_landmark' => $landmark,
 'shipping_area' => $area,
 'shipping_city' => $city,
 'shipping_pincode' => $pincode,
 'cartsesstion' => $this->data['cartsession'],
 'shipping_email' => $email,
 'shipping_state' => $state,
 'payment_mode' => $paymentmode,
];


for($k = 0;
$k<count($cartid);
$k++){

$cartData[] = [
'cartid' => $cartid[$k],
 'qty' => $qty[$k],
];
}
// print_r($cartData);exit;
$params = [];
$params['userdata'] = $userData;
$params['cartdata'] = $cartData;
// print_r($params);exit;
$createOrder = $this->cart->createNewOrder($params);
/*>>generating qr code module section code start */
$reqOrder=json_decode($createOrder);
if($reqOrder->code == 200)
{
    $ordernumber = $reqOrder->order_number;
    $this->load->library('ciqrcode');
    $qr_image=$ordernumber.'.png';
    $params['data'] = $ordernumber;
    $params['level'] = 'H';
    $params['size'] = 8;
    $params['savename'] =FCPATH."uploads/orders/qrcodes/".$qr_image;
    $this->ciqrcode->generate($params);
}
/*>>generating qr code module section code end*/
echo $createOrder;exit;
}
}
echo json_encode($response);
}


//cart statisttics
public function checkoutStatustics($cart)
{
$params = [];
$params['cart_session'] = $cart;
$res = $this->cart->cartStatistics($params);
echo $res;
}
public function sendsms()
{

$this->load->helper('sendsms_helper');
sendsms( '9652316446', 'test message' );
}

public function cartUpdate()
{
$response = array();
$error_message = '';
$error = 0;
$req_input = file_get_contents('php://input');
if (!isJson($req_input))
{
$response[CODE] = VALIDATION_CODE;
$response[MESSAGE] = 'Validation';
$response[DESCRIPTION] = 'Input data should be in JSON format only';
}
else
{
$req_response = json_decode($req_input);

$cartid = (isset($req_response->cartid)) ? ($req_response->cartid) : '';
$cartid = (is_array($cartid))?$cartid:[$cartid];
$qty = (isset($req_response->qty)) ? ($req_response->qty) : '';
$qty = (is_array($qty))?$qty:[$qty];

if ($cartid == '') {$error_message .= '* cart id is missing ,';
$error = 1;
}
if ($qty == '') {$error_message .= '* quantity is missing ,';
$error = 1;
}

/* Validation Section ends here */
//print_r($cartid);exit;
if($error == 1)
{
$response[CODE] = VALIDATION_CODE;
$response[MESSAGE] = 'Validation';
$response[DESCRIPTION] = rtrim($error_message, ',');
}
else
{
$cartData = [];

for($k = 0;
$k<count($cartid);
$k++){

$cartData[] = [
'cartid' => $cartid[$k],
 'qty' => $qty[$k],
];
}
// print_r($cartData);exit;
$params = [];

$params['cartdata'] = $cartData;
$params['cart_session'] = $this->data['cartsession'];

$createOrder = $this->cart->updateCartDetails($params);
echo $createOrder;
exit;

}
}
echo json_encode($response);
}

public function orderSuccess()
{
    ini_set('max_execution_time', 0);
    $orderid=$this->uri->segment(2);
     /*>>otder items code start*/
    $this->data['order_details']=$this->cart->orderDetails($orderid);
    $this->data['order_item_details']=$this->cart->orderItems($orderid);
    $order_req = json_decode($this->data['order_details']); $order_res = $order_req->order_result;
    $email=$order_res->shipping_email;
    $mobile=$order_res->shipping_mobile;
    $orderId=$order_res->order_number;
    $text="your Order placed succesfully with ". SITE_DOMAIN. ' order number: #'.$orderId.' for more info about your order please check your mail id ' .$email.' Thanks For Shopping With Us.';
        
        //send sms code start
        $request = 'userid=alekhya&password=123456&sender=ALKHYA&mobileno='.$mobile.',9515074999&msg='.$text;

        $ch = curl_init('http://www.smshub.co.in/websms/sendsms.aspx');

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        curl_setopt($ch, CURLOPT_POST, true);

        curl_setopt($ch, CURLOPT_POSTFIELDS, $request);

        $resuponce = curl_exec($ch);

        curl_close($ch);
    
       // return $resuponce;
        //send sms code end
        if(SITE_MODE==1)
        {
            $result =$this->sendmail->sendEmail(
                                        array(
                                            'to' => array($email),
                                            'cc' => array('info@' . SITE_DOMAIN),
                                            'bcc' => array(BCC_EMAIL),
                                            'subject' => 'Success - your order is confirmed!',
                                            'data' => array('order_details' =>  $this->data['order_details'],'order_item_details' => $this->data['order_item_details']),
                                            'template' =>'email-templates/order_success',
                                        )
                                    );
        }
        $params['cart_session']=$this->session->userdata('cartsession');
      $this->data['cartList'] = $this->cart->cartList($params);
          $this->data['cartStatistics'] = $this->cart->cartStatistics($params);   
    $this->load->view('order-success',$this->data);
}
public function temp()
{
    
    $orderid=$this->uri->segment(2);
     /*>>otder items code start*/
    $this->data['order_details']=$this->cart->orderDetails(6);
    $this->data['order_item_details']=$this->cart->orderItems(6);
   
    
    
    $this->load->view('email-templates/order_success',$this->data);
}

public function orderVerification()
{
    $response=[];
    $pincode = $this->input->post('pincode');
    $email = $this->input->post('email');
    $payment = $this->input->post('payment');
    $mobile = $this->input->post('mobile');
    $error=0;$error_msg='';

    if($error == 0)
    {
        //check pincode
        $checkPincodeSql = $this->cart->checkPincode($pincode);
        $pincodeReq = json_decode($checkPincodeSql);
        if($pincodeReq->code != 200)
        {
            $response[CODE]=FAIL_CODE;
            $response[MESSAGE]='fail';
            $response[DESCRIPTION]='Pincode not available. Sorry we cant provide delivery on preferred loction';
        }
        else
        {
            $proceed_status=1;
            $pincodeResult = $pincodeReq->pincode_result;
            $cod_status = $pincodeResult->pincode_cod;
            $shipping_status = $pincodeResult->pincode_shipping_available;
            if($payment == 'cod')
            {
                if($cod_status == 0)
                {
                    $proceed_status=0;
                    $response[CODE]=FAIL_CODE;
                    $response[MESSAGE]='fail';
                    $response[DESCRIPTION]='COD is not available on '.$pincode;
                }
            }

            if($proceed_status == 1)
            {
                //send sms module section code start
                $otp = mt_rand(0000,999999);
                $text="Your order verification code $otp";
                $request = 'userid=alekhya&password=123456&sender=ALKHYA&mobileno='.$mobile.'&msg='.$text;

                $ch = curl_init('http://www.smshub.co.in/websms/sendsms.aspx');

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

                curl_setopt($ch, CURLOPT_POST, true);

                curl_setopt($ch, CURLOPT_POSTFIELDS, $request);

                $resuponce = curl_exec($ch);

                curl_close($ch);
                $otpInsert=[
                    'cart_session'=>$this->cartsession,
                    'otp_code'=>$otp,
                    'created_on'=>DATE,
                ];
                $update_verification = $this->db->insert('order_verification_otp_requests',$otpInsert);
                $insert_status = $this->db->affected_rows();
                //send sms code end
                /*$result = $this->sendmail->sendEmail(
                                                array(
                                                    'to' => array($email),
                                                    'cc' => array('info@' . SITE_DOMAIN),
                                                    'bcc' => array(BCC_EMAIL),
                                                    'subject' => 'Order Verification ',
                                                    'data' => array('order_details' =>  $this->data['order_details'],'order_item_details' => $this->data['order_item_details']),
                                                    'template' =>'email-templates/order_success',
                                                )
                                            );*/
                     $response[CODE]=SUCCESS_CODE;
                    $response[MESSAGE]='success';
                    $response[DESCRIPTION]=' Verification code has been sent to mobile & email id please enter verification code and continue order';
           }
            
        }
       
    }

    echo json_encode($response);
}

public function verifyOrderOtp()
{
    $response=[]; $error=0;$error_msg='';
    $otpcode = $this->input->post('otpcode');
    if($otpcode == '')
    {
        $error=1;$error_msg='Please enter otp code';
    }
    if($error == 0)
    {
         $update = ['verification_status'=>1,'otp_entered_time'=>DATE];
         $where = ['otp_code'=>$otpcode,'cart_session'=>$this->cartsession,'verification_status'=>0];
         $updateOtpSql= $this->db->update('order_verification_otp_requests',$update,$where);
         $updateOtpStatus = $this->db->affected_rows();
         $response[CODE]=($updateOtpStatus > 0)?SUCCESS_CODE:FAIL_CODE;
         $response[MESSAGE]=($updateOtpStatus > 0)?'success':'fail';
         $response[DESCRIPTION]=($updateOtpStatus > 0)?'Otp verified successfully':'Invalid OTP Code or OTP expired.Please try again';
    }
    else
    {
        $response[CODE]=301;
        $response[MESSAGE]='Validation';
        $response[DESCRIPTION]=$error_msg;
    }
    echo json_encode($response);
}

public function teste()
{
             $data['img_url']="";
            $this->load->library('ciqrcode');
            $qr_image=rand().'.png';
			$params['data'] = 'Achari php';
			$params['level'] = 'H';
			$params['size'] = 8;
			$params['savename'] =FCPATH."uploads/qr_image/".$qr_image;
			if($this->ciqrcode->generate($params))
			{
				$data['img_url']=$qr_image;	
            }
            echo $data['img_url'];
}

public function onlinepayment($orderid)
{
      $where=['o.order_id'=>$orderid,'o.payment_status'=>0];
     
    $this->db->select('o.*,SUM(c.sub_total) as order_price')->from('orders_tbl o')
    ->join('cart_tbl c','c.order_id=o.order_id','inner')
    ->where($where);
    $sql = $this->db->get();
    $count = $sql->num_rows();
    if($count > 0)
    {
        $this->data['orderdetails']=json_encode($sql->row());
        $this->load->view('payment/pay_online', $this->data);
    }
    else
    {
        echo "error";
    }
    //$this->load->view('payment/pay_online', $this->data);
}

public function payrequest()
{
    $this->load->view('payment/ccavenue_request', $this->data);
}

public function paymentfail()
{
 include('Crypto.php');
    error_reporting(0);
	
	$workingKey='FDBBCEFF44B4E3223B4DC8D860C13D74';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==0){$order_id=$information[1];}
		if($i==1){$tracking_id=$information[1];}
		if($i==2){$bank_ref_no=$information[1];}
		if($i==3){$order_status=$information[1];}
		if($i==4){$failure_message=$information[1];}
		if($i==4){$payment_mode=$information[1];}
		if($i==5){$card_name=$information[1];}
		if($i==6){$status_code=$information[1];}
		if($i==7){$status_message=$information[1];}
		if($i==8){$currency=$information[1];}
		if($i==9){$amount=$information[1];}
		if($i==10){$billing_name=$information[1];}
		
		if($i==11){$billing_name=$information[1];}
		if($i==12){$billing_address=$information[1];}
		if($i==13){$billing_city=$information[1];}
		if($i==14){$billing_state=$information[1];}
		if($i==15){$billing_zip=$information[1];}
		if($i==16){$billing_country=$information[1];}
		if($i==17){$billing_tel=$information[1];}
		if($i==18){$billing_email=$information[1];}
		if($i==19){$delivery_name=$information[1];}
		if($i==20){$delivery_address=$information[1];}
		if($i==21){$delivery_city=$information[1];}
		if($i==22){$delivery_state=$information[1];}
		if($i==23){$delivery_zip=$information[1];}
		if($i==24){$delivery_country=$information[1];}
		if($i==25){$delivery_tel=$information[1];}
		
	}
	$params=[];
	$params['order_id']=$order_id;
	$params['tracking_id']=$tracking_id;
	$params['bank_ref_no']=$bank_ref_no;
	$params['order_status']=$order_status;
	$params['failure_message']=$failure_message;
	$params['payment_mode']=$payment_mode;
	$params['card_name']=$card_name;
	$params['status_code']=$status_code;
	$params['status_message']=$status_message;
	$params['currency']=$currency;
	$params['amount']=$amount;
	$params['billing_name']=$billing_name;
	$params['billing_address']=$billing_address;
	$params['billing_city']=$billing_city;
	$params['billing_state']=$billing_state;
	$params['billing_zip']=$billing_zip;
	$params['billing_country']=$billing_country;
	$params['billing_tel']=$billing_tel;
	$params['billing_email']=$billing_email;
	$params['delivery_name']=$delivery_name;
	$params['delivery_address']=$delivery_address;
	$params['delivery_city']=$delivery_city;
	$params['delivery_state']=$delivery_state;
	$params['delivery_zip']=$delivery_zip;
	$params['delivery_country']=$delivery_country;
	$params['delivery_tel']=$delivery_tel;
	$insert=$this->db->insert('ccavenue_payments',$params);
	
}

public function paymentsuccess()
{
    include('Crypto.php');
    error_reporting(0);
	$workingKey='FDBBCEFF44B4E3223B4DC8D860C13D74';		//Working Key should be provided here.
	$encResponse=$_POST["encResp"];			//This is the response sent by the CCAvenue Server
	$rcvdString=decrypt($encResponse,$workingKey);		//Crypto Decryption used as per the specified working key.
	$order_status="";
	$decryptValues=explode('&', $rcvdString);
	$dataSize=sizeof($decryptValues);
	for($i = 0; $i < $dataSize; $i++) 
	{
		$information=explode('=',$decryptValues[$i]);
		if($i==0){$order_id=$information[1];}
		if($i==1){$tracking_id=$information[1];}
		if($i==2){$bank_ref_no=$information[1];}
		if($i==3){$order_status=$information[1];}
		if($i==4){$failure_message=$information[1];}
		if($i==4){$payment_mode=$information[1];}
		if($i==5){$card_name=$information[1];}
		if($i==6){$status_code=$information[1];}
		if($i==7){$status_message=$information[1];}
		//if($i==8){$currency=$information[1];}
		if($i==9){$currency=$information[1];}
		if($i==10){$amount=$information[1];}
		
		if($i==11){$billing_name=$information[1];}
		if($i==12){$billing_address=$information[1];}
		if($i==13){$billing_city=$information[1];}
		if($i==14){$billing_state=$information[1];}
		if($i==15){$billing_zip=$information[1];}
		if($i==16){$billing_country=$information[1];}
		if($i==17){$billing_tel=$information[1];}
		if($i==18){$billing_email=$information[1];}
		if($i==19){$delivery_name=$information[1];}
		if($i==20){$delivery_address=$information[1];}
		if($i==21){$delivery_city=$information[1];}
		if($i==22){$delivery_state=$information[1];}
		if($i==23){$delivery_zip=$information[1];}
		if($i==24){$delivery_country=$information[1];}
		if($i==25){$delivery_tel=$information[1];}
		
	}
	$params=[];
	$params['order_id']=$order_id;
	$params['tracking_id']=$tracking_id;
	$params['bank_ref_no']=$bank_ref_no;
	$params['order_status']=$order_status;
	$params['failure_message']=$failure_message;
	$params['payment_mode']=$payment_mode;
	$params['card_name']=$card_name;
	$params['status_code']=$status_code;
	$params['status_message']=$status_message;
	$params['currency']=$currency;
	$params['amount']=$amount;
	$params['billing_name']=$billing_name;
	$params['billing_address']=$billing_address;
	$params['billing_city']=$billing_city;
	$params['billing_state']=$billing_state;
	$params['billing_zip']=$billing_zip;
	$params['billing_country']=$billing_country;
	$params['billing_tel']=$billing_tel;
	$params['billing_email']=$billing_email;
	$params['delivery_name']=$delivery_name;
	$params['delivery_address']=$delivery_address;
	$params['delivery_city']=$delivery_city;
	$params['delivery_state']=$delivery_state;
	$params['delivery_zip']=$delivery_zip;
	$params['delivery_country']=$delivery_country;
	$params['delivery_tel']=$delivery_tel;
//	print_r($params);
	$insert=$this->db->insert('ccavenue_payments',$params);
	//update details 
	$orderid=$this->db->select('order_id')->from('orders_tbl')->where('order_number',$order_id)->get()->row()->order_id;
	 $update = $this->db->update('orders_tbl',['payment_amount'=>$amount,'payment_status'=>1],['order_id'=>$orderid]);
	 //echo "cemin";exit;
    $url=base_url().'order-success/'.$orderid;
    echo "<a href=".$url.">click Here to view order details</a>";
}
}