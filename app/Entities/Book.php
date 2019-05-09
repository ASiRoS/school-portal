<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\UploadedFile;

class Book extends Model
{
    use Published;

    protected $fillable = ['name', 'is_published', 'filename', 'is_ebook'];

    public function setFile(UploadedFile $file)
    {
        $this->filename = $file->store('books', 'public');
        $this->is_ebook = true;
    }

    public function getFileAttribute(): string
    {
        return "storage/{$this->filename}";
    }

    public static function validations(): array
    {
        return [
            'name' => 'required',
        ];
    }
}