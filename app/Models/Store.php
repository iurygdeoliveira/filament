<?php

declare(strict_types = 1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Store extends BaseModel
{
    /** @use HasFactory<\Database\Factories\StoreFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'phone',
        'about',
        'logo',
        'slug',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Accessor to format the created_at attribute to Brazilian format.
     */
    public function getCreatedAtAttribute(\DateTimeInterface | \Carbon\WeekDay | \Carbon\Month | string | int | float | null $value): string
    {
        return Carbon::parse($value)->format('d/m/Y H:i');
    }

    /**
     * Mutator to ensure created_at is stored in Laravel's default format.
     */
    public function setCreatedAtAttribute(\DateTimeInterface | \Carbon\WeekDay | \Carbon\Month | string | int | float | null $value): void
    {
        $this->attributes['created_at'] = Carbon::parse($value)->toDateTimeString();
    }

    public function setAboutAttribute($value): void
    {
        $this->attributes['about'] = strip_tags((string) $value);
    }
}
