<?php

namespace anthoz69\dodpackage;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Image;

class dodStorage {
    private $resultFile;
    private $resultFilePath;

    public function uniqueFilename($file, $storeFolder) {
        do {
            $uniqueFilename = uniqid(Str::random(8)) . '.' . $file->getClientOriginalExtension();
            $fullPathStore = $storeFolder . DIRECTORY_SEPARATOR . $uniqueFilename;
            $exists = Storage::disk('public')->exists($fullPathStore);
        } while ($exists);
        return $fullPathStore;
    }

    public function delete($storePath, $replace = '/storage') {
        return Storage::disk('public')->delete(str_replace($replace, '', $storePath));
    }

    public function store($file, $storeFolder) {
        $storePath = $this->uniqueFilename($file, $storeFolder);
        Storage::disk('public')->put($storePath, file_get_contents($file));
        return Storage::url($storePath, 'public');
    }

    public function save() {
        Storage::disk('public')->put($this->resultFilePath, (string) $this->resultFile->encode());
        return Storage::url($this->resultFilePath, 'public');
    }

    public function cropImage($file, $storeFolder, $width = 500, $height = 500) {
        $this->resultFilePath = $this->uniqueFilename($file, $storeFolder);
        $img = Image::make($file);
        $this->resultFile = $img->fit($width, $height);
        return $this->save();
    }

    public function resizeImage($file, $storeFolder, $width = 500, $height = 500) {
        $this->resultFilePath = $this->uniqueFilename($file, $storeFolder);
        $img = Image::make($file);
        $this->resultFile = $img->resize($width, $height);
        return $this->save();
    }

    public function cropImageRatio($file, $storeFolder, $width = 500, $height = 500) {
        $this->resultFilePath = $this->uniqueFilename($file, $storeFolder);
        $img = Image::make($file);
        $this->resultFile = $img->fit($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        return $this->save();
    }

    public function resizeImageRatio($file, $storeFolder, $width = 500, $height = 500) {
        $this->resultFilePath = $this->uniqueFilename($file, $storeFolder);
        $img = Image::make($file);
        $this->resultFile = $img->resize($width, $height, function ($constraint) {
            $constraint->aspectRatio();
            $constraint->upsize();
        });
        return $this->save();
    }
}
