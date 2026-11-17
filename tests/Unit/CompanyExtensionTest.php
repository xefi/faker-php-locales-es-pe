<?php

namespace Xefi\Faker\EsPe\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\EsPe\Extensions\CompanyExtension;

final class CompanyExtensionTest extends TestCase
{
    protected array $companies = [];

    protected function setUp(): void
    {
        parent::setUp();

        $companyExtension = new CompanyExtension(new Randomizer());
        $this->companies = (new ReflectionClass($companyExtension))->getProperty('companies')->getValue($companyExtension);
    }

    public function testCompany(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->companies); $i++) {
            $results[] = $this->faker->unique()->company();
        }

        $this->assertEqualsCanonicalizing($this->companies, $results);
    }

    public function testRuc(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $ruc = $this->faker->ruc();

            $this->assertMatchesRegularExpression('/^(10|20)\d{9}$/', $ruc);
            $this->assertTrue($this->isValidRuc($ruc), "RUC '{$ruc}' has an invalid check digit.");
        }
    }

    public function testKnownRucIsValid(): void
    {
        $this->assertTrue($this->isValidRuc('20131312955'));
        $this->assertTrue($this->isValidRuc('20100047218'));
        $this->assertFalse($this->isValidRuc('20100047219'));
    }

    private function isValidRuc(string $ruc): bool
    {
        $weights = [5, 4, 3, 2, 7, 6, 5, 4, 3, 2];
        $sum = 0;
        foreach ($weights as $index => $weight) {
            $sum += (int) $ruc[$index] * $weight;
        }

        $check = 11 - $sum % 11;
        $check = match ($check) {
            10 => 0,
            11 => 1,
            default => $check,
        };

        return strlen($ruc) === 11 && $check === (int) $ruc[10];
    }
}
