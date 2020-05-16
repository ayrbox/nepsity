<?php

class Orders_m extends MY_Model {
 
    protected $_table_name = 'orders';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';       
    protected $_timestamps = FALSE;
    
   
   
   public function update_order_number($id) {
       $order_number = $id . '-' . date('ymd');
       $data['order_number'] = $order_number;       
       $this->save($data, $id);
       
              
       return $order_number;
   }
   
   public function confirm_payment($order_number, $paypal_email, $payment_txn_id) {
       $data['paypal_email'] = $paypal_email;
       $data['paypal_txn_id'] = $payment_txn_id;              
       $this->update($data, array('order_number' => $order_number));       
       return TRUE;
   }     
}
   