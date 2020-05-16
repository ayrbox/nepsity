<?php echo ui_page_header('Manage Event', 'Live'); ?>
<div class="matter">
    <div class="container-fluid">
        <div class="row-fluid">            
            <div class="span12">
                <div class="row-fluid">
                    <div class="span12">                    
                        <?php echo ui_error_message($this->session->flashdata('error')); ?>
                        <?php echo ui_success_message($this->session->flashdata('success')); ?>                    
                    </div>
                </div>
                <div class="row-fluid">                    
                    <div class="span12">
                        <div class="widget wblue">
                            <div class="widget-head">
                                  <div class="pull-left">Events</div>
                                  <div class="widget-icons pull-right">
                                    <a href="#" class="wminimize"><i class="icon-chevron-up"></i></a> 
                                    <a href="#" class="wclose"><i class="icon-remove"></i></a>
                                  </div>
                                  <div class="clearfix"></div>
                                </div>                                
                           <div class="widget-content">                               
                                <table class="table table-bordered table-striped" id="eventlist">
                                    <thead>
                                        <tr>
                                            <?php echo ui_table_header('date', 'Date', $order_by, $ascending); ?>
                                            <?php echo ui_table_header('events.title', 'Event / Venue', $order_by, $ascending); ?>
                                            <th>Tickets</th>
                                            <th>&nbsp;</th>
                                        </tr>
                                    </thead>
                                    <tbody>                
                                        <?php foreach($events as $event): ?>
                                        <tr>
                                            <td><?php echo ns_date_format($event->date); ?></td>
                                            <td>
                                                <div class="table-thumbnail">
                                                    <?php echo img(
                                                        array('src' => site_url($event->image_thumb),
                                                        'class' => 'pic')
                                                    ); ?>
                                                    <div class="detail">
                                                        <?php echo anchor('event/details/'. $event->id, $event->title); ?>
                                                        <br/><?php echo $event->venue; ?>
                                                    </div>
                                                </div>
                                            </td>                                            
                                            <td><?php echo $event->tickets; ?></td>
                                            <td>
                                                <?php echo ui_btn_edit('portal/event/edit/'.$event->id); ?>
                                                <?php echo ui_btn_delete('portal/event/delete/'.$event->id); ?>
                                            </td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>            
                                </table>        
                            
                            </div>
                            
                            <div class="widget-foot">                
                                <?php echo form_dropdown('ddlSort', $sorting, $order_by.'|'.($ascending ? 'TRUE' : 'FALSE'), 'id="ddlSort" class="pull-left"'); ?>                
                                <div class="pagination pull-right">
                                    <ul>
                                        <li><a href="#">Prev</a></li>
                                        <li><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">Next</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                                        
                    </div>    
                </div>
            </div>
        </div>       
    </div>
 </div>