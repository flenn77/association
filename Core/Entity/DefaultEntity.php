<?php
namespace Core\Entity;

class DefaultEntity {

    protected function hydrate($data = [])
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            if (method_exists($this, $method)) {
                $this->$method($value);
            }
        }
    }

    public function __invoke(): array
    {
        $array = array();
        $methods = get_class_methods($this);

        foreach ($methods as $method) {
            if (str_contains($method, 'get')) {
                $key = strtolower(substr($method, 3));
                if (method_exists($this, $method) && $method !== 'getId') {
                    $array[$key] = $this->$method();
                }
            }
        }
        // foreach ($this as $key => $value) {
        //     if ($key !== 'id') {
        //         $array[$key] = $value;
        //     }
        // }
        return $array;
    }
}