<?php declare(strict_types=1);

namespace JasiriLabs\SwahibaSms\Tests;

use JasiriLabs\SwahibaSms\SwahibaSmsAdapter;
use PHPUnit\Framework\Attributes\After;
use PHPUnit\Framework\TestCase;

abstract class SwahibaSmsAdapterTestCase extends TestCase
{

    /**
     * @var SwahibaSmsAdapter | null
     */
    protected static ?SwahibaSmsAdapter $adapter;

    /**
     * @var bool
     */
    protected bool $isUsingCustomAdapter = false;

    public static function tearDownAfterClass(): void
    {
        self::clearSwahibaSmsAdapterCache();
    }

    public static function clearSwahibaSmsAdapterCache(): void
    {
        static::$adapter = null;
    }

    #[After] public function cleanupAdapter(): void
    {
        $this->clearCustomAdapter();
    }

    public function clearCustomAdapter(): void
    {
        if ($this->isUsingCustomAdapter) {
            $this->isUsingCustomAdapter = false;
            self::clearSwahibaSmsAdapterCache();
        }
    }

    protected function setUp(): void
    {
        parent::setUp();
        $this->adapter();
    }

    public function adapter(): SwahibaSmsAdapter
    {
        if (!static::$adapter instanceof SwahibaSmsAdapter) {
            static::$adapter = static::createSwahibaSmsAdapter();
        }
        return static::$adapter;
    }

    abstract protected static function createSwahibaSmsAdapter(): SwahibaSmsAdapter;

    protected function useAdapter(SwahibaSmsAdapter $adapter): SwahibaSmsAdapter
    {
        static::$adapter = $adapter;
        $this->isUsingCustomAdapter = true;

        return $adapter;
    }

}
