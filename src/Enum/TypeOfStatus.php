<?php

namespace App\Enum;

enum TypeOfStatus: string
{
    case STOCK = "En Stock";
    case HORSTOCK = "Hors Stock";
    case PRECOMMANDE = "Précommande";
}