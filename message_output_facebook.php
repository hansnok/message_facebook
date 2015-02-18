<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * The facebook message processor
 *
 * @package   message_facebook
 * @copyright 2013 Francisco García Ralph (francisco.garcia.ralph@gmail.com)
 * @license   http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
require_once(dirname(dirname(dirname(dirname(__FILE__)))) . '/config.php');
require_once($CFG->dirroot.'/message/output/lib.php');
class message_output_facebook extends message_output {

    /**
     * Processes the message and sends a notification via jabber
     *
     * @param stdClass $eventdata the event data submitted by the message sender plus $eventdata->savedmessageid
     * @return true if ok, false if error
     */
 function send_message($eventdata) {
        global $CFG, $DB;

        
        
       
       if(isset($eventdata->contexturl)) {
       $url=$eventdata->contexturl;
        $parseurl=explode("=",$url);
        $parseParse=explode("#",$parseurl[1]);
        $id=$parseParse[0];
        $query=$DB->get_record('forum_discussions',array('id'=>$id));
        if($query->course!=null){
        $record = new stdClass();
        $record->courseid = $query->course;
        $record->time= time();
        $record->status = 0;
        $record->timemodified=0;

      
       
       $DB->insert_record('facebook_notifications', $record);
    
        
         }
       }
               return true;
       
       
    }
      


    /**
     * Creates necessary fields in the messaging config form.
     *
     * @param array $preferences An array of user preferences
     */
    function config_form($preferences){
        global $CFG;
        $url = new moodle_url("/local/facebook/connect.php"); //obtenemos de la pagina el shortname del curso y el id del curso
        
     $message='Si desea desenlazar su cuenta de facebook con webcursos entre <a href="'.$url.'">aquí</a>.';
            return $message;
        
    }

    /**
     * Parses the submitted form data and saves it into preferences array.
     *
     * @param stdClass $form preferences form class
     * @param array $preferences preferences array
     */
    function process_form($form, &$preferences){
       return true;
    }

    /**
     * Loads the config data from database to put on the form during initial form display
     *
     * @param array $preferences preferences array
     * @param int $userid the user id
     */
 public function load_data(&$preferences, $userid) {
        global $USER;
        return true;
    }

    /**
     * Tests whether the Jabber settings have been configured
     * @return boolean true if Jabber is configured
     */
    function is_system_configured() {
        global $CFG;
        return (!empty($CFG->fbkAppID) && !empty($CFG->fbkScrID));
    }

    /**
     * Tests whether the Jabber settings have been configured on user level
     * @param  object $user the user object, defaults to $USER.
     * @return bool has the user made all the necessary settings
     * in their profile to allow this plugin to be used.
     
   
    function is_user_configured($user = null) {
        global $USER, $DB;

        
        if (is_null($user)) {
            $user = $USER;
        }
        return true;
    }*/
}
