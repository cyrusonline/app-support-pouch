<?php

global $CFG;
if ($CFG === null)
    exit;
require_once($CFG->dirroot_lib . "/portal/portal_action.class.php");

class portal_setRequest extends portal_action
{

    function execute()
    {
        global $db, $CFG, $USER;


        $requestT     = ptl_db::getTable("s_request", "db_support");
        $requestItemT = ptl_db::getTable("s_request_items", "db_support");

        $phone = $_REQUEST['phone'];
        $date  = date('Y-m-d H:i:s');

        $event_title   = $_REQUEST['event_title'];
        $raw_eventdate = htmlentities($_REQUEST['event_title']);
        // $event_time = date('Y-m-d H:i:s',strtotime($_REQUEST['event_time']));
        $event_time    = date("Y-m-d H:i:s", strtotime($raw_eventdate));
        $location      = $_REQUEST['location'];
        $details       = $_REQUEST['details'];
        //uploading images....
        $image         = $_REQUEST['image'];
        $support_id    = $_REQUEST['support_id'];

        $support_items_needed = explode(',', $_REQUEST['support_item_needed']);

        // $target = "images/".basename($_FILES[$image]['name']);
        // $target = "images/".$image;
        $target = $CFG->dirroot_portal . "/images/" . $image;




        if (move_uploaded_file($image, $target)) {
            $msg = "Image uploaded successfully";
        } else {
            $img = "There was a problem uploading image";
        }
        var_dump($img);



        $rA = $requestT->insertRecord(array(
            'request_date' => $date,
            'user_id' => $USER->id,
            'event_title' => $event_title,
            'location' => $location,
            'details' => $details,
            'image' => $image,
            'support_item_needed' => $support_items_needed,
            'support_id' => $support_id,
            'status_id'=>1

        ));
        $id = $rA['data'];


        // $rA = $requestT->insertRecord(array('phone'=>$phone,'user_id'=>$USER->id));


        for ($i = 0; $i < count($support_items_needed); $i++) {
            $data = array(
                'request_id' => $id,
                'item_id' => $support_items_needed[$i]
            );
            $rA2  = $requestItemT->insertRecord($data);
        }

        $valid        = false;
        $out          = array();
        $out['items'] = $items;
        if ($id > 0) {
            $valid       = true;
            $out['data'] = $id;
            $msg         = 'Insert successfully!';
        } else {
            $msg = 'Fail to add';
        }
        $out['result'] = $valid;
        $out['error']  = $msg;

        $this->response = $out;
        echo $out;
    }


}
?>
