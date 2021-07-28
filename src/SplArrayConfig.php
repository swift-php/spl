<?php


namespace Swift\Spl;


class SplArrayConfig extends AbstractConfig
{
    private $splArray;

    function __construct()
    {
        $this->splArray = new SplArray();
    }

    function getConf($key = null)
    {
        if($key === null){
            return $this->splArray->getArrayCopy();
        }
        return $this->splArray->get($key);
    }

    function setConf($key, $val): bool
    {
        $this->splArray->set($key,$val);
        return true;
    }

    function load(array $array): bool
    {
        $this->splArray->loadArray($array);
        return true;
    }
}