<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pensioner extends Model
{
    protected $table = 'pensioners';

    protected $fillable = [
        'serial_number',
        'control_number',
        'first_name',
        'middle_name',
        'last_name',
        'pension_account',
        'rank',
        'bank_name',
        'amount_centavos',
        'retirement_date',
    ];
}
