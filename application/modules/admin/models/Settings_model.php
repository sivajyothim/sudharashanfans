<?php
defined('BASEPATH') or die('Some thing error occured');
class Settings_model extends CI_Model
{
    public function __construct() {
        parent::__construct();
    }
    /* ------------------------------------------------------
    | Community Module Section start
    -----------------------------------------------------------*/
    /*>> Community List Module*/
    public function all_communityList()
    {
        $result =  $this->crud->singleTableData(
            [
                'table'=>'master_community',
                'cols'=>'*',
                'order_by'=>['column'=>'community_title','sort'=>'DESC'],
                'response_param'=>'community_result',
                'description_message'=>'Getting Community List',
                'debug'=>FALSE,
            ]
        );
        return $result;
    }

    public function insertBulkCommunities($params)
    {
        $response=[];
        $insertData=[];
        $total_count  = $params['total_count'];
        $title = $params['title'];
        $title_code = $params['title_code'];
        $created_by = $params['created_by'];
        $duplication_data='';
        for($i=0;$i<$total_count;$i++)
        {
            $i_title =strtolower($title[$i]);
            $i_title_code=strtolower($title_code[$i]);
            if(!empty($i_title) && !empty($i_title_code))
            {
                $title_duplication=  $this->crud->duplicationCheck(
                                                array(
                                                        'table'=>'master_community',
                                                        'column'=>'community_id',
                                                        'condition'=>array('community_title'=>$i_title),
                                                    )
                                            );
                if($title_duplication==0)
                {
                        $insertData[]=array(
                        'community_unique_id'=>'CMT'.md5(uniqid().'_'.time().'_'.$i),
                        'community_title'=>$i_title,
                        'community_code'=>$i_title_code,
                        'created_on'=>DATE,
                        'created_by'=>$created_by,
                        );
                }
                else
                {
                    $duplication_data.=$i_title.',';
                }
            }
        }
        $duplication_data=trim($duplication_data,',');
        if(is_array($insertData) && (count($insertData) > 0))
        {
            $insert = $this->db->insert_batch('master_community',$insertData);
            $response[CODE]=($insert)?SUCCESS_CODE:FAIL_CODE;
            $response[MESSAGE]=($insert)?'Success':'Fail';
            $disp_message='Communities added successfully';
            $response[DESCRIPTION]=($insert)?$disp_message:'Some thing error occured while inserting data';
        }
        else
        {
            $response[CODE]=VALIDATION_CODE;
            $response[MESSAGE]='Validation';
            $response[DESCRIPTION]='Some thing error occured. or '.$duplication_data .' duplication communities found';
        }
        return json_encode($response);

    }
    /* ------------------------------------------------------
    | Community Module Section End
    -----------------------------------------------------------*/
     /* ------------------------------------------------------
    | Food Type Module Section start
    -----------------------------------------------------------*/
    public function all_fanTypeList()
    {
        $result =  $this->crud->singleTableData(
            [
                'table'=>'master_fantype',
                'cols'=>'*',
                'order_by'=>['column'=>'fantype_title','sort'=>'DESC'],
                'response_param'=>'fantype_result',
                'description_message'=>'Getting Fan Type List',
                'debug'=>FALSE,
            ]
        );
        return $result;
    }

    //Insert Section
    public function insertBulkFoodType($params)
    {
        $table_name = 'master_foodtype';
        $duplication_data='';
        $response=[];
        $insertData=[];
        $total_count  = $params['total_count'];
        $title = $params['title'];
        $title_code = $params['title_code'];
        $created_by = $params['created_by'];
        for($i=0;$i<$total_count;$i++)
        {
            $i_title =strtolower($title[$i]);
            $i_title_code=strtolower($title_code[$i]);
            if(!empty($i_title) && !empty($i_title_code))
            {
                $title_duplication=  $this->crud->duplicationCheck(
                                                array(
                                                        'table'=>$table_name,
                                                        'column'=>'foodtype_id',
                                                        'condition'=>array('foodtype_title'=>$i_title),
                                                    )
                                            );
                if($title_duplication==0)
                {
                        $insertData[]=array(
                        'foodtype_unique_id'=>'FT'.md5(uniqid().'_'.time().'_'.$i),
                        'foodtype_title'=>$i_title,
                        'foodtype_code'=>$i_title_code,
                        'created_on'=>DATE,
                        'created_by'=>$created_by,
                        );
                }
                else
                {
                    $duplication_data.=$i_title.',';
                }
            }
        }
        $duplication_data=trim($duplication_data,',');
        if(is_array($insertData) && (count($insertData) > 0))
        {
            $insert = $this->db->insert_batch($table_name,$insertData);
            $response[CODE]=($insert)?SUCCESS_CODE:FAIL_CODE;
            $response[MESSAGE]=($insert)?'Success':'Fail';
            $disp_message='Food Types  added successfully';
            $response[DESCRIPTION]=($insert)?$disp_message:'Some thing error occured while inserting data';
        }
        else
        {
            $response[CODE]=VALIDATION_CODE;
            $response[MESSAGE]='Validation';
            $response[DESCRIPTION]='Some thing error occured. or '.$duplication_data .' duplication food types found';
        }
        return json_encode($response);

    }

