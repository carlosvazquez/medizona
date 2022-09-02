<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Note extends Model
{
    use HasFactory, SoftDeletes, Uuid;

    public $incrementing = false;
    protected $keyType = 'uuid';

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['quantity','total', 'money'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'date',
    ];

    /**
     * Items quantity value.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function quantity():Attribute
    {
        return Attribute::make(
            get: fn () => $this->items->sum('quantity'),
        );
    }

    /**
     * Transforms total value.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function money():Attribute
    {
        return Attribute::make(
            get: fn () => '$ '.number_format($this->total, 2),
        );
    }

    /**
     * Transforms total value.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function total():Attribute
    {
        return Attribute::make(
            get: fn () => $this->items->sum('total'),
        );
    }

    /**
     * Gets the items for the note.
     */
    public function items()
    {
        return $this->hasMany(NoteItem::class);
    }

    /**
     * Gets the customer note owner.
     */
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}
