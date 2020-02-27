@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.exhibationCategory.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.exhibation-categories.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="year_id">{{ trans('cruds.exhibationCategory.fields.year') }}</label>
                <select class="form-control select2 {{ $errors->has('year') ? 'is-invalid' : '' }}" name="year_id" id="year_id" required>
                    @foreach($years as $id => $year)
                        <option value="{{ $id }}" {{ old('year_id') == $id ? 'selected' : '' }}>{{ $year }}</option>
                    @endforeach
                </select>
                @if($errors->has('year'))
                    <span class="text-danger">{{ $errors->first('year') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.exhibationCategory.fields.year_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="title">{{ trans('cruds.exhibationCategory.fields.title') }}</label>
                <textarea class="form-control ckeditor{{ $errors->has('title') ? 'is-invalid' : '' }}"  name="title" id="title">{!! old('title') !!}</textarea>
                @if($errors->has('title'))
                    <span class="text-danger">{{ $errors->first('title') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.exhibationCategory.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="description">{{ trans('cruds.exhibationCategory.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{!! old('description') !!}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.exhibationCategory.fields.description_helper') }}</span>
            </div>
            <div class="form-group {{ $errors->has('post') ? 'has-error' : '' }}">
              <div>
                <input type="hidden" name="post" value="0">
                <input type="checkbox" name="post" id="post" value="1" {{ old('post', 0) == 1 ? 'checked' : '' }}>
                <label for="post" style="font-weight: 400">post</label>
              </div>
              @if($errors->has('post'))
              <span class="help-block" role="alert">{{ $errors->first('post') }}</span>
              @endif
              
            </div>
            <div class="form-group {{ $errors->has('video') ? 'has-error' : '' }}">
              <div>
                <input type="hidden" name="video" value="0">
                <input type="checkbox" name="video" id="video" value="1" {{ old('video', 0) == 1 ? 'checked' : '' }}>
                <label for="video" style="font-weight: 400">video</label>
              </div>
              @if($errors->has('video'))
              <span class="help-block" role="alert">{{ $errors->first('video') }}</span>
              @endif
              
            </div>
            <div class="form-group {{ $errors->has('gallery') ? 'has-error' : '' }}">
              <div>
                <input type="hidden" name="gallery" value="0">
                <input type="checkbox" name="gallery" id="gallery" value="1" {{ old('gallery', 0) == 1 ? 'checked' : '' }}>
                <label for="gallery" style="font-weight: 400">gallery</label>
              </div>
              @if($errors->has('gallery'))
              <span class="help-block" role="alert">{{ $errors->first('gallery') }}</span>
              @endif
              
            </div>

            <div class="form-group" style="display: none" id="e_cat_video">
                <label for="e_cat_video">{{ trans('cruds.exhibationCategory.fields.e_cat_video') }}</label>
                <div class="needsclick dropzone {{ $errors->has('e_cat_video') ? 'is-invalid' : '' }}" id="e_cat_video-dropzone">
                </div>
                @if($errors->has('e_cat_video'))
                    <span class="text-danger">{{ $errors->first('e_cat_video') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.exhibationCategory.fields.e_cat_video_helper') }}</span>
            </div>
            <div style="display: none" id="e_cat_post">
              <div class="form-group">
                  <label for="e_cat_post_video">{{ trans('cruds.exhibationCategory.fields.e_cat_post_video') }}</label>
                  <div class="needsclick dropzone {{ $errors->has('e_cat_post_video') ? 'is-invalid' : '' }}" id="e_cat_post_video-dropzone">
                  </div>
                  @if($errors->has('e_cat_post_video'))
                      <span class="text-danger">{{ $errors->first('e_cat_post_video') }}</span>
                  @endif
                  <span class="help-block">{{ trans('cruds.exhibationCategory.fields.e_cat_post_video_helper') }}</span>
              </div>
              <div class="form-group">
                  <label for="e_cat_post_description">{{ trans('cruds.exhibationCategory.fields.e_cat_post_description') }}</label>
                  <textarea class="form-control {{ $errors->has('e_cat_post_description') ? 'is-invalid' : '' }}" name="e_cat_post_description" id="e_cat_post_description">{{ old('e_cat_post_description') }}</textarea>
                  @if($errors->has('e_cat_post_description'))
                      <span class="text-danger">{{ $errors->first('e_cat_post_description') }}</span>
                  @endif
                  <span class="help-block">{{ trans('cruds.exhibationCategory.fields.e_cat_post_description_helper') }}</span>
              </div>
            </div>
            <div class="form-group">
                <label for="public_date">{{ trans('cruds.exhibationCategory.fields.public_date') }}</label>
                <input class="form-control date {{ $errors->has('public_date') ? 'is-invalid' : '' }}" type="text" name="public_date" id="public_date" value="{{ old('public_date', '') }}">
                @if($errors->has('public_date'))
                    <span class="text-danger">{{ $errors->first('public_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.exhibationCategory.fields.public_date_helper') }}</span>
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
   
    CKEDITOR.replace( 'title', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
    CKEDITOR.replace( 'description', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
    CKEDITOR.replace( 'e_cat_post_description', {filebrowserImageBrowseUrl: '/file-manager/ckeditor'});
   
</script>
<script>
    $(document).ready(function () {
    $('#type').on('change',function(){
      var type_index = $(this).val();
      if (type_index != 'egallery') {
          if(type_index == 'evideo'){
            $('#e_cat_video').show();
            $('#e_cat_post').hide();
          }else{
            $('#e_cat_post').show();
            $('#e_cat_video').hide();
          }
      }else{
        $('#e_cat_post').hide();
        $('#e_cat_video').hide();
      }
    })
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/exhibation-categories/ckmedia', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', {{ $exhibationCategory->id ?? 0 }});
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>

<script>
    Dropzone.options.eCatVideoDropzone = {
    url: '{{ route('admin.exhibation-categories.storeMedia') }}',
    maxFilesize: 1000, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 1000
    },
    success: function (file, response) {
      $('form').find('input[name="e_cat_video"]').remove()
      $('form').append('<input type="hidden" name="e_cat_video" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="e_cat_video"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($exhibationCategory) && $exhibationCategory->e_cat_video)
      var file = {!! json_encode($exhibationCategory->e_cat_video) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="e_cat_video" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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
<script>
    Dropzone.options.eCatPostVideoDropzone = {
    url: '{{ route('admin.exhibation-categories.storeMedia') }}',
    maxFilesize: 1000, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 1000
    },
    success: function (file, response) {
      $('form').find('input[name="e_cat_post_video"]').remove()
      $('form').append('<input type="hidden" name="e_cat_post_video" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="e_cat_post_video"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($exhibationCategory) && $exhibationCategory->e_cat_post_video)
      var file = {!! json_encode($exhibationCategory->e_cat_post_video) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="e_cat_post_video" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
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