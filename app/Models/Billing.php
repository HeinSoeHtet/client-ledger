<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Billing extends Model
{
    use HasFactory;

    protected $fillable = ['amount', 'due_date', 'description'];

    public function client()
    {
        return $this->belongsTo(Client::class);
    }
}
