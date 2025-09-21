<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
use App\Models\Url;

class Content extends Model
{

    // 代入で受け付ける属性
    protected $fillable = ['title','description'];

    // このコンテンツに紐づくユーザー(多対多)
    public function users():BelongsToMany{
        return $this->belongsToMany(User::class);
    }

    // このコンテンツに紐づくURL(1対多)
    public function urls():HasMany{
        return $this->hasMany(Url::class);
    }


}
