<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puskesmas extends Model
{
    use HasFactory;
    protected $table = 'puskesmas';
    protected $guarded = [];
    /**
     * Get the desa that owns the Puskesmas
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function desa()
    {
        return $this->belongsTo(Desa::class, 'id_desa' );
    }
}
