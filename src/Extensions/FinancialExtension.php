<?php

namespace Xefi\Faker\EsPe\Extensions;

use Xefi\Faker\Extensions\FinancialExtension as BaseFinancialExtension;

class FinancialExtension extends BaseFinancialExtension
{
    /**
     * Returns the locale of the extension.
     *
     * @return string|null
     */
    public function getLocale(): ?string
    {
        return 'es_PE';
    }

    /**
     * Generate a CCI (Código de Cuenta Interbancario): bank, branch, account and two check digits.
     *
     * @return string
     */
    public function cci(): string
    {
        $bankAndBranch = $this->pickArrayRandomElement(['002', '003', '009', '011', '018', '023', '038', '043', '049', '053'])
            .$this->randomizer->getBytesFromString('0123456789', 3);
        $account = $this->randomizer->getBytesFromString('0123456789', 12);

        return $bankAndBranch.$account.$this->cciCheckDigit($bankAndBranch).$this->cciCheckDigit($account);
    }

    /**
     * Generate an IBAN-like number built around a CCI, Peru having no IBAN.
     *
     * @param ?string $countryCode
     * @param ?string $format      [{d} => digit, {l} => letter, {a} => any]
     *
     * @return string
     */
    public function iban(?string $countryCode = null, ?string $format = null): string
    {
        if ($countryCode === null) {
            $countryCode = 'PE';
        }

        if ($format === null) {
            $format = $this->cci();
        }

        return parent::iban($countryCode, $format);
    }

    /**
     * Compute a CCI check digit: alternate 1 and 2 weights, sum the digits of each product, then complement to 10.
     *
     * @param string $digits
     *
     * @return int
     */
    private function cciCheckDigit(string $digits): int
    {
        $sum = 0;

        for ($i = 0; $i < strlen($digits); $i++) {
            $product = (int) $digits[$i] * ($i % 2 === 0 ? 1 : 2);
            $sum += intdiv($product, 10) + $product % 10;
        }

        return (10 - $sum % 10) % 10;
    }
}
