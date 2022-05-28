<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TenantImages extends Model
{
    use HasFactory;

    protected $table = 'tenant_images';

    protected $fillable = ['tenant_id', 'timbre', 'logo'];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
