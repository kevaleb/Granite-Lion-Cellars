<?php
require 'class.rc4crypt.php';
require 'class.xmlparser.php';
include 'CampaignMonitorUtils.php';   // Handy dandy utilities.

///// BEGIN Configuration //////

$CampaignMonitor_API_Key = "a3628cda66a283f3264b73c8884c22e5"; // Replace YOURAPIKEYHERE with your CampaignMonitor API Key.
                                             // How to find that?  Glad you asked, go here:
                                             // http://www.campaignmonitor.com/api/required/ to find this and the next few keys.

$CampaignMonitor_Client_ID = "a0c2325b11192cda8e6bb4f4b5b39a14";    // Replace CLIENTID with the Campaign Monitor Client ID.  See the above link.
$CampaignMonitor_List_ID = "e881f1f32a0c0584a5266443060d5f3f";        // Replace LISTID with the Campaign Monitor List ID.  See the above link.

/**
 * Use a custom field during checkout?  If true, check for the presence of $Custom_Field below.
 * If false, always subscribe the customer.  Use wisely.
 */
$Use_Custom_Field = False;

$Custom_Field = 'Subscribe';    // Name of the custom "Opt In" field during checkout.
$Custom_Field_Value = 'yes';    // The value of the custom field that indicates the customer's agreement.

$key = 'sk_test_3qZe9VyUejxdQ9vjdyhe1UH2';

////// END Configuration ///////


$_POST['FoxyData'] or die("error"); // Make sure we got passed some FoxyData

function fatal_error_handler($errno, $errstr, $errfile, $errline, $errcontext) {
	die($errstr);
	return true;
}
set_error_handler(fatal_error_handler);

$FoxyData = rc4crypt::decrypt($key, urldecode($_POST["FoxyData"]));

$data = new XMLParser($FoxyData);   // Parse that XML.
$data->Parse();

foreach ($data->document->transactions[0]->transaction as $tx) {
    $subscribe = !$Use_Custom_Field;

    if ($Use_Custom_Field && isset($tx->custom_fields[0]) && isset($tx->custom_fields[0]->custom_field)) {
        foreach ($tx->custom_fields[0]->custom_field as $field) {
            $subscribe = $subscribe ||
                ($field->custom_field_name[0]->tagData == $Custom_Field &&
                 $field->custom_field_value[0]->tagData == $Custom_Field_Value);
        }
    }

    if ($subscribe) {
        subscribe_user_to_list(// See CampaignMonitorUtils.php for documentation.
                array('first_name' => $tx->customer_first_name[0]->tagData,
                      'last_name' => $tx->customer_last_name[0]->tagData,
                      'email' => $tx->customer_email[0]->tagData),
                $CampaignMonitor_API_Key,
                $CampaignMonitor_Client_ID,
                $CampaignMonitor_List_ID);
    }
}

print "foxy";

?>
