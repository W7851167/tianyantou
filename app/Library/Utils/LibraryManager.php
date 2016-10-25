<?php
namespace App\Library\Utils;


class LibraryManager
{
    private $app;

    public function __construct($app)
    {
        $this->app = $app;
    }

    /**
     * @param $class
     * @param array $args
     * @return object
     * 加载所有第三方库
     */
    public function create($class, $args=array()) {
        // use reflection or new for object creation
        $class = 'App\Library\Utils\\' . ucfirst($class);
        if (count($args) > 0) {
            $reflection = new \ReflectionClass($class);
            $object = $reflection->newInstanceArgs($args);
        } else {
            $object = new $class();
        }

        if (property_exists($object, 'app')) {

            $object->app = $this->app;
        }
        return $object;
    }

}