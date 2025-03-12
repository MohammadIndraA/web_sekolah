<?php

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;  

if(! function_exists('upload')) {
    function uploadDokumen($directory, $file, $filename= "") 
    {
        $extensi = $file->getClientOriginalExtension();
        $filename = "{$filename}_" . date('Ymdhis'). ".{$extensi}";

        Storage::disk('public')->putFileAs("/$directory",$file,$filename);
        return "/$directory/$filename";
    }
}

  function uploadMultipleImages($images, $path = 'uploads', $prefix = null)  
{  
    $uploadedFiles = [];  

    if (!is_array($images)) {  
        return $uploadedFiles;  
    }  

    foreach ($images as $image) {  
        if ($image && $image->isValid()) {  
            // Generate unique filename  
            $filename = ($prefix ? $prefix . '_' : '') .   
                        Str::random(10) .   
                        '.' .   
                        $image->getClientOriginalExtension();  

            // Store the file  
            $fullPath = $image->storeAs($path, $filename, 'public');  

            $uploadedFiles[] = [  
                'original_name' => $image->getClientOriginalName(),  
                'filename' => $filename,  
                'path' => $fullPath,  
                'url' => Storage::url($fullPath)  
            ];  
        }  
    }  

    return $uploadedFiles;  
}  

/**  
 * Hapus gambar lama sebelum upload gambar baru  
 *  
 * @param string|array $oldImages  
 */  
  function deleteOldImages($oldImages)  
{  
    if (!$oldImages) return;  

    $images = is_array($oldImages) ? $oldImages : [$oldImages];  

    foreach ($images as $image) {  
        if (Storage::disk('public')->exists($image)) {  
            Storage::disk('public')->delete($image);  
        }  
    }  
}  


 function generateAddButton($id, $title = 'Tambah Standar', $type='daftar-standar', $class = 'btn-warning', $icon = 'uil-comment-plus')
{
    return '
    <button onclick="addStandar(\'' . $id . '\', \'' . $type . '\')" class="btn ' . $class . ' btn-flat btn-sm" title="' . $title . '">
        <i class="' . $icon . '"></i>
    </button>';
}
 function generateEditButton($id, $title = 'Edit Standar', $type='daftar-standar', $class = 'btn-primary', $icon = 'uil-comment-plus')
{
    return '
    <button onclick="editStandar(\'' . $id . '\', \'' . $type . '\')" class="btn ' . $class . ' btn-flat btn-sm" title="' . $title . '">
        <i class="' . $icon . '"></i>
    </button>';
}
 function deleteButton($id, $title = 'Delete', $type='hapus-standar' ,$class = 'btn-danger', $icon = 'dripicons-trash')
{
    return '
    <button onclick="deleteFunc(\'' . $id . '\', \''. $type . '\' )" class="btn ' . $class . ' btn-flat btn-sm" title="' . $title . '">
        <i class="' . $icon . '"></i>
    </button>';
}
