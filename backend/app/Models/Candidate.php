<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
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

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['candidate_technologies'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = ['technologies'];

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
     * Return candidate's technologies.
     *
     * @return HasMany
     */
    public function technologies(): HasMany
    {
      return $this->hasMany(CandidateTechnology::class);
    }

    //-------------------------------------------
    // Scopes
    //-------------------------------------------

    /**
     * Local scope to filter by candidate's technology.
     *
     * @param  mixed  $query
     * @param  string $filter
     * @return Builder
     */
    public function scopeTechnology($query, string $filter)
    {
        return $query->whereHas('technologies', function (Builder $query) use ($filter) {
            $query->where('technology', 'LIKE', '%' . $filter . '%');
        });
    }

    //-------------------------------------------
    // Acessors
    //-------------------------------------------

    /**
     * Return candidate's list of qualification.
     *
     * @return object
     */
    public function getCandidateTechnologiesAttribute(): object
    {
      $qualifications = collect();

      if ($this->technologies) {
          foreach ($this->technologies as $qualification) {
            $qualifications->push([
                'id' => $qualification->id,
                'technology' => $qualification->technology
            ]);
          }

          return $qualifications;
      }

      return null;
    }
}
