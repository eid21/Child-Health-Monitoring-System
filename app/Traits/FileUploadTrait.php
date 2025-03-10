<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

trait FileUploadTrait
{
    /**
     * رفع ملف (صورة أو فيديو) إلى مجلد معين في التخزين
     */
    public function uploadFile(Request $request, $fieldName, $folder, $existingFile = null)
    {
        if ($request->hasFile($fieldName)) {
            // حذف الملف القديم إذا كان موجودًا
            if ($existingFile && Storage::disk('public')->exists($existingFile)) {
                Storage::disk('public')->delete($existingFile);
            }

            // رفع الملف الجديد وتخزينه في مجلد التخزين العام
            return $request->file($fieldName)->store($folder, 'public');
        }

        return $existingFile; // إذا لم يتم رفع ملف جديد، يُعاد الملف القديم
    }

    /**
     * حذف ملف من التخزين
     */
    public function deleteFile($filePath)
    {
        if ($filePath && Storage::disk('public')->exists($filePath)) {
            Storage::disk('public')->delete($filePath);
        }
    }
}
