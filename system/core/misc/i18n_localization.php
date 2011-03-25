<?php

ROOT_PATH = substr(__DIR__, 0, -13);
$lang = array();

scan(ROOT_PATH, &$lang);

println('$lang = array (');

foreach ($lang as $string) {
    println("    '$string' => '$string',");
}

println(');');

function scan(ROOT_PATH, &$lang) {

    $files = scandir(ROOT_PATH);

    foreach ($files as $f) {
        if (substr($f, 0, 1) == '.')
            continue;

        if (is_file(ROOT_PATH . $f) && preg_match('/.*\.php|inc|html|htm|xhtml$/', $f) ) {
            $file = file(ROOT_PATH . $f);
            foreach ($file as $line) {
                preg_match_all('/Sees::[Ss]tring\([\'\"]([^\'^\".]*)[\'\"]\)/', $line, $out);
                if (count($out[1]) > 0) {
                    foreach($out[1] as $m) {
                        $lang[$m] = $m;
                    }
                    
                }
            }
        } elseif (is_dir(ROOT_PATH . $f)) {
            scan(ROOT_PATH . $f . '/', &$lang);
        }
    }
}

function println($string) {
    print_r($string . "\n");
}

?>