    /* ------------------------------------------------------
    | Food Type Module Section End
    -----------------------------------------------------------*/


     /* ------------------------------------------------------
    | Food Religions Module Section start
    -----------------------------------------------------------*/
    public function fetch_foodReligionList()
    {
        $result =  $this->crud->singleTableData(
            [
                'table'=>'master_food_religion',
                'cols'=>'food_religion_unique_id as unique_id,food_religion_title as title,food_religion_code as title_code,created_on as created_on,created_by as created_by,modified_on as modified_on,modified_by as modified_by,flag_status as flag_status',
                'order_by'=>['column'=>'food_religion_title','sort'=>'DESC'],
                'response_param'=>'food_religion_result',
                'description_message'=>'Getting Food Religion List',
                'debug'=>FALSE,
            ]
        );
        return $result;
    }

    //Insert Section
    public function insertBulkFoodReligion($params)
    {
        $table_name = 'master_food_religion';
        $duplication_data='';
        $response=[];
        $insertData=[];
        $total_count  = $params['total_count'];
        $title = $params['title'];
        $title_code = $params['title_code'];
        $created_by = $params['created_by'];
        for($i=0;$i<$total_count;$i++)
        {
            $i_title =strtolower($title[$i]);
            $i_title_code=strtolower($title_code[$i]);
            if(!empty($i_title) && !empty($i_title_code))
            {
                $title_duplication=  $this->crud->duplicationCheck(
                                                array(
                                                        'table'=>$table_name,
                                                        'column'=>'food_religion_id',
                                                        'condition'=>array('food_religion_title'=>$i_title),
                                                    )
                                            );
                if($title_duplication==0)
                {
                        $insertData[]=array(
                        'food_religion_unique_id'=>'FR'.md5(uniqid().'_'.time().'_'.$i),
                        'food_religion_title'=>$i_title,
                        'food_religion_code'=>$i_title_code,
                        'created_on'=>DATE,
                        'created_by'=>$created_by,
                        );
                }
                else
                {
                    $duplication_data.=$i_title.',';
                }
            }
        }
        $duplication_data=trim($duplication_data,',');
        if(is_array($insertData) && (count($insertData) > 0))
        {
            $insert = $this->db->insert_batch($table_name,$insertData);
            $response[CODE]=($insert)?SUCCESS_CODE:FAIL_CODE;
            $response[MESSAGE]=($insert)?'Success':'Fail';
            $disp_message='Food Religions  added successfully';
            $response[DESCRIPTION]=($insert)?$disp_message:'Some thing error occured while inserting data';
        }
        else
        {
            $response[CODE]=VALIDATION_CODE;
            $response[MESSAGE]='Validation';
            $response[DESCRIPTION]='Some thing error occured. or '.$duplication_data .' duplication food religions found';
        }
        return json_encode($response);

    }

    /*>>------------------------------------------------------
    | Food Religions Module Section End
    -----------------------------------------------------------*/
    /*
    |>>-----------------------------------------------------
    | Items  modules Start
    |-----------------------------------------------------
    */
    public function all_itemsList($params)
    {
        $response=[];
        $result =  $this->crud->fetchDataWithJoins(
            [
                'table'=>'master_items item',
                'cols'=>'item.*,ft.foodtype_title as foodtype_title',
                'joins'=>[
                    [
                        'table'=>'master_foodtype ft',
                        'original_column'=>'ft.foodtype_unique_id',
                        'ref_column'=>'item.food_type_id',
                        'condition'=>'inner',
                    ]
                    ],
                'order_by'=>['column'=>'item.item_name','sort'=>'ASC'],
                //'where_condition'=>['item.flag_status'=>'1'],
                'response_param'=>'item_result',
                'description_message'=>'Getting Item List',
                'debug'=>false,
            ]
        );
        return  $result;
    }

