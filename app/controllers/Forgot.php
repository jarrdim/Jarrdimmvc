
<?php

defined("ROOTPATH") OR exit('Access denied');

class Forgot extends Controller
{
    public function index($mode='')
    {  
       
        $reset = new Reset();
          if($_SERVER['REQUEST_METHOD'] == 'POST' )
              {
          
                  switch ($_POST['data_type']) {

                    case 'enteremail':

                        
                         if(empty(trim($_POST['email'])) && !filter_var(trim(trim($_POST['email'])), FILTER_VALIDATE_EMAIL))
                         {
                           
                            $info['error'] = "Please enter valid email";

                            echo json_encode($info);die;
                                
                            
                           
                         }elseif(!Auth::valide_email($_POST['email']))
                         {
                            $info['error'] = "Invalid email";
                         }
                        
                         else
                         {
                            $_SESSION['email'] = $_POST['email'];
                           //$reset = new Reset();
                            $info['data_type'] = 'entercode';
                            $code = rand(10000, 99999);
                            $expire = time() + (60 * 1);
                                
                            $arr['email'] = $_POST['email'];
                            $email['email'] = $_POST['email'];
                            $arr['code'] = $code;
                            $arr['expire'] = $expire;
                            $result = $reset->first($email);
                       
                            if($result)
                            {
                             
                               
                              
                                $sql= "update reset set code = :code, expire = :expire where email = :email";
                            

              
                            }
                            else{
                               
                                $sql ="insert into reset (email , code, expire) VALUES (:email,:code,:expire)";
                               
                            }

                             $reset->query($sql, $arr);
                       
                            //SEND EMAIL
                            //mail($email,"AGRITECH: RESET PASSWORD","RESET CODE: ".$code);

                         }
                                 
                         echo json_encode($info);                    
                         die;
               
                        break;
                    case 'entercode':
                        if(!empty(trim($_POST['code'])) && is_numeric(trim(trim($_POST['code']))))
                         {
                            $code = trim($_POST['code']);
                            $result = Auth::is_code_correct($code);

                            if($result == "success")
                            {
                               $info['data_type'] = 'enterpassword';
                            }
                            else{
                                $info['error'] = $result;
                            }
                             

                         }
                         else
                         {
                             $info['error'] = "Invalid code";
                         }
                       
                    
                      
                       echo json_encode($info);
                        die;
                        break;

                    case 'enterpassword':
                        
                        if(empty($_POST['password']))
                        {
                            $info['error'] = "Enter new password";
                        }
                        elseif(empty($_POST['password2']))
                        {
                            $info['error'] = "Retype password";
                        }
                        elseif($_POST['password'] != $_POST['password2'])
                        {
                             $info['error'] = "macth passwords";
                        }
                        else{
                            Auth::save_password($_POST['password']);
                            $info['data_type'] = 'reset';
                            $info['message'] = "Reset successfuly";
                        }
                        
                       
                        echo json_encode($info);
                        die;
                
                        break;                        
                    default:
                
                        break;
                  }

              }

        $data['title'] = 'Forgot';
       $this->view('forgot',$data);
    }
   

}