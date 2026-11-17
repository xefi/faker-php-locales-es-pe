<?php

namespace Xefi\Faker\EsPe;

use Xefi\Faker\EsPe\Extensions\AddressExtension;
use Xefi\Faker\EsPe\Extensions\ColorsExtension;
use Xefi\Faker\EsPe\Extensions\CompanyExtension;
use Xefi\Faker\EsPe\Extensions\FinancialExtension;
use Xefi\Faker\EsPe\Extensions\PersonExtension;
use Xefi\Faker\EsPe\Extensions\PhoneExtension;
use Xefi\Faker\EsPe\Extensions\TextExtension;
use Xefi\Faker\Providers\Provider;

class FakerEsPeServiceProvider extends Provider
{
    /**
     * Register the es_PE extensions.
     *
     * @return void
     */
    public function boot(): void
    {
        $this->extensions([
            AddressExtension::class,
            ColorsExtension::class,
            CompanyExtension::class,
            FinancialExtension::class,
            PersonExtension::class,
            PhoneExtension::class,
            TextExtension::class,
        ]);
    }
}
