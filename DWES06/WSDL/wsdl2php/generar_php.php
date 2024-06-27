<?php
    require('vendor/autoload.php');
    $generator = new \Wsdl2PhpGenerator\Generator();
    $generator->generate(
        new \Wsdl2PhpGenerator\Config(array(
            'inputFile' => '../serviciow.wsdl', //donde esta el wsdl.xml
            'outputDir' => 'src/'
        ))
    );
?>


