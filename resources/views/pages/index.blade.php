@extends('layouts.master')
@section('index_active', 'active')
@section('content')
  <main>
    @if(session()->has('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
    @endif
    <div class="container-fluid px-4">
      <h1 class="mt-4">Form</h1>
      <div class="row">
        <form action="{{route('SAP.store')}}" method="post" class="mb-3">
          @csrf
          <fieldset>
            <div class="mb-3 row">
              <div class="col-sm-6">
                <div class="row">
                  <label for="invoiceDate" class="col-sm-2 col-form-label col-form-label-sm" style="width: 110px">Invoice Date</label>
                  <div class="col-sm-4">
                    <input type="text" name="invoiceDate" class="form-control form-control-sm" id="invoiceDate">
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row">
                  <label for="reference" class="col-sm-2 col-form-label col-form-label-sm" style="width: 110px">Reference</label>
                  <div class="col-sm-4">
                    <input type="text" name="reference" class="form-control form-control-sm" id="reference">
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <?php
                date_default_timezone_set("Asia/Jakarta");
                $date = date("d-M-Y");
              ?>
              <label for="postingDate" class="col-sm-2 col-form-label col-form-label-sm" style="width:110px">Posting Date</label>
              <div class="col-sm-3">
                <input type="text" name="postingDate" class="form-control form-control-sm" id="postingDate" value="{{$date}}" readonly>
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col-sm-6">
                <div class="row">
                  <label for="amount" class="col-sm-2 col-form-label col-form-label-sm" style="width: 110px">Amount</label>
                  <div class="col-sm-5">
                    <input type="number" name="amount" class="form-control form-control-sm" id="amount">
                  </div>
                </div>
              </div>
              <div class="col-sm-6">
                <div class="row">
                  <label for="currency" class="col-sm-2 col-form-label col-form-label-sm" style="width: 110px">Currency</label>
                  <div class="col-sm-5">
                    <input type="text" name="currency" class="col-sm-2 form-control form-control-sm" id="currency" value="EUR">
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col-sm-6">
                <div class="row">
                  <label for="taxAmount" class="col-sm-2 col-form-label col-form-label-sm" style="width: 110px">Tax Amount</label>
                  <div class="col-sm-5">
                    <input type="number" onchange="getAmountValue()" name="taxAmount" class="form-control form-control-sm" id="taxAmount">
                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="row">
                  <div class="row">
                    <label for="taxVersion" class="col-sm-2 col-form-label col-form-label-sm" style="width: 110px">Tax Version</label>
                    <div class="col-sm-5">
                      <select class="form-select form-select-sm" name="taxVersion" aria-label=".form-select-sm example">
                        <option value="1" selected>V1</option>
                        <option value="2">V2</option>
                        <option value="3">V3</option>
                        <option value="4">V4</option>
                        <option value="5">V5</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="mb-3 row">
              <label for="text" class="col-sm-2 col-form-label col-form-label-sm" style="width:110px">Text</label>
              <div class="col-sm-3">
                <input type="text" name="text" class="form-control form-control-sm" id="text">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="paymentTerm" class="col-sm-2 col-form-label col-form-label-sm" style="width:110px">Payment Term</label>
              <div class="col-sm-3">
                <input type="text" name="paymentTerm" class="form-control form-control-sm" id="paymentTerm" readonly value="30 Days net">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="baselineDate" class="col-sm-2 col-form-label col-form-label-sm" style="width:110px">Baseline Date</label>
              <div class="col-sm-3">
                <input type="text" name="baselineDate" class="form-control form-control-sm" id="baselineDate" readonly value="14.05.2013">
              </div>
            </div>
            <div class="mb-3 row">
              <label for="companyCode" class="col-sm-2 col-form-label col-form-label-sm" style="width:110px">Company Code</label>
              <div class="col-sm-3">
                <input type="text" name="companyCode" class="form-control form-control-sm" id="companyCode" readonly value="0001 SAP A.G Walldorf">
              </div>
            </div>
            <button type="submit" class="btn btn-primary" id="save-btn">Save</button>
          </fieldset>
        </form>
      </div>
      <div class="card mb-4">
        <div class="card-body">
          <table id="datatablesSimple">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Amount</th>
                <th scope="col">Quantity</th>
                <th scope="col">Purchase Code</th>
                <th scope="col">Item</th>
                <th scope="col">PO Text</th>
                <th scope="col">Tax Code</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Amount</th>
                <th scope="col">Quantity</th>
                <th scope="col">Purchase Code</th>
                <th scope="col">Item</th>
                <th scope="col">PO Text</th>
                <th scope="col">Tax Code</th>
              </tr>
            </tfoot>
            <tbody>
              <?php
              $total = 0;
              foreach($items as $item){
                $total += $item->amount;
              }

              function formatIDR($angka){

                $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
                return $hasil_rupiah;

              }

              ?>
              <input type="text" name="totalAmount" id="totalAmount" hidden value="{{$total}}">

              @foreach($items as $item)

              <tr>
                <td>{{$loop->iteration}}</td>
                <td id="reference_amount">{{formatIDR($item->amount)}}</td>
                <td>{{$item->quantity}}</td>
                <td>{{$item->purchaseNum}}</td>
                <td>{{$item->item}}</td>
                <td>{{$item->po_text}}</td>
                <td>{{$item->tax_code}}</td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </main>
@endsection
