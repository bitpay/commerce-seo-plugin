<?php

  require('library/bp_lib.php');
  include('../../includes/application_top_callback.php'); 
  //bpLog("reached callback page");
  $response = bpVerifyNotification(MODULE_PAYMENT_BITPAY_APIKEY);

  if (is_string($response)) {
    bpLog('bitpay callback error: '.$response);
  } 
  else {
   
    $order_id = $response['posData'];
    
    switch($response['status']) {
      case 'confirmed':
      case 'complete':
        xtc_db_query("update " . TABLE_ORDERS . " set orders_status = " . MODULE_PAYMENT_BITPAY_PAID_STATUS_ID . " where orders_id = " . intval($order_id));
        break;
      case 'expired':
        xtc_remove_order($order_id, $restock = true);
        break;
    }
  }

?>