<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class News extends Model
{
    use Published;

    protected $fillable = ['title', 'description', 'preview_image', 'is_published'];

    public function setImage(UploadedFile $file)
    {
        $this->preview_image = $file->store('news', 'public');
    }

    public function getPreviewImageAttribute(string $image): string
    {
        return "storage/$image";
    }

    public static function validations(): array
    {
        return [
            'title' => 'required',
            'description' => 'required',
            'preview_image' => 'required|image',
        ];
    }
}