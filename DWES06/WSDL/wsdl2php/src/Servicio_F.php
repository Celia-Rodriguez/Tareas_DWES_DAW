<?php

class Servicio_F extends \SoapClient
{

    /**
     * @var array $classmap The defined classes
     */
    private static $classmap = array (
  'stringArray' => '\\stringArray',
);

    /**
     * @param array $options A array of config values
     * @param string $wsdl The wsdl file to use
     */
    public function __construct(array $options = array(), $wsdl = null)
    {
    
  foreach (self::$classmap as $key => $value) {
    if (!isset($options['classmap'][$key])) {
      $options['classmap'][$key] = $value;
    }
  }
      $options = array_merge(array (
  'features' => 1,
), $options);
      if (!$wsdl) {
        $wsdl = 'http://localhost/DWES06/WSDL/serviciow.wsdl';
      }
      parent::__construct($wsdl, $options);
    }

    /**
     * GET PVP Obtiene el PVP con el código de producto
     *
     * @param string $codigo
     * @return float
     */
    public function getPVP($codigo)
    {
      return $this->__soapCall('getPVP', array($codigo));
    }

    /**
     * GET STOCK  Obtiene el numero de unidades por producto en una tienda determinada
     *
     * @param string $codigo_producto
     * @param int $codigo_tienda
     * @return int
     */
    public function getStock($codigo_producto, $codigo_tienda)
    {
      return $this->__soapCall('getStock', array($codigo_producto, $codigo_tienda));
    }

    /**
     * GET FAMILIAS  Obtiene la lista de los códigos de las Familias de productos
     *
     * @return stringArray
     */
    public function getFamilias()
    {
      return $this->__soapCall('getFamilias', array());
    }

    /**
     * GET PRODUCTOS FAMILIA  Obtiene una lista de codigos de prpducto según el codigo de familia
     *
     * @param string $codigo_familia
     * @return stringArray
     */
    public function getProductosFamilia($codigo_familia)
    {
      return $this->__soapCall('getProductosFamilia', array($codigo_familia));
    }

}
