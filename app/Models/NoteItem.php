<?php

namespace App\Models;

use App\Traits\Uuid;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class NoteItem extends Model
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
        'note_id',
        'item_id',
        'name',
        'sku',
        'quantity',
        'price',
    ];

    /**
     * Transforms total value.
     *
     * @return \Illuminate\Database\Eloquent\Casts\Attribute
     */
    public function total():Attribute
    {
        return Attribute::make(
            get: fn () => $this->quantity * $this->price,
        );
    }

    /**
     * Gets the note that owns the items.
     */
    public function note()
    {
        return $this->belongsTo(Note::class);
    }
}
