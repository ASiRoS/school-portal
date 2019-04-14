<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Partner extends Model
{
    use Published;

    protected $fillable = ['name', 'link', 'logo', 'is_published'];

    public function setImage(UploadedFile $image)
    {
        $image = $image->store('partners', 'public');
        $this->logo = $image;
    }

    public function getLogoAttribute(string $image): string
    {
        return "storage/$image";
    }

    public static function validations(): array
    {
        return [
            'name' => 'required',
            'link' => 'required',
            'logo' => 'required|image',
        ];
    }
}