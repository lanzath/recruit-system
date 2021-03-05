<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Candidate extends Model
{
    use HasFactory;

    /**
     * The attributes that are assignable;
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'age',
        'linkedin_url',
      ];


    //-------------------------------------------
    // Relations
    //-------------------------------------------

    /**
     * Return candidate's technologies.
     *
     * @return HasMany
     */
    public function technologies(): HasMany
    {
      return $this->hasMany(CandidateTechnology::class);
    }
}
