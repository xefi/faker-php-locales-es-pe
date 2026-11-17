<?php

namespace Xefi\Faker\EsPe\Extensions;

use Xefi\Faker\Extensions\TextExtension as BaseTextExtension;

class TextExtension extends BaseTextExtension
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

    protected array $paragraphs = [
        [
            ['La', 'calidad', 'de', 'la', 'atención', 'sigue', 'siendo', 'una', 'prioridad', 'para', 'las', 'empresas', 'peruanas.'],
            ['Cada', 'proyecto', 'necesita', 'una', 'buena', 'planificación', 'desde', 'el', 'primer', 'día.'],
            ['Los', 'equipos', 'trabajan', 'de', 'la', 'mano', 'para', 'cumplir', 'las', 'metas', 'del', 'año.'],
            ['Una', 'comunicación', 'clara', 'entre', 'las', 'áreas', 'mejora', 'la', 'productividad.'],
        ],
        [
            ['El', 'manejo', 'responsable', 'de', 'los', 'recursos', 'es', 'clave', 'para', 'crecer', 'de', 'forma', 'sostenible.'],
            ['Las', 'formas', 'de', 'trabajo', 'cambian', 'según', 'las', 'necesidades', 'de', 'los', 'clientes.'],
            ['La', 'capacidad', 'de', 'adaptación', 'permite', 'a', 'la', 'organización', 'seguir', 'siendo', 'competitiva.'],
            ['Los', 'procesos', 'se', 'revisan', 'cada', 'trimestre', 'para', 'mejorar', 'los', 'resultados.'],
        ],
        [
            ['La', 'satisfacción', 'del', 'cliente', 'depende', 'de', 'un', 'servicio', 'rápido', 'y', 'confiable.'],
            ['Los', 'indicadores', 'de', 'gestión', 'orientan', 'las', 'decisiones', 'de', 'la', 'gerencia.'],
            ['Los', 'retos', 'diarios', 'se', 'superan', 'con', 'orden', 'y', 'trabajo', 'en', 'equipo.'],
            ['La', 'evaluación', 'periódica', 'ayuda', 'a', 'detectar', 'oportunidades', 'de', 'mejora.'],
        ],
        [
            ['La', 'capacitación', 'del', 'personal', 'es', 'una', 'inversión', 'a', 'largo', 'plazo.'],
            ['Se', 'anima', 'a', 'los', 'colaboradores', 'a', 'aprender', 'nuevas', 'habilidades', 'y', 'proponer', 'ideas.'],
            ['Las', 'estrategias', 'de', 'mejora', 'continua', 'reducen', 'costos', 'y', 'riesgos.'],
            ['Los', 'programas', 'de', 'formación', 'acompañan', 'el', 'crecimiento', 'profesional', 'de', 'cada', 'trabajador.'],
        ],
        [
            ['El', 'análisis', 'de', 'datos', 'permite', 'encontrar', 'nuevas', 'oportunidades', 'en', 'el', 'mercado', 'nacional.'],
            ['Las', 'metas', 'se', 'ajustan', 'de', 'acuerdo', 'con', 'la', 'evolución', 'del', 'sector.'],
            ['Un', 'seguimiento', 'semanal', 'de', 'los', 'avances', 'facilita', 'corregir', 'el', 'rumbo', 'a', 'tiempo.'],
            ['Las', 'decisiones', 'se', 'toman', 'sobre', 'la', 'base', 'de', 'información', 'confiable.'],
            ['Las', 'reuniones', 'de', 'balance', 'sirven', 'para', 'revisar', 'la', 'estrategia', 'y', 'definir', 'los', 'próximos', 'pasos.'],
        ],
    ];
}
