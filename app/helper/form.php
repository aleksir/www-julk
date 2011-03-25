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
 * Form helper
 * 
 * You can use like this:
 * Form::create("login")
 *     ->label("Username","username")
 *     ->text_field("username")
 *     ->line_break();
 *     ->label("Password","passwd")
 *     ->password_field("passwd")
 *     ->line_break();
 *     ->submit("Login","login");
 *
 * @author Aleksi Rautakoski
 */
class Form {
    private $children = array();
    private $action;
    private $html;
    
    public function __construct($action,$html=array()) {
        $this->action = $action;
        foreach ($html as $attr => $val) {
            $html .= "$attr=\"$val\" ";
        }
    }
    
    public static function create($action,$html=array()) {
        return new Form($action,$html);
    }
    
    public static function _line_break($args) {
        return '<br />';
    }
    
    /**
     * @param $args array($attr => $val)
     */
    public static function _input($args) {
        $tag = "<input";
        foreach($args as $attr => $val) {
            $tag .= " $attr=\"$val\"";
        }
        $tag .= " />";
        return $tag;
    }
    
    /**
     * [0] test, [1] for
     */
    public static function _label($args) {
        return '<label for="'.$args[1].'">'.$args[0].'</label>';
    }
    
    /**
     * [0] name, [1] default value
     */
    public static function _text_field($args) {
        return Form::_input(array( "type" => "text", "name" => $args[0], "id" => $args[0], "value" => $args[1] ));
    }
    
    /**
     * [0] name, [1] default value
     */
    public static function _password_field($args) {
        return Form::_input(array( "type" => "password", "name" => $args[0], "id" => $args[0], "value" => $args[1] ));
    }
    
    
    /**
     * @param [0] event
     * @param [1] name
     */
    private static function _submit($args) {
        return '<input type="submit" name="event_'.$args[0].'" value="'.$args[1].'" class="button" />';
    }
    
    /**
     * @return String This form in one string
     */
    public function __toString() {
        $str = '<form method="POST" action="' . $this->action . '" '. $this->html .'>';
        foreach ($this->children as $line) {
            $str .= $line;
        }
        $str .= '</form>';
        return $str;
    }
    
    public function __call($name,$args) {
        $name = '_'.$name;
        if ( method_exists($this,$name) ) {
            array_push( $this->children, $this->$name($args) );
            return $this;
        }
    }
    public static function __callStatic($name,$args) {
        $name = '_'.$name;
        if ( method_exists(Form,$name) ) {
            return Form::$name($args);
        }
    }
}

?>