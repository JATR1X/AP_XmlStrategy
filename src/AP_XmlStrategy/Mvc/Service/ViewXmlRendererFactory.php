<?php
/**
 * @package AP_XmlStrategy (Zend Framework 2 Extensions)
 * @author Alessandro Pietrobelli <alessandro.pietrobelli@gmail.com>
 */

namespace AP_XmlStrategy\Mvc\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use AP_XmlStrategy\View\Renderer\XmlRenderer;

/**
 * @category   Zend
 * @package    Zend_Mvc
 * @subpackage Service
 */
class ViewXmlRendererFactory implements FactoryInterface
{
    /**
     * Create and return the feed view renderer
     *
     * @param  ContainerInterface $container
     * @param  string $name
     * @param  null|array $options
     * @return XmlRenderer
     */
    public function __invoke(ContainerInterface $container, $name, array $options = null)
    {
        $renderer = new XmlRenderer();

        $renderer->setResolver($container->get('ViewXmlResolver'));

        // TODO: has a likely hood of 99% to cause a bug
        //$renderer->setHelperPluginManager(clone $container->get('ViewHelperManager'));

        return $renderer;
    }
}
