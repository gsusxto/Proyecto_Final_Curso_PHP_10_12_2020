<?php
class Service_session extends Service_plantilla{
    public static $service_session;
    public function __construct(){
  
    }
    public static function getInstance() {
        if (!(self::$service_session instanceof self) ) {
            self::$service_session = new Service_session();
        }
        return self::$service_session;
    } 
    public function session_index($_PLANTILLA=NULL, $_AJAX=NULL, $_DATA=NULL){
        $datos = [];
        $datos["Datos"] = $_DATA;
        $datos["Plantilla"] = $this->reemplazar_datos_plantilla($_PLANTILLA,$_AJAX); 
        return json_encode($datos, JSON_PRETTY_PRINT);
    }
}
?>