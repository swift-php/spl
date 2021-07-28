<?php


namespace Swift\Spl;


class SplArray extends \ArrayObject
{
    function __get($name)
    {
        // TODO: Implement __get() method.
        if (isset($this[$name])) {
            return $this[$name];
        } else {
            return null;
        }
    }

    function __set($name, $value)
    {
        // TODO: Implement __set() method.
        $this[$name] = $value;
    }

    function getArrayCopy(): array
    {
        return (array)$this;
    }

    function set($path, $value): void
    {
        $path = explode('.', $path);
        $temp = $this;
        while ($key = array_shift($path)) {
            $temp = &$temp[$key];
        }

        $temp = $value;
    }

    function get($path)
    {
        $paths = explode('.', $path);
        $data = $this->getArrayCopy();
        while ($key = array_shift($paths)) {
            if (isset($data[$key])) {
                $data = $data[$key];
            } else {
                return null;
            }
        }

        return $data;
    }

    public function values(): SplArray
    {
        return new SplArray(array_values($this->getArrayCopy()));
    }

    public function flush(): SplArray
    {
        foreach ($this->getArrayCopy() as $key => $item) {
            unset($this[$key]);
        }
        return $this;
    }

    public function loadArray(array $data)
    {
        parent::__construct($data);
        return $this;
    }

    function merge(array $data)
    {
        return $this->loadArray($data + $this->getArrayCopy());
    }


}
