@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.exhibitionGallery.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.exhibition-galleries.update", [$exhibitionGallery->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="exhibition_category_id">{{ trans('cruds.exhibitionGallery.fields.exhibition_category') }}</label>
                <select class="form-control select2 {{ $errors->has('exhibition_category') ? 'is-invalid' : '' }}" name="exhibition_category_id" id="exhibition_category_id" required>
                    @foreach($exhibition_categories as $id => $exhibition_category)
                        <option value="{{ $id }}" {{ ($exhibitionGallery->exhibition_category ? $exhibitionGallery->exhibition_category->id : old('exhibition_category_id')) == $id ? 'selected' : '' }}>{{ $exhibition_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('exhibition_category'))
                    <span class="text-danger">{{ $errors->first('exhibition_category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitionGallery.fields.exhibition_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="gallery">{{ trans('cruds.exhibitionGallery.fields.gallery') }}</label>
                <div class="needsclick dropzone {{ $errors->has('gallery') ? 'is-invalid' : '' }}" id="gallery-dropzone">
                </div>
                @if($errors->has('gallery'))
                    <span class="text-danger">{{ $errors->first('gallery') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitionGallery.fields.gallery_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    var uploadedGalleryMap = {}
Dropzone.options.galleryDropzone = {
    url: '{{ route('admin.exhibition-galleries.storeMedia') }}',
    maxFilesize: 1000, // MB
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 1000
    },
    success: function (file, response) {
      $('form').append('<input type="hidden" name="gallery[]" value="' + response.name + '">')
      uploadedGalleryMap[file.name] = response.name
    },
    removedfile: function (file) {
      file.previewElement.remove()
      var name = ''
      if (typeof file.file_name !== 'undefined') {
        name = file.file_name
      } else {
        name = uploadedGalleryMap[file.name]
      }
      $('form').find('input[name="gallery[]"][value="' + name + '"]').remove()
    },
    init: function () {
@if(isset($exhibitionGallery) && $exhibitionGallery->gallery)
          var files =
            {!! json_encode($exhibitionGallery->gallery) !!}
              for (var i in files) {
              var file = files[i]
              this.options.addedfile.call(this, file)
              file.previewElement.classList.add('dz-complete')
              $('form').append('<input type="hidden" name="gallery[]" value="' + file.file_name + '">')
            }
@endif
    },
     error: function (file, response) {
         if ($.type(response) === 'string') {
             var message = response //dropzone sends it's own error messages in string
         } else {
             var message = response.errors.file
         }
         file.previewElement.classList.add('dz-error')
         _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
         _results = []
         for (_i = 0, _len = _ref.length; _i < _len; _i++) {
             node = _ref[_i]
             _results.push(node.textContent = message)
         }

         return _results
     }
}
</script>
@endsection