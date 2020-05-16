<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed'); 

// ------------------------------------------------------------------------ 
// Ppal (Paypal IPN Class) 
// ------------------------------------------------------------------------ 

// If (and where) to log ipn to file 
$config['paypal_lib_ipn_log_file'] = BASEPATH . 'logs/paypal_ipn.log';
$config['paypal_lib_ipn_log'] = TRUE; 

/* What is the default currency? */ 
$config['paypal_lib_currency_code'] = 'GBP';

/* Enable Sandbox mode? */ 
$config['paypal_lib_sandbox_mode'] = TRUE;

/* Where are the buttons located at */
$config['paypal_lib_button_path'] = 'buttons';

$config['paypal_email'] = 'admin@nepsity.com';

$config['paypal_multiitem'] = TRUE;
