<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    use HasFactory;

    protected const ST_CREATED = 'CREATED';
    protected const ST_PAYED = 'PAYED';
    protected const ST_REJECTED = 'REJECTED';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'reference',
        'customer_name',
        'customer_email',
        'customer_mobile',
        'status',
        'customer_price_order',
        'customer_request_id',
        'customer_process_url',
        'customer_description_order',
    ];

    /**
     * getOrderById
     *
     * @param  mixed $id
     * @return Orders
     */
    public static function getOrderById($id): ?Orders
    {
        $orders = Self::select(
            'reference',
            'customer_name',
            'customer_email',
            'customer_mobile',
            'customer_request_id',
            'customer_process_url',
            'customer_price_order',
            'customer_description_order',
            'status'
        )->find($id);

        return $orders;
    }

    /**
     * createOrder
     *
     * @param  mixed $arr_form
     * @return void
     */
    public static function createOrder(array $arr_form): void
    {
        $arr_form['status'] = Self::ST_CREATED;
        Self::create($arr_form);
    }

    /**
     * getStatusPayed
     *
     * @return string
     */
    public static function getStatusPayed(): string
    {
        return self::ST_PAYED;
    }

    /**
     * getStatusRejected
     *
     * @return string
     */
    public static function getStatusRejected(): string
    {
        return self::ST_REJECTED;
    }
}
