<?php
/**
 * Extends php array data type to enhance it with new funtionality.
 * Encodes to JSON on string conversion and has methods to write and read files.\
 *
 * @author Alejandro Mostajo
 * @license MIT
 * @version 1.0.0
 */
class JSONArray extends ArrayObject
{
    /**
     * Casts to json.
     * @since 1.0.0
     *
     * @return string json
     */
    public function toJson()
    {
        return json_encode($this);
    }

    /**
     * Cast to string.
     * @since 1.0.0
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toJson();
    }

    /**
     * Reads .json file and converts it to array.
     * @since 1.0.0
     *
     * @param string $filename Path to file.
     *
     * @return void
     */
    public function read($filename)
    {
        $file = fopen($filename, 'r');
        $json = fread($file, filesize($filename));
        fclose($file);
        $array = (array)json_decode($json);
        foreach ($array as $key => $value) {
            $this[$key] = $value;
        }
        unset($file);
        unset($json);
        unset($array);
    }

    /**
     * Reads .json file and converts it to array.
     * @since 1.0.0
     *
     * @param string $filename Path to file.
     *
     * @return void
     */
    public function write($filename)
    {
        if (count($this) == 0) return;
        $file = fopen($filename, 'w');
        fwrite($file, $this->toJson());
        fclose($file);
        unset($file);
    }
}