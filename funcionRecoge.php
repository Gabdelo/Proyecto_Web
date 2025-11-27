<?php
function recoge($key, $type = "")
{
    if (!is_string($key) && !is_int($key) || $key === "") {
        trigger_error("El campo correspondiente no es correcto", E_USER_ERROR);
    } else {
        if (($type !== "") && ($type !== []) && ($type !== "Correo")) {
            trigger_error("El tipo correspondiente no es correcto", E_USER_ERROR);
        }
    }

    $tmp = "";
    if (isset($_POST[$key])) {
        if (!is_array($_POST[$key]) && !is_array($type)) {

            $tmp = trim(htmlspecialchars($_POST[$key]));

            if ($type === "Correo") {
                if (!filter_var($_POST[$key], FILTER_VALIDATE_EMAIL)) {
                    return false;
                }
            }
        } elseif (is_array($_POST[$key]) && is_array($type)) {
            $tmp = $_POST[$key];
            array_walk_recursive($tmp, function (&$value) {
                $value = trim(htmlspecialchars($value));
            });
        }
    }


    return $tmp;
}
