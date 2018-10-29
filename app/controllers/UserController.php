<?php
    class UserController extends ControllerBase{
        public function indexAction(){
            $co = $this->session->get('sid') ;
            
            $user = Customers::findFirst("cid = '$co'") ;

            $id = $user->cid ;
            $fname = $user->fname ;
            $sname = $user->Sname ;
            $date = $user->DOB ;
            $gen = $user->gender ;
            $phone = $user->pnumber ;
            $addr = $user->homeaddress ;
            $work = $user->workaddress ;
            $name = $user->username ;
            $pass = $user->password ;
            $mail = $user->email ;
            $pass = $user->pass ;
            
            // var_dump($id) ;
            // exit() ;

            $this->view->id = $id ;
            $this->view->fname = $fname ;
            $this->view->sname = $sname ;
            $this->view->gen = $gen ;
            $this->view->phone =$phone ;
            $this->view->date = $date ;
            $this->view->addr = $addr ;
            $this->view->work = $work ;
            $this->view->name = $name ;
            $this->view->mail = $mail ;
        }

        public function changeAction(){
            if ( $this->request->isPost() ){
                // exit() ;
                $co = $this->session->get('sid') ;
                $user = Customers::findFirst("cid = '$co'") ;
                $pass = $user->password ;
                $current = $this->request->getPost("currentpass") ;
                $new = $this->request->getPost("newpass") ;
                $confirm = $this->request->getPost("conpass") ;

                // $users = Customers();

                // var_dump($current) ;
                // exit() ;

                if ( $pass == $current ){
                    // var_dump($co) ;
                    // var_dump("User = $pass") ;
                    // var_dump($current) ;
                    // exit() ;

                    if ( $new == $confirm ) {
                        // exit() ;
                        $user->password = $new ;
                        $user->save() ;
                        var_dump("OK Success") ;
                        // exit();
                        $this->response->redirect("user") ;
                    }else{
                        //
                        // $this->response->redirect("user/change") ;
                        var_dump("Error new not equal comfirm") ;
                        exit() ;
                    }
                }else{
                    $this->response->redirect("user/change") ;
                }
            }
        }
    }
?>