{
    "events" : [
    <?php    
        $eventLength = count($events);
        $eventCount = 1;
        foreach ( $events as $event) {
            $eventDesc = escapeJsonString($event->description);         
            echo '{ "eventDate" : "'.$event->date.'", "eventTitle" : "'.$event->title.'", "eventDescription" : "'.$eventDesc.'", "eventLink" : "'.$event->event_link.'" }';
            if($eventCount < $eventLength) echo ',';
            $eventCount++;
        }
        
        function escapeJsonString($value) { # list from www.json.org: (\b backspace, \f formfeed)
            $escapers = array("\\", "/", "\"", "\n", "\r", "\t", "\x08", "\x0c");
            $replacements = array("\\\\", "\\/", "\\\"", "\\n", "\\r", "\\t", "\\f", "\\b");
            $result = str_replace($escapers, $replacements, $value);
            return $result;
        }
    ?>
    ]
}