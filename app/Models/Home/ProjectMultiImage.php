<?php

namespace App\Models\Home;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectMultiImage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function product() {
        return $this->belongsTo(HomeProject::class, 'project_id', 'id');
    }
}
