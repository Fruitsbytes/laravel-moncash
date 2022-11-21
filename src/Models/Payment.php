<?php

namespace FruitsBytes\Laravel\MonCash\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Payment
 *
 * @property int $id
 * @property string $redirection_url
 * @property int $cart_id
 * @property int $user_id
 * @property string $order_id
 * @property string $transaction_id
 * @property string $expiration
 * @property float $amount
 * @property float $cost
 * @property string $message
 * @property string $payer
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Payment newModelQuery()
 * @method static Builder|Payment newQuery()
 * @method static Builder|Payment query()
 * @method static Builder|Payment whereAmount($value)
 * @method static Builder|Payment whereCart($value)
 * @method static Builder|Payment whereCost($value)
 * @method static Builder|Payment whereCreatedAt($value)
 * @method static Builder|Payment whereExpiration($value)
 * @method static Builder|Payment whereId($value)
 * @method static Builder|Payment whereMessage($value)
 * @method static Builder|Payment whereOrderId($value)
 * @method static Builder|Payment wherePayer($value)
 * @method static Builder|Payment whereRedirectionUrl($value)
 * @method static Builder|Payment whereTransactionId($value)
 * @method static Builder|Payment whereUpdatedAt($value)
 */
class Payment extends Model
{
    use HasFactory;

    protected $casts = [
        'cart' => 'array'
    ];

    public function toUpdateArray(): array
    {
        return [
            "orderID"       => $this->order_id,
            "transactionID" => $this->transaction_id,
            "cost"          => $this->cost,
            "payer"         => $this->payer,
            "message"       => $this->message
        ];
    }

    public function merge(Payment $other)
    {

        $cols = [
            'order_id',
            'transaction_id',
            'cost',
            'payer',
            'message',
        ];

        foreach ($cols as $col) {
            if (isset($other[$col])) {
                $this[$col] = $other[$col];
            }
        }

        $this->update();

    }
}
