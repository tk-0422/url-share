<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    // 代入で受け付ける属性
    protected $fillable =['title','url'];


    // 所属ユーザー(多対1)
    public function user(){
        return $this->belongsTo(User::class);
    }

    // 所属コンテンツ(多対1)
    public function content(){
        return $this->belongsTo(Content::class);
    }

}
