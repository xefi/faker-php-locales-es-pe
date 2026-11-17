<?php

namespace Xefi\Faker\EsPe\Extensions;

use Xefi\Faker\Extensions\Extension;

class AddressExtension extends Extension
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

    protected $regions = [
        'Costa', 'Sierra', 'Selva',
    ];

    protected $departments = [
        ['01' => 'Amazonas'], ['02' => 'Áncash'], ['03' => 'Apurímac'], ['04' => 'Arequipa'], ['05' => 'Ayacucho'],
        ['06' => 'Cajamarca'], ['07' => 'Callao'], ['08' => 'Cusco'], ['09' => 'Huancavelica'], ['10' => 'Huánuco'],
        ['11' => 'Ica'], ['12' => 'Junín'], ['13' => 'La Libertad'], ['14' => 'Lambayeque'], ['15' => 'Lima'],
        ['16' => 'Loreto'], ['17' => 'Madre de Dios'], ['18' => 'Moquegua'], ['19' => 'Pasco'], ['20' => 'Piura'],
        ['21' => 'Puno'], ['22' => 'San Martín'], ['23' => 'Tacna'], ['24' => 'Tumbes'], ['25' => 'Ucayali'],
    ];

    protected $cities = [
        'Lima' => '15', 'Arequipa' => '04', 'Trujillo' => '13', 'Chiclayo' => '14', 'Piura' => '20',
        'Iquitos' => '16', 'Cusco' => '08', 'Huancayo' => '12', 'Chimbote' => '02', 'Tacna' => '23',
        'Pucallpa' => '25', 'Ica' => '11', 'Juliaca' => '21', 'Sullana' => '20', 'Ayacucho' => '05',
        'Cajamarca' => '06', 'Puno' => '21', 'Huánuco' => '10', 'Tarapoto' => '22', 'Chincha Alta' => '11',
        'Huaraz' => '02', 'Tumbes' => '24', 'Talara' => '20', 'Jaén' => '06', 'Puerto Maldonado' => '17',
        'Moquegua' => '18', 'Abancay' => '03', 'Huacho' => '15', 'Callao' => '07', 'Cerro de Pasco' => '19',
        'Chachapoyas' => '01', 'Huancavelica' => '09', 'Ilo' => '18', 'Moyobamba' => '22', 'Pisco' => '11',
    ];

    protected $streetTypes = [
        'Avenida', 'Jirón', 'Calle', 'Pasaje', 'Malecón', 'Prolongación', 'Alameda', 'Carretera',
    ];

    protected $streetNames = [
        'Javier Prado', 'Arequipa', 'José Larco', 'Abancay', 'Tacna', 'Grau', 'Bolognesi', 'Alfonso Ugarte',
        'La Marina', 'Angamos', 'Benavides', 'Brasil', 'Petit Thouars', 'Salaverry', 'Túpac Amaru', 'Colonial',
        'Venezuela', 'Universitaria', 'Huallaga', 'Ucayali', 'Junín', 'de la Unión', 'Carabaya', 'Lampa',
        'Camaná', 'Cusco', 'Pardo', 'Primavera', 'Aviación', 'Los Próceres', 'San Martín', 'Garcilaso de la Vega',
        'Miguel Grau', 'Ramón Castilla', 'Mariscal Cáceres', 'Santa Rosa', 'Los Incas', 'José Gálvez', 'Sucre', 'Ayacucho',
    ];

    /**
     * Generate a Peruvian natural region.
     *
     * @return string
     */
    public function region(): string
    {
        return $this->pickArrayRandomElement($this->regions);
    }

    /**
     * Generate a Peruvian department as an array keyed by its UBIGEO code.
     *
     * @return array<string, string>
     */
    public function department(): array
    {
        return $this->pickArrayRandomElement($this->departments);
    }

    /**
     * Generate a Peruvian city name.
     *
     * @return string
     */
    public function city(): string
    {
        return $this->pickArrayRandomKey($this->cities);
    }

    /**
     * Generate a five-digit postal code whose two first digits are a department code.
     *
     * @return string
     */
    public function postcode(): string
    {
        return sprintf('%02d%03d', $this->randomizer->getInt(1, 25), $this->randomizer->getInt(1, 999));
    }

    /**
     * Generate a house number.
     *
     * @return int
     */
    public function houseNumber(): int
    {
        return $this->randomizer->getInt(1, 3999);
    }

    /**
     * Generate a street name prefixed by its street type.
     *
     * @return string
     */
    public function streetName(): string
    {
        return sprintf('%s %s', $this->pickArrayRandomElement($this->streetTypes), $this->pickArrayRandomElement($this->streetNames));
    }

    /**
     * Generate a street address, such as "Avenida Javier Prado 1234".
     *
     * @return string
     */
    public function streetAddress(): string
    {
        return sprintf('%s %d', $this->streetName(), $this->houseNumber());
    }

    /**
     * Generate a full address, such as "Jirón Camaná 195, Lima 15001".
     *
     * @return string
     */
    public function fullAddress(): string
    {
        $city = $this->city();
        $postcode = $this->cities[$city].sprintf('%03d', $this->randomizer->getInt(1, 999));

        return sprintf('%s, %s %s', $this->streetAddress(), $city, $postcode);
    }
}
