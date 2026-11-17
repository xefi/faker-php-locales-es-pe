# Faker PHP — es_PE locale

Peruvian Spanish (`es_PE`) locale for [Faker PHP](https://github.com/xefi/faker-php).

## Installation

```bash
composer require --dev xefi/faker-php-locales-es-pe
```

The service provider is discovered automatically through Composer.

## Usage

```php
use Xefi\Faker\Faker;

$faker = new Faker('es_PE');

$faker->name();
$faker->fullAddress();
$faker->dni();
```

The package provides `es_PE` variants of the address, colors, company, financial, person, phone and text
extensions. Generators without a `es_PE` variant fall back to the default locale.

### Locale-specific generators

| Method | Extension | Description |
| --- | --- | --- |
| `dni()` | `PersonExtension` | 8-digit DNI number |
| `ruc()` | `CompanyExtension` | 11-digit RUC (prefix 10 or 20) with a valid mod 11 check digit |
| `department()` | `AddressExtension` | Department keyed by its UBIGEO code, e.g. `['15' => 'Lima']` |
| `postcode()` | `AddressExtension` | 5-digit postal code starting with a department code |
| `cci()` | `FinancialExtension` | 20-digit CCI (Código de Cuenta Interbancario) with valid check digits |
| `iban()` | `FinancialExtension` | IBAN-shaped number built around a CCI (`PE`; Peru has no IBAN) |

## Contributing

1. Fork the repository and create a branch from `main`.
2. Add or update an extension under `src/Extensions/` and register it in `FakerEsPeServiceProvider::boot()`.
3. Add a test under `tests/Unit/`.
4. Run the suite with `vendor/bin/phpunit` (or `docker compose run php vendor/bin/phpunit`).
5. Open a pull request against `main`.

## License

MIT
