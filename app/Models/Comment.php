<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute as CastAttribute;
use Attribute;

class Comment extends Model
{
    use HasFactory;

    /**
     * fillable
     * 
     * @var array
     */
    protected $table = "comments";
    protected $fillable = [
        'image',
        'username',
        'comment',
    ];

    /**
     * image
     * 
     * @return CastAttribute
     */
    protected function image(): CastAttribute
    {
        return CastAttribute::make(
            get: fn($image) => asset('/storage/comments/' . $image),
        );
    }
}
