<?php

namespace App\Models;

enum Status
{
    case Available;
    case Pending;
    case Sold;

    public static function getStatusFromString($status): Status
    {
        return match ($status) {
            "available" =>  Status::Available,
            "pending"   =>  Status::Pending,
            "sold"      =>  Status::Sold
        };
    }
}
