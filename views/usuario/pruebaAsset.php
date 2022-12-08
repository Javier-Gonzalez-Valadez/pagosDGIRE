<?php
    class CURP{
        private $curp;

        public static function consultaCurp(){
            echo "<h1>HOLA</h1>"; 
            $curp = "GOVJ990904HMCNLV05";
            $url = "https://apps.dgire.unam.mx/intranet/APIsis/curp/$curp";
            $ch = curl_init($url); 
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $resp = curl_exec($ch); 
            curl_close($ch);
            
            $resp = json_decode($resp);
            
            if (!$resp->success) {
                $resp = array(
                    "error" => false
                    , "success" => false
                    , "renapo" => true
                    , "message" => "No se encontro la CURP <strong>$curp</strong>",
                );
            
                die(json_encode($resp));
            }
        
            die(json_encode($resp));
        }

        public function getCurp(){
            return $this->curp;
        }
        public function setCurp($curp){
             $this->curp=$curp;
        }
    }
    
    
?>