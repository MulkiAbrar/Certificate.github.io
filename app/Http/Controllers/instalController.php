<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class instalController extends Controller
{


    // Add a new route to routes/web.php
    
    // Modify the downloadImage function in your controller
    public function downloadImage($image)
    {
        // Construct the full path to the image file
        $imagePath = public_path('image/' . $image);

        // Check if the file exists
        if (file_exists($imagePath)) {
            // Set the appropriate headers for the download
            $headers = [
                'Content-Type' => 'image/jpeg', // Adjust the content type based on your image format
            ];

            // Serve the image for download
            return response()->download($imagePath, $image, $headers);
        } else {
            // Handle the case where the image file doesn't exist
            abort(404);
        }
    }


}
