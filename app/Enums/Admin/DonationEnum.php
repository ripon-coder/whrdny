<?php

namespace App\Enums\Admin;

enum DonationEnum: string
{
    case Approve = "approve";
    case Pending = "pending";
    case Decline = "decline";
}
