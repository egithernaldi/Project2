<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Skck extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    public $timestamps = false;

    public function pengajuan() : BelongsTo
    {
        return $this->belongsTo(Pengajuan::class);
    }
    public function user() : BelongsTo{
        return $this->belongsTo(User::class);
    }
}
