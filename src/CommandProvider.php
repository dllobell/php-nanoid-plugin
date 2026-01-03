<?php

declare(strict_types=1);

namespace Dllobell\NanoId\Plugin;

use Composer\Plugin\Capability\CommandProvider as CapabilityCommandProvider;
use Dllobell\NanoId\Plugin\Commands\GenerateAlphabetsCommand;

final readonly class CommandProvider implements CapabilityCommandProvider
{
    public function getCommands()
    {
        return [new GenerateAlphabetsCommand()];
    }
}
