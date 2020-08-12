<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hashtag extends Model
{
    protected $fillable = [
        'name','news_id',
    ];

    public function news()
    {
        return $this->belongsTo(News::class);
    }

    public function upload_hashtags($hashtags, $news)
    {

        if (!is_null($hashtags)) {
            foreach ($hashtags as $hashtag) {
                if (!is_null($hashtag)) {
                    Hashtag::create([
                        "name" => $hashtag,
                        "news_id" => $news->id,
                    ]);
                }
            }
        }
    }


}
