@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.exhibitionPost.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.exhibition-posts.update", [$exhibitionPost->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label class="required" for="exhibition_category_id">{{ trans('cruds.exhibitionPost.fields.exhibition_category') }}</label>
                <select class="form-control select2 {{ $errors->has('exhibition_category') ? 'is-invalid' : '' }}" name="exhibition_category_id" id="exhibition_category_id" required>
                    @foreach($exhibition_categories as $id => $exhibition_category)
                        <option value="{{ $id }}" {{ ($exhibitionPost->exhibition_category ? $exhibitionPost->exhibition_category->id : old('exhibition_category_id')) == $id ? 'selected' : '' }}>{{ $exhibition_category }}</option>
                    @endforeach
                </select>
                @if($errors->has('exhibition_category'))
                    <span class="text-danger">{{ $errors->first('exhibition_category') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitionPost.fields.exhibition_category_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="name">{{ trans('cruds.exhibitionPost.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', $exhibitionPost->name) }}">
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitionPost.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="feature_image">{{ trans('cruds.exhibitionPost.fields.feature_image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('feature_image') ? 'is-invalid' : '' }}" id="feature_image-dropzone">
                </div>
                @if($errors->has('feature_image'))
                    <span class="text-danger">{{ $errors->first('feature_image') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitionPost.fields.feature_image_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="content">{{ trans('cruds.exhibitionPost.fields.content') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('content') ? 'is-invalid' : '' }}" name="content" id="content">{!! old('content', $exhibitionPost->content) !!}</textarea>
                @if($errors->has('content'))
                    <span class="text-danger">{{ $errors->first('content') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitionPost.fields.content_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="public_date">{{ trans('cruds.exhibitionPost.fields.public_date') }}</label>
                <input class="form-control date {{ $errors->has('public_date') ? 'is-invalid' : '' }}" type="text" name="public_date" id="public_date" value="{{ old('public_date', $exhibitionPost->public_date) }}">
                @if($errors->has('public_date'))
                    <span class="text-danger">{{ $errors->first('public_date') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.exhibitionPost.fields.public_date_helper') }}</span>
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
    Dropzone.options.featureImageDropzone = {
    url: '{{ route('admin.exhibition-posts.storeMedia') }}',
    maxFilesize: 10, // MB
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 10
    },
    success: function (file, response) {
      $('form').find('input[name="feature_image"]').remove()
      $('form').append('<input type="hidden" name="feature_image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="feature_image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($exhibitionPost) && $exhibitionPost->feature_image)
      var file = {!! json_encode($exhibitionPost->feature_image) !!}
          this.options.addedfile.call(this, file)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="feature_image" value="' + file.file_name + '">')
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
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '/admin/exhibition-posts/ckmedia', true);
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
                data.append('crud_id', {{ $exhibitionPost->id ?? 0 }});
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

@endsection