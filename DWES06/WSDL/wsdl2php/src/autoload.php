<?php


 function autoload_989468df0b5a2454d90cf3853d699d45($class)
{
    $classes = array(
        'Servicio_F' => __DIR__ .'/Servicio_F.php',
        'stringArray' => __DIR__ .'/stringArray.php'
    );
    if (!empty($classes[$class])) {
        include $classes[$class];
    };
}

spl_autoload_register('autoload_989468df0b5a2454d90cf3853d699d45');

// Do nothing. The rest is just leftovers from the code generation.
{
}
