<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    /**
     * table associated with the modal
     *
     * @var string
     */
    protected $table = 'comments';

    /**
     * primary key associated with table
     *
     * @var string
     */
    protected $primaryKey = 'id';

    public function post()
    {
        return $this->belongsTo(Post::class)->get();
    }
}
