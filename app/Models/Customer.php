<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';

    protected $fillable = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'company_name',
        'company_address',
        'address',
        'apartment',
        'town',
        'city',
        'country',
        'zip_code',
    ];


}
