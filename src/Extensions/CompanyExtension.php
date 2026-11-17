<?php

namespace Xefi\Faker\EsPe\Extensions;

use Xefi\Faker\Extensions\Extension;

class CompanyExtension extends Extension
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

    private array $companies = [
        'Inversiones Quispe S.A.C.', 'Constructora Los Andes S.A.', 'Transportes Huamán E.I.R.L.',
        'Agroexportadora Valle de Ica S.A.C.', 'Textiles Arequipa S.A.A.', 'Minera Cordillera Blanca S.A.',
        'Distribuidora Rímac S.R.L.', 'Comercial Mendoza Hermanos S.A.C.', 'Pesquera Mar de Grau S.A.',
        'Café Chanchamayo S.A.C.', 'Tecnologías Pachacútec S.A.C.', 'Inmobiliaria Miraflores S.A.',
        'Servicios Médicos San Borja S.A.C.', 'Logística Callao Express S.R.L.', 'Alpaca Fina del Sur S.A.C.',
        'Panificadora La Victoria E.I.R.L.', 'Consultora Chávez & Asociados S.Civil de R.L.', 'Hidrandina Energía S.A.',
        'Turismo Machu Picchu S.A.C.', 'Ferretería El Inca E.I.R.L.', 'Laboratorios Amazonía S.A.',
        'Cevichería Norteña S.R.L.', 'Importaciones Gamarra S.A.C.', 'Seguros del Pacífico Sur S.A.',
        'Corporación Lambayeque S.A.A.', 'Cacao Amazónico S.A.C.', 'Ingeniería Titicaca S.R.L.',
        'Grupo Rojas Inversiones S.A.', 'Editorial Huascarán S.A.C.', 'Avícola Santa Rosa S.A.',
    ];

    /**
     * Generate a company name.
     *
     * @return string
     */
    public function company(): string
    {
        return $this->pickArrayRandomElement($this->companies);
    }

    /**
     * Generate a RUC (Registro Único de Contribuyentes) with a valid mod 11 check digit.
     *
     * @return string
     */
    public function ruc(): string
    {
        $digits = $this->pickArrayRandomElement(['10', '20']).sprintf('%08d', $this->randomizer->getInt(1000000, 99999999));
        $weights = [5, 4, 3, 2, 7, 6, 5, 4, 3, 2];
        $sum = 0;

        foreach ($weights as $index => $weight) {
            $sum += (int) $digits[$index] * $weight;
        }

        return $digits.((11 - $sum % 11) % 10);
    }
}
