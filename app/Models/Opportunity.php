<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Opportunity extends Model
{
    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'organization',
        'description',
        'requirements',
        'benefits',
        'location',
        'education_level',
        'field',
        'difficulty',
        'start_date',
        'end_date',
        'registration_link',
        'poster_url'
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(OpportunityCategory::class);
    }

    public function savedBy(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'saved_opportunities');
    }
}
