<?php

namespace Xefi\Faker\EsPe\Tests\Unit;

use Random\Randomizer;
use ReflectionClass;
use Xefi\Faker\EsPe\Extensions\AddressExtension;

final class AddressExtensionTest extends TestCase
{
    protected array $regions = [];
    protected array $departments = [];
    protected array $cities = [];
    protected array $streetTypes = [];
    protected array $streetNames = [];

    protected function setUp(): void
    {
        parent::setUp();

        $extension = new AddressExtension(new Randomizer());
        $reflection = new ReflectionClass($extension);

        $this->regions = $reflection->getProperty('regions')->getValue($extension);
        $this->departments = $reflection->getProperty('departments')->getValue($extension);
        $this->cities = $reflection->getProperty('cities')->getValue($extension);
        $this->streetTypes = $reflection->getProperty('streetTypes')->getValue($extension);
        $this->streetNames = $reflection->getProperty('streetNames')->getValue($extension);
    }

    public function testRegion(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->regions); $i++) {
            $results[] = $this->faker->unique()->region();
        }

        $this->assertEqualsCanonicalizing($this->regions, $results);
    }

    public function testDepartment(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $department = $this->faker->department();

            $this->assertContains($department, $this->departments);
            $this->assertMatchesRegularExpression('/^(0[1-9]|1\d|2[0-5])$/', (string) array_key_first($department));
        }
    }

    public function testDepartmentsCoverEveryUbigeoCode(): void
    {
        $codes = array_map(fn (array $department) => (string) array_key_first($department), $this->departments);

        $this->assertSame(array_map(fn (int $code) => sprintf('%02d', $code), range(1, 25)), $codes);
    }

    public function testCityDepartmentsAreKnownCodes(): void
    {
        $codes = array_map(fn (array $department) => (string) array_key_first($department), $this->departments);

        foreach ($this->cities as $code) {
            $this->assertContains($code, $codes);
        }
    }

    public function testCity(): void
    {
        $results = [];
        for ($i = 0; $i < count($this->cities); $i++) {
            $results[] = $this->faker->unique()->city();
        }

        $this->assertEqualsCanonicalizing(array_keys($this->cities), $results);
    }

    public function testPostcode(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^(0[1-9]|1\d|2[0-5])\d{3}$/', $this->faker->postcode());
        }
    }

    public function testHouseNumber(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->houseNumber();

            $this->assertIsInt($result);
            $this->assertGreaterThanOrEqual(1, $result);
            $this->assertLessThanOrEqual(3999, $result);
        }
    }

    public function testStreetName(): void
    {
        for ($i = 0; $i < 100; $i++) {
            [$type, $name] = explode(' ', $this->faker->streetName(), 2);

            $this->assertContains($type, $this->streetTypes);
            $this->assertContains($name, $this->streetNames);
        }
    }

    public function testStreetAddress(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $this->assertMatchesRegularExpression('/^[\p{L} ]+ \d{1,4}$/u', $this->faker->streetAddress());
        }
    }

    public function testFullAddress(): void
    {
        for ($i = 0; $i < 100; $i++) {
            $result = $this->faker->fullAddress();

            $this->assertMatchesRegularExpression('/^[\p{L} ]+ \d{1,4}, [\p{L} ]+ \d{5}$/u', $result);

            preg_match('/, ([\p{L} ]+) (\d{2})\d{3}$/u', $result, $matches);
            $this->assertSame($this->cities[$matches[1]], $matches[2]);
        }
    }
}
