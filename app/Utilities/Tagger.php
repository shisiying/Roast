<?php
/**
 * Created by PhpStorm.
 * User: shisiying
 * Date: 2019-08-06
 * Time: 10:29
 */

namespace App\Utilities;



use App\Models\Tag;

class Tagger
{
    public static function tagCafe($cafe,$tags,$userId)
    {
        foreach ($tags as $tag) {
            $name = trim($tag);
            //如果标签存在则获取实例
            $newCafeTag = Tag::firstOrNew(['name'=>$name]);
            $newCafeTag->name = $name;
            $newCafeTag->save();

            //将标签和咖啡店关联起来
            $cafe->tags()->syncWithoutDetaching([$newCafeTag->id => ['user_id' => $userId]]);
        }
    }

}