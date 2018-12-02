<?php
defined('BASEPATH') or die('Some thing error occured');
class Settings extends CI_Controller
{
    public $settings_folder,$data,$adminid;
    public function __construct() {
        parent::__construct();
        $this->settings_folder='settings/';
        $this->adminid=  $this->session->userdata(ADMIN_SESS_CODE.'adminid');
        $this->data=array();
        $this->load->model(array('Settings_model'=>'settings'));
    }
    
   

    /*>> Communtites Module section code start */
    public function communities()
    {
        $this->data['main_title']="Manage Communities";
        $this->data['form_details']=[
                                        'form_id'=>'commmunity_form',
                                        'title_placeholder'=>'Community Title',
                                        'title_code_placeholder'=>'Community Code',
                                        'redirection_link'=>ADMIN_LINK.'Settings/communities',
                                    ];
        $this->data['community_details']=$this->settings->all_communityList();
        $this->load->view($this->settings_folder."community/view_communities",$this->data);
    }
     public function insertCommunity()
    {
        $response=array();
        $table_sno = $this->input->post('table_sno');
        $title = $this->input->post('title');
        $title_code= $this->input->post('title_code');
        $error=0;$error_msg='';
        
        if(!is_array($title)){$error=1;$error_msg.='Title are missing,';}
        if(!is_array($title_code)){$error=1;$error_msg.='Title Codes  missing,';}
        if($error == 1)
        {
            $error_msg = rtrim($error_msg,',');
            $response[CODE]=VALIDATION_CODE;
            $response[MESSAGE]='Validation';
            $response[DESCRIPTION]=$error_msg;
        }
        else if($error == 0)
        {
              $insertData=array();
              $duplication_data='';
              $table_count = count($table_sno);
              $bulkData=[
                   'created_by'=>$this->adminid,
                  'total_count'=>$table_count,
                  'title'=>$title,
                  'title_code'=>$title_code,
              ];
              $insert = $this->settings->insertBulkCommunities($bulkData);
              echo $insert;exit;
        }
        echo json_encode($response);  
    }

     /*>> Communtites Module section code End */

      /*>> Food Type Module section code start */
      public function fantype()
      {
          $this->data['main_title']="Manage Fan Type";
          $this->data['form_details']=[
                                          'form_id'=>'foodtype_form',
                                          'title_placeholder'=>'Fan Type Title',
                                          'title_code_placeholder'=>'Fan Type Code',
                                          'redirection_link'=>ADMIN_LINK.'Settings/fantype',
                                      ];
          $this->data['fantype_details']=$this->settings->all_fanTypeList();
          $this->load->view($this->settings_folder."foodtype/view_foodtype",$this->data);
      }
       public function insertFoodType()
      {
          $response=array();
      // print_r($_POST);exit;
         
          $table_sno = $this->input->post('table_sno');
          $title = $this->input->post('title');
          $title_code= $this->input->post('title_code');
          $error=0;$error_msg='';
          
          if(!is_array($title)){$error=1;$error_msg.='Title are missing,';}
          if(!is_array($title_code)){$error=1;$error_msg.='Title Codes  missing,';}
          if($error == 1)
          {
              $error_msg = rtrim($error_msg,',');
              $response[CODE]=VALIDATION_CODE;
              $response[MESSAGE]='Validation';
              $response[DESCRIPTION]=$error_msg;
          }
          elseif($error == 0)
          {
                $table_count = count($table_sno);
                $bulkData=[
                    'created_by'=>$this->adminid,
                    'total_count'=>$table_count,
                    'title'=>$title,
                    'title_code'=>$title_code,
                ];
                $insert = $this->settings->insertBulkFoodType($bulkData);
                echo $insert;exit;
          }
          echo json_encode($response);  
      }
      /*>> Food Type Module section code end */

