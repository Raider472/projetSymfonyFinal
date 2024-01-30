<?php

namespace App\Doctrine\DBAL\Type;

use App\Enum\TypeOfStatus;

class TypeOfStatusEnumType extends EnumType
{
    protected function getEnum(): string
    {
        return TypeOfStatus::class;
    }

    public function getName()
    {
        return 'type_of_status_enum';
    }
}
