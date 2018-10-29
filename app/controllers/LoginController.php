<?php
  
    class LoginController extends ControllerBase {
        public function indexAction() {
            if( $this->session->has('sid') ){
                return $this->response->redirect("index") ;
            }else{
            if( $this->request->isPost() ){
                
                $username = $this->request->getPost("usernamelogin") ;
                $password = $this->request->getPost("passwordlogin") ;

                // var_dump($username) ;
                
                $userlogin = Customers::findFirst("username = '$username'") ;
                
                if ( $userlogin->username == $username ){
                        // flash session
                        // $this->flash->error("username or password incorrect") ;
                        // exit() ;
                    if ( $userlogin->password == $password ){
                        // flash session
                        // var_dump("OK") ;
                        // exit() ;
                        $this->flash->success("Login Correcct ") ;
                        // exit() ;
                        $id = $userlogin->cid ;
                        $this->cookies->set("id", $userlogin->cid, time() + 86400) ;
                        // setcookie($userlogin->ID, $userlogin->Username, time() + 86400 ) ;
                        // $test = $this->cookies->get("$userlogin->ID") ;
                        // var_dump($test) ;
                        // exit() ;
                        
                        // if ( count($_COOKIE) > 0 ){
                        //     echo "Cookies" ;
                            
                        // }
                        // exit() ;
                        $this->view->usernamelogin = $username ;
                        $this->view->passwordlogin = $password ;

                        $this->session->set('sid', "$id") ;
                        // exit() ;
                        $this->response->redirect("index") ;
                    }
                }else{
                    $this->flashSession->error("username or password incorrect") ;
                }

            }else{
                // $this->response->redirect("login/index") ;
            }
            }
        }

        public function logoutAction(){
            $dele = $this->cookies->get("id") ;
            $dele->delete() ;
            $this->session->destroy() ;

            // var_dump("$dele") ;
            // exit() ;

            $this->response->redirect("index") ;
        }

    }
?>