<?php
namespace application\controllers;

class TradeController extends Controller
{ 
    public function index(){
        $body_data = array(
            'PageID'=> $_SESSION['id']
        );

		$Api = new ApiController();
		$BlockCount=$Api->get('/StatusBlock',0);
		$Account=$Api->get('/WalletBalance', $body_data);
        $Wallet=$Api->get('/WalletSelect', $body_data);
        $arr = array();
        $list = array();
        for($i=1; $i<count($BlockCount); $i++){
            if(strtolower($BlockCount['message'.$i]["addr"]) !=strtolower($Wallet['message'])  && $BlockCount['message'.$i]["auction"] == 'true'){
                array_push($arr, $BlockCount['message'.$i]["name"]);
            }
        }
        foreach($arr as $name){    
            $data = array(
                'name'=> $name
            );    
            $list[$name]=$Api->get('/ListPage',$data);
        }
        require_once 'application/views/board/Trade.php';
    }

    public function Buy(){
        $uid = $_POST["PageID"];
        $pwd = $_POST['Pwd'];
        $content = $_POST['Content'];
        $coin = $_POST["Coin"];
        $toaddr = $_POST["toAddr"];
        $time = $_POST["Time"];
        $name=$_POST["Name"];

        $body_data = array(
            'PageID' => $uid,
            'Pwd' => $pwd,
            'Content' => $content,
            'Coin'=> $coin,
            'toAddr' => $toaddr,
            'Time' => $time,
            'Name' => $name
        );

        $Api = new ApiController();
        $result=$Api->post('/Buy', $body_data);

        echo $result['message'];
    }


}