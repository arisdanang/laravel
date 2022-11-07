<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BasicData;
use App\Models\FileReference;

class TableListController extends Controller
{
    public function index(){
        $items = BasicData::all();
        $files = FileReference::all();
        // $items = BasicData::find(4)->fileReference;
        // dd($items);

        return view('pages.table-list',compact('items','files'));
    }

    public function search(Request $request)
    {
        function rupiah($angka){
            $hasil_rupiah = "Rp " . number_format($angka,0,',','.');

            return $hasil_rupiah;
        }

        function getFile($id){
            $files = FileReference::where('basic_data_id',$id)->get('name');

            return $files;
        }

        if($request->ajax()) {
            $output = "";
            $items = BasicData::where('reference', 'LIKE', '%'.$request->search.'%')->get();
            if($items) {
                $loop = 1;
                foreach($items as $item){
                    $output .= '
                        <tr>
                            <td>'.$loop++.'</td>
                            <td>
                                <a href="#" class="text-info" data-bs-toggle="modal" data-bs-target="#modal-upload-file-'.$item->id.'">'.$item->invoice_date.'</a>
                            </td>
                            <td>'.$item->posting_date.'</td>
                            <td>'.rupiah($item->amount).'</td>
                            <td>'.$item->text.'</td>
                            <td>'.$item->currency.'</td>
                            <td>'.$item->version_tax.'</td>
                            <td>'.$item->reference.'</td>
                        </tr>
                    ';
                }
                return $output;
            }
        }
    }

    public function uploadFile(Request $request)
    {
        $file = $request->file('file');
        $filename = $file->getClientOriginalName();
        $extension = $file->getClientOriginalExtension();
        $file_id = $request->file_id;

        $request->file->storeAs('public/files/'.$file_id, $filename);

        $save = new FileReference();
        $save->name = $filename;
        $save->basic_data_id = $file_id;
        $save->save();

        return redirect()->route('tablelist')
        ->with('success','File '. $filename. ' telah diupload');
    }

    public function showFile($id)
    {
        // dd($id);
        // $file = FileReference::find($id,['name']);
        $file = FileReference::where('basic_data_id',$id)->get('name')->first();
        // dd($file);
        $path = storage_path('app/public/files/');
        // dd($path);
        $filename = "$path\\$id\\$file->name";
        return response()->file($filename);

    }

}
