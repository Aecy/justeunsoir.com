<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait UploadImageTrait
{
    public function getImageName(Request $request): string
    {
        $imageName = Str::uuid();
        $imageExtension = $request->avatar->getClientOriginalExtension();

        return $imageName . '-' . time() . '.' . $imageExtension;
    }
}
