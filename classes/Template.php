<?php
/**
 * PHP Template Engine Class.
 *
 * @author   Malik Umer Farooq <lablnet01@gmail.com>
 * @author-profile https://www.facebook.com/malikumerfarooq01/
 *
 * @license MIT
 *
 * **NOTE**
 * -This Class requires that ini file setting for fopen be set to true
 */
class Template
{
    //file
    private $file;

    //key for template data
    private $keys = [];

    //value for template data
    private $Values = [];

    /**
     * Set file.
     *
     * @param $file name of files
     *
     * @return void
     */
    private function SetFile($file)
    {
        if (file_exists($file)) {
            $this->file = $file;
        } else {
            return false;
        }
    }

    /**
     * Set attributes for template.
     *
     * @param $arrays
     *
     * @return booleans
     */
    public function SetTemplate($file, $params)
    {
        if (!empty($file)) {
            self::SetFile($file);
        } else {
            return false;
        }

        if (is_array($params)) {
            $keys = array_keys($params);

            $value = array_values($params);

            $this->keys = $keys;

            $this->Values = $value;

            return self::Rander();
        } else {
            return false;
        }
    }

    /**
     * Get content form file.
     *
     * @return raw-data
     */
    public function FetchFile()
    {
        if (self::IsFile()) {
            return file_get_contents($this->file);
        } else {
            return false;
        }
    }

    /**
     * Check file exists or not.
     *
     * @return bool
     */
    public function IsFile()
    {
        if (file_exists($this->file)) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Rander template.
     *
     * @return raw-data
     */
    public function Rander()
    {
        $file = self::FetchFile();

        $CountKeys = count($this->keys);

        $CountValues = count($this->Values);

        if ($CountKeys === $CountValues && self::IsFile()) {
            $counter = $CountKeys = $CountValues;

            for ($i = 0; $i < $counter; $i++) {
                $keys = $this->keys[$i];

                $values = $this->Values[$i];

                $tag = "{% $keys %}";

                $pattern = "/$tag/";

                $file = preg_replace("/$tag/", $values, $file);
            }

            return $file;
        } else {
            return false;
        }
    }
}
