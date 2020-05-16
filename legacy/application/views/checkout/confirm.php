<?php echo ui_page_header('Confirmation', '');?>
<div class="matter">        
    <div class="container-fluid">
        <div class="row-fluid">
            <div class="span6">
                <div class="widget wblue">
                    <div class="widget-head">
                        <div class="pull-left"><?php echo $event->title; ?></div>
                        <div class="widget-icons pull-right">
                            <!--<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>--> 
                            <!--<a href="#" class="wclose"><i class="icon-remove"></i></a>-->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-content">
                        <div class="padd invoice">                    
                            <div class="row-fluid">
                                <div class="span4">
                                    <h4><?php echo $event->title; ?></h4>
                                    <p>
                                    <?php echo $event->date;?> - <?php echo $event->time; ?><br/>
                                    <?php echo $event->venue;?>
                                    </p>
                                </div>
                            </div>
                            <div class="row-fluid">                      
                              <div class="span12">                                                       
                                <?php echo form_open('checkout/address'); ?>                        
                                <table class="table table-bordered" id="table_tickets">
                                  <thead>                                    
                                    <tr>                              
                                      <th>Ticket Type</th>
                                      <th>Price</th>
                                      <th>Quantity</th>
                                      <th>Amount</th>                                      
                                    </tr>
                                  </thead>
                                  <tbody>
                                                                                                        
                                    <?php foreach($this->cart->contents() as $cart_item): ?>
                                    <tr>                                        
                                        <td><?php echo $cart_item['name']; ?></td>
                                        <td><?php echo $this->cart->format_number($cart_item['price']); ?></td>
                                        <td><?php echo $cart_item['qty']; ?></td>                                        
                                        <td><?php echo $this->cart->format_number($cart_item['subtotal']); ?></td>                                                                               
                                    </tr>                                        
                                    <?php endforeach; ?> 

                                  </tbody>
                                  <tfoot>
                                  <tr>
                                        <td></td>
                                        <td></td>
                                        <td><strong>Total</strong></td>
                                        <td><strong><?php echo $this->cart->format_number($this->cart->total()); ?></strong></td>
                                        <td></td>
                                    </tr>                                    
                                  </tfoot>
                                </table>                        
                                <?php echo form_close();?>
                              </div>
                            </div>
                        </div>
                    </div>
                    <div class="widget-foot">&nbsp;</div>
              </div>
              
              <div class="widget wblue">
                    <div class="widget-head">
                        <div class="pull-left">Delivery Information</div>
                        <div class="widget-icons pull-right">
                            <!--<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>--> 
                            <!--<a href="#" class="wclose"><i class="icon-remove"></i></a>-->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-content">
                        <div class="padd">                            
                            <div class="span8">
                                <h4><?php echo $customer->name;?></h4>
                                <p>
                                    <?php echo $customer->address;?><br/>                                    
                                    <?php if($customer->address1) echo $customer->address1.'<br/>';?>
                                    <?php echo $customer->postcode;?><br/>
                                </p>
                            </div>
                            <div class="span4">
                                <h4>Contact</h4>
                                <p>
                                    <?php echo $customer->contact_number;?><br/>                                                                        
                                    <?php echo $customer->email;?><br/>
                                </p>
                            </div>
                            <div class="clearfix"></div>                            
                        </div>
                    </div>
                    <div class="widget-foot">&nbsp;</div>
                </div>
            </div>
            
            
            <div class="span6">
                <div class="widget wblue">
                    <div class="widget-head">
                        <div class="pull-left">Payments</div>
                        <div class="widget-icons pull-right">
                            <!--<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a>--> 
                            <!--<a href="#" class="wclose"><i class="icon-remove"></i></a>-->
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-content">
                        <div class="padd">
                            <h4>PayPal</h4>
                            <p>To pay using paypal please click the button below and you will be re-directed to make your payment.</p>                            
                            <p>A sigature a oas dflaksjdf alskdjf laskjd flaksdj f;lakjsdf ;aksjd f;kalsjd fklajsd f;lkajsd;flkasjdf</p>
                            <div class="clearfix"></div>                            
                        </div>
                    </div>
                    <div class="widget-foot">
                        <?php echo form_hidden('hd_event', $event_id); ?>                                            
                        <?php echo anchor('checkout/payment', 'Next', 'class = "btn btn-danger pull-right"' );?>
                        <div class="clearfix"></div>
                    </div>
                </div>                
            </div>
            </div>
        </div>        
</div>