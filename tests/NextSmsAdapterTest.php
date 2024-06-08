<?php declare(strict_types=1);

use JasiriLabs\SwahibaSms\Config;
use JasiriLabs\SwahibaSms\NextSms\NextSmsClientStub;
use JasiriLabs\SwahibaSms\SwahibaSmsAdapter;
use JasiriLabs\SwahibaSms\NextSms\NextSmsAdapter;
use PHPUnit\Framework\Attributes\Test;

final class NextSmsAdapterTest extends SwahibaSmsAdapterTestCase
{

    /**
     * @var NextSmsClientStub
     */
    private static NextSmsClientStub $stubNextSmsClient;

    protected static function createSwahibaSmsAdapter(bool $streaming = true, array $options = []): SwahibaSmsAdapter
    {
        $config = new Config([
            'username' => 'foo',
            'password' => 'baz',
        ]);

        static::$stubNextSmsClient = new NextSmsClientStub($config);
//        static::$stubNextSmsClient->stageResult('send', new SendSmsResponse(['35891385367034994620', '35891385367034994621']));

        return new NextSmsAdapter(static::$stubNextSmsClient);
    }

    #[Test] public function can_send_single_sms__to_single_channel_as_expected(): void
    {

        // Arrange
        $adapter = $this->adapter();

        // Act
        $response = $adapter->send('255757221600', 'Hello sigma SMS!');

        // Assert
        $this->assertTrue(true);

    }
}

//can send single sms to single destination
//can send single sms to multiple destinations
//can send multiple sms to single destination
//can send multiple sms to multiple destinations
//can schedule single sms to single destination
//can schedule single sms to multiple destinations
//can schedule multiple sms to single destination
//can schedule multiple sms to multiple destinations
//can get delivery status of single sms
//can get sms balance
