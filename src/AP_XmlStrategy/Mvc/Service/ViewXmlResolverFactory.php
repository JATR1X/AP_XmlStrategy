<?php
/**
 * @package AP_XmlStrategy (Zend Framework 2 Extensions)
 * @author Alessandro Pietrobelli <alessandro.pietrobelli@gmail.com>
 */

namespace AP_XmlStrategy\Mvc\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;
use Zend\View\Resolver\AggregateResolver;

/**
 * @category   Zend
 * @package    Zend_Mvc
 * @subpackage Service
 */
class ViewXmlResolverFactory implements FactoryInterface
{
    /**
     * Create the aggregate view resolver
     *
     * Creates a Zend\View\Resolver\AggregateResolver and attaches the template
     * map resolver and path stack resolver
     *
     * @param  ContainerInterface $container
     * @param  string $name
     * @param  null|array $options
     * @return AggregateResolver
     */
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        $resolver = new AggregateResolver();
        $resolver->attach($container->get('ViewXmlTemplateMapResolver'));
        $resolver->attach($container->get('ViewXmlTemplatePathStack'));

        return $resolver;
    }
}
