<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class PredefinedTest extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded =['created_at','updated_at'];

    /**
     * Get all of the comments for the PredefinedTest
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(PredefinedTest::class, 'parent_id', 'id')->whereNull('deleted_at');
    }
}
