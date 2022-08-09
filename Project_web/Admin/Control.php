<?php
// ob_start();
include_once 'Model.php';

class MyControl extends Model
{
    
    public function __construct()
    {
        parent::__construct();
        $url = $_SERVER['PATH_INFO'];
        $country = $this->SelectAll('country');
        $category = $this->SelectAll('category');

        switch($url)
        {
            case '/index':
                if(isset($_POST['login']))
                {
                    $email = $_POST['Email'];
                    $pass = $_POST['Password'];

                    $where = array('email'=>$email,'pwd'=>$pass);
                    $res=$this->Select_Where('admin',$where);
                    $i=$res->num_rows;
                    if($i>0)
                    {
                        echo "<script>alert('Login Successfully');
                        window.location='user_details';
                        </script>";
                    }
                    else
                    {
                        echo "<script>alert('Invalied...!')</script>";
                       
                        
                    }

                }
                include_once 'login.php';
                break;

                case '/user_details':
                    include_once 'header.php';
                    include_once 'sidebar.php';
                    $data = $this->Join_data('registration','country','registration.country=country.cid');
                    include_once 'user_details.php';
                    include_once 'footer.php';
                    break;

                    case '/delete':
                        if(isset($_GET['did']))
                        {
                            $did = $_GET['did'];
                            $where = array('id'=>$did);
                            $this->delete_data('registration',$where);
                            header('location:user_details');
                        }
                        break;

                    case '/edit':
                    include_once 'header.php';
                    include_once 'sidebar.php';
                    if(isset($_GET['eid']))
                    {
                        $eid = $_GET['eid'];
                        $where = array('id'=>$eid);
                        $all_data = $this->Select_Where('registration',$where);
                        $fetch_user = $all_data->fetch_object();

                        //update
                        if(isset($_POST['update']))
                        {
                            $name = $_POST['Name'];
                            $email = $_POST['Email'];
                            $bio = $_POST['bio'];
                            $gender = $_POST['Gender'];
                            $language = $_POST['language'];
                            $l = implode(",",$language);
                            $country = $_POST['country'];

                            $data = array('Name'=>$name,'Email'=>$email,'bio'=>$bio,'Gender'=>$gender,'language'=>$l,'country'=>$country);
                            $this->Update_data('registration',$data,$where);
                            //header('location:user_details');
                            echo "<script>alert('Updated Successfully');
                            window.location='user_details';
                            </script>";

                        }
                    }
                    include_once 'edit_users.php';
                    include_once 'footer.php';
                        break;

                    case '/add_category':
                        include_once 'header.php';
                        include_once 'sidebar.php';
                        if(isset($_POST['submit']))
                        {
                            $cat = $_POST['category'];
                            $data = array('cat_name'=>$cat);
                            $add_cat = $this->InsertData('category',$data);
                            echo "<script>alert('Data Inserted');</script>";
                        }
                        include_once 'add_category.php';
                        include_once 'footer.php';
                        break;

                    case '/Add_Product':
                    include_once 'header.php';
                        include_once 'sidebar.php';
                        $all_cat = $this->SelectAll('category');
                        if(isset($_POST['submit']))
                        {
                            $cat_data = $_POST['cat'];
                            $pro_name = $_POST['pro_name'];
                            $pro_image = $_FILES['pro_image']['name'];
                            $pro_price = $_POST['pro_price'];
                            move_uploaded_file($_FILES['pro_image']['tmp_name'],"upload/".$_FILES['pro_image']['name']);
                            $data = array('cat_id'=>$cat_data,
                            'pro_name'=>$pro_name,
                            'pro_image'=>$pro_image,
                            'pro_price'=>$pro_price);

                            $this->InsertData('product',$data);
                            echo "<script>alert('Data Inserted');</script>"; 

                        }
                       
                        include_once 'add_product.php';
                        include_once 'footer.php';
                            break;

                        case '/view_category':
                            include_once 'header.php';
                            include_once 'sidebar.php';
                            $data = $this->SelectAll('category');
                            include_once 'view_category.php';
                            include_once 'footer.php';
                            break;

                        case '/delete_category':
                            if(isset($_GET['did']))
                            {
                                $did = $_GET['did'];
                                $where = array('cat_id'=>$did);
                                $this->delete_data('category',$where);
                                header('location:view_category');
                            }
                            break;

                        case '/edit_category':
                        include_once 'header.php';
                        include_once 'sidebar.php';
                        if(isset($_GET['eid']))
                    {
                        $eid = $_GET['eid'];
                        $where = array('cat_id'=>$eid);
                        $c_data = $this->Select_Where('category',$where);
                        $fetch_c = $c_data->fetch_object();

                        //update category

                        if(isset($_POST['update']))
                        {
                            $cat = $_POST['category'];
                            $data = array('cat_name'=>$cat);
                            $c_cat = $this->Update_data('category',$data,$where);
                            echo "<script>alert('Updated Successfully');
                            window.location='view_category';
                            </script>";
                        }
                    }
                        include_once 'edit_category.php';
                        include_once 'footer.php';
                        break;
                        
                    case '/view_product':
                        include_once 'header.php';
                        include_once 'sidebar.php';
                        $data = $this->SelectAll('product');
                        include_once 'view_product.php';
                        include_once 'footer.php';
                        break;

    }
}
}
$obj = new MyControl;
// ob_flush();
?>
