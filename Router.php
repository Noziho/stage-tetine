<?php

class Router
{

    /**
     * @throws ReflectionException
     */
    public static function routeur ()
    {
        $strController = self::getParam('c', 'home');
        $method = self::getParam('a');
        $controller = self::guessController($strController);

        if ($controller instanceof ErrorController) {
            $controller->error404($strController);
            exit();
        }

        //Here we have a controller for sure
        $method = self::guessMethod($controller, $method);
        if (null === $method) {
            $controller->index();
        }
        else {
            $params = self::guessParam($controller, $method);
            if (count($params) === 0) {
                $controller->$method();
            }
            else {
                $parameters = [];
                foreach ($params as $param) {
                    $get = $_GET[$param['paramName']];
                    $parameters[] = $get;
                }
                $controller->$method(...$parameters);
            }

        }

    }

    /**
     * @throws ReflectionException
     */
    private static function guessParam (AbstractController $controller, string $method): array
    {
        $params = [];
        $reflexion = new ReflectionMethod($controller, $method);
        $parameters = $reflexion->getParameters();
        foreach ($parameters as $parameter) {
            $params = [
              "paramName" => $parameter->name,
              "paramType" => $parameter->getType(),
            ];
        }
        return$params;

    }
    /**
     * @param AbstractController $controller
     * @param string|null $method
     * @return string|null
     */
    private static function guessMethod (AbstractController $controller, ?string $method): ?string
    {
        if (strpos($method, '-') !== -1) {
            $method = lcfirst(str_replace(' ', '', ucwords(str_replace('-', ' ', $method))));
        }

        $method = lcfirst($method);
        return method_exists($controller, $method) ? $method : null;
    }


    /**
     * @param string $controller
     * @return ErrorController|mixed
     */
    private static function guessController(string $controller)
    {
        $controller = ucfirst($controller) . "Controller";
        return class_exists($controller) ? new $controller : new ErrorController();
    }

    /**
     * @param string $param
     * @param null $default
     * @return mixed|null
     */
    private static function getParam(string $param, $default = null)
    {
        if (isset($_GET[$param])) {
            return filter_var($param, FILTER_SANITIZE_STRING);
        }
        return $default;
    }
}