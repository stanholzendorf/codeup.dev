<?php

class Input
{
    /**
     * Check if a given value was passed in the request
     *
     * @param string $key index to look for in request
     * @return boolean whether value exists in $_POST or $_GET
     */
    public static function has($key)
    {
        if (isset($_REQUEST[$key])) {
        return true;
    } else {

    return false;
    }
    }

    /**
     * Get a requested value from either $_POST or $_GET
     *
     * @param string $key index to look for in index
     * @param mixed $default default value to return if key not found
     * @return mixed value passed in request
     */
    public static function get($key, $default = null)
    {
        if (self::has($key) == true) {
        return $_REQUEST[$key];
    }   else {
            return $default;
    }
    }
    

    ///////////////////////////////////////////////////////////////////////////
    //                      DO NOT EDIT ANYTHING BELOW!!                     //
    // The Input class should not ever be instantiated, so we prevent the    //
    // constructor method from being called. We will be covering private     //
    // later in the curriculum.                                              //
    ///////////////////////////////////////////////////////////////////////////
    private function __construct() {}

public static function getString($key)
{
    $value = self::get($key);

    if(($value == null || is_resource($value)) || 
       (is_numeric($value) || is_bool($value)) ||
       is_array($value)) {
        throw new Exception("THE VALUE $key NEEDS TO BE A STRING!!!!");
    } else {
        return $value;
    }
}

// public static function getString($key)
// {
//     $value = self::get($key);
//     if(ctype_digit($value) || $value == null) {
//         throw new Exception('The value needs to be a string');
//     } 
//     else if (!ctype_alnum($value))

//     {
//         throw new Exception('The value needs to be a string');
//     }
//     return $value;
// }

public static function getNumber($key)
{
    $value = self::get($key);
    if(!is_numeric($value) || $value == null) {
        throw new Exception("THE VALUE $key NEEDS TO BE NUMERIC!!!");
    }
    return (float) $value;
}

public static function getDate($key)
{
    $value = self::get($key);
    $validDate = date_create($value);

    if($validDate) {
        return $validDate;
    } else {
        throw new Exception('The value DATE needs a valid Date!');
    }

}


}











