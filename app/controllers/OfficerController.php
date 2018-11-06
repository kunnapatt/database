<?php
    class OfficerController extends ControllerBase {
        public function indexAction(){
            if ( $this->session->has('id') ){
                // var_dump("Me la na") ;
                // exit() ;
                // $this->session->destroy() ;

            }else{
                $this->response->redirect("index") ;
            }
        }

        public function loginAction() {
            if ( $this->session->has('id') == null ) {
                if ( $this->request->isPost() ){
                    $id = $this->request->getPost("id") ;
                    $pass = $this->request->getPost("pass") ;

                    $officer = Officers::findFirst("username = '$id'") ;

                    if ( $officer->username != null ){
                        if ( $officer->username == $id ) {
                            if ( $officer->pass == $pass ) { 
                                $this->cookies->set("id", $officer->oid , time()+86400 ) ;
                                $this->session->set('id', "$officer->oid") ;
                                $this->response->redirect("officer/index") ;
                            }
                        }
                    }
                }
            } else {
                $this->response->redirect('index') ;
            }
        }

        public function logoutAction() {
            $this->session->destroy() ;

            $this->response->redirect('index') ;

        }

        public function customerAction() {
            if ( $this->session->has('id') != null ) {
                $user = Customers::find() ;

                foreach ( $user as $a ){
                    $b[] = $a->toArray() ;
                }
                foreach ( $b as $c ){
                    $cid[] = $c['cid'] ;

                }
                $this->view->cid = $cid ;

                if ( $_GET['id'] ){
                    $id = $_GET['id'] ;
                }else {
                    $id = "" ;
                }

                if ( $id ) {
                    $cus = Customers::findFirst("cid = $id") ;

                    $cid = $cus->cid ;
                    $fname = $cus->fname ;
                    $sname = $cus->sname ;
                    $dob = $cus->DOB;
                    $pnum = $cus->pnumber ;
                    $address = $cus->homeaddress ;
                    $work = $cus->workaddress ;
                    $email = $cus->email ;
                    $balance = $cus->balance ;
        
                    $this->view->id = $cid ;
                    $this->view->fname = $fname ;
                    $this->view->sname = $sname ;
                    $this->view->dob = $dob ;
                    $this->view->pnum = $pnum ;
                    $this->view->address = $address ;
                    $this->view->work = $work ;
                    $this->view->email = $email ;
                    $this->view->balance = $balance ;

                    $acc = $cus->getAccount()->getCredit()->toArray() ;
                    
                    foreach ( $acc as $a ){
                    $credit[] = $a['Creditcardnumber'] ;
                    }

                    $this->view->credit = $credit ;

                    $pay = $cus->getPaying()->toArray() ;

                    foreach ( $pay as $a ){
                        $amount[] = $a['amount'] ;
                        $payid[] = $a['payingid'] ;
                        $loanid[] = $a['loanid'] ;
                        $datepay[] = $a['date'] ;
                    }
 
                    $this->view->amount = $amount ;
                    $this->view->payid = $payid ;
                    $this->view->loanid = $loanid ;
                    $this->view->datepay = $datepay ;

                    if ( $this->request->isPost() ) {
                        $name = $this->request->getPost("name") ;
                        $surname = $this->request->getPost("surname") ;
                        $dateof = $this->request->getPost("dateof") ;
                        $mail = $this->request->getPost("mail") ;
                        $phone = $this->request->getPost("phone") ;
                        $home = $this->request->getPost("home") ;
                        $workat = $this->request->getPost("workat") ;

                        $cus->fname = $name ;
                        $cus->sname = $surname ;
                        $cus->dob = $dateof;
                        $cus->email =$mail ;
                        $cus->pnumber = $phone ;
                        $cus->homeaddress = $home ;
                        $cus->workaddress = $workat ;

                        $cus->save() ;

                        $this->response->redirect('officer/customer&id=') ;
                    }
                }
                
            } else {
                $this->response->redirect("index") ;
            }
        }

        public function deptAction() {
            if ( $this->session->has('id') != null ){
                $id = $this->session->get('id') ;
                $officer = Officers::findFirst("oid = '$id'") ;
                if ( $officer->getDept() != false ){
                    $dept = $officer->getDept()->getTrack()->toArray() ;
                    // var_dump($officer->getDept()) ;
                    // exit() ;
                    foreach( $dept as $a ){
                        $cid[] = $a['cid'] ;
                    }

                    $this->view->cid = $cid ;

                    $ci = $_GET['id'] ;
                    if ( $ci ){
                        $cus = Customers::findFirst("cid = '$ci'") ;
                        $this->view->fname = $cus->fname ;
                        $this->view->sname = $cus->sname ;
                        $this->view->address = $cus->homeaddress ;
                        $this->view->phone = $cus->pnumber ;
                        $this->view->work = $cus->workaddress ;

                        $paying = $cus->getPaying()->toArray() ;
                        // $sum = $cus->getPaying()->getLoan()-toArray() ;
                        
                        foreach ( $paying as $a ){
                            $date[] = $a['date'] ;
                            $payid[] = $a['payingid'] ;
                            $cusid[] = $a['cid'] ;
                            $loanid[] = $a['loanid'] ;
                            $bal[] = $a['amount'] ;
                        }

                        $this->view->date = $date ;
                        $this->view->bal = $bal ;
                        $this->view->payid = $payid ;
                        $this->view->cusid = $cusid ;
                        $this->view->loanid = $loanid ;
                        
                    }
                }else {
                    $this->response->redirect("index") ;
                }       
            }else{
                $this->response->redirect("index") ;
            } 
                
        }

        public function calendarAction() {
            if ( $this->session->has('id') != null ) {
                $id = $this->session->get('id') ;
                $cal = Officers::findFirst("oid = '$id'") ;
                $calen = $cal->getCalendar() ;
                //$cus = $cal->getCalendar()->getCustomer() ;

                foreach ( $calen as $a ){
                    $cusid[] = $a->getCustomer()->toArray() ;
                    
                }

                foreach ( $cusid as $a ){
                    // $cusidd[] = $a->getCustomer()->toArray() ;
                }
                // $this->view->cid = $cus ;
                
                // foreach ( $cus as $a ){
                    // $fname[] = $name[]
                // }
                var_dump($cusid) ;
                exit() ;
                // $id = $_GET['id'] ;
                // if ( $ ) {
                    

                // }
            }else {
                $this->response->redirect('index') ;
            }
        }
    }

?>