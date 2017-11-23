<?php
/**
 * Created by PhpStorm.
 * User: nielsfilmer
 * Date: 02/12/16
 * Time: 15:06
 */

namespace NielsFilmer\ProjectTools\Foundation;


use \Illuminate\Http\Request as Base;

/**
 * Custom Request class for proper ssl detection
 *
 * @author Justin van Schaick <me@domain.nl>
 */
class Request extends Base {

    /**
     * Explained on http://stackoverflow.com/questions/1175096/how-to-find-out-if-youre-using-https-without-serverhttps
     * @return boolean
     */
    public function isSecure() {
        $isSecure = parent::isSecure();

        if($isSecure) {
            return true;
        }

        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
            return true;
        } else if (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
            return true;
        }

        return false;
    }
}