      /*>> Food Type Module section code start */
      public function foodreligions()
      {
          $this->data['main_title']="Manage Food Religions";
          $this->data['form_details']=[
                                          'form_id'=>'foodreligion_form',
                                          'title_placeholder'=>'Food Religion Title',
                                          'title_code_placeholder'=>'Food Religion Code',
                                          'redirection_link'=>ADMIN_LINK.'Settings/foodreligions',
                                      ];
          $this->data['food_religion_details']=$this->settings->fetch_foodReligionList();
          $this->load->view($this->settings_folder."food_religion/view_food_religion",$this->data);
      }
      //Insert
       public function insertFoodReligions()
      {
          $response=array();
          $table_sno = $this->input->post('table_sno');
          $title = $this->input->post('title');
          $title_code= $this->input->post('title_code');
          $error=0;$error_msg='';
          
          if(!is_array($title)){$error=1;$error_msg.='Title are missing,';}
          if(!is_array($title_code)){$error=1;$error_msg.='Title Codes  missing,';}
          if($error == 1)
          {
              $error_msg = rtrim($error_msg,',');
              $response[CODE]=VALIDATION_CODE;
              $response[MESSAGE]='Validation';
              $response[DESCRIPTION]=$error_msg;
          }
          elseif($error == 0)
          {
                $table_count = count($table_sno);
                $bulkData=[
                    'created_by'=>$this->adminid,
                    'total_count'=>$table_count,
                    'title'=>$title,
                    'title_code'=>$title_code,
                ];
                $insert = $this->settings->insertBulkFoodReligion($bulkData);
                echo $insert;exit;
          }
          echo json_encode($response);  
      }
      /*>> Food Religion Module section code end */
      
      public function items()
      {
          $params=[];  
          $this->data['main_title']="Manage Items";
          $this->data['form_details']=[
                                          'form_id'=>'item_form',
                                          'title_placeholder'=>'Item Name (Roti,Rice,dhal etc..)',
                                          'title_code_placeholder'=>'Item Code',
                                          'redirection_link'=>ADMIN_LINK.'Settings/items',
                                      ];
          $this->data['food_type_details']=$this->settings->foodTypeList();
          
          $this->data['item_details']=$this->settings->all_itemsList($params);
          $this->load->view($this->settings_folder."items/manage_items",$this->data);
      }
      //Insert food items
      public function insertItems()
      {
          $response=array();
          $table_sno = $this->input->post('table_sno');
          $title = $this->input->post('title');
          $title_code= $this->input->post('title_code');
          $food_type_id = $this->input->post('food_type');
          $error=0;$error_msg='';
          
          if(!is_array($title)){$error=1;$error_msg.='Title are missing,';}
          if(!is_array($title_code)){$error=1;$error_msg.='Title Codes  missing,';}
          if($food_type_id==''){$error=1;$error_msg.='Food Type is  missing,';}
          if($error == 1)
          {
              $error_msg = rtrim($error_msg,',');
              $response[CODE]=VALIDATION_CODE;
              $response[MESSAGE]='Validation';
              $response[DESCRIPTION]=$error_msg;
          }
          elseif($error == 0)
          {
                $table_count = count($table_sno);
                $bulkData=[
                    'created_by'=>$this->adminid,
                    'total_count'=>$table_count,
                    'title'=>$title,
                    'title_code'=>$title_code,
                    'food_type_id'=>$food_type_id,
                ];
                $insert = $this->settings->insertBulkItems($bulkData);
                echo $insert;exit;
          }
          echo json_encode($response);  
      }

      /*
      | Manage Venue Type
      |
      */
      public function venuetype()
      {
          $params=[];  
          $this->data['main_title']="Manage Venue Types";
          $this->data['form_details']=[
                                          'form_id'=>'venuetype_form',
                                          'title_placeholder'=>'Venue Type (Banquet Hall etc..)',
                                          'title_code_placeholder'=>'Venue Type Code',
                                          'redirection_link'=>ADMIN_LINK.'Settings/venuetype',
                                      ];
          $this->data['venuetype_details']=$this->settings->all_venueTypeList($params);
          $this->load->view($this->settings_folder."venuetypes/manage_venue_types",$this->data);
      }
      //Insert food items
      public function insertVenueType()
      {
          $response=array();
          $table_sno = $this->input->post('table_sno');
          $title = $this->input->post('title');
          $title_code= $this->input->post('title_code');
          $error=0;$error_msg='';
          
          if(!is_array($title)){$error=1;$error_msg.='Venue type are missing,';}
          if(!is_array($title_code)){$error=1;$error_msg.='Venue type code  missing,';}
          
          if($error == 1)
          {
              $error_msg = rtrim($error_msg,',');
              $response[CODE]=VALIDATION_CODE;
              $response[MESSAGE]='Validation';
              $response[DESCRIPTION]=$error_msg;
          }
          elseif($error == 0)
          {
                $table_count = count($table_sno);
                $bulkData=[
                    'created_by'=>$this->adminid,
                    'total_count'=>$table_count,
                    'title'=>$title,
                    'title_code'=>$title_code,
                    
                ];
                $insert = $this->settings->insertBulkVenueTypes($bulkData);
                echo $insert;exit;
          }
          echo json_encode($response);  
      }
      /*
      | Manage Venue Type End
      |
      */
      //Event Type section code 

