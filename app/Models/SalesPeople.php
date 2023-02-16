<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class SalesPeople extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'sales_people';

    /**
     * Get the appointment associated with the salespeople
     */
    public function appointment(): BelongsToMany
    {
        return $this->belongsToMany(Appointment::class, "appointments", "sales_people_id", "user_id" );
    }
}
