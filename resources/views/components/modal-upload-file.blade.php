<?php
  $id = $item->id;
?>
<div class="modal fade" id="modal-upload-file-{{$id}}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Attach File</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form action="{{route('tablelist.uploadFile')}}" method="post" enctype="multipart/form-data" id="upload-file">
            @csrf
            <div class="input-group">
              <input type="file" name="file" id="file" class="form-control">
              <input type="text" name="file_id" id="file_id" class="form-control" hidden value="{{$id}}">
              <span class="text-danger" id="file-input-error"></span>
              @error('file')
              <div class="alert alert-danger mt-1 mb-1">
                {{ $message }}
              </div>
              @enderror
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save</button>
            </div>
          </form>
          @if($item->fileReference)
          <h3>List File</h3>
          <div class="table-responsive">
            <table class="table">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
              @foreach($files as $file)
                @if($file->basic_data_id === $item->id)
                <tr>
                  <td>{{$file->name}}</td>
                  <td>
                    <a href="{{route('showFile',$file->basic_data_id)}}" target="_blank">
                      <i class="fas fa-eye"></i>
                    </a>
                  </td>
                </tr>
                @endif
              @endforeach
              </tbody>
            </table>
          </div>
          @else
          <h5 class="text-center">belum ada file yg di attach</h5>
          @endif
        </div>
      </div>
    </div>
  </div>
