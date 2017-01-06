<?php

namespace Nyholm\VirtualPackageInstallation;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\Installer\PackageEvent;
use Composer\Installer\PackageEvents;
use Composer\IO\IOInterface;
use Composer\Plugin\PluginInterface;

class Plugin implements PluginInterface, EventSubscriberInterface
{
    /**
     * {@inheritdoc}
     */
    public static function getSubscribedEvents()
    {
        return array(
            PackageEvents::POST_PACKAGE_INSTALL => 'listen',
            PackageEvents::POST_PACKAGE_UPDATE => 'listen',
        );
    }

    /**
     * {@inheritdoc}
     */
    public function activate(Composer $composer, IOInterface $io)
    {
        $composer->getEventDispatcher()->addSubscriber($this);
    }

    /**
     * Listens to Composer events.
     *
     * @param PackageEvent $event The Composer event.
     */
    public function listen(PackageEvent $event)
    {
        $foo = 'bar';
    }
}
