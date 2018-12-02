<?php
defined('BASEPATH') or die('Some thing error occured');
class Orders extends CI_Controller
{
    public $order_folder,$data,$adminid;
    public function __construct() {
        parent::__construct();
        $this->order_folder='orders/';
        $this->adminid=  $this->session->userdata(ADMIN_SESS_CODE.'adminid');
        $this->data=array();
        $this->load->model(array('OrderModel'=>'order'));
    }
    
   

    /*>> Vendors List code start */
    public function index()
    {
        $this->data['main_title']="Manage Orders";
        $params=[];
        $params['order_type']='all';
        $this->data['order_type']='all';
        $this->data['order_details']=$this->order->all_orderlist($params);
        $this->load->view($this->order_folder."manage_orders",$this->data);
    }
    public function viewOrder($orderId)
    {
        $this->data['main_title']="View Order Details";
        $this->data['order_item_details']=$this->order->orderDetails($orderId);
//         echo $this->data['order_item_details'];exit;

        $this->load->view($this->order_folder."view_order",$this->data);
    }
    public function recentorders()
    {
        $this->data['main_title']="Recent Orders";
        $params=[];
        $params['order_type']='recent';
        $this->data['order_type']='recent';
        $this->data['order_details']=$this->order->all_orderlist($params);
        $this->load->view($this->order_folder."manage_orders",$this->data);
    }
    public function completedorders()
    {
        $this->data['main_title']="Completed Orders";
        $params=[];
        $params['order_type']='complete';
        $this->data['order_type']='complete';
        $this->data['order_details']=$this->order->all_orderlist($params);
        $this->load->view($this->order_folder."manage_orders",$this->data);
    }
    public function pendingorders()
    {
        $this->data['main_title']="pending Orders";
        $params=[];
        $params['order_type']='pending';
        $this->data['order_type']='pending';
        $this->data['order_details']=$this->order->all_orderlist($params);
        $this->load->view($this->order_folder."manage_orders",$this->data);
    }
    public function cancelledorders()
    {
        $this->data['main_title']="Cancelled Orders";
        //$this->data['order_details']=$this->vendor->all_vendorlist();
        $this->load->view($this->order_folder."manage_orders",$this->data);
    }
   
   public function suborderdetails()
   {
    $this->load->view($this->order_folder."suborder_view",$this->data);
   }
     

      
}
