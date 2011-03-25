<?php

/**
 * Description of Session
 *
 * @author Aleksi Rautakoski
 */
class Session {
    private static $_init = false;
    private static $logged_in = false;
    
    /**
     * @var int Session timeout in seconds, default 3600
     */
    public static $session_timeout = 3600;
    public static $session_id;
    public static $uid;
    public static $user_agent;
    public static $last_seen;
    public static $addr;
    public static $cookie_lifetime = 0;
    public static $session_name = 'Session';
    public static $stored_location;
    
    public function __construct() {
        if (!(Session::$_init)) {
            Session::init();
        }
    }

    public static function init() {
        Session::$_init = true;

        session_name(Session::$session_name);
        ini_set('session.gc_maxlifetime', Session::$session_timeout);
        ini_set('session.cookie_lifetime', Session::$cookie_lifetime);

        session_start();

        Session::$session_id = session_id();
        
        Session::$stored_location = $_SESSION['stored_location'];
        
        if (Session::check_session()) {
            Session::$uid = $_SESSION['uid'];
            Session::$user_agent = $_SERVER['HTTP_USER_AGENT'];
            Session::$last_seen = $_SESSION['last_seen'];
            Session::$addr = $_SESSION['addr'];
        } else {
            return false;
        }
    }

    public static function check_session() {
        /*
         * Check if there is session
         */
        if (!isset($_SESSION['uid'])) {
            return false;
        }

        /*
         * Check user_agent
         */
        if (!isset($_SESSION['user_agent'])
                || $_SESSION['user_agent'] != $_SERVER['HTTP_USER_AGENT']) {
            Session::destroy_session();
            return false;
        }

        /*
         * Check if session is not expired
         */
        if (!isset($_SESSION['last_seen'])
                || $_SESSION['last_seen'] < time() - Session::$session_timeout
                || Sesssion::$session_timeout <= 0) {
            Session::destroy_session();
            return false;
        } else {
            $_SESSION['last_seen'] = time();
        }

        /*
         * Check ip
         */
        if (!isset($_SESSION['addr']) || $_SESSION['addr'] != $_SERVER['REMOTE_HOST']) {
            return false;
        }


        return true;
    }

    public static function redirect_stored_location() {
        if ( Session::$stored_location) {
            Header( "Location: Session::$stored_location" );
            die();
        }
    }
    
    public static function store_location() {
        Session::$stored_location = $_SESSION['stored_location'] = Request::$url;
    }
    
    public static function create_session($uid) {
        session_regenerate_id();

        Session::$uid = $_SESSION['uid'] = $uid;
        Session::$last_seen = $_SESSION['last_seen'] = time();
        Session::$user_agent = $_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
        Session::$addr = $_SESSION['addr'] = $_SERVER['REMOTE_HOST'];
    }

    public static function destroy_session() {
        unset($_SESSION['uid'], Session::$uid);
        //unset($_SESSION['user_agent'], Session::$user_agent);
        //unset($_SESSION['last_seen'], Session::$last_seen);
        //unset($_SESSION['addr'], Session::$addr);
        //$_SESSION = array();

        session_unset();
        session_destroy();
    }
    
    public static function logged_in() {
        return Session::$logged_in;
    }
}
    
?>
