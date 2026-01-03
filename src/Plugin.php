<?php

declare(strict_types=1);

namespace Dllobell\NanoId\Plugin;

use Composer\Composer;
use Composer\EventDispatcher\EventSubscriberInterface;
use Composer\IO\IOInterface;
use Composer\Plugin\Capable;
use Composer\Plugin\PluginInterface;
use Composer\Script\Event;
use Composer\Script\ScriptEvents;
use Dllobell\NanoId\Plugin\Actions\AlphabetsGenerator;

final readonly class Plugin implements PluginInterface, EventSubscriberInterface, Capable
{
    public function activate(Composer $composer, IOInterface $io): void {}

    public function deactivate(Composer $composer, IOInterface $io): void {}

    public function uninstall(Composer $composer, IOInterface $io): void {}

    public static function getSubscribedEvents(): array
    {
        return [
            ScriptEvents::PRE_AUTOLOAD_DUMP => 'onPreAutoloadDump',
        ];
    }

    public function getCapabilities(): array
    {
        return [
            'Composer\\Plugin\\Capability\\CommandProvider' => CommandProvider::class,
        ];
    }

    public function onPreAutoloadDump(Event $event): void
    {
        (new AlphabetsGenerator($event->getComposer(), $event->getIO()))();
    }
}
