<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\PredefinedTest;
class NormalRange extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $guarded =['created_at','updated_at','deleted_at'];

    public function predfined_tests()
    {
        return $this->belongsTo(PredefinedTest::class, 'predefined_test_id', 'id')->whereNull('deleted_at');
    }
}
