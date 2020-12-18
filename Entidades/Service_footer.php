<?php
class Service_footer extends Service_plantilla{
    public static $service_footer;
    public function __construct(){
  
    }
    public static function getInstance() {
        if (!(self::$service_footer instanceof self) ) {
            self::$service_footer = new Service_footer();
        }
        return self::$service_footer;
    } 
    public function informacion($_PLANTILLA=NULL, $_AJAX=NULL, $_DATA=NULL){
        $datos = [];
        $datos["Datos"] = $_DATA;
        $datos["Plantilla"] = $this->reemplazar_datos_plantilla($_PLANTILLA,$_AJAX); 
        return json_encode($datos, JSON_PRETTY_PRINT);
    }
}
?>