<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\BasicData;
use App\Models\ReferenceData;


class SAPController extends Controller
{
    public function index()
    {
        $items = ReferenceData::all();
        return view('pages.index',compact('items'));
    }

    // public function showData(Request $request)
    // {
    //     $data = ReferenceData::all();

    //     if($request->keyword != ''){
    //         $data = ReferenceData::where('name','LIKE','%'.$request->keyword.'%')->get();
    //     }

    //     return response()->json([
    //         'data' => $data
    //     ]);
    // }

    public function store(Request $request)
    {
        // dd($request);
        $this->validate($request, [
            'invoiceDate' => 'required',
            'reference' => 'required',
            'postingDate' => 'required',
            'amount' => 'required',
            'currency' => 'required',
            'taxAmount' => 'required',
            'taxVersion' => 'required',
            'text' => 'required',
            'paymentTerm' => 'required',
            'baselineDate' => 'required',
            'companyCode' => 'required'
        ]);

        BasicData::create([
            'invoice_date' => $request->invoiceDate,
            'posting_date' => $request->postingDate,
            'amount' => $request->amount,
            'text' => $request->text,
            'currency' => $request->currency,
            'version_tax' => $request->taxVersion,
            'reference'  => $request->reference
        ]);

        return redirect()->route('SAP.index')->with(['success' => 'data berhasil ditambahkan']);
    }
}
