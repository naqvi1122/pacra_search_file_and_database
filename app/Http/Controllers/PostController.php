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
use Illuminate\Support\Facades\Http;

use thiagoalessio\TesseractOCR\TesseractOCR;



//use Alimranahmed\LaraOCR\Services\OcrAbstract;


class PostController extends Controller
{
    public function search(Request $request){

        if($request->ajax()){

            $data=post::where('id','like','%'.$request->search.'%')
            ->orwhere('name','like','%'.$request->search.'%')
            ->orwhere('mandate_file','like','%'.$request->search.'%')->get();


            $output='';

        if(count($data)>0){

             $output ='
             <br>

                <table class="table table-dark">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">name</th>
                    <th scope="col">mandate_file</th>
                    <th scope="col">mandate_sent</th>
                    <th scope="col">mandate_accepted</th>

                </tr>
                </thead>
                <tbody>';


                    foreach($data as $row){
                        $output .='
                        <tr>
                        <th scope="row">'.$row->id.'</th>
                        <td><a href="www.google.com//'.$row->id.'">'.$row->name.'</a></td>
                        <td>'.$row->mandate_file.'</td>
                        <td>'.$row->mandate_sent.'</td>
                        <td>'.$row->mandate_accepted.'</td>


                        </tr>
                        ';
                    }




             $output .= '
                 </tbody>
                </table>';




        }
        else{

            $output .='No results';

        }

        return $output;


        }


    //.................simple search....................................

      }
      public function show(Request $request)
      {
          $search=$request['search'] ?? "";
          if($search !=""){
              //where
              $project=post::where('id','like','%'.$request->search.'%')
              ->orwhere('name','like','%'.$request->search.'%')
              ->orwhere('mandate_file','like','%'.$request->search.'%')->get();

        //       $data = Og_user::join('og_companies','og_companies.id','=','og_users.id')
        // ->get(['og_companies.name','og_users.email','og_users.username']);
        // return view('jointable', compact('data'));



          }
          else{

          $project=post::all();
          }
          $data = compact('project','search');
          return view('display')->with($data);

      }




//.................................autocomplete................



public function autocompleteSearch(Request $request)
{
      $query = $request->get('query');
      $filterResult = post::where('name', 'LIKE', '%'. $query. '%')->get();
      return response()->json($filterResult);
}






//.............................student and address relation  one to one ......................

public function student (Request $request)
{
    //  return student::all()->student_data;
    //   $record = compact('naqvi');
    //       return view('student_data')->with($record);
    //$student=student::with('student_data')->get();
    //dd($student->email);

    // $student=student::all();

    //return view('student_data',compact('student'));
    $student=address::all();
    //dd($student[0]->student);
     return view('student_data',compact('student'));
}

//....................................................pdf search......................................
public function pdf (Request $request)
{
    return view('pdfsearch');
}

//...............................................convert pdf and store to database................................
public function pdfstore (Request $request)
{

    $data =new File();

     $file=$request->file;
   //.....................................ppt file convert..................................
//    $zip_handle = new ZipArchive;
//     $output_text = "";
//     if(true === $zip_handle->open($file)){
//         $slide_number = 1; //loop through slide files
//         while(($xml_index = $zip_handle->locateName("ppt/slides/slide".$slide_number.".xml")) !== false){
//             $xml_datas = $zip_handle->getFromIndex($xml_index);
//             $xml_handle = DOMDocument::loadXML($xml_datas, LIBXML_NOENT | LIBXML_XINCLUDE | LIBXML_NOERROR | LIBXML_NOWARNING);
//             $output_text .= strip_tags($xml_handle->saveXML());
//             $slide_number++;
//         }
//         if($slide_number == 1){
//             $output_text .="";
//         }
//         $zip_handle->close();
//     }else{
//     $output_text .="";
//     }
    //dd($output_text);

//.......................................ppt file convert end.................................
 //...................................................word file convert.....................
    //  $kv_texts = '';
    //  $kv_strip_texts = '';
    //  $zip = zip_open($file);

    //  if (!$zip || is_numeric($zip)) return false;


    //  while ($zip_entry = zip_read($zip)) {

    //      if (zip_entry_open($zip, $zip_entry) == FALSE) continue;

    //      if (zip_entry_name($zip_entry) != "word/document.xml") continue;

    //      $kv_texts .= zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));

    //      zip_entry_close($zip_entry);
    //  }

    //  zip_close($zip);
    //  $kv_texts = str_replace('</w:r></w:p></w:tc><w:tc>', " ", $kv_texts);
	// $kv_texts = str_replace('</w:r></w:p>', "\r\n", $kv_texts);
	// $kv_strip_texts = nl2br(strip_tags($kv_texts));

//..............................................end word file convert...................................

     //..........................xl file convert...........................................
    //  $xl = Excel::toArray([],$file);
    //  $y=json_encode($xl);
     //dd($y);
    //......................................xl file convert end.......................................
        $fileName = time().'_'.$file->getClientOriginalName();
 //............................pdf file convert...................................................
    $pdfParser = new Parser();
    $pdf = $pdfParser->parseFile($file->path());
    $content = $pdf->getText();
 //................................end pdf convert......................................................
     $request->file->move('assests',$fileName);
     $data->file=$fileName;




     $data->name=$content;
     $data->description=$request->description;
     $data->save();
     return redirect()->back();
     //return $data;


}

//...................................................end convert pdf and store database function...........................

//................................................view and search result and compare it with search value.....................
public function view (Request $request)
{
    $search=$request['search'] ?? "";
          if($search !=""){
              //where
              $data=File::where('id','like','%'.$request->search.'%')
              ->orwhere('name','like','%'.$request->search.'%')
              ->orwhere('file','like','%'.$request->search.'%')->get();



          }
          else{

            $data = File::all();


          }
          $p = compact('data','search');
           return view('upload_data')->with($p);
        //return with($p);

    // $data = File::all();
    // return view('upload_data',compact('data'));
}

//................................................end view and search.............................................................
//.................................................download file function................................................
public function wq (Request $request, $file)
{
    //dd('hello');
    //return view('upload_data');
    // $dl=File::find($id);
     //dd($file);
    // return Storage::download($dl->path,$dl->file);
    return response()->download(public_path('assests/'.$file));
}

//.............................................end download file function.....................................................

//...........................................view pdf file function..........................................................
public function view_pdf ($id)
{

    $data=File::find($id);
    return view('viewpdf',compact('data'));
  }

