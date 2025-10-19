<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'customer_id',
        'user_id',
        'sub_total',
        'order_note',
        'address',
        'apartment',
        'town',
        'city',
        'country',
        'status',
    ];
   
    public function orderProducts()
    {
        return $this->hasMany(OrderProduct::class, 'order_id', 'id')->where('deleted', '0');
    }

    public function customer()
    {
        return $this->hasOne(Customer::class, 'id', 'customer_id');
    }
}
