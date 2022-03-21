<?php
abstract class AbstractController
{
    abstract public function index();

    public function render (string $template, $data = []) {
        ob_start();
        require __DIR__ . "/../View/" . $template . ".html.php";
        $html = ob_get_clean();
        require __DIR__. "/../View/base.html.php";
    }

    public function formIssets (...$names): bool
    {
        foreach ($names as $name) {
            if (!isset($_POST[$name])) {
                return false;
            }
        }
        return true;
    }
}