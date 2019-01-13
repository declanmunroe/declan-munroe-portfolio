<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Aws\S3\S3Client;

class S3Controller extends Controller
{
    
    public function uploadimg(Request $request)
    {
        //config('constants.AWS_ACCESS_KEY')
        
        $s3Client = S3Client::factory(array(
            'credentials' => array(
                'key'    => config('constants.AWS_ACCESS_KEY'),
                'secret' => config('constants.AWS_SECRET_KEY'),
            )
        ));
        
        //die(var_dump($s3Client));
        
        $file = $request->file('picture');
        
        $path = $file->getRealPath();
        $mime = $file->getClientMimeType();
        $basename = $file->getClientOriginalName();
        
        //die($path);
        
        $upload_img = $s3Client->putObject(array(
                'Bucket' => 'declan-developer-upload',
                'Key'    => $basename,
                'SourceFile' => $path,
                'ContentType' => $mime
            ));
        
        //die(var_dump($upload_img));
        
        echo "<a href='{$upload_img['ObjectURL']}'>{$upload_img['ObjectURL']}</a>";
        
        
        
        echo $basename;
    }
    
    public function upload()
    {
        return view('s3.upload');
    }
}