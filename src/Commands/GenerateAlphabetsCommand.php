<?php

declare(strict_types=1);

namespace Dllobell\NanoId\Plugin\Commands;

use Composer\Command\BaseCommand;
use Dllobell\NanoId\Plugin\Actions\AlphabetsGenerator;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;

final class GenerateAlphabetsCommand extends BaseCommand
{
    protected function configure(): void
    {
        $this
            ->setName('nanoid:generate-alphabets')
            ->setDescription('Generate NanoId alphabets file')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        (new AlphabetsGenerator($this->requireComposer(), $this->getIO()))();

        return self::SUCCESS;
    }
}
