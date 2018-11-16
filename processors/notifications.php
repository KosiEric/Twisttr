<?php


require_once $_SERVER['DOCUMENT_ROOT'].'/config/functions.php';
require_once $_SERVER['DOCUMENT_ROOT'].'/config/config.php';

class Notifications extends  Functions{

    private $config;

    private $data , $start  , $num_of_notifications = 10 , $total_number_of_notifications;
    private $userID , $user_details;

    public function __construct()
    {
        $this->config = new WebsiteDetails();
        parent::__construct();
    }

    private function isReady() : bool {

        return !empty($this->data = json_decode($_POST['data'] , true));
    }


    private function  setDetails () : bool{

        $this->userID = $this->data["userID"];
        $this->start = (int)$this->data["start"];
        $this->user_details = $this->fetch_data_from_table($this->users_table_name , 'user_id' , $this->userID)[0];
        $this->total_number_of_notifications = count($this->fetch_data_from_table_with_conditions($this->notifications_table_name , "id != 0"));
        return true;
    }



    private function getNotifications () {
        $notifications = $this->fetch_data_from_table_with_conditions($this->notifications_table_name , "id != 0 ORDER BY id DESC LIMIT  {$this->start} , $this->num_of_notifications");
        $notification_html = "";
        $count = 2;
        foreach ($notifications as $notification){
//alt="{$this->config->SiteName}" class="img-circle notifis-favicon"
            if((($count % 2) == 0)) {
                $notification_html .= <<<NOTIFIATION_HTML
                        
                        <li class="left clearfix">
                           <a target="_blank" href="{$notification['link']}">
                            <span class="chat-img pull-left">
              <img src="{$this->config->IMG_FOLDER}favicon.png" alt="{$this->config->SiteName}" class="img-circle notifis-favicon" />
            </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <strong class="primary-font">{$notification['title']}</strong> <small class="pull-right text-muted">
                                        <span class="fa fa-clock even-time" data-livestamp="{$notification['time_stamp']}"></span></small>
                                </div>
                                <p class="even-message">
                           {$notification['message']}
                           
                                 </p>
                            </div>
                            </a>
                        </li>
                        
NOTIFIATION_HTML;
            }

            else {
                $notification_html .= <<<NOTIFIATION_HTML

 <li class="right clearfix">
 <a href="{$notification['link']}">
 <span class="chat-img pull-right">
 
             <img src="{$this->config->IMG_FOLDER}favicon.png" alt="{$this->config->SiteName}" class="img-circle notifis-favicon" />
                        </span>
                            <div class="chat-body clearfix">
                                <div class="header">
                                    <small class=" text-muted"><span class="fa fa-clock odd-timestamp" data-livestamp="{$notification['time_stamp']}"></span></small>
                                    <strong class="primary-font odd-title">{$notification['title']}</strong>
                                </div>
                                <p class="odd-message">
                           
                           {$notification['message']}
                                 </p>
                            </div>
       </a>
             
                        </li>
NOTIFIATION_HTML;


            }

$count++;
               }

    $this->update_record($this->users_table_name , 'number_of_read_notifications' , $this->total_number_of_notifications , 'user_id' , $this->userID);

        return $notification_html;
    }

    public  function Processor(){
        if($this->isReady() && $this->setDetails()){

            return json_encode(["data" =>$this->getNotifications() , "start" => $this->num_of_notifications]);
        }
    }
}


$notifications = new Notifications();
echo  $notifications->Processor();

?>

