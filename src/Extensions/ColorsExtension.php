<?php

namespace Xefi\Faker\EsPe\Extensions;

use Xefi\Faker\Extensions\ColorsExtension as BaseColorsExtension;

class ColorsExtension extends BaseColorsExtension
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

    protected array $safeColorNames = [
        'Negro', 'Guinda', 'Verde', 'AzulMarino', 'Oliva',
        'Morado', 'VerdeAzulado', 'Lima', 'Azul', 'Plateado',
        'Gris', 'Amarillo', 'Fucsia', 'Aguamarina', 'Blanco',
    ];

    protected array $colorNames = [
        'Negro', 'Guinda', 'Verde', 'AzulMarino', 'Oliva',
        'Morado', 'VerdeAzulado', 'Lima', 'Azul', 'Plateado',
        'Gris', 'Amarillo', 'Fucsia', 'Aguamarina', 'Blanco',
        'Beige', 'Chocolate', 'Coral', 'Cian', 'Carmesí',
        'AzulOscuro', 'NaranjaOscuro', 'Ladrillo', 'VerdeMar', 'BlancoFloral',
        'VerdeBosque', 'Dorado', 'Rosado', 'Índigo', 'Caqui',
        'Lavanda', 'AzulClaro', 'CoralClaro', 'VerdeClaro', 'SalmónClaro',
        'Lino', 'Magenta', 'AzulMedio', 'OrquídeaMedia', 'Mocasín',
        'Naranja', 'Rojo', 'Ciruela', 'Perú', 'AzulReal',
        'Salmón', 'MarrónArena', 'Celeste', 'Nieve', 'Turquesa',
        'Violeta', 'BlancoHumo',
    ];
}
