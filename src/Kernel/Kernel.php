<?php
namespace MicroForce\Kernel;

use Symfony\Component\Routing\RouteCollection;
use MicroForce\Controller\HomepageController;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Templating\EngineInterface;
use MicroForce\Engine\EngineSingleton;
use MicroForce\Connection\ConnectionSingleton;
use MicroForce\Factory\TemplateEngineFactory;


class Kernel
{
    // load the DB connection of the array configuration
    public function loadConnection(array $configuration) : \PDO {
        return new \PDO(
            sprintf(
                'mysql:host=%s;dbname=%s',
                $configuration['host'],
                $configuration['dbname']
            ),
            $configuration['user'],
            $configuration['password']
        );
    }
   
    // load the template of the Engine with the config set by the config in config.php
    public function loadTemplateEngine($config) : EngineInterface
    {
        // /%name% ???????????????????????????????????????????????????????????????????????????????????????????????
        $factory = new TemplateEngineFactory($config['template_engine'], $config['template_location'].'/%name%');
        // /%name% ???????????????????????????????????????????????????????????????????????????????????????????????
        return $factory->createEngine();
    }
    
    public function getConfig()
    {
        return include __DIR__ . '/../../config/config.php';
    }
    
    public function start() : string
    {
        //
        // Start the heart of the application
        //
        try {
            //
            // class Kernel => class ConnectionSingleton => setConnection (!!!!!) => loadConnection => getConfig
            //
            ConnectionSingleton::setConnection($this->loadConnection($this->getConfig()['DB']));
        } catch (\PDOException $e) {
            return '500';
        }
        
        // ???????????????????????? Pourquoi j'ai besoin d'une factory alors que je prend déjà la config de mon engine
        $engine = $this->loadTemplateEngine($this->getConfig());
        EngineSingleton::setEngine($engine);

        // Execute routing
        $routeDefinition = $this->executeRouting();
        // If we can math a controller
        if ($routeDefinition !== null) {
            // Load the controller
            $controllerName = $routeDefinition['_controller'];
            $controller = new $controllerName();
            // Call the controller method
            $method = $routeDefinition['_method'];
            return $controller->$method();
        }

        return '404';
    }
    
    private function executeRouting() : ?array
    {
        // Load routing collection informations
        $collection = $this->loadRouting();
        
        // Try to match a route
        try {
            // ??????? RequestContext + Request ???????
            // Je crée un nouvel objet (RequestContext) instancié à la class Kernel
            $context = new RequestContext();
            // de la request ... createFromGlobals ?????????????????????
            $context->fromRequest(Request::createFromGlobals());
            
            // UrlMatcher ????????????????????????
            $matcher = new UrlMatcher($collection, $context);
            return $matcher->match($context->getPathInfo());
            // Return the route definition
        } catch (\Exception $e) {
            // Catch exception
            // Return null
            return null;
        }
    }

    private function loadRouting() : RouteCollection
    {
        // Create each routes
        $homepage = new Route(
            '/',
            [
                '_controller' => HomepageController::class,
                '_method' => 'homepage'
            ]
            );
        // Add them to the route collection
        $collection = new RouteCollection();
        $collection->add('homepage', $homepage);
        // return the collection
        return $collection;
    }
    
}
