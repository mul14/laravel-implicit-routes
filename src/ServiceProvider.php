<?php

namespace Nasution\ImplicitRoutes;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $router = $this->app->router;

        $router->macro('anything', function () use ($router) {
            $controller = ucfirst(strtolower(request()->segment(1))) . 'Controller';
            $method = request()->segment(2) ? strtolower(request()->segment(2)) : 'index';
            $params = request()->segments(); array_shift($params); array_shift($params);
            $path = request()->path();

            foreach($params as $index => $param) {
                $path = str_replace($param, "{param{$index}}", $path);
            }

            $router->any($path, $controller . '@' . $method);
        });
    }
}
