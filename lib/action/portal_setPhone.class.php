<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_setPhone extends portal_action {

	function execute() {
		global $db,$CFG,$USER;


		$phone = $_REQUEST['phone'];

		$profileT = ptl_db::getTable("s_profile","db_support");
		$row = $profileT->getRow(array('user_id'=>$USER->id));

		if ($row['id']==null) {
			$rA = $profileT->insertRecord(array('user_id'=>$USER->id,'phone'=>$phone));
			$id = $rA['data'];
		}
		else {
			$id = $row['id'];
			$profileT->updateRecord(array('id'=>$id,'phone'=>$phone));
		}

			// $rA = $profileT->insertRecord(array('phone'=>$phone,'user_id'=>$USER->id));


		$valid = false;
		$out = array();
		if ($id>0) {
			$valid = true;
			$out['data'] = $id;
			$msg = 'Insert successfully!';
		}
		else {
			$msg = 'Fail to add';
		}
		$out['result'] = $valid;
		$out['error'] = $msg;

		$this->response = $out;
	}

}
?>
