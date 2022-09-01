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
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'customer_id',
        'date',
    ];

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
}