  //......................................................end view file function...........................................

//...................................................filesearch.............................................................
  public function filesearch(Request $request)
  {
    if (($request->search) == null) {
        return view('pages.table_list');
    }
    $data=File::where('id','like','%'.$request->search.'%')
         ->orwhere('name','like','%'.$request->search.'%')
         ->orwhere('file','like','%'.$request->search.'%')
         ->orwhere('description','like','%'.$request->search.'%')->get();
         $q = $request->search;
         if (count(array($data)) > 0 ) {
            //dd($opinions_pacra);
                        $data = collect($data);

                        return view('pages.table_list')->with('data', $data)
                            ->with('query', $q);
                    } else {
                        //  dd(count($opinions));
                        //return withFlashSuccess(trans('No Record Found'));
                        return view('pages.table_list')->withMessage ( 'The code you provided is not existing.' );
                    }


    // $search=$request['search'] ?? "";
    // if($search !=""){
    //     //where
    //     $data=File::where('id','like','%'.$request->search.'%')
    //     ->orwhere('name','like','%'.$request->search.'%')
    //     ->orwhere('file','like','%'.$request->search.'%')->get();



    // }
    // else{

    //   $data = File::all();


    // }
    // $p = compact('data','search');
    // return view('pages.table_list')->with($p);
}

//..........................................................end filesearch....................................................


//...........................................................wicpac 1st table api...........................................
public function apitestt(Request $request)
  {
    $qe=$request->search;
    //dd($qe);

    $info=Http::get('http://127.0.0.1:8080/api/wispacdata/'.$qe)->json();
    //dd($info);
    //dd( json_encode( $info[0]['name']));
    //dd($info[0]['name']);
//dd($info);
      //return view('profile',['info'=>$info]);
      //return view('pages.typography')->with('info', $info);

      //return view('pages.typography',['info'=>$info]);
      $z=Http::get('http://127.0.0.1:8080/api/wispacdata_table2/'.$qe)->json();
      $third_table=Http::get('http://127.0.0.1:8080/api/wispacdata_table3/'.$qe)->json();

      if (count(array($info)) > 0  || count($z) > 0  || count($third_table) > 0  ) {
        //dd($opinions_pacra);
                    $info = collect($info);
                    $z = collect($z);
                    $third_table=collect($third_table);

                    return view('pages.typography')->with('info', $info)->with('z', $z)->with('third_table',$third_table);

                } else {
                    //  dd(count($opinions));
                    //return withFlashSuccess(trans('No Record Found'));
                    return view('pages.typography')->withMessage ( 'The code you provided is not existing.' );
                }







  }
  //......................................................end 1st table api//...............................................



// public function apitest_table2(Request $request){


//     $qe=$request->search;
//     //dd($qe);

//     $z=Http::get('http://127.0.0.1:8080/api/wispacdata_table2/'.$qe)->json();

//     if (count(array($z)) > 0 ) {
//         //dd($opinions_pacra);
//                     $z = collect($z);

//                     return view('pages.typography')->with('z', $z);

//                 } else {
//                     //  dd(count($opinions));
//                     //return withFlashSuccess(trans('No Record Found'));
//                     return view('pages.typography')->withMessage ( 'The code you provided is not existing.' );
//                 }



// }



  }


