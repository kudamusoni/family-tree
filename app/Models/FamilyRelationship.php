<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FamilyRelationship extends Model
{
    use HasFactory;

    public function members()
    {
        return $this->belongsTo(FamilyMember::class, 'family_relationships', 'id');
    }
}
