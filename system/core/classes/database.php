<?php

/*
 *  The MIT License
 * 
 *  Copyright (c) 2011 Aleksi Rautakoski.
 * 
 *  Permission is hereby granted, free of charge, to any person obtaining a copy
 *  of this software and associated documentation files (the "Software"), to deal
 *  in the Software without restriction, including without limitation the rights
 *  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 *  copies of the Software, and to permit persons to whom the Software is
 *  furnished to do so, subject to the following conditions:
 * 
 *  The above copyright notice and this permission notice shall be included in
 *  all copies or substantial portions of the Software.
 * 
 *  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 *  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 *  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 *  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 *  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 *  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 *  THE SOFTWARE.
 */

/**
 * Database class used in this framework.
 * Use <code>{{table}}</code> if you want to use prefix in names.
 *
 * @author Aleksi Rautakoski
 * @package system.db
 */
class DataBase extends PDO {

    public static $table_prefix;
    public static $type;
    public static $sqlite_location;
    public static $dsn;
    public static $mysql_server;
    public static $mysql_name;
    public static $mysql_username;
    public static $mysql_password;
    public static $options;

    public function __construct() {
        try {
            parent::__construct(DataBase::$dsn, DataBase::$mysql_username, DataBase::$mysql_password, DataBase::$options);
        } catch (PDOException $e) {
            throw new DataBaseException($e->getMessage());
        }
    }

    public function init($settings) {

        DataBase::$table_prefix = $settings['table_prefix'];
        DataBase::$type = $settings['type'];
        DataBase::$sqlite_location = $settings['sqlite_location'];

        DataBase::$mysql_username = $settings['mysql_username'];
        DataBase::$mysql_password = $settings['mysql_password'];
        DataBase::$mysql_server = $settings['mysql_server'];
        DataBase::$mysql_name = $settings['mysql_name'];


        if (strtolower(DataBase::$type) == 'sqlite') {
            $filename = ROOT_PATH . DataBase::$sqlite_location;

            if (!is_writable($filename) || !is_writable(dirname($filename))) {
                throw new DataBaseException("[" . __FILE__ . "] sqlite-database file and its directory must be writable.");
            }

            DataBase::$dsn = 'sqlite:' . $filename;
        } elseif (strtolower(DataBase::$type) == 'mysql') {
            //TODO: mysql
            die("[" . __FILE__ . "] Mysql not supported yet.");
        } else {
            die("[" . __FILE__ . "] Check your db-settings.");
        }
    }

    public function exec($query) {
        $query = $this->attach_prefix($query);
        return parent::exec($query);
    }

    public function prepare($statement, $driver_options = array()) {
        $statement = $this->attach_prefix($statement);
        return parent::prepare($statement, $driver_options);
    }

    public function query($statement) {
        $statement = $this->attach_prefix($statement);
        return parent::query($statement);
    }

    private function attach_prefix($statement) {
        return preg_replace('/\{\{(\w+)\}\}/i', $this->table_prefix . '${1}', $statement);
    }

    public function __get($name) {
        return $this->$name;
    }

}

?>
