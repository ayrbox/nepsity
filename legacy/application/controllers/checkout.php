<?php

class Checkout extends Front_Controller {
    
    public function __construct() {
        parent::__construct();
        
        $this->load->model('event_m');
        $this->load->model('event_ticket_m');
        $this->load->model('customer_m');
        
        $this->load->library('cart');
    }
    
    
    public function index() {
        $this->address();        
    }
    
    public function confirm() {
        
                       
        $event_id = $data['event_id'];        
        
        //event information
        $this->data['event_id'] = $event_id;
        $this->data['event'] = $this->event_m->get_event_details($event_id, TRUE);        
        $this->data['event_tickets'] = $this->event_ticket_m->get_event_tickets($event_id);
                
        //customer information
        $this->data['customer'] = $this->session->userdata('customer');
        
        $this->data['page_view'] = 'checkout/confirm';
        $this->load->view('_layout_main', $this->data);
                       
    }
    
    

    public function address() {
        
        $rules = $this->customer_m->rules;                
        $this->form_validation->set_rules($rules);                       
        if($this->form_validation->run()== TRUE) {
            
            //save customer information            
            $customer = $this->customer_m->object_from_post(array('name', 'address', 'address1', 'postcode', 'contact_number', 'email'));            
            $this->session->set_userdata('customer', $customer);
            
            //redirect to confirmation            
            redirect('checkout/confirm');            
        }

        $this->data['page_view'] = 'checkout/address';        
        $this->load->view('_layout_main', $this->data);
    }
    
    
    public function payment() {
               
        /*$data = array(
            'event_id' => $this->input->post('hd_event'),
            'ticket_type_id' => $this->input->post('hd_ticket_type_id'),
            'ticket_price' => $this->input->post('hd_ticket_price'),
            'ticket_quantity' =>$this->input->post('ticket_quantity')
        );*/
        

        //save customer
        $customer = $this->session->userdata('customer');               
            $data['name'] = $customer->name;
            $data['address'] = $customer->address;
            $data['address1'] = $customer->address1;
            $data['postcode'] = $customer->postcode;
            $data['contact_number'] = $customer->contact_number;
            $data['email'] = $customer->email;        
        $customer_id = $this->customer_m->save($data, NULL);
        
        //save order
        $order = array(
            'order_date' => ns_date(),           
            'customer_id' => $customer_id,
            'delivery_id' => 0,
            'delivery_charge' => 0,                      //DELIVERY_CHARGE
            'amount' => $this->cart->total(),           //TICKET_AMOUNT
            'total_amount' => $this->cart->total(),     //TICKET_AMOUNT + DELIVERY_CHARGE
            'status' => 'just ordered',
            'note' => 'order not confirmed yet');        
        $this->load->model('orders_m');
        $order_id = $this->orders_m->save($order, NULL);
        
        $order_number = $this->orders_m->update_order_number($order_id);
        
        //save order details
        $this->load->model('order_details_m');
        
        foreach($this->cart->contents() as $cart_item) {
        
            $order_details = array(
                'order_id' => $order_id,
                'ticket_type_id' => $cart_item['id'],
                'ticket_type' => $cart_item['name'],
                'quantity' => $cart_item['qty'],
                'price' => $cart_item['price'],
                'amount' => $cart_item['subtotal']);
                
            $this->order_details_m->save($order_details, NULL);                           
        }


        $this->load->library('Paypal_Lib');        
        $this->paypal_lib->add_field( 'business', $this->config->item( 'paypal_email' )); 
        $this->paypal_lib->add_field( 'return', site_url( 'checkout/complete' ) );         
        $this->paypal_lib->add_field( 'cancel_return', site_url( 'checkout/cancel' ) ); 
        $this->paypal_lib->add_field( 'notify_url', site_url( 'checkout/ipn' ) );         // <-- IPN url 
    
        $item_index = 1;
        foreach($this->cart->contents() as $cart_item) {
            
            $this->paypal_lib->add_field( 'item_name_' . $item_index, $cart_item['name'] );
            $this->paypal_lib->add_field('item_number_' . $item_index, $index);         
            $this->paypal_lib->add_field( 'amount_' . $item_index, $cart_item['price']);
            $this->paypal_lib->add_field('quantity_' . $item_index, $cart_item[qty]);
            
            $item_index++;                        
        }
        
        $this->paypal_lib->add_field( 'custom', $order_number );
                        
        $this->session->set_userdata('order_number', $order_number);                               
        redirect( $this->paypal_lib->paypal_get_request_link() );
    }
    
    
    public function complete() {
        $this->cart->destroy();
        
        $this->data['order_number'] = $this->session->userdata['order_number'];
        $this->data['page_view'] = 'checkout/complete';
        $this->load->view('_layout_main', $this->data);
    }
    
    public function cancel() {
                
        redirect('checkout/confirm');
        
    }
    
    public function ipn() {
        $this->load->library('Paypal_Lib');
        if($this->paypal_lib->validate_ipn()) {
            $item_name = $this->paypal_lib->ipn_data['item_name'];
            $price = $this->paypal_lib->ipn_data['mc_gross'];
            $currency = $this->paypal_lib->ipn_data['mc_currency'];
            $payer_email = $this->paypal_lib->ipn_data['payer_email'];
            
            $txn_id = $this->paypal_lib->ipn_data['txn_id'];
            $order_number = $this->paypal_lib->ipn_data['transaction_subject'];
 
 
            $this->load->model('orders_m');
            $this->orders_m->confirm_payment($order_number, $payer_email, $txn_id);
            
            //sending email to buyer            
            //$this->orders_m->get();                      
        }
    } 
}