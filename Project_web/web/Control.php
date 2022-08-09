<?php
// ob_start();
include_once 'Model.php';
class MyControl extends Model
{
    public function __construct()
    {
        parent::__construct();
        $url = $_SERVER['PATH_INFO'];
        $menu = $this->SelectAll('category');
        session_start();

        switch($url)
        {
            case '/index':
                
                include_once 'header.php';
                //select country
                $country = $this->SelectAll('country');

                //insert data
                if(isset($_POST['submit']))
                {
                    $name = $_POST['Name'];
                    $email = $_POST['Email'];
                    $pass = $_POST['Password'];
                    $bio = $_POST['bio'];
                    $gen = $_POST['Gender'];
                    $lan = $_POST['language'];
                    $l =  implode(",",$lan);
                    $cou = $_POST['country'];

                    $data  = array('Name'=>$name,
                                    'Email'=>$email,
                                    'Password'=>$pass,
                                    'bio'=>$bio,
                                    'Gender'=>$gen,
                                    'language'=>$l,
                                    'country'=>$cou);
                $this->InsertData('registration',$data);
                echo "<script>alert('Data inserted!')</script>";
                            header('location:login');

                }
                include_once 'registration.php';
                include_once 'footer.php';
                break;

                case '/login':
                    //echo $sql;exit; 
                    include_once 'header.php';
                    if(isset($_POST['login']))
                    {
                        $email = $_POST['Email'];
                        $pass = $_POST['Password'];

                        $where = array('Email'=>$email,
                                        'Password'=>$pass);
                        $res = $this->Select_Where("registration",$where);
                        $r = $res->num_rows;
                        if($r>0)
                        {
                            setcookie("uname",$email,time()+20);
                            setcookie("pass",$pass,time()+20);
                            $session_data = $res->fetch_object();
                            $_SESSION['uid']=$session_data->id;
                            $_SESSION['uname']=$session_data->name;
                            echo "<script>alert('Login Success!')</script>";
                            header('location:woman_product');
                        }
                        else
                        {
                            echo "<script>alert('Invalied Data!')</script>";
                        }
                    }
                    include_once 'login.php';
                    include_once 'footer.php';
                    break;

                    case '/home':
                        include_once 'header.php';
                        $data=$this->SelectAll('product');

                        include_once 'home.php';
                        include_once 'footer.php';
                        
                        break;

                    case '/woman_product':
                        
                        include_once 'header.php';
                        if(isset($_SESSION['uid']))
                        {
                            if(isset($_GET['cat_id']))
                            {
                                $catid = $_GET['cat_id'];
                                $where = array('cat_id'=>$catid);
                                $woman = $this->Select_Where('product',$where);
                                // print_r($woman);exit;
                                while($pro = $woman->fetch_object())
                                {
                                    $woman_product  [] = $pro;
                                }
                            }
                        //include_once 'sidebar.php';
                        //$woman_product = $this->SelectAll('product');

                        if(isset($_POST['addtocart']))
                        {
                            $uid = $_SESSION['uid'];
                            $pid = $_POST['pro_id'];
                            $qty = $_POST['qty'];
                            $data = array('user_id'=>$uid,'pro_id'=>$pid,'qty'=>$qty);
                            $this->InsertData('cart',$data);
                            echo "<script>alert('Added in cart!')</script>";
                        }

                        include_once 'woman_product.php';
                        include_once 'footer.php';
                        }
                        else{
                            header('location:login');
                        }
                            break;

                    case '/logout':
                        session_destroy();
                        header('location:login');
                        break;

                    case '/show_cart':
                        if(isset($_SESSION['uid']))
                        {
                            include_once 'header.php';
                            $userid = $_SESSION['uid'];
                            $where = array('user_id'=>$userid);
                            $cdata = $this->Join_data('cart','product','cart.pro_id=product.pro_id');

                            include_once 'cart.php';
                            include_once 'footer.php';
                        }
                        else{
                            header('location:login');
                        }
                        break;

                    case '/paytm-payment':
                        if(isset($_SESSION['uid']))
                        {
                            include_once 'header.php';
                            $userid = $_SESSION['uid'];
                            $where = array('user_id'=>$userid);
                            $cdata = $this->Join_data('cart','product','cart.pro_id=product.pro_id');

                            include_once 'paytm-payment.php';
                            include_once 'footer.php';
                        }
                        else{
                            header('location:login');
                        }
                        break;
        }
    }
}
$obj = new MyControl;
// ob_flush();
?>