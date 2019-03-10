<?php
namespace MicroForce\Factory;

use Symfony\Component\Templating\Loader\FilesystemLoader;
use Symfony\Component\Templating\TemplateNameParser;

class TemplateEngineFactory
{
    private $config = ['engine' => null, 'template_location' => null];
   
    // J'initialise des objets instancié de la classe avec les config de 
    // l'engine_template et la location_template de mon Engine Template
    public function __construct(string $engine, string $templateLocation) {
        $this->config['engine'] = $engine;
        $this->config['template_location'] = $templateLocation;
    }
   
    // Je crée mon engine 
    public function createEngine() {
        $loader = new FilesystemLoader($this->config['template_location']);
        $engine = $this->config['engine'];
        // ???????????????????????????????????????????
        return new $engine(new TemplateNameParser(), $loader);
        // ???????????????????????????????????????????
    }
}