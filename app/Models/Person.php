<?php

namespace App\Models;

use App\Events\PersonCreated;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Person extends Model
{
    use HasFactory;

    protected $table = 'people';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'south_african_id_no',
        'mobile',
        'email',
        'birth_date',
        'language_id',
        'interests',
    ];

    protected $dispatchesEvents = [
        'created' => PersonCreated::class,
    ];

    /**
     * The interests that belong to the person.
     */
    public function interests(): BelongsToMany
    {
        return $this->belongsToMany(Interest::class);
    }

    /**
     * Get the language that belongs to the person.
     */
    public function language(): BelongsTo
    {
        return $this->belongsTo(Language::class);
    }
}
