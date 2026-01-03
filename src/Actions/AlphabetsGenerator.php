<?php

declare(strict_types=1);

namespace Dllobell\NanoId\Plugin\Actions;

use Composer\Composer;
use Composer\IO\IOInterface;

final readonly class AlphabetsGenerator
{
    public function __construct(private Composer $composer, private IOInterface $io) {}

    public function __invoke(): void
    {
        $alphabets = $this->collectAlphabets();

        $this->writeAlphabetsFile($alphabets);
    }

    /**
     * @return array<string, string>
     */
    private function collectAlphabets(): array
    {
        $alphabets = [
            'Default' => '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz-',
            'Uppercase' => 'ABCDEFGHIJKLMNOPQRSTUVWXYZ',
            'Lowercase' => 'abcdefghijklmnopqrstuvwxyz',
            'Numeric' => '0123456789',
            'Alphanumeric' => '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz',
            'HexadecimalUppercase' => '0123456789ABCDEF',
            'HexadecimalLowercase' => '0123456789abcdef',
            'NoLookalikes' => '346789ABCDEFGHJKLMNPQRTUVWXYabcdefghijkmnpqrtwxyz',
        ];

        $packages = $this->composer->getRepositoryManager()->getLocalRepository()->getCanonicalPackages();

        $packages[] = $this->composer->getPackage();

        foreach ($packages as $package) {
            /** @var array{nanoid?: array{alphabets?: array<string, string>}} */
            $extra = $package->getExtra();

            $alphabets = array_merge($alphabets, $extra['nanoid']['alphabets'] ?? []);
        }

        return $alphabets;
    }

    /**
     * @param array<string, string> $alphabets
     */
    private function writeAlphabetsFile(array $alphabets): void
    {
        if ($alphabets === []) {
            return;
        }

        $content = $this->buildContent($alphabets);

        $filePath = __DIR__.'/../../build/Alphabets.php';

        file_put_contents($filePath, $content);

        $this->io->write("<info>NanoId alphabets file updated.</info>");
    }

    /**
     * @param array<string, string> $alphabets
     */
    private function buildContent(array $alphabets): string
    {
        $cases = '';
        foreach ($alphabets as $name => $value) {
            $name = str_replace(' ', '', ucwords(str_replace(['_', '-'], ' ', $name)));
            $value = addslashes($value);

            $cases .= "    case {$name} = '{$value}';\n";
        }

        return <<<PHP
<?php

declare(strict_types=1);

namespace Dllobell\\NanoId;

enum Alphabets: string implements AlphabetValue
{
{$cases}
    public function value(): string
    {
        return \$this->value;
    }
}

PHP;
    }
}
