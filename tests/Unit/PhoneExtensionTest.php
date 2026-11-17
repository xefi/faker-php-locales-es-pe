<?php

namespace Xefi\Faker\EsPe\Tests\Unit;

final class PhoneExtensionTest extends TestCase
{
    public function testPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^(9\d{8}|1[247]\d{6}|(44|54|74|84|73)[23]\d{5})$/', $this->faker->phoneNumber());
        }
    }

    public function testCellPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^9\d{8}$/', $this->faker->cellPhoneNumber());
        }
    }

    public function testSpacedCellPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^9\d{2} \d{3} \d{3}$/', $this->faker->spacedCellPhoneNumber());
        }
    }

    public function testSpacedLandlinePhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^(1 [247]\d{2} \d{4}|(44|54|74|84|73) [23]\d{2} \d{3})$/', $this->faker->spacedLandlinePhoneNumber());
        }
    }

    public function testIndicatoredPhoneNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^\+51(9\d{8}|1[247]\d{6}|(44|54|74|84|73)[23]\d{5})$/', $this->faker->indicatoredPhoneNumber());
        }
    }
}
