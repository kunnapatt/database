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
                        // var_dump("easy") ;
                        // exit() ;

                        if ( $officer->username == $id ) {

                            if ( $officer->pass == $pass ) { 


                                $this->cookies->set("id", $officer->id , time()+86400 ) ;
                                $this->session->set('id', "$id") ;
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
            
            $user = Customers::find() ;

            foreach ( $user as $a ){
                $b[] = $a->toArray() ;
            }
            foreach ( $b as $c ){
                $cid[] = $c['cid'] ;
                // $fname[] = $c['fname'] ;
                // $sname[] = $c['sname'] ;
                // $dob[] = $c['DOB'] ;
                // $pnum[] = $c['pnumber'] ;
                // $address[] = $c['homeaddress'] ;
                // $work[] = $c['workaddress'] ;
                // $email[] = $c['email'] ;
                // $balance = $c['balance'] ;

            }
            $this->view->cid = $cid ;
            // $this->view->fname = $fname ;
            // $this->view->sname = $sname ;
            // $this->view->dob = $dob ;
            // $this->view->pnum = $pnum ;
            // $this->view->address = $address ;
            // $this->view->work = $work ;
            // $this->view->email = $email ;
            // $this->view->balance = $balance ;
            
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

                $pay= $cus->getPaying()->toArray() ;

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
                 

                

            }else {
                
            }
            
            // exit() ;
            // var_dump($d['0']) ;
            // exit() ;
        }

        public function deptAction() {

        }
    }

?>