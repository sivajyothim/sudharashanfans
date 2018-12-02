<?php
class AdminModel extends CI_Model{
    function __construct() {
        parent::__construct();
        $this->adminid=  $this->session->userdata(ADMIN_SESS_CODE.'adminid');
    }
    public function adminLogin($params)
    {
         
        $response=array();
        // print_r($params).exit;
        $username=$params['username'];
        $password=md5($params['user_password']);
        $cols='admin_id as adminid,admin_name as name,admin_email as email,admin_mobile as mobile,admin_flag_status as profile_status';
        $this->db->select($cols)
                ->from('admin_tbl')
                ->where('admin_securecode',$password);
        $this->db->group_start();
        $this->db->where('admin_email',$username);
        $this->db->or_where('admin_mobile',$username);
        $this->db->group_end();
        $sql=  $this->db->limit(1)->get();
        $dbError=  $this->db->error();
        if($dbError['code']==0)
        {
            $count=$sql->num_rows();
            $response[CODE]=($count > 0)?SUCCESS_CODE:FAIL_CODE;
            $response[MESSAGE]=($count > 0)?'Success':'Fail';
            $response[DESCRIPTION]=($count > 0 )?'Login success..!':'Invalid credentials';
            $response['login_result']=($count > 0)?$sql->row():(object)(null);
        }
        else
        {
            $response[CODE]=DB_ERROR_CODE;
            $response[MESSAGE]='DB Error ';
            $response[DESCRIPTION]=(QUERY_DEBUG==1)?$dbError['message']:'Some thing error occured.';
        }
        return json_encode($response);
    }
    
    public function projectStatistics()
    {
        $response=array();
        $cols ="p.project_id as project_id,p.project_name as project_name,p.project_startdate as project_startdate,p.project_endate as project_endate,p.client_progress_percentage,p.work_progress_percentage as work_progress_percentage,p.about_project as about_project";
        $this->db->select($cols)->from('const_projects p');
        $sql = $this->db->order_by('p.project_id','ASC')->get();
        $dbError = $this->db->error();
        if($dbError['code']==0)
        {
            $count = $sql->num_rows();
            $response[CODE]=($count > 0)?SUCCESS_CODE:FAIL_CODE;
            $response[MESSAGE]=($count > 0)?'success':'fail';
            $response[DESCRIPTION]=($count > 0)?'Getting project results':'No projects found';
            $response['project_result']=($count > 0)?$sql->result():array();
        }
        else
        {
            $response[CODE]=DB_ERROR_CODE;
            $response[MESSAGE]='Fail';
            $response[DESCRIPTION]='Some thing error occured';
        }
        return json_encode($response);
    }
    
    
    public function clientStatistics()
    {
        $response=array();
        $cols ="c.client_id as client_id,c.company_id as company_id,c.client_code as client_code,c.client_name as client_name,c.flat as flat,CONCAT(c.address_one,address_two) as address,c.area as area,c.city as city,c.state as state,c.gst_no as gst_no,c.pan_no as pan_no,COUNT(p.project_id) as project_count";
        $this->db->select($cols)->from('const_clients_details c');
        $this->db->join('const_projects p','p.client_id=c.client_id','inner');
        $this->db->group_by('p.client_id');
        $sql = $this->db->order_by('c.client_id','ASC')->get();
        $dbError = $this->db->error();
        if($dbError['code']==0)
        {
            $count = $sql->num_rows();
            $response[CODE]=($count > 0)?SUCCESS_CODE:FAIL_CODE;
            $response[MESSAGE]=($count > 0)?'success':'fail';
            $response[DESCRIPTION]=($count > 0)?'Getting client results':'No client found';
            $response['client_result']=($count > 0)?$sql->result():array();
        }
        else
        {
            $response[CODE]=DB_ERROR_CODE;
            $response[MESSAGE]='Fail';
            $response[DESCRIPTION]='Some thing error occured';
        }
        return json_encode($response);
    }
           
}