<?php
// 留言表模型文件

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //数据表名称
    protected $table = 'messages';

    //可写字段
    protected $fillable = [
        'user_id','content',
    ];

    //动态流-最新留言
    static public function news()
    {
        $messages = Message::orderBy('created_at','desc')->take(5)->get();

        return $messages;
    }

    //模型关联：获取该留言所属的用户模型
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    //模型关联：获取该留言的所有回复
    public function remessages()
    {
        return $this->hasMany('App\Models\Remessage');
    }
}
