<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Product extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'price',
    ];

    /**
     * @var string
     */
    public const IMAGE_DIRECTORY = 'products/images';

    /**
     * @return string
     */
    public function imageFileName(): string
    {
        return sprintf("%d.%s", $this->id, $this->image_extension);
    }

    /**
     * @return string
     */
    public function imagePath(): string
    {
        return static::IMAGE_DIRECTORY . DIRECTORY_SEPARATOR . $this->imageFileName();
    }

    /**
     * @param  \Illuminate\Http\File|\Illuminate\Http\UploadedFile|string  $file
     * @return string|false
     */
    public function storeImage($file)
    {
        if (!$file) {
            return false;
        }
        return static::imageStorage()->putFileAs(static::IMAGE_DIRECTORY, $file, $this->imageFileName());
    }

    /**
     * @return string
     */
    public function imageUrl(): string
    {
        return static::imageStorage()->url($this->imagePath());
    }

    /**
     *
     */
    public function delete()
    {
        $res = parent::delete();
        static::imageStorage()->delete($this->imagePath());
        return $res;
    }

    /**
     *
     */
    protected static function imageStorage()
    {
        return Storage::disk('public');
    }
}
