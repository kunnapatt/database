<?php
    class UserController extends ControllerBase{
        public function indexAction(){
            if ( $this->session->has('sid') ){
                $co = $this->session->get('sid') ;
                
                $user = Customers::findFirst("cid = '$co'") ;
                // $user->getAccount() ;

                $id = $user->cid ;
                $fname = $user->fname ;
                $sname = $user->sname ;
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
                $this->view->balance = ($user->getAccount())->balance ;
                // var_dump($user->getAccount()->balance) ;
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

            }else{
                var_dump("No User") ;
                exit() ;
            }
        }

        public function changeAction(){
            if ( $this->session->has('sid') ){
                if ( $this->request->isPost() ){
                    // exit() ;
                    $co = $this->session->get('sid') ;
                    $user = Customers::findFirst("cid = '$co'") ;
                    $pass = $user->password ;
                    $current = $this->request->getPost("currentpass") ;
                    $new = $this->request->getPost("newpass") ;
                    $confirm = $this->request->getPost("conpass") ;

                    if ( $pass == $current ){

                        if ( $new == $confirm ) {

                            $user->password = $new ;
                            $user->save() ;
                            var_dump("OK Success") ;
                            $this->response->redirect("user") ;
                        }else{
                            var_dump("Error new not equal comfirm") ;
                            exit() ;
                        }
                    }else{
                        $this->response->redirect("user/change") ;
                    }
                }
            }else{
                var_dump("Not User") ;
                exit() ;
            }
        }

        public function statementAction() {
            if ( $this->session->has('sid') ){
                $co = $this->session->get('sid') ;
                $user = Customers::find("cid = '$co'") ;

                
                // Array Multi values 
                // foreach ( $user as $loan){
                //     $i = ($loan)->getLoan()-> toArray() ;
                
                // }
                // foreach( $i as $j ){
                //     $k[] = $j['loanid'] ;
                //     // var_dump($j['loanid']) ;
                // }
                // var_dump($k[0]) ;
                // exit() ;

                foreach( $user as $pay ){
                    $i = $pay->getPaying()->toArray() ;
                    
                }
                $count = 0;
                foreach( $i as $j ){
                    
                    $k[] = $j['payingid'] ;
                    $date[] = $j['date'] ;
                    $payingid[] = $j['payingid'] ;
                    $amount[] = $j['amount'] ;
                    $count++ ;
                }
                $this->view->date = $date ;
                $this->view->payingid =$payingid ;
                $this->view->amount = $amount ;
            }else{
                var_dump("Not user") ;
                exit() ;
            }

        }

        public function CalendarAction() {
            if ( $this->session->has('sid') ){
                $co = $this->session->get('sid') ;
                $user = Customers::find("cid = '$co'") ;
                $d = Calendar::find("oid = '232323'") ;

                foreach( $d as $dd ){
                    $raiwa[] = $dd->date ;
                } 

                foreach ( $user as $a ){
                    $b = ($a->getCalendar()->toArray()) ;
                    var_dump($b) ;
                }
                
            }else {
                var_dump("Don't User") ;
                exit() ;
            }
        }
        
    }
?>