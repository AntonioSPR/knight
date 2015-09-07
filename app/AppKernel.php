<?php
// app/AppKernel.php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;
 
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        return array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new AppBundle\AppBundle(), 
        );
    }
 
    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $file = 'config';
        if ('test' === $this->getEnvironment()) {
            $file .= '_test';
        }

        $loader->load(__DIR__.'/config/$file.yml');
    }
}