<?php
/**
 * @package AP_XmlStrategy (Zend Framework 2 Extensions)
 * @author Alessandro Pietrobelli <alessandro.pietrobelli@gmail.com>
 */

namespace AP_XmlStrategy\Mvc\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\View\Resolver as ViewResolver;

/**
 * @category   Zend
 * @package    Zend_Mvc
 * @subpackage Service
 */
class ViewXmlTemplatePathStackFactory implements FactoryInterface
{
    /**
     * Create the template map view resolver
     *
     * Creates a Zend\View\Resolver\AggregateResolver and populates it with the
     * ['view_manager']['template_map']
     *
     * @param  ContainerInterface $container
     * @param  string $name
     * @param  null|array $options
     * @return ViewResolver\TemplatePathStack
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $config = $container->get('Config');
        $stack = array();
        if (is_array($config) && isset($config['view_manager'])) {
            $config = $config['view_manager'];
            if (is_array($config) && isset($config['xml_template_path_stack'])) {
                $stack = $config['xml_template_path_stack'];
            }
        }

        $templatePathStack = new ViewResolver\TemplatePathStack();
        $templatePathStack->addPaths($stack);
        $templatePathStack->setDefaultSuffix('xml.php');

        return $templatePathStack;
    }
}
