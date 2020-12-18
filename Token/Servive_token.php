<?php
class Servive_token{
    protected $token;
    protected $archivo;
    public $bandera = false, $bandera2 = false;
    public function __construct($arg, $arg2){
        $this->Paquetes($arg);
        $this->Archivos($arg2);
    }
    public function getInstance($arg=true){
        if($this->bandera){
            if($arg){
                return true;
            }else{
                $class = array_search($this->token, Clases::token_class);
                include "Service_plantilla.php";
                include "Entidades/".$class.".php"; 
                $obj = $class::getInstance();
                $met = $this->archivo["id"];
                if($this->bandera2){
                    if(array_key_exists("Datos", $this->archivo)){
                        return $obj->$met($this->archivo["Plantilla"],$_POST,$this->archivo["Datos"]);
                    }else if(array_key_exists("Plantilla", $this->archivo) && (count($_POST) >= 1)){
                        return $obj->$met($this->archivo["Plantilla"],$_POST);
                    }else{
                        return $obj->$met();
                    }
                }else{
                    return Mensajes::Clases_Methodo["Methodo_Negativa"];;
                }
               
            }
        }else{
            return false;
        }
    }
    public function Paquetes($arg){
        foreach (Clases::token_class as $key => $value) {
           if("".$value=="".$arg){
                $this->token = $value;
                $this->bandera = true;
           }
        }
        return $this->bandera;
    }
    public function Archivos($arg){
        foreach (Metodos::token_methodo as $key => $value) {
           if("".$key=="".$arg){
                $this->archivo = $value;
                $this->bandera2 = true;
           }
        }
        return $this->bandera2;
    }
}
$obj = new Servive_token($_SERVER["HTTP_CLASS"],$_SERVER["HTTP_TOKEN_METODO"]);
?>