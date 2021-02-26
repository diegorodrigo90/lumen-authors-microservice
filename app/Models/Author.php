<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\UsesUuid;

class Author extends Model
{
    use UsesUuid, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'gender', 'country',
    ];

    protected $guarded = ['uuid'];

    public function author($id)
    {
        return $this->with($this->with)->findOrFail($id);
    }

}
