<?php
class Service_usuario extends Service_plantilla{
    public static $service_usuario;
    public function __construct(){
  
    }
    public static function getInstance() {
        if (!(self::$service_usuario instanceof self) ) {
            self::$service_usuario = new Service_usuario();
        }
        return self::$service_usuario;
    } 
    public function Saludar($_PLANTILLA, $_AJAX, $_DATA=NULL){
        $_AJAX = $this->reemplazar_datos_plantilla($_PLANTILLA,$_AJAX);
        return "Hola ".$_AJAX["Nombre"]." ".$_AJAX["Apellido"]." ".$_DATA['Mensaje'];
    }
}
?>