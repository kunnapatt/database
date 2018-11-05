<?php
    // use Phalcon\Flash\Direct as Flash;
    // use Phalcon\Flash\Session as Flash;

    class LoginController extends ControllerBase {
        public function indexAction() {
            if( $this->session->has('sid') ){
                return $this->response->redirect("index") ;
            }else{
                if( $this->request->isPost() ){
                    
                    $username = $this->request->getPost("usernamelogin") ;
                    $password = $this->request->getPost("passwordlogin") ;
                    $userlogin = Customers::findFirst("username = '$username'") ;

                    if ( $userlogin !=  null ){
                    if ( $userlogin->username == $username ){

                        if ( $userlogin->password == $password ){
                            $this->flash->success("Login Correcct ") ;
                            $id = $userlogin->cid ;
                            $this->cookies->set("id", $userlogin->cid, time() + 86400) ;
                            $this->view->usernamelogin = $username ;
                            $this->view->passwordlogin = $password ;
                            $this->session->set('sid', "$id") ;
                            $this->response->redirect("index") ;
                        }
                    }else{
                        $this->flashSession->error("username or password incorrect") ;
                    }
                }else{
                    // $this->response->redirect("login/index") ;
                    var_dump("Don't have user") ;
                    $this->flashSession->error("username incorrect") ;
                    // exit() ;
                    } 
                }
            }
        }

        public function logoutAction(){
            $dele = $this->cookies->get("id") ;
            $dele->delete() ;
            $this->session->destroy() ;

            $this->response->redirect("index") ;
        }

    }
?>