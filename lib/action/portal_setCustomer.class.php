<?php

global $CFG;
if ($CFG===null) exit;
require_once($CFG->dirroot_lib."/portal/portal_action.class.php");

class portal_setCustomer extends portal_action {

	function execute() {
		global $db,$CFG,$USER;


		$firstname = $_REQUEST['firstname'];
		$lastname = $_REQUEST['lastname'];
		$email = $_REQUEST['email'];

		$customerT = ptl_db::getTable("customers","db_support");
		// $row = $favouriteT->getRow(array('user_id'=>$USER->id,'category'=>$category,'contact_id'=>$contact_id));
		// if ($row['id']==null) {
		// 	$rA = $favouriteT->insertRecord(array('user_id'=>$USER->id,'category'=>$category,'contact_id'=>$contact_id,'favorites'=>'Y'));
		// 	$id = $rA['data'];
		// }
		// else {
		// 	$id = $row['id'];
		// 	$favouriteT->updateRecord(array('id'=>$id,'favorites'=>$_REQUEST['favorites']));
		// }

			$rA = $customerT->insertRecord(array('first_name'=>$firstname,'last_name'=>$lastname,'email'=>$USER->id));


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
