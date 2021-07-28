<?php


namespace Swift\Spl;


abstract class AbstractConfig
{
    abstract function getConf($key = null);
    abstract function setConf($key,$val):bool ;
    abstract function load(array $array):bool ;
    abstract function merge(array $array):bool ;
}
