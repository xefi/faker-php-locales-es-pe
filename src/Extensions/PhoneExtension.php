<?php

namespace Xefi\Faker\EsPe\Extensions;

use Xefi\Faker\Extensions\PhoneExtension as BasePhoneExtension;

class PhoneExtension extends BasePhoneExtension
{
    public string $indicator = '+51';

    /**
     * Returns the locale of the extension.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return 'es_PE';
    }

    protected array $landlineFormats = [
        '1{separator}2{d}{d}{separator}{d}{d}{d}{d}',
        '1{separator}4{d}{d}{separator}{d}{d}{d}{d}',
        '1{separator}7{d}{d}{separator}{d}{d}{d}{d}',
        '44{separator}2{d}{d}{separator}{d}{d}{d}',
        '54{separator}2{d}{d}{separator}{d}{d}{d}',
        '74{separator}2{d}{d}{separator}{d}{d}{d}',
        '84{separator}2{d}{d}{separator}{d}{d}{d}',
        '73{separator}3{d}{d}{separator}{d}{d}{d}',
    ];

    protected array $cellFormats = [
        '9{d}{d}{separator}{d}{d}{d}{separator}{d}{d}{d}',
    ];

    /**
     * Generate a phone number, keeping a separator between the indicator and the number.
     *
     * @param string|null $format
     * @param string      $separator
     * @param string|null $prefix
     *
     * @return string
     */
    public function phoneNumber(?string $format = null, string $separator = '', ?string $prefix = null): string
    {
        if ($prefix === $this->indicator) {
            $prefix .= $separator;
        }

        return parent::phoneNumber($format, $separator, $prefix);
    }
}
