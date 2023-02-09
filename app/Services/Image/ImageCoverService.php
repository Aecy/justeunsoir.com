<?php

namespace App\Services\Image;

use App\Models\User;
use App\Traits\UploadCoverTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

final class ImageCoverService
{
    use UploadCoverTrait;

    public function unlink($image): void
    {
        if (File::exists("storage/$image")) {
            unlink("storage/$image");
        }
    }

    public function link(User $user, Request $request): mixed
    {
        return $request->cover->storeAs(
            'covers',
            $this->getImageName($request),
            'public'
        );
    }
}
