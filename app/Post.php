<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;//phpでトレイトと呼ばれる
    //fillとfillableが関係している//
    protected $fillable = [
    'title',
    'body',
    'category_id',
    ];//titleとbodyというキーで保存ができるということ//
    public function getPaginateByLimit(int $limit_count = 10)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}

//このファイルは直接Datebaseにアクセスしてる//
