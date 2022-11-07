@extends('layouts.master')
@section('tablelist_active','active')
@section('content')
<?php
function formatIDR($angka){
  $hasil_rupiah = "Rp " . number_format($angka,2,',','.');
	return $hasil_rupiah;
}
  ?>
<main>
  <div class="container-fluid px-4">
    <h1 class="mt-4">Table List</h1>
    @if(session()->has('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div>
    @endif

    <div class="card mb-4">
      <div class="card-body">
        <div class="form-group">
          <input type="text" class="form-controller" id="search" name="search" value="">
        </div>
        <div class="table-responsive">
          <table class="table">
            <thead>
              <tr>
                <th scope="col">No</th>
                <th scope="col">Invoice Date</th>
                <th scope="col">Posting Date</th>
                <th scope="col">Amount</th>
                <th scope="col">Text</th>
                <th scope="col">Currency</th>
                <th scope="col">Tax Version</th>
                <th scope="col">Reference</th>
              </tr>
            </thead>
            <tbody id="tbody">
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
@section('search_script')
<script type="text/javascript">
  const search = document.getElementById('search')
  const tableBody = document.getElementById('tbody')

  function getContent(){
    const searchValue = search.value
    const xhr = new XMLHttpRequest();
    console.log('tes')
    xhr.open('GET','{{route('search')}}/?search=' + searchValue, true)
    xhr.setRequestHeader('X-Requested-With', 'XMLHttpRequest')
    xhr.onreadystatechange = function(){
      if(xhr.readyState == 4 && xhr.status == 200){
        tableBody.innerHTML = xhr.responseText;
      }
    }
    xhr.send()
  }

  search.addEventListener('input',getContent);

  $.ajaxSetup({
    headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  $('#upload-file').submit(function(e){
    e.preventDefault();
    let formData = new FormData(this)

    $.ajax({
      type: 'post',
      url: "{{route('tablelist.uploadFile')}}",
      data: {formData, id: search.value},
      contentType: false,
      processData: false,
      success: (response) => {
        if(response) {
          this.reset()
          alet('file telah diupload')
        }
      },
      error: function(response){
        $('#file-input-error').text(response.responseJSON.message)
      }
    })
    console.log(formData)
  })
</script>
@endsection
