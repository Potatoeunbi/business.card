<?php
namespace application\controllers;

class Controller
{
    public function __construct($menu, $action, $category, $idx, $pageNo)
    {
        if(!isset($_COOKIE['AccessLog'])){
            $Api = new ApiController();
            $day = date("Y-m-d");
            $yoil = array("Sun","Mon","Tue","Wed","Thu","Fri","Sat");
            $data = [
            'Date' => $yoil[date('w', strtotime($day))]
            ];
            $Api->post('/UpdateAccessLog',$data);
            
            $cookieName = "AccessLog";
            $cookieValue = "Connect";
            setcookie($cookieName, $cookieValue, time()+86400, "/"); 
        }
        $this->$action($category, $idx, $pageNo);
    }

 
}