<?php


namespace App\DTO\Core;

use InvalidArgumentException;

class ConvertStdClass
{


    /**
     * @param $className
     * @param \stdClass $object
     * @return mixed
     */
    public static function recast($className, \stdClass &$object)
    {

        if (!class_exists($className)) {
            throw new InvalidArgumentException("Inexistant class  $className");
        }

        $new = new $className();

        foreach ($object as $property => &$value) {
            $new->$property = &$value;
            unset($object->$property);
        }
        unset($value);
        return $new;
    }

    /**
     * @param $className
     * @param array $array
     * @return array
     */
    public static function recastArray($className, array $array)
    {

        if (!class_exists($className)) {
            throw new InvalidArgumentException("Inexistant class  $className");
        }

        foreach ($array as $key => $object) {
            $new = new $className();
            foreach ($object as $property => &$value) {
                $new->$property = &$value;
                unset($object->$property);
            }
            $array[$key] = $new;
            unset($value);
        }
        return $array;
    }
}
