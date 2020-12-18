<?php
class Service_plantilla{
    protected function reemplazar_datos_plantilla(array $plantilla, array $datos) {
        $lista_actualizada = [];
        foreach ($plantilla as $key => $value) {
            $lista_actualizada[$value] = $datos[array_keys($_POST)[0]][$key];
        }
        return $lista_actualizada;
    }
}
?>
