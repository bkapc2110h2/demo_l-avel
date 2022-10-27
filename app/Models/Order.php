<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;
class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'customer_id',
        'status'
    ];

    public function orders1()
    {
        $query = $this->join('order_details','order_details.order_id','=','orders.id')
        ->select('order_details.quantity', 'order_details.price', DB::raw('SUM(order_details.quantity * order_details.price) as TotalPrice'))->groupBy('order_details.order_id');

        return $query;
    }

    public function details()
    {
        return $this->hasMany(OrderDetail::class, 'order_id', 'id');
    }

    public function totalAmount()
    {
       $total = 0;
        foreach ($this->details as $item) {
            $total += $item->quantity * $item->price;
        }
       return $total;
    }
}


// ->select('column_str_1', 'column_str_2', DB::raw('SUM(column_int_1) AS sum_of_1'))
