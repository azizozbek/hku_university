<?php
spl_autoload_register('hku_autoloader');
function hku_autoloader($class) {
    $namespace = 'HKU\Theme';

    if (strpos($class, $namespace) !== 0) {
        return;
    }

    $class = str_replace($namespace, '', $class);
    $class = str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.php';

    $directory = get_template_directory();
    $src = $directory . DIRECTORY_SEPARATOR . 'src' . DIRECTORY_SEPARATOR . $class;

    if (file_exists($src)) {
        require_once($src);
    }

    $importer = $directory . DIRECTORY_SEPARATOR . 'src/wp-importer' . DIRECTORY_SEPARATOR . $class;
    if (file_exists($importer)) {
        require_once($importer);
    }
}
