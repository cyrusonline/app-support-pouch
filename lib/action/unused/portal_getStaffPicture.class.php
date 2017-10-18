<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");
require_once($CFG->dirroot_lib."/portal/ecampus.class.php");

class portal_getStaffPicture extends portal_action {

	function execute() {
		global $db,$CFG;

		$ecampus = eCampus::getInstance();
		$url = "https://ecampus.hsmc.edu.hk/moodle/myhsmc/staff/staffpicture.php";
		$ecampus = new eCampus($url);
		if ($_REQUEST['thumb']==null)$_REQUEST['thumb']=1;
		$result = $ecampus->getStaffPicture($_REQUEST['id'],$_REQUEST['thumb']);
		$_REQUEST['responseFormat'] = 'image';
		$this->response = $result;
		$ecampus->closeConnection();
	}

}
?>
