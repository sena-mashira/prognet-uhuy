<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

    class OpportunityCategory extends Model
    {
        protected $fillable = [
            'name',
            'slug',
            'description'
        ];

        public function getRouteKeyName()
        {
            return 'slug';
        }

        public function opportunities(): HasMany
        {
            return $this->hasMany(Opportunity::class, 'category_id', 'id');
        }
    }
