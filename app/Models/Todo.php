<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;
    
    protected $fillable = ['content','tag_id','user_id'];
    protected $guarded = ['id'];

    public function  tag()
    {
      return $this->BelongsTo(Tag::class);
    }

    public function user()
    {
      return $this->BelongsTo(User::class);
    }


    public function scopeCategorySearch($query, $tag_id)
    {
      if (!empty($tag_id)) {
        $query->where('tag_id', $tag_id);
      }
    }
    
    public function scopeKeywordSearch($query, $keyword)
    {
      if (!empty($keyword)) {
        $query->where('content', 'like', '%' . $keyword . '%');
      }
    }
    
    }