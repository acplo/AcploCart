<?php
namespace AcploCart\Factory;

use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use AcploCart\Controller\Plugin\AcploCart;

class AcploCartFactory implements FactoryInterface
{
    public function createService(ServiceLocatorInterface $servicelocator)
    {
        $allServices = $servicelocator->getServiceLocator();
        $config = $allServices->get('ServiceManager')->get('Configuration');

        if (!isset($config['acplocart']))
        {
            throw new \Exception('Configuration AcploCart not set.');
        }

        if (!isset($config['acplocart']['vat']))
        {
            throw new \Exception('No vat index defined.');
        }

        $default = array(
            'on_insert_update_existing_item' => false
        );

        $options = array_merge($default, $config['acplocart']);

        return new AcploCart($options);
    }
}