      public function eventtype()
      {
          $params=[];  
          $this->data['main_title']="Manage Event Types";
          $this->data['form_details']=[
                                          'form_id'=>'event_form',
                                          'title_placeholder'=>'Event Type (Engagement,Birth day party etc..)',
                                         
                                          'redirection_link'=>ADMIN_LINK.'Settings/eventtype',
                                      ];
          $this->data['eventtype_details']=$this->settings->all_eventTypeList($params);
          $this->load->view($this->settings_folder."eventtype/manage_event_types",$this->data);
      }

      public function insertEventType()
      {
          $response=array();
          $table_sno = $this->input->post('table_sno');
          $title = $this->input->post('title');
          $error=0;$error_msg='';
          
          if(!is_array($title)){$error=1;$error_msg.='event type are missing,';}
          
          if($error == 1)
          {
              $error_msg = rtrim($error_msg,',');
              $response[CODE]=VALIDATION_CODE;
              $response[MESSAGE]='Validation';
              $response[DESCRIPTION]=$error_msg;
          }
          elseif($error == 0)
          {
                $table_count = count($table_sno);
                $bulkData=[
                    'created_by'=>$this->adminid,
                    'total_count'=>$table_count,
                    'title'=>$title,
                ];
                $insert = $this->settings->insertBulkEventTypes($bulkData);
                echo $insert;exit;
          }
          echo json_encode($response);  
      }

      //Slider 
      public function slider()
      {
          $this->data['main_title']="Manage Slider";
          $this->data['form_details']=[
                                          'form_id'=>'slider_form',
                                          'title_placeholder'=>'Slider Title',
                                          'title_code_placeholder'=>'Food Type Code',
                                          'redirection_link'=>ADMIN_LINK.'Settings/sliders',
                                      ];
          $this->data['slider_details']=$this->settings->sliderList();
          $this->load->view($this->settings_folder."slider/manage_slider",$this->data);
      }


      public function uploadSlider()
      {
          $response=[];
          $slider_link = $this->input->post('slider_link');
          $slider_description= $this->input->post('slider_desc');
          $picture  = $_FILES['slider']['name'];
          $image_input_tempath=$_FILES['slider']['tmp_name'];
          $image_input_size=$_FILES['slider']['size'];
          
          $error=0;$error_message='';
          if($picture == ''){$error=0;$error_message.='upload venue image,';}
          if($image_input_size == 0){$error=0;$error_message.='upload valid venue image,';}
           
          if($error == 0)
          {
                      $this->load->library('Project_image');
                   
                      $sideImageParams=[
                                          'filename'=>$picture,
                                          'filepath'=>$image_input_tempath,
                                          'uploadpath'=>'uploads/slider/',
                                          'extension_name'=>'slider_'.mt_rand(0000,9999).'_'.time(),
                                          'width'=>'1519',
                                          'height'=>'500',
                                        ];
                      $sideImage=$this->project_image->crop($sideImageParams);
                      $sliderParams=[
                                      'slider_image'=>$sideImage,
                                      'slider_link'=>$slider_link,
                                      'slider_description'=>$slider_description,
                                      'created_on'=>DATE,
                                  ];
                      $uplodaSlider = $this->settings->insertSlider($sliderParams);
                      echo $uplodaSlider;exit;                
          }
          else
          {
              $errorMsg = rtrim($error_message,',');
              $response[CODE]=VALIDATION_CODE;
              $response[MESSAGE]='validation';
              $response[DESCRIPTION]=$errorMsg;
          }
          return json_encode($response);
          
      }

      public function deleteslider($sliderid)
      {
         // echo $sliderid;exit;
          $where = ['slider_id'=>$sliderid];
          $delete = $this->db->delete('master_sliders',$where);
          $delete_res = $this->db->affected_rows();
          redirect(ADMIN_LINK.'Settings/slider');
      }
}