    public function insertBulkItems($params)
    {
        $table_name = 'master_items';
        $duplication_data='';
        $response=[];
        $insertData=[];
        $total_count  = $params['total_count'];
        $title = $params['title'];
        $title_code = $params['title_code'];
        $created_by = $params['created_by'];
        $food_type_id  = $params['food_type_id'];
        for($i=0;$i<$total_count;$i++)
        {
            $i_title =strtolower($title[$i]);
            $i_title_code=strtolower($title_code[$i]);
            if(!empty($i_title) && !empty($i_title_code))
            {
                $title_duplication=  $this->crud->duplicationCheck(
                                                array(
                                                        'table'=>$table_name,
                                                        'column'=>'item_id',
                                                        'condition'=>array('item_name'=>$i_title),
                                                    )
                                            );
                if($title_duplication==0)
                {
                        $insertData[]=array(
                        'item_unique_id'=>'Item'.md5(uniqid().'_'.time().'_'.$i),
                        'item_name'=>$i_title,
                        'item_code'=>$i_title_code,
                        'food_type_id'=>$food_type_id,
                        'created_on'=>DATE,
                        'created_by'=>$created_by,
                        );
                }
                else
                {
                    $duplication_data.=$i_title.',';
                }
            }
        }
        $duplication_data=trim($duplication_data,',');
        if(is_array($insertData) && (count($insertData) > 0))
        {
            $insert = $this->db->insert_batch($table_name,$insertData);
            $response[CODE]=($insert)?SUCCESS_CODE:FAIL_CODE;
            $response[MESSAGE]=($insert)?'Success':'Fail';
            $disp_message='Items  added successfully';
            $response[DESCRIPTION]=($insert)?$disp_message:'Some thing error occured while inserting data';
        }
        else
        {
            $response[CODE]=VALIDATION_CODE;
            $response[MESSAGE]='Validation';
            $response[DESCRIPTION]='Some thing error occured. or '.$duplication_data .' duplication items found';
        }
        return json_encode($response);

    }
    /*
    |-----------------------------------------------------
    | Items  modules end
    |<<-----------------------------------------------------
    */

     /*
    |>>-----------------------------------------------------
    | Venue Type  modules Start
    |-----------------------------------------------------
    */
    public function all_venueTypeList($params)
    {
        $result =  $this->crud->singleTableData(
            [
                'table'=>'master_venue_types',
                'cols'=>'*',
                'order_by'=>['column'=>'venuetype_title','sort'=>'ASC'],
                'response_param'=>'venue_type_result',
                'description_message'=>'Getting Venue Type List',
                'debug'=>FALSE,
            ]
        );
        return $result;
    }

    public function insertBulkVenueTypes($params)
    {
        $table_name = 'master_venue_types';
        $duplication_data='';
        $response=[];
        $insertData=[];
        $total_count  = $params['total_count'];
        $title = $params['title'];
        $title_code = $params['title_code'];
        $created_by = $params['created_by'];
       
        for($i=0;$i<$total_count;$i++)
        {
            $i_title =strtolower($title[$i]);
            $i_title_code=strtolower($title_code[$i]);
            if(!empty($i_title) && !empty($i_title_code))
            {
                $title_duplication=  $this->crud->duplicationCheck(
                                                array(
                                                        'table'=>$table_name,
                                                        'column'=>'venuetype_id',
                                                        'condition'=>array('venuetype_title'=>$i_title),
                                                    )
                                            );
                if($title_duplication==0)
                {
                        $insertData[]=array(
                        'venuetype_unique_id'=>'VenueType'.md5(uniqid().'_'.time().'_'.$i),
                        'venuetype_title'=>$i_title,
                        'venuetype_code'=>$i_title_code,
                        'created_on'=>DATE,
                        'created_by'=>$created_by,
                        );
                }
                else
                {
                    $duplication_data.=$i_title.',';
                }
            }
        }
        $duplication_data=trim($duplication_data,',');
        if(is_array($insertData) && (count($insertData) > 0))
        {
            $insert = $this->db->insert_batch($table_name,$insertData);
            $response[CODE]=($insert)?SUCCESS_CODE:FAIL_CODE;
            $response[MESSAGE]=($insert)?'Success':'Fail';
            $disp_message='Venue Types  added successfully';
            $response[DESCRIPTION]=($insert)?$disp_message:'Some thing error occured while inserting data';
        }
        else
        {
            $response[CODE]=VALIDATION_CODE;
            $response[MESSAGE]='Validation';
            $response[DESCRIPTION]='Some thing error occured. or '.$duplication_data .' duplication venue types found';
        }
        return json_encode($response);

    }
    /*
    |-----------------------------------------------------
    | Venue Type  modules end
    |<<-----------------------------------------------------
    */

