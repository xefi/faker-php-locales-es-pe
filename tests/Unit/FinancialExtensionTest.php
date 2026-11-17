<?php

namespace Xefi\Faker\EsPe\Tests\Unit;

use Xefi\Faker\Calculators\Iban;

final class FinancialExtensionTest extends TestCase
{
    public function testCci(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $cci = $this->faker->cci();

            $this->assertMatchesRegularExpression('/^\d{20}$/', $cci);
            $this->assertTrue($this->isValidCci($cci), "CCI '{$cci}' has invalid check digits.");
        }
    }

    public function testKnownCciIsValid(): void
    {
        $this->assertTrue($this->isValidCci('01136600010003254221'));
        $this->assertFalse($this->isValidCci('01136600010003254222'));
    }

    public function testIban(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $iban = $this->faker->iban();

            $this->assertEquals(24, strlen($iban));
            $this->assertStringStartsWith('PE', $iban);
            $this->assertTrue(Iban::isValid($iban));
            $this->assertTrue($this->isValidCci(substr($iban, 4)));
        }
    }

    private function isValidCci(string $cci): bool
    {
        return strlen($cci) === 20
            && $this->checkDigit(substr($cci, 0, 6)) === (int) $cci[18]
            && $this->checkDigit(substr($cci, 6, 12)) === (int) $cci[19];
    }

    private function checkDigit(string $digits): int
    {
        $sum = 0;
        foreach (str_split($digits) as $index => $digit) {
            $product = (int) $digit * ($index % 2 === 0 ? 1 : 2);
            $sum += array_sum(str_split((string) $product));
        }

        return (10 - $sum % 10) % 10;
    }
}
