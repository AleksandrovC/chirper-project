<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Events\ChirpCreated;
use Illuminate\Database\Eloquent\Relations\HasMany;




class Chirp extends Model
{
    use HasFactory;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'message',

    ];


    public function claps(): HasMany
    {
        return $this->hasMany(ChirpClap::class);
    }


    /**
     * Retrieve the clap count for a chirp.
     */
    public function clapCount(): int
    {
        return $this->claps()->count();
    }

    protected $dispatchesEvents = [
        'created' => ChirpCreated::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
