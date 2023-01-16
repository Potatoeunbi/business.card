<?php

namespace application\controllers;

class MylistController extends Controller
{   
    public function index(){
        $body_data = array(
            'PageID'=> $_SESSION['id']
        );

		$Api = new ApiController();
		$Account=$Api->get('/WalletBalance', $body_data);
        $Wallet=$Api->get('/WalletSelect', $body_data);

		$BlockCount=$Api->get('/StatusBlock',0);
        $arr = array();
        $list = array();
        for($i=1; $i<count($BlockCount); $i++){
            if(strtolower($BlockCount['message'.$i]["addr"]) ==strtolower($Wallet['message'] )){
                array_push($arr, $BlockCount['message'.$i]["name"]);
            }
        }
        
        foreach($arr as $name){    
            $data = array(
                'name'=> $name
            );    
            $list[$name]=$Api->get('/ListPage',$data);
        }


        require_once 'application/views/board/Mylist.php';
    }

    public function AuctionChange(){
        $uid = $_POST["PageID"];
        $pwd = $_POST['Pwd'];
        $content = $_POST['Content'];
        $coin = $_POST["Coin"];
        $toaddr = $_POST["toAddr"];
        $time = $_POST["Time"];
        $name = $_POST["Name"];
        $option=$_POST["Option"];


        $body_data = array(
            'PageID' => $uid,
            'Pwd' => $pwd,
            'Content' => $content,
            'Coin'=> $coin,
            'toAddr' => $toaddr,
            'Time' => $time,
            'Name' => $name,
            'Auction' => $option
        );

        $Api = new ApiController();
        $result=$Api->post('/AuctionChange', $body_data);

        echo $result['message'];
        //echo $option;
    }


}