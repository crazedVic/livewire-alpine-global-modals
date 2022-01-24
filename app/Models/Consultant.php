<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphToMany;


class Consultant extends Model
{
    use HasFactory;

    protected $guarded = [];

    // default values when creating new
    protected $attributes = [
        'rate_currency' => "CAD$",
        'platform' => "None",
        'company' => "",
        'linkedin' => "",
        'platform_profile' => "",
        'notes'=>""
    ];

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class,'taggable');
    }
}
