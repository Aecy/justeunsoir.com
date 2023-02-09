<?php

namespace App\Services\Image;

use App\Models\User;
use App\Traits\UploadImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

final class ImageAvatarService
{
    use UploadImageTrait;

    public function unlink($image): void
    {
        if (File::exists("storage/$image")) {
            unlink("storage/$image");
        }
    }

    public function link(User $user, Request $request): mixed
    {
        return $request->avatar->storeAs(
            'avatars',
            $this->getImageName($request),
            'public'
        );
    }
}
