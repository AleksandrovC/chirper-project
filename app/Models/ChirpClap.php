<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChirpClap extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'chirp_id',
    ];

    /**
     * Get the chirp that the clap belongs to.
     */
    public function chirp()
    {
        return $this->belongsTo(Chirp::class);
    }

    /**
     * Get the user who clapped.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
