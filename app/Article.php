<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Intervention\Image\ImageManagerStatic as Image;
use Storage;

class Article extends Model
{
    protected $casts = [
        'published_at' => 'dateTime',
    ];
    protected $fillable = [ 'title', 'sub_title', 'slug', 'body', 'published_at', 'image']; // Field that will be fillable automaticaly

    // protected $with = ['user'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function getDatePublicationAttribute()
    {
        return $this->published_at->diffForHumans();
    }


    public function scopeRecherche($query, $word)
    {
        $query->where('title', 'like', "%$word%")
                ->orWhere('sub_title', 'like', "%$word%")
                ->orWhere('body', 'like', "%$word%");
    }
    public function getTitleSearchedAttribute()
    {
        return str_replace(request('q'), '<mark>' . request('q') . '</mark>', $this->title);
    }
    public function getSubTitleSearchedAttribute()
    {
        return str_replace(request('q'), '<mark>' . request('q') . '</mark>', $this->title);
    }

    public function setSlugAttribute($val)
    {
        $this->attributes['slug'] = \Str::slug($this->title);
    }

    public function setImageAttribute()
    {
        $img = Image::make(request('image')->getRealPath())->fit(1440, 470);

        $image_name = 'images/' . time() . '-' . request('image')->getClientOriginalName();
        
        Storage::put($image_name, (string) $img->encode());

        $this->attributes['image'] = $image_name;
    }
}
