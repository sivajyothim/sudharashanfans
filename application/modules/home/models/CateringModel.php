<?php
defined('BASEPATH') or die("Something error occured");

class CateringModel extends CI_Model 
{
    public function __construct()
    {
        parent::__construct();
    }

    public function cateringList($params)
    {
            $response=[];
            $keyword = $params['search_keyword'];
            $vendor_path=base_url().'uploads/vendor/profilepic/';
            $cols ="v.vendor_code as vendor_code,v.vendor_authtoken as vendor_authtoken,v.business_name business_name,v.experienece as experienece,v.address as address,v.landmark as landmark,";
            $cols.="v.area as area,v.city as city,v.state as state,v.about_profile as about_profile,";
            $cols.="CONCAT('".$vendor_path."',v.proifile_picutre) as vendor_picture,v.rating as vendor_rating,v.services as available_services";
            $where=['v.profile_status'=>1];
            $this->db->select($cols)->from('vendor_info v');
            $this->db->where($where);
            if($keyword!='')
            {
                $this->db->group_start();
                $this->db->like('v.business_name',$keyword,'both');
                $this->db->or_like('v.area',$keyword,'both');
                $this->db->or_like('v.city',$keyword,'both');
                $this->db->group_end();
            }
            $sql = $this->db->order_by('v.rating DESC','v.vendor_id ASC')->limit(50)->get();
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
                    $response[DESCRIPTION]=($count > 0)?'Getting the catering list':'No results found';
                    $response['result_count']=$count;
                    $response['catering_result']=($count > 0)?$sql->result():(object)(null);
            }
            return json_encode($response);
    }

    public function functionHallList($params)
    {
        $response=[];
        $keyword = $params['search_keyword'];
        $venue_image_path=base_url().'uploads/venues/';
        $cols ="f.venue_unique_id as venue_id,f.venue_title as venue_name,f.seating_capacity as seating_capacity,";
        $cols.="f.price_ac as ac_price,f.price_non_ac as nonac_price,vt.venuetype_title as venuetype_name,f.liquor_availability as liquor,";
        $cols.="f.address as address,f.landmark as landmark,f.area as area,f.city as city,f.pincode as pincode,";
        $cols.="CONCAT('".$venue_image_path."',f.venue_image) as venue_image_link,f.vendor_id as vendor_id";
        $cols.=",f.rating as rating";
        $this->db->select($cols)->from('venues_tbl f')->join('master_venue_types vt','vt.venuetype_id=f.venue_type','inner');
        if($keyword!='')
            {
                $this->db->group_start();
                $this->db->like('f.venue_title',$keyword,'both');
                $this->db->or_like('f.landmark',$keyword,'both');
                $this->db->or_like('f.area',$keyword,'both');
                $this->db->or_like('f.city',$keyword,'both');
                $this->db->or_like('f.pincode',$keyword,'both');
                $this->db->group_end();
            }
        $sql = $this->db->order_by('f.price_non_ac','ASC')->get();
       // echo $this->db->last_query();
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
                $response[DESCRIPTION]=($count > 0)?'Getting the functionhall list':'No results found';
                $response['result_count']=$count;
                $response['functionhall_result']=($count > 0)?$sql->result():(object)(null);
        }
        return  json_encode($response);
    }

    /*>>Function Hall details */
    public function functionHallDetails($params)
    {
        $response=[];
        $venue_image_path=base_url().'uploads/venues/';
        $venue_org_image_path = base_url().'uploads/venues/original/';
        $cols ="f.venue_unique_id as venue_id,f.venue_title as venue_name,f.seating_capacity as seating_capacity,";
        $cols.="f.price_ac as ac_price,f.price_non_ac as nonac_price,vt.venuetype_title as venuetype_name,f.liquor_availability as liquor,";
        $cols.=",f.venue_description as venue_desc,f.advance_tax as advance,f.price_negotiation as price_negotiation,";
        $cols.="f.owner_name as owner_name,f.owner_contact_number as contact_number,f.outdoor_category_available as outside_catering_availale,";
        $cols.="f.address as address,f.landmark as landmark,f.area as area,f.city as city,f.pincode as pincode,";
        $cols.="CONCAT('".$venue_image_path."',f.venue_image) as venue_image_link,f.vendor_id as vendor_id,CONCAT('".$venue_org_image_path."',f.venue_original_pic) as venue_org_image_link,";
        $cols.="f.rating as rating";
        $this->db->select($cols)->from('venues_tbl f')->join('master_venue_types vt','vt.venuetype_id=f.venue_type','inner');
        $sql = $this->db->order_by('f.price_non_ac','ASC')->get();
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
                $response[DESCRIPTION]=($count > 0)?'Getting the functionhall list':'No results found';
                $response['result_count']=$count;
                $response['functionhall_result']=($count > 0)?$sql->result():(object)(null);
        }
        return  json_encode($response);
    }
    /*>>Function Hall details end*/

    //Vendor - Catering details module
    public function cateringVendorDetails($params)
    {
        $vendor_id=$params['vendor_id'];
        /*>>Getting profile detais */
        $vendorWhere = ['vendor_authtoken'=>$vendor_id];
        $this->db->select('*')->from('vendor_info')->where($vendorWhere);
        $profileSql =$this->db->limit(1)->get();
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
                $count = $profileSql->num_rows();
                $response[CODE]=($count > 0)?SUCCESS_CODE:FAIL_CODE;
                $response[MESSAGE]=($count > 0)?'success':'fail';
                $response[DESCRIPTION]=($count > 0)?'Getting the vendor details':'No results found';
                $response['result_count']=$count;
                $response['vendor_result']=($count > 0)?$profileSql->row():(object)(null);
        }
        return  json_encode($response);
        /*>>Getting profile end*/
    }
    // vendor related menu listing
    public function vendorRelatedMenuList($params)
    {
        $response=['menu_result'=>[]];
        $vendor_id=$params['vendor_id'];
        /*>>Getting profile detais */
        $menu_img_path = base_url().'uploads/catering/menus/';
        $menuWhere = ['m.vendor_id'=>$vendor_id];
        $cols ="m.menu_unique_id as menu_id,m.menu_title as menu_title,m.vendor_id as vendor_id,fr.food_religion_title as food_religion,m.veg_type as veg_type,";
        $cols.="CONCAT('".$menu_img_path."',m.menu_image) as menu_image,m.price_per_plate as price_per_plate";
        $this->db->select($cols)->from('catering_vendor_menulist m')
        ->join('master_food_religion fr','fr.food_religion_id=m.religion_id','inner');
        $this->db->where($menuWhere);
        $menuSql =$this->db->get();
        $dbError = $this->db->error();
        if($dbError['code']!=0)
        {
            $response[CODE] = FAIL_CODE;
            $response[MESSAGE] = 'Fail';
            $response[DESCRIPTION] =' Some thing error occured. Please inform to suppot team';
        }
        else
        {
                $count = $menuSql->num_rows();
                $response[CODE]=($count > 0)?SUCCESS_CODE:FAIL_CODE;
                $response[MESSAGE]=($count > 0)?'success':'fail';
                $response[DESCRIPTION]=($count > 0)?'Getting the menu details':'No results found';
                $response['result_count']=$count;
                if($count > 0)
                {
                    $menuArray=[];
                    foreach($menuSql->result() as $menu_res)
                    {
                        $menuid = $menu_res->menu_id;
                        foreach($menu_res as $k=>$v)
                        {
                            $menuArray[$k]=$v;
                        }
                        /*Menu related item list */
                        $menuArray['items']=[];
                        $itemWhere=['mv.vendor_id'=>$vendor_id,'mv.menu_id'=>$menuid];
                        $item_cols="mv.veg_type as veg_type,mv.menu_item_id as menu_item_id,vi.item_title as item_name,vi.item_price as item_price,vi.item_qty as item_qty,vi.vendor_item_id as vendor_item_id";
                        $this->db->select($item_cols)
                        ->from('catering_menu_items mv')
                        ->join('catering_vendor_items vi','vi.vendor_item_id=mv.vendor_item_id','inner');
                        $this->db->where($itemWhere);
                        $itemSql= $this->db->get();
                        $itemCount = $itemSql->num_rows();
                        if($itemCount > 0)
                        {
                            $itemArray=[];
                            foreach($itemSql->result() as $item_res)
                            {
                                foreach($item_res as $ik=>$iv)
                                {
                                    $itemArray[$ik]=$iv;
                                }
                                array_push($menuArray['items'],$itemArray);
                            }
                        }
                        /*Menu related item list end*/
                        array_push($response['menu_result'],$menuArray);
                    }
                }
        }
        return  json_encode($response);
        /*>>Getting profile end*/
    }
    
    //Catering Menu List
    public  function cateringMenuList($params)
    {
        $veg_type=$params['veg_type'];
        $response=['menu_result'=>[]];
        /*>>Getting profile detais */
        $menu_img_path = base_url().'uploads/catering/menus/';
        $menuWhere = [];
        if(!empty($veg_type))
        {
            $menuWhere = ['m.veg_type'=>($veg_type=='veg')?1:2];
        }
        $cols ="m.menu_unique_id as menu_id,m.menu_title as menu_title,m.vendor_id as vendor_id,fr.food_religion_title as food_religion,m.veg_type as veg_type,";
        $cols.="CONCAT('".$menu_img_path."',m.menu_image) as menu_image,m.price_per_plate as price_per_plate";
        $this->db->select($cols)->from('catering_vendor_menulist m')
        ->join('master_food_religion fr','fr.food_religion_id=m.religion_id','inner');
        $this->db->where($menuWhere);
        $menuSql =$this->db->get();
        $dbError = $this->db->error();
        if($dbError['code']!=0)
        {
            $response[CODE] = FAIL_CODE;
            $response[MESSAGE] = 'Fail';
            $response[DESCRIPTION] =' Some thing error occured. Please inform to suppot team';
        }
        else
        {
                $count = $menuSql->num_rows();
                $response[CODE]=($count > 0)?SUCCESS_CODE:FAIL_CODE;
                $response[MESSAGE]=($count > 0)?'success':'fail';
                $response[DESCRIPTION]=($count > 0)?'Getting the menu details':'No results found';
                $response['result_count']=$count;
                if($count > 0)
                {
                    $menuArray=[];
                    foreach($menuSql->result() as $menu_res)
                    {
                        $menuid = $menu_res->menu_id;
                        foreach($menu_res as $k=>$v)
                        {
                            $menuArray[$k]=$v;
                        }
                        /*Menu related item list */
                        $menuArray['items']=[];
                        $itemWhere=['mv.menu_id'=>$menuid];
                        $item_cols="mv.veg_type as veg_type,mv.menu_item_id as menu_item_id,vi.item_title as item_name,vi.item_price as item_price,vi.item_qty as item_qty,vi.vendor_item_id as vendor_item_id";
                        $this->db->select($item_cols)
                        ->from('catering_menu_items mv')
                        ->join('catering_vendor_items vi','vi.vendor_item_id=mv.vendor_item_id','inner');
                        $this->db->where($itemWhere);
                        $itemSql= $this->db->get();
                        $itemCount = $itemSql->num_rows();
                        if($itemCount > 0)
                        {
                            $itemArray=[];
                            foreach($itemSql->result() as $item_res)
                            {
                                foreach($item_res as $ik=>$iv)
                                {
                                    $itemArray[$ik]=$iv;
                                }
                                array_push($menuArray['items'],$itemArray);
                            }
                        }
                        /*Menu related item list end*/
                        array_push($response['menu_result'],$menuArray);
                    }
                }
        }
        return  json_encode($response);
        /*>>Getting profile end*/
    }
    
    public function singleVenueDetails($params)
    {
        $venueid=$params['venue_id'];
        $response=[];
        $venue_image_path=base_url().'uploads/venues/';
        $venue_org_image_path = base_url().'uploads/venues/original/';
        $venueWhere=['f.venue_unique_id'=>$venueid,'f.flag_status'=>1];
        $cols ="f.venue_unique_id as venue_id,f.venue_title as venue_name,f.seating_capacity as seating_capacity,";
        $cols.="f.price_ac as ac_price,f.price_non_ac as nonac_price,vt.venuetype_title as venuetype_name,f.liquor_availability as liquor,";
        $cols.=",f.venue_description as venue_desc,f.advance_tax as advance,f.price_negotiation as price_negotiation,";
        $cols.="f.owner_name as owner_name,f.owner_contact_number as contact_number,f.outdoor_category_available as outside_catering_availale,";
        $cols.="f.address as address,f.landmark as landmark,f.area as area,f.city as city,f.pincode as pincode,";
        $cols.="CONCAT('".$venue_image_path."',f.venue_image) as venue_image_link,f.vendor_id as vendor_id,CONCAT('".$venue_org_image_path."',f.venue_original_pic) as venue_org_image_link,";
        $cols.="f.rating as rating";
        $this->db->select($cols)->from('venues_tbl f')
                ->join('master_venue_types vt','vt.venuetype_id=f.venue_type','inner');
        $this->db->where($venueWhere);
        $sql = $this->db->order_by('f.price_non_ac','ASC')->limit(1)->get();
        //echo $this->db->last_query();exit;
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
                $response[DESCRIPTION]=($count > 0)?'Getting the functionhall details':'No results found';
                $response['result_count']=$count;
                $response['functionhall_result']=($count > 0)?$sql->row():(object)(null);
        }
        return json_encode($response);
    }
    
    //Related Venues list
    public  function relatedVenues($params)
    {
        $venueid=$params['venue_id'];
        $response=[];
        $venueWhere=['f.venue_unique_id !='=>$venueid,'f.flag_status'=>1];
        $venue_image_path=base_url().'uploads/venues/';
        $venue_org_image_path = base_url().'uploads/venues/original/';
        $cols ="f.venue_unique_id as venue_id,f.venue_title as venue_name,f.seating_capacity as seating_capacity,";
        $cols.="f.price_ac as ac_price,f.price_non_ac as nonac_price,vt.venuetype_title as venuetype_name,f.liquor_availability as liquor,";
        $cols.=",f.venue_description as venue_desc,f.advance_tax as advance,f.price_negotiation as price_negotiation,";
        $cols.="f.owner_name as owner_name,f.owner_contact_number as contact_number,f.outdoor_category_available as outside_catering_availale,";
        $cols.="f.address as address,f.landmark as landmark,f.area as area,f.city as city,f.pincode as pincode,";
        $cols.="CONCAT('".$venue_image_path."',f.venue_image) as venue_image_link,f.vendor_id as vendor_id,CONCAT('".$venue_org_image_path."',f.venue_original_pic) as venue_org_image_link,";
        $cols.="f.rating as rating";
        $this->db->select($cols)->from('venues_tbl f')->join('master_venue_types vt','vt.venuetype_id=f.venue_type','inner');
        $this->db->where($venueWhere);
        $sql = $this->db->order_by('f.price_non_ac','ASC')->get();
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
                $response[DESCRIPTION]=($count > 0)?'Getting the related functionhall list':'No results found';
                $response['result_count']=$count;
                $response['functionhall_result']=($count > 0)?$sql->result():(object)(null);
        }
        return  json_encode($response);
    }
    
    //Venue - Specification List
    public  function venueSpecificationList($params)
    {
        $response=[];
        $venue_id = $params['venue_id'];
        $specificationWhere=['vs.venue_id'=>$venue_id,'vs.flag_status'=>1];
        $cols="vs.specification_details as venue_specification,vs.venue_specification_id as v_specific_id,s.specification_title as specification";
        $this->db->select($cols)->from('venue_specification_details vs')
                ->join('master_venue_specifications s','s.specification_id=vs.specification_id','inner');
        $this->db->where($specificationWhere);
        $sql = $this->db->order_by('s.specification_title','ASC')->get();
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
                $response[DESCRIPTION]=($count > 0)?'Getting the venue related specifications':'No results found';
                $response['result_count']=$count;
                $response['venue_specification_result']=($count > 0)?$sql->result():(object)(null);
        }
        return  json_encode($response);
    }
    //Venue - Gallery
    public  function venueGallery($params)
    {
        $response=[];
        $venue_side_pic=base_url()."uploads/venues/sideimages/";
        $venue_id = $params['venue_id'];
        $where=['venue_id'=>$venue_id];
        $cols="venue_gallery_id as venue_gallery_id,vendor_id,venue_id,created_on,flag_status,CONCAT('".$venue_side_pic."',gallery_image) as gallery_image";
        $this->db->select($cols)->from('venue_gallery');
        $sql = $this->db->where($where)->order_by('venue_gallery_id','ASC')->get();
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
                $response[DESCRIPTION]=($count > 0)?'Getting the venue related gallery':'No results found';
                $response['result_count']=$count;
                $response['venue_gallery_result']=($count > 0)?$sql->result():(object)(null);
        }
        return  json_encode($response);
    }
    
}