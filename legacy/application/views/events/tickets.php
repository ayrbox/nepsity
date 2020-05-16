<?php echo ui_page_header('Tickets', '');?>
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
                                <div class="span12">
                                    <img src='<?php echo site_url($event->image_banner); ?>' style="width:100%; height:100%;" />                        
                                </div>                                  
                                <div class="span12">
                                    <h4><?php echo $event->title; ?></h4>
                                    <h5><?php echo $event->date;?> - <?php echo $event->time; ?></h5>
                                    <h5><?php echo $event->venue;?></h5>
                                    <p><?php echo $event->description;?></p>
                                </div>
                            </div>                    
                        </div>
                    </div>
                    <div class="widget-foot">&nbsp;</div>
              </div>
            </div>            
            <div class="span6">
              <div class="widget wgreen">
                <div class="widget-head">
                  <div class="pull-left">Details</div>
                  <div class="widget-icons pull-right">
                    <!--<a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                    <a href="#" class="wclose"><i class="icon-remove"></i></a>-->
                  </div>
                  <div class="clearfix"></div>
                </div>

                <div class="widget-content">
                  <div class="padd">

                      <?php if(count($event_tickets)):?>
                    <div class="row-fluid">                      
                      <div class="span12">
                        <hr>                        
                        <?php echo form_open(); ?>                        
                        <table class="table table-bordered" id="table_tickets">
                          <thead>
                            <tr>
                                <td colspan="5">
                                    <?php if(isset($message)) echo ui_error_message($message); ?>
                                </td>
                            </tr>
                            <tr>                              
                              <th>Ticket Type</th>
                              <th>Price</th>
                              <th>Quantity</th>
                              <th>Amount</th>
                              <th>Status</th>                              
                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach($event_tickets as $event_ticket): ?>
                            <tr>
                              <td>
                                  <?php echo $event_ticket->ticket_type;?>
                                  <?php echo form_hidden('hd_ticket_type_id[]', $event_ticket->ticket_type_id); ?>                                                                    
                                  <?php echo form_hidden('hd_event_ticket_id[]', $event_ticket->id); ?>
                                  <?php echo form_hidden('hd_ticket[]', $event_ticket->ticket_description); ?>
                              </td>
                              <td>
                                  <?php echo $event_ticket->price;?>
                                  <?php echo form_hidden('hd_ticket_price[]', $event_ticket->price); ?>
                              </td>
                              <td><?php echo form_dropdown('ticket_quantity[]', $ticket_quantity, 0, 'style=width:auto;');?></td>
                              <td>0.00</td>                                                          
                              <td><span class="label label-success"><?php echo $event_ticket->status; ?></span></td>                                                                                    
                            </tr>
                            <?php endforeach;?>                                                                                
                          </tbody>
                          <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><strong>Total</strong></td>
                                <td><strong>0.00</strong></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td colspan="5">                                    
                                    <?php echo form_hidden('hd_event', $event_id); ?>
                                    <?php echo form_button(array('class' => 'btn btn-danger pull-right', 'id'=>'btnBuy', 'name'=>'btnBuy', 'type' => 'submit', 'content' => 'Buy')); ?>
                                    <div class="clearfix"></div>
                                </td>
                            </tr>
                          </tfoot>                             
                        </table>
                        <?php echo form_close();?>
                      </div>
                    </div>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
</div>
<script type="text/javascript" language="javascript">
    $(function() {
       $('select','#table_tickets').change(function() {            
            _row = $(this).parent().parent();            
            var _price = ($('td:nth(1) input:hidden', _row).val());
            var _qty = ($(this).val());            
            var _amount = parseFloat(_qty * _price).toFixed(2);            
            $('td:nth(3)', _row).html(_amount);
            
                                              
            var _total = 0;
            $('tbody > tr', '#table_tickets').each(function (_index, item) {                               
                _total += parseFloat($('td:nth(3)', item).text());                                                                                   
            });            
            $('tfoot > tr:nth(0) > td:nth(3)').html('<strong>' + _total.toFixed(2) + '</strong>');
      }); 
    });
</script>
