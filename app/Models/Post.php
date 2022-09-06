<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    /**
     * table associated with the modal
     *
     * @var string
     */
    protected $table = 'posts';

    /**
     * primary key associated with table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    /**
     * attributes that are not mas assignable
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'id'
    ];

    public function comment()
    {
        // hasOne, hasMany, belongsTo, belongsToMany
        return $this->hasMany(Comment::class)->get();
        // $this->hasMany(Comment::class, 'post_id', 'id');
    }

    /**
     *
     */
    // public function getRouteKeyName()
    // {
    //     return 'slug';
    // }

    /**
     *
     */
    public function add($data)
    {
        $data['uuid'] = Str::orderedUuid();
        return self::create($data);
    }
}
