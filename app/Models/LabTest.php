<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\LabTestMetadata;
use App\Models\Location;

class LabTest extends Model
{
    use HasFactory;
    protected  $guared =['created_at','updated_at'];

    /**
     * Get the user that owns the LabTest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function meta_data()
    {
        return $this->belongsTo(LabTestMetadata::class, 'lab_testmetadata_id', 'id');
    }

     // Get category infos.
     public function category()
     {
         return $this->belongsTo(TestCategory::class, 'cat_id', 'id');
     }
     // Get location infos.
     public function location()
     {
         return $this->belongsTo(Location::class, 'location_id', 'id');
     }
}
