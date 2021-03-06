<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

final class UserType extends Enum
{
    const Adm = 0;
    const AssessorTecnicoSocial = 1;
    const AssessorTecnicoGestao = 2;
    const AssistenteSocial = 3;
    const Coordenador = 4;
    const Administrativo = 5;

    public static function list () {
        return [
            UserType::Adm,
            UserType::AssessorTecnicoSocial,
            UserType::AssessorTecnicoGestao,
            UserType::AssistenteSocial,
            UserType::Coordenador,
            UserType::Administrativo,
        ];
    }
}
