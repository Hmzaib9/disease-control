<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\TestCategory;
use App\Models\Institution;
class LabTestMetadata extends Model
{
    use HasFactory;

    protected $guarded =['created_at','updated_at'];

    // Get Medical tests.
    public function medical_tests()
    {
        return $this->hasMany(LabTest::class, 'lab_testmetadata_id', 'id');
    }



    // Get Lab info.
    public function Institution()
    {
        return $this->belongsTo(Lab::class, 'lab_id', 'id');
    }
}
