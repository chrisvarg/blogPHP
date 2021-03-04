<?php

function mostrarError($errores, $campo) {
    $alerta = '';
    if (isset($errores[$campo]) && (!empty($campo))) {
        $alerta = '<div class="alerta alerta-error">'. $errores[$campo] .'</div>';
    }

    return $alerta;
};

function borrarErrores() {
    $borrado = false;
    /*Victor usa session_unset($_SESSION['errores'] pero según la documentación
    no session_unset debe estar vacia y elimina todas las variables de las sesiones),
    recomiendan usar unset(variable de session)*/ 
    
    if (isset($_SESSION['errores'])) {
        $_SESSION['errores'] = null;
        unset($_SESSION['errores']);
    }

    if (isset($_SESSION['completado'])) {
        $_SESSION['completado'] = null;
        unset($_SESSION['completado']);
    }
}