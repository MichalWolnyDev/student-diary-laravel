<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'team_id',
        'team_name',
        'name',
        'surname',
    ];

      /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'team_id' => null,
        'team_name' => null,
    ];
}
