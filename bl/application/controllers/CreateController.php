<?php

namespace application\controllers;

class CreateController extends Controller
{   
    public function index(){
        $body_data = array(
            'PageID'=> $_SESSION['id']
        );

		$Api = new ApiController();
		$Account=$Api->get('/WalletBalance', $body_data);
        $Wallet=$Api->get('/WalletSelect', $body_data);
        require_once 'application/views/board/Create.php';
    }

    public function question(){

        date_default_timezone_set('Asia/Seoul');

        $uid = $_POST["PageID"];
        $pwd = $_POST['Pwd'];
        $name = $_POST["Name"];
        $content = $_POST['Content'];
        $coin = $_POST["Coin"];
        $time = date("Y-m-d H:i:s");

        $body_data = array(
            'PageID' => $uid,
            'Pwd' => $pwd,
            'Name' => $name,
            'Content' => $content,
            'Coin'=> $coin,
            'Time' => $time
        );

        $Api = new ApiController();
        $result=$Api->post('/BlockCreate', $body_data);

        echo $result['message'];
    }
    
}