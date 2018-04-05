<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


class Article extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'content', 'is_enabled', 'slug'
    ];

	public function scopeSearchKeyword($query, $keyword)
	{
		if ($keyword!='') {
			$query->where(function ($query) use ($keyword) {
				$query->where("title", "LIKE","%$keyword%")
				      ->orWhere("content", "LIKE", "%$keyword%");
			});
		}
		return $query;
	}
}
