<?php

namespace Xefi\Faker\EsPe\Extensions;

use Xefi\Faker\Extensions\PersonExtension as BasePersonExtension;

class PersonExtension extends BasePersonExtension
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

    protected $firstNameMale = [
        'José', 'Juan', 'Luis', 'Carlos', 'Jorge', 'Miguel', 'César', 'Víctor', 'Jesús', 'Pedro',
        'Manuel', 'Julio', 'Alberto', 'Óscar', 'Raúl', 'Walter', 'Edwin', 'Javier', 'Fernando', 'Ricardo',
        'Wilber', 'Percy', 'Segundo', 'Alejandro', 'Martín', 'Hugo', 'Roberto', 'Daniel', 'Diego', 'Renzo',
        'Sebastián', 'Mateo', 'Santiago', 'Thiago', 'Gonzalo', 'Iván', 'Elmer', 'Rolando', 'Yuri', 'Gustavo',
    ];

    protected $firstNameFemale = [
        'María', 'Rosa', 'Carmen', 'Ana', 'Luz', 'Juana', 'Gladys', 'Elizabeth', 'Milagros', 'Flor',
        'Lucía', 'Yolanda', 'Julia', 'Teresa', 'Martha', 'Silvia', 'Patricia', 'Isabel', 'Sonia', 'Norma',
        'Ruth', 'Karina', 'Maribel', 'Jessica', 'Lourdes', 'Pilar', 'Mercedes', 'Rocío', 'Sofía', 'Valeria',
        'Camila', 'Ximena', 'Fiorella', 'Kiara', 'Daniela', 'Andrea', 'Nelly', 'Haydée', 'Delia', 'Yesenia',
    ];

    protected $lastName = [
        'Quispe', 'Flores', 'Sánchez', 'Rodríguez', 'García', 'Rojas', 'Gonzales', 'Chávez', 'Ramírez', 'Mendoza',
        'Torres', 'Huamán', 'Mamani', 'Vásquez', 'Díaz', 'Espinoza', 'Castillo', 'Ramos', 'López', 'Cruz',
        'Pérez', 'Vargas', 'Gutiérrez', 'Romero', 'Fernández', 'Condori', 'Huanca', 'Salazar', 'Cáceres', 'Medina',
        'Córdova', 'Aguilar', 'Paredes', 'Castro', 'Morales', 'Herrera', 'Villanueva', 'Ticona', 'Ccallo', 'Cárdenas',
    ];

    protected $titleMale = ['Sr.', 'Dr.', 'Ing.', 'Lic.'];

    protected $titleFemale = ['Sra.', 'Srta.', 'Dra.', 'Ing.', 'Lic.'];

    /**
     * Generate an eight-digit DNI (Documento Nacional de Identidad) number.
     *
     * @return string
     */
    public function dni(): string
    {
        return sprintf('%08d', $this->randomizer->getInt(1000000, 79999999));
    }
}
