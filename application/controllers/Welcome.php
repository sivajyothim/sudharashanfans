<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function index()
	{
		
	}

	public function pincodedetails($pincode)
	{
		$url = "http://postalpincode.in/api/pincode/".$pincode;
		$data = file_get_contents($url);
		$req=json_decode($data);
		//print_r($req);
		$status= strtolower($req->Status);
		$returnData=[
			'state'=>'',
			'taluka'=>'',
			'dist'=>'',
			'circle'=>'',
		];
		if($status=='success')
		{
			$statename=$req->PostOffice[0]->State;
			$taluka=$req->PostOffice[0]->Taluk;
			$dist=$req->PostOffice[0]->District;
			$circle = $req->PostOffice[0]->Circle;
			$stateName=strtolower(str_replace(' ','',$statename));
			$taluka=strtolower(str_replace(' ','',$taluka));
			$dist=strtolower(str_replace(' ','',$dist));
			$circle=strtolower(str_replace(' ','',$circle));
			$returnData=[
				'state'=>fetch_ucfirst($stateName),
				'taluka'=>fetch_ucfirst($taluka),
				'dist'=>fetch_ucfirst($dist),
				'circle'=>fetch_ucfirst($circle),
			];
		}
		echo json_encode($returnData);
	}
        
        
}
