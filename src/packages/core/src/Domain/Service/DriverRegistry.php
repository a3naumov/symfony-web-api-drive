<?php

declare(strict_types=1);

namespace A3Naumov\WebApiDriveCore\Domain\Service;

use A3Naumov\WebApiDriveContract\Drive\DriverInterface;
use A3Naumov\WebApiDriveCore\Domain\Exception\Drive\InvalidDriverException;

class DriverRegistry
{
    /**
     * @var array<string, DriverInterface>
     */
    private array $drivers = [];

    /**
     * @param iterable<DriverInterface> $drivers
     */
    public function __construct(
        iterable $drivers,
    ) {
        foreach ($drivers as $driver) {
            $this->register($driver);
        }
    }

    public function register(DriverInterface $driver): void
    {
        $this->drivers[$driver->getCode()] = $driver;
    }

    /**
     * @throws InvalidDriverException
     */
    public function get(string $code): DriverInterface
    {
        return $this->drivers[$code] ?? throw new InvalidDriverException();
    }
}