    /*
    |-----------------------------------------------------
    | Master Data modules Start
    |-----------------------------------------------------
    */
    public function foodTypeList()
    {
        $result =  $this->crud->singleTableData(
            [
                'table'=>'master_foodtype',
                'cols'=>'foodtype_title as title,foodtype_unique_id as unique_id',
                'order_by'=>['column'=>'foodtype_title','sort'=>'DESC'],
                'where_condition'=>['flag_status'=>1],
                'response_param'=>'foodtype_result',
                'description_message'=>'Getting Food Type List',
                'debug'=>FALSE,
            ]
        );
        return $result;
    }
    /*
    |-----------------------------------------------------
    | Master Data modules End
    |----------------------------------------------------- 
    */

    public function all_eventTypeList($params)
    {
        $result =  $this->crud->singleTableData(
            [
                'table'=>'master_event_types',
                'cols'=>'*',
                'order_by'=>['column'=>'event_type_title','sort'=>'ASC'],
                'response_param'=>'event_type_result',
                'description_message'=>'Getting event type list',
                'debug'=>FALSE,
            ]
        );
        return $result;
    }

    public function insertBulkEventTypes($params)
    {
        $table_name = 'master_event_types';
        $duplication_data='';
        $response=[];
        $insertData=[];
        $total_count  = $params['total_count'];
        $title = $params['title'];
        $created_by = $params['created_by'];
       
        for($i=0;$i<$total_count;$i++)
        {
            $i_title =strtolower($title[$i]);
           
            if(!empty($i_title))
            {
                $title_duplication=  $this->crud->duplicationCheck(
                                                array(
                                                        'table'=>$table_name,
                                                        'column'=>'event_type_id',
                                                        'condition'=>array('event_type_title'=>$i_title),
                                                    )
                                            );
                if($title_duplication==0)
                {
                        $insertData[]=array(
                        'event_type_unique_id'=>'EventType'.md5(uniqid().'_'.time().'_'.$i),
                        'event_type_title'=>$i_title,
                        'created_on'=>DATE,
                        'created_by'=>$created_by,
                        );
                }
                else
                {
                    $duplication_data.=$i_title.',';
                }
            }
        }
        $duplication_data=trim($duplication_data,',');
        if(is_array($insertData) && (count($insertData) > 0))
        {
            $insert = $this->db->insert_batch($table_name,$insertData);
            $response[CODE]=($insert)?SUCCESS_CODE:FAIL_CODE;
            $response[MESSAGE]=($insert)?'Success':'Fail';
            $disp_message='Event Types  added successfully';
            $response[DESCRIPTION]=($insert)?$disp_message:'Some thing error occured while inserting data';
        }
        else
        {
            $response[CODE]=VALIDATION_CODE;
            $response[MESSAGE]='Validation';
            $response[DESCRIPTION]='Some thing error occured. or '.$duplication_data .' duplication event  types found';
        }
        return json_encode($response);

    }


     //Create  Slider
     public function insertSlider($params)
     {
         $response=[];
         $sliderSql= $this->db->insert_string('master_sliders',$params);
         $slider= $this->db->query($sliderSql);
         $insertStatus = $this->db->affected_rows();
         $response[CODE] = ($insertStatus > 0)?SUCCESS_CODE:FAIL_CODE;
         $response[MESSAGE] =($insertStatus > 0)?'success':'fail';
         $response[DESCRIPTION] =($insertStatus > 0)?'Slider added successfully':'Some thing went wrong.';
         return json_encode($response);
     }
    
     public function sliderList()
     {
        $result =  $this->crud->singleTableData(
            [
                'table'=>'master_sliders',
                'cols'=>'*',
                'order_by'=>['column'=>'slider_id','sort'=>'ASC'],
                'response_param'=>'slider_result',
                'description_message'=>'Getting slider list',
                'debug'=>FALSE,
            ]
        );
        return $result;
     }
}
