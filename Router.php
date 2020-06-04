<?php
namespace app;

class Router
{
    protected $routes = [];
    protected $postRoutes = [];
    protected $request = null;
    /**
     * Router constructor.
     * @param $request
     */
    public function __construct(IRequest $request)
    {
        $this->request = $request;
    }

    public function get($path, $closure)
    {
        $this->routes[$path] = $closure;
    }

    public function post($path, $closure)
    {
        $this->postRoutes[$path] = $closure;
    }

    public function resolve()
    {

        $path = $this->request->getPath() ?? '/';
        $method = strtolower($this->request->getMethod());
        if($path == '/logout'){
            if(isset($_SESSION)){
                session_destroy();
            }
            setcookie("firstname","",time() - 25000);
            setcookie("lastname","",time() - 25000);
            setcookie("birthdate","",time() - 25000);
            setcookie("email","",time() - 25000);
            setcookie("status","",time() - 25000);
            $path = '/login';
        }



        if($method === 'get')  {
            $closureOrView = $this->routes[$path] ?? false ;
        } else {
            $closureOrView = $this->postRoutes[$path] ?? false ;
        }

        if($closureOrView) {
            if(is_callable($closureOrView)) {
                echo call_user_func($closureOrView, $this->request,$this);
            } else {
                echo $this->renderView($closureOrView);
            }
        }  else {
            header($_SERVER["SERVER_PROTOCOL"] . " 404 Not Found");
            echo "404 Not Found";
            exit;
        }
    }

    public function renderView($view,$params = [])
    {

        $content = $this->renderOnlyView($view,$params);
        ob_start();
        if($view == 'register' or $view == 'login' or $view == 'password_recovery')  include_once __DIR__.'/views/_layout1.php';
        else include_once __DIR__.'/views/_layout.php';
        return ob_get_clean();
    }

    public function renderOnlyView($view,$params = []){
        ob_start();

        foreach ($params as $key => $value){
            $$key = $value;
        }
        if(is_array($view) or $view == '/') $view = '/home';
        include_once __DIR__ . '\views/'. $view .'.php';
        return ob_get_clean();
    }
}