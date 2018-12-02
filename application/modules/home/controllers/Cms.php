<?php 
defined('BASEPATH') or die('Some thing error occured');

class Cms extends CI_Controller
{
    public $data;
    public function __construct()
    {
        parent::__construct();
        $this->data=[];$params=[];
        $this->load->model(['HomeModel'=>'home','ProductModel'=>'product','CartModel'=>'cart']);
        $this->data['product_menu_details']=$this->product->all_fanTypeList();
        $params['cart_session']=$this->session->userdata('cartsession');
          $this->data['cartList'] = $this->cart->cartList($params);
          $this->data['cartStatistics'] = $this->cart->cartStatistics($params);
    }

    public function aboutus()
    {
        $this->load->view('cms/about',$this->data);
    }

    public function contactus()
    {   
        $this->load->view('cms/contact',$this->data);
    }
     public function blog()
    {   
        $this->load->view('cms/blog',$this->data);
    }
     public function blogDetail()
    {   
        $this->load->view('cms/blog-detail',$this->data);
    }
    public function privacy()
    {   
        $this->load->view('cms/privacy-policy',$this->data);
    }
    public function payment() {
        
        $this->load->view('cms/payment-policy', $this->data);
    }

    public function cancellation()
    {   
        $this->load->view('cms/cancellation',$this->data);
    }
    public function termscondition()
    {   
        $this->load->view('cms/terms',$this->data);
    }

    public function faqs()
    {   
        $this->load->view('cms/faqs',$this->data);
    }

}