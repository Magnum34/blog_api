<?php


namespace App\DTO\Core;

class Entity
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [];

    /**
     * Entity constructor.
     * @param array $attributes
     */
    public function __construct(array $attributes = [])
    {
        foreach ($attributes as $key => $value) {
            if (in_array($key, $this->fillable)) {
                $this->{$key} = $value;
            }
        }
    }

    /**
     * @param $key
     * @param $params
     * @return mixed
     * @throws \Exception
     */
    public function __call($key, $params)
    {
        if (!isset($this->{$key})) {
            throw new \Exception("Call to undefined method " . __CLASS__ . "::" . $key . "()");
        }

        return $this->{$key}->__invoke(... $params);
    }

    /**
     * @return false|string
     */
    public function toJson()
    {
        $object = [];
        foreach ($this->fillable as $key) {
            $object[$key] = $this->{$key};
        }
        return json_encode($object);
    }
}
