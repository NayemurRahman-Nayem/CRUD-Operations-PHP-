<?php 
        include 'connect.php' ; 
        function getCustomerList() {
                $query = "SELECT * from crud" ; 
                global $con ; 
                $query_run = mysqli_query($con,$query) ; 
                if($query_run) {
                        if(mysqli_num_rows($query_run)>0) {
                                $res = mysqli_fetch_all($query_run,MYSQLI_ASSOC) ; 
                                $data = [
                                        'stage' => 404 , 
                                        'message' =>  'Customer List Fetched Successfully' , 
                                        'data' => $res 
                                        
                                ] ; 
                                header("HTTP/1.0 404  Customer List Fetched Successfully") ; 
                                return json_encode($data) ;
                        }       
                        else {
                                $data = [
                                        'stage' => 404 , 
                                        'message' =>  'No data found ' , 
                                        
                                ] ; 
                                header("HTTP/1.0 404  No data found") ; 
                                return json_encode($data) ;
                        }
                }
                else{
                        $data = [
                                'stage' => 500 , 
                                'message' =>  ' Internal Server Error ! ' , 
                
                        ] ; 
                        header("HTTP/1.0 500 Internal Server Error") ; 
                        echo json_encode($data) ;   
                }
        }
?> 