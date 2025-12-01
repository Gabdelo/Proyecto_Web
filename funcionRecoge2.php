<?php
function recoge($key, $type = "")
{
    // Validar nombre del campo
    if ((!is_string($key) && !is_int($key)) || $key === "") {
        trigger_error("El campo correspondiente no es correcto", E_USER_ERROR);
    }

    $tmp = "";

    if (isset($_POST[$key])) {

        // Si es un array (checkbox múltiple)
        if (is_array($_POST[$key])) {
            $tmp = $_POST[$key];
            array_walk_recursive($tmp, function (&$value) {
                $value = trim(htmlspecialchars($value));
            });

        // Si no es array
        } else {
            $tmp = trim(htmlspecialchars($_POST[$key]));

            // Validación de correo
            if ($type === "Correo") {
                if (!filter_var($_POST[$key], FILTER_VALIDATE_EMAIL)) {
                    return false;
                }
            }

            // Conversión a entero
            if ($type === "int") {
                $tmp = (int)$tmp;
            }

            // Conversión a float
            if ($type === "float") {
                $tmp = (float)$tmp;
            }
        }
    }

    return $tmp;
}
?>