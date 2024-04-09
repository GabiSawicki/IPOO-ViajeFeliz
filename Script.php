<?php
include_once 'ClaseViaje.php';
include_once 'ClasePasajero.php';
include_once 'ClaseResponsable.php';

$responsable = new ResponsableV("Gabi","Sawicki","444","12345");

$vuelo = new Viaje('204', 'Mendoza', 10, $responsable);

$vuelo->agregarPasajero("María", "García", "87654321", "555-5678");
$vuelo->agregarPasajero("Pedro", "Rodríguez", "13579246", "555-4321");
$vuelo->agregarPasajero("Laura", "Martínez", "24681357", "555-8765");
$vuelo->agregarPasajero("Carlos", "López", "98765432", "555-3456");
$vuelo->agregarPasajero("Ana", "Sánchez", "56473829", "555-6543");
$vuelo->agregarPasajero("Javier", "Fernández", "19283746", "555-7890");
$vuelo->agregarPasajero("Jorge", "Gómez", "28374619", "555-9012");
$vuelo->agregarPasajero("Manuel", "Ruiz", "59683724", "555-6789");



$continuar = true;

while($continuar){
echo "*******************************************************************\n\n";

echo "Ingrese el número de operación que desea realizar:";
echo "\n". 
"1) Agregar Pasajero \n". 
"2) Eliminar Pasajero \n". 
"3) Modificar Información de Pasajero \n". 
"4) Cambiar al Responsable del Viaje \n".
"5) Salir \n";

echo "\n*******************************************************************\n\n";

$opcion = trim(fgets(STDIN));

switch ($opcion) {

    case 1:

        echo "\nIngrese el nombre del nuevo pasajero: ";
        $nuevoNombre = trim(fgets(STDIN));
        echo "\nIngrese el apellido del nuevo pasajero: ";
        $nuevoApellido = trim(fgets(STDIN));
        echo "\nIngrese el número de documento del nuevo pasajero: ";
        $nuevoDoc = trim(fgets(STDIN));
        echo "\nIngrese el número de teléfono del nuevo pasajero: ";
        $nuevoTel = trim(fgets(STDIN));
        if($vuelo->agregarPasajero($nuevoNombre, $nuevoApellido, $nuevoDoc, $nuevoTel)){
            echo "\nEl nuevo pasajero ha sido agregado de manera exitosa! \n";
        }else{
            echo "\nNo fue posible agregar el nuevo pasajero \n";
        }

        break;

    case 2:

        echo "\nIngrese el número de documento del pasajero: ";
        $eliminarDoc = trim(fgets(STDIN));
        if($vuelo->eliminarPasajero($eliminarDoc)){
            echo "\nEl pasajero ha sido eliminado de manera exitosa! \n";
        }else{
            echo "\nNo fue posible eliminar al pasajero \n";
        }

        break;
    
    case 3:
        echo "\nIngrese el número documento del pasajero: ";
        $cambioDoc = trim(fgets(STDIN));
        if(!($vuelo->modificarPasajero(0, 0, $cambioDoc, 0))){
            echo "\nPasajero no encontrado. \n";
        }else{
            echo "\nIngrese el nuevo nombre del pasajero: ";
            $cambioNombre = trim(fgets(STDIN));
            echo "\nIngrese el nuevo apellido del pasajero: ";
            $nuevoApellido = trim(fgets(STDIN));
            echo "\nIngrese el nuevo telefono del pasajero: ";
            $cambioTel = trim(fgets(STDIN));
            $vuelo->modificarPasajero($cambioNombre, $nuevoApellido, $cambioDoc, $cambioTel);
            echo "\nSe ha modificado la información del pasajero. \n";
        }

        break;

    case 4:
        echo "\nIngrese el nombre del responsable del viaje: ";
        $nombreResponsable = trim(fgets(STDIN));
        echo "\nIngrese el apellido del responsable del viaje: ";
        $apellidoResponsable = trim(fgets(STDIN));
        echo "\nIngrese el número de empleado del responsable del viaje: ";
        $numeroEmpleadoResponsable = trim(fgets(STDIN));
        echo "\nIngrese el número de licencia del responsable del viaje: ";
        $numeroLicenciaResponsable = trim(fgets(STDIN));

        if($vuelo->cambiarResponsable($nombreResponsable,$apellidoResponsable,$numeroEmpleadoResponsable,$numeroLicenciaResponsable)){
            echo "\nResponsable cambiado con éxito. \n";
        }else{
            echo "\nNo fue posible cambiar el responsable. \n";
        }
        
        break;

    case 5:
        $continuar = false;
        break;

    default:
        echo "Opción no válida";
}
}