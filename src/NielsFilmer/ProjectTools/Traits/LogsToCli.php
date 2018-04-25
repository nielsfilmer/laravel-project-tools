<?php
/**
 * app/Console/Traits/CliLoggerTrait.php
 * @author Niels Filmer
 */

namespace NielsFilmer\ProjectTools\Traits;


/**
 * Adds logging to command line functions
 * @package VideoEditor\Commands\Traits
 */
trait LogsToCli {

    protected $date_format = 'Y-m-d H:i:s';
    protected $divider = "  ";

    /**
     * Displays a non-colored message
     *
     * @param $message
     */
    protected function info($message)
    {
        $message = $this->makeMessage($message);
        echo "$message\n";
    }


    /**
     * Displays a red message
     *
     * @param $message
     */
    protected function error($message)
    {
        $message = $this->makeMessage($message);
        echo "\033[31m$message\033[0m\n";
    }


    /**
     * Displays a light green message
     * @param $message
     */
    protected function comment($message)
    {
        $message = $this->makeMessage($message);
        echo "\033[3;32m$message\033[0m\n";
    }


    /**
     * Creates the actual message by concatenating the parts
     *
     * @param $message
     *
     * @return string
     */
    private function makeMessage($message)
    {
        $date = date($this->date_format);
        $class = str_pad(get_called_class(), 50, ' ', STR_PAD_RIGHT);
        return "[{$date}]{$this->divider}{$class}{$this->divider}{$message}";
    }
}
