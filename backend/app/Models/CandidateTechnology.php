<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CandidateTechnology extends Model
{
    use HasFactory;

    /**
     * The attributes that are assignable;
     *
     * @var array
     */
    protected $fillable = [
        'candidate_id',
        'technology',
      ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'created_at' => 'datetime:Y-m-d h:m',
        'updated_at' => 'datetime:Y-m-d h:m',
    ];

    //-------------------------------------------
    // Relations
    //-------------------------------------------

    /**
     * Candidate relationship
     *
     * @return BelongsTo
     */
    public function candidate(): BelongsTo
    {
        return $this->belongsTo(Candidate::class);
    }
}
