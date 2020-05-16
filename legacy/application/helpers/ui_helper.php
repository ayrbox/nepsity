<?php


function ui_btn_edit($uri) {
    return anchor($uri, '<i class="icon-pencil"></i>', 'class="btn btn-mini btn-warning" title="Edit"');
}


function ui_btn_delete($uri) {
    return anchor($uri, '<i class="icon-remove"></i>',
        array('onclick'=>'return confirm(\'You are about to delete. This cannot be undone. Are you sure?\')',
        'class' => 'btn btn-mini btn-danger',
        'title' => 'Delete') 
   );
}

function ui_widget_open($title, $color_class = 'wblue') {    
    return '<div class="widget '.$color_class.'">
                <div class="widget-head">
                    <div class="pull-left">'.$title.'</div>                    
                  <div class="clearfix"></div>
                </div>
           <div class="widget-content" style="display: block;">';
}

function ui_widget_close($html = NULL) {
    $_html = '</div>';
    
    if($html) {
        $_html .= '<div class="widget-foot">'.$html.'</div>'; 
    }    
    $_html .= '</div>';
    return $_html;
    
}


function ui_page_header($title, $subTitle, $breadcrumb = array()) {
    
   return '<!-- Page heading -->
<div class="page-head">    
    <h2 class="pull-left">'.$title.'
          <span class="page-meta">'.$subTitle.'</span>
    </h2>    
    <div class="clearfix"></div>
</div>
<!-- Page heading ends -->';
    
}


function ui_error_message($message) {
    
    
    if($message != NULL)    
        return '<div class="alert alert-error">'.$message.'</div>';
    else 
        return '';
}


function ui_success_message($message) {
    if($message != NULL)    
        return '<div class="alert alert-success">'.$message.'</div>';
    else 
        return '';
}

function ui_hidden($id, $value) {
    
    return '<input type="hidden" name="'.$id.'" value="'.$value.'" id="'.$id.'">';    
        
}

function ui_table_header($field, $caption,  $order_by, $ascending) {
    $_html = '<th data-sort="'.$field.'"'; 
    
    if($field == $order_by) {
        $_html .= 'data-ascending = ' . ($ascending ? '"TRUE"' : '"FALSE"');        
    } else {
        $_html .= 'data-ascending = "TRUE"';
    }    
    $_html .= ' class = "pointer" >';
    
    if($field == $order_by) {
        $_html .= '&nbsp;<i class="icon-chevron-'.($ascending ? 'up' : 'down').'"></i>&nbsp;';
    }
    
    $_html .= $caption;
    $_html .= '</th>';
    
    return $_html;
}


function ui_facebook_button($url) {
    if($url != null) {        
        return anchor($url, '<i class="icon-facebook icon-2x"></i>', array('class' => 'btn btn-primary'));    
    }  else {
        return '';
    }    
}

function ui_twitter_button($url) {
    if($url != null) {        
        return anchor($url, '<i class="icon-twitter icon-2x"></i>', array('class' => 'btn btn-info'));    
    }  else {
        return '';
    }    
}

function ui_buy_button($url) {
    if($url != null) {
        return anchor($url, 'BUY', array('class' => 'btn btn-inverse pull-right'));
    } else {
        return '';
    }
}



function ui_sidebar_navigation($navigation_item, $selected_code) {
    
    if($navigation_item['children']) {
        
        
        if(in_array_r($selected_code, $navigation_item['children'])) {
            $_html = '<li class="has_submenu current open '.$navigation_item['color'].'">';
        } else {
            $_html = '<li class="has_submenu '.$navigation_item['color'].'">';    
        }     
        
            $_html .= anchor($navigation_item['link'], '<i class="'.$navigation_item['icon'].'"></i>'.$navigation_item['name'].'<span class="pull-right"><i class="icon-angle-right"></i></span>');
               
            $_html .= '<ul>';
                foreach($navigation_item['children'] as $child) {
                    if($selected_code == $child['code']) {
                        $_html .= '<li class="active">' . anchor($child['link'], $child['name']) . '</li>';                        
                    }   else {                        
                        $_html .= '<li>' . anchor($child['link'], $child['name']) . '</li>';
                        
                    }
                }
            $_html .= '</ul>';
            
            
            
            
       $_html .= '</li>';       
       
       
       
       
    } else {
        
        if($selected_code == $navigation_item['code']) {            
            $_html = '<li class="current '.$navigation_item['color'].'">';
        } else {
            $_html = '<li class="'.$navigation_item['color'].'">';
        }
        
        $_html .= anchor($navigation_item['link'], '<i class="'.$navigation_item['icon'].'"></i>'.$navigation_item['name']);        
        $_html .= '</a>';    
        $_html .= '</li>';
    }
    
    return $_html;    
}
