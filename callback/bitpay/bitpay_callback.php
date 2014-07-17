<?php

/**
 * The MIT License (MIT)
 * 
 * Copyright (c) 2011-2014 BitPay
 * 
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 * 
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 * 
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

  require('library/bp_lib.php');
  include('../../includes/application_top_callback.php');
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
