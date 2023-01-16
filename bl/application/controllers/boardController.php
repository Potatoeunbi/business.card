<?php
namespace application\controllers;


class BoardController extends Controller
{   
    public function index(){
		
		$Api = new ApiController();

        $Chart=$Api->get('/SelectAccessLog',0);
        $WeekChart=$Chart["message"][0];
		$BlockCount=$Api->get('/BlockCount',0);
		$ListCount = $Api->get('/ListCount',0);
        $HotBlockCount=$Api->get('/HotBlock',0);
        require_once 'application/views/board/index.php';
    }

    public function destroy(){
        session_destroy();
    }

    public function logincheck(){
        $id = $_POST["id"];
        $pw = $_POST['pw'];
        $let = date("Y-m-d H:i:s");
        $te = $_SERVER["REMOTE_ADDR"];
        $SaltApi = new SaltController();


        $body_data = array(
            'PageID' => $id,
            'PagePwd' => $pw
        );

        $Api = new ApiController();

        $data = array('PageID'=> $id);
        $Select = $Api->get('/SelectLoginSalt',$data);

        $satlarry = array($id,$pw,$Select["message"]["Latest"],$Select["message"]["DateTime"],$Select["message"]["LoginCount"],$Select["message"]["SetIP"]);
        $saltString=$SaltApi->Salt($satlarry);

        $body_data = array(
            'PageID' => $id,
            'PagePwd' => $saltString,
            'InputPwd' => $pw,
            'Latest' => $let,
            'SetIP' => $te
        );
        
        
        $result=$Api->post('/login', $body_data);


        if($result['code']=='1'){
            $_SESSION['id']=$id;
        }

        echo $result['code'];
    }

    public function join(){
        $uid = $_POST["uid"];
        $pwd = $_POST['pwd'];
        $Adpwd = $_POST['Adpwd'];
        $loginName = $_POST["loginName"];
        $loginPhone = $_POST["loginPhone"];
        $Birth = $_POST["Birth"];
        $let = date("Y-m-d H:i:s");
        $te = $_SERVER["REMOTE_ADDR"];

        $body_data = array(
            'PageID' => $uid,
            'PagePwd' => $pwd,
            'Pwd' => $Adpwd,
            'Name'=> $loginName,
            'Phone' => $loginPhone,
            'Birth' => $Birth,
            'Latest' => $let,
            'DateTime' => $let,
            'SetIP' => $te
        );

        $Api = new ApiController();
        $result=$Api->post('/SingUp', $body_data);

        echo $result['code'];
        //echo $loginName;

    }

    public function idcheck(){

        $uid = $_GET["uid"];
        $Api = new ApiController();
		$result=$Api->get('/select',0);

        $R = new \RecursiveIteratorIterator(new \RecursiveArrayIterator($result), \RecursiveIteratorIterator::SELF_FIRST);

        foreach ($R as $key => $val) {
            if($uid==$val) { 
            $found = '1';
            break;
         } else {
            $found='0';
        }}
        echo $found;
    }


}