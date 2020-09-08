<?php

namespace ItlabStudio\ApiClient\DependencyInjection;

use Symfony\Component\Config\FileLocator;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\XmlFileLoader;
use Symfony\Component\HttpKernel\DependencyInjection\Extension;

/**
 * Class ApiClientExtension
 *
 * @package ItlabStudio\ApiClient\DependencyInjection
 */
class ApiClientExtension extends Extension
{
    public function load(array $configs, ContainerBuilder $container)
    {
        $loader = new XmlFileLoader($container, new FileLocator(__DIR__ . '/../Resources/config/'));
        $loader->load('services.xml');
    }
}