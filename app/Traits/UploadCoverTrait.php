<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

trait UploadCoverTrait
{
    public function getImageName(Request $request): string
    {
        $imageName = Str::uuid();
        $imageExtension = $request->cover->getClientOriginalExtension();

        return $imageName . '-' . time() . '.' . $imageExtension;
    }
}
