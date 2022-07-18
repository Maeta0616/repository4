<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
class Post extends Model
{
    use SoftDeletes;//phpでトレイトと呼ばれる
    
    protected $fillable = [
    'title',
    'body',
    ];//titleとbodyというキーで保存ができるということ//
    public function getPaginateByLimit(int $limit_count = 10)
    {
    // updated_atで降順に並べたあと、limitで件数制限をかける
    return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    
    
}

//このファイルは直接Datebaseにアクセスしてる//
