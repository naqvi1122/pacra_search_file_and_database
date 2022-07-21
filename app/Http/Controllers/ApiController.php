<?php

namespace App\Http\Controllers;
use App\Models\post;
use App\Models\Og_user;
use App\Models\student;
use App\Models\address;
use App\Models\city;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Smalot\PdfParser\Parser;
use OCR;
use Aws\Rekognition\RekognitionClient;
use Imagick;
use Excel;
use PhpOffice\PhpWord\IOFactory;

use Jaybizzle\DocToText\Doc;
use DocToText\DocToText;
use ZipArchive;
use DOMDocument;



class ApiController extends Controller
{
    //

    public function filesearch(Request $request)
    {
        $q = $request->search;
      $data=File::where('id','like','%'.$request->q.'%')
           ->orwhere('name','like','%'.$request->q.'%')
           ->orwhere('file','like','%'.$request->q.'%')
           ->orwhere('description','like','%'.$request->q.'%')->get();





                          return $data;

                    }
}
