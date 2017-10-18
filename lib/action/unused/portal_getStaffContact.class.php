<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");
require_once($CFG->dirroot_lib."/portal/ecampus.class.php");

class portal_getStaffContact extends portal_action {

	function execute() {
		global $db,$CFG;

		$ecampus = eCampus::getInstance();
		$url = "https://ecampus.hsmc.edu.hk/moodle/myhsmc/staff/contact.php";
		$ecampus = new eCampus($url);
		if ($_REQUEST['pagenum']===null)$_REQUEST['pagenum']=1;
		if ($_REQUEST['pagesize']===null)$_REQUEST['pagesize']=-1;
		$result = $ecampus->getStaffContact($_REQUEST['pagenum'],$_REQUEST['pagesize'],$_REQUEST['keyword']);


		$result = json_decode($result,true);
		for ($i=0;$i<count($result[0]['Rows']);$i++) {
            $titles = explode(";",$result[0]['Rows'][$i]["coappointment_title"]);
            $result[0]['Rows'][$i]["appointments"] = $titles;
			if(!empty($result[0]['Rows'][$i]["ext"])){

				$result[0]['Rows'][$i]["phone"] = "39635".$result[0]['Rows'][$i]["ext"];
			}
			$result[0]['Rows'][$i]["staff_img_src"] =  "?action_id=getStaffPicture&id=".$result[0]['Rows'][$i]["id"];
        }
		//$_REQUEST['responseFormat'] = 'text';
		$this->response = $result[0];
		$ecampus->closeConnection();
	}

}
?>
