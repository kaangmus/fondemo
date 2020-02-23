@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.edit') }} {{ trans('cruds.advisor.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.advisors.update", [$advisor->id]) }}" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
                            <label for="name">{{ trans('cruds.advisor.fields.name') }}</label>
                            <input class="form-control" type="text" name="name" id="name" value="{{ old('name', $advisor->name) }}">
                            @if($errors->has('name'))
                                <span class="help-block" role="alert">{{ $errors->first('name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.advisor.fields.name_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('photp') ? 'has-error' : '' }}">
                            <label for="photp">{{ trans('cruds.advisor.fields.photp') }}</label>
                            <div class="needsclick dropzone" id="photp-dropzone">
                            </div>
                            @if($errors->has('photp'))
                                <span class="help-block" role="alert">{{ $errors->first('photp') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.advisor.fields.photp_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('level') ? 'has-error' : '' }}">
                            <label for="level">{{ trans('cruds.advisor.fields.level') }}</label>
                            <input class="form-control" type="text" name="level" id="level" value="{{ old('level', $advisor->level) }}">
                            @if($errors->has('level'))
                                <span class="help-block" role="alert">{{ $errors->first('level') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.advisor.fields.level_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.advisor.fields.description') }}</label>
                            <textarea class="form-control ckeditor" name="description" id="description">{!! old('description', $advisor->description) !!}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.advisor.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('status') ? 'has-error' : '' }}">
                            <label class="required">type</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value disabled {{ old('status', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}</option>
                                @foreach(App\Advisor::STATUS_SELECT as $key => $label)
                                    <option value="{{ $key }}" {{ old('status', $advisor->status) === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('status'))
                                <span class="help-block" role="alert">{{ $errors->first('status') }}</span>
                            @endif
                            
                        </div>

                        <div class="form-group {{ $errors->has('facebook') ? 'has-error' : '' }}">
                            <label for="facebook">facebook</label>
                            <input class="form-control" type="text" name="facebook" id="facebook" value="{{ old('facebook', $advisor->facebook) }}">
                            @if($errors->has('facebook'))
                            <span class="help-block" role="alert">{{ $errors->first('facebook') }}</span>
                            @endif
                        
                        </div>
                        <div class="form-group {{ $errors->has('twitter') ? 'has-error' : '' }}">
                            <label for="twitter">twitter</label>
                            <input class="form-control" type="text" name="twitter" id="twitter" value="{{ old('twitter', $advisor->twitter) }}">
                            @if($errors->has('twitter'))
                            <span class="help-block" role="alert">{{ $errors->first('twitter') }}</span>
                            @endif
                        
                        </div>
                        <div class="form-group {{ $errors->has('instagram') ? 'has-error' : '' }}">
                            <label for="instagram">instagram</label>
                            <input class="form-control" type="text" name="instagram" id="instagram" value="{{ old('instagram', $advisor->instagram) }}">
                            @if($errors->has('instagram'))
                            <span class="help-block" role="alert">{{ $errors->first('instagram') }}</span>
                            @endif
                        
                        </div>
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <label for="email">email</label>
                            <input class="form-control" type="text" name="email" id="email" value="{{ old('email', $advisor->email) }}">
                            @if($errors->has('email'))
                            <span class="help-block" role="alert">{{ $errors->first('email') }}</span>
                            @endif
                        
                        </div>
                        <div class="form-group {{ $errors->has('website') ? 'has-error' : '' }}">
                            <label for="website">website</label>
                            <input class="form-control" type="text" name="website" id="website" value="{{ old('website', $advisor->website) }}">
                            @if($errors->has('website'))
                            <span class="help-block" role="alert">{{ $errors->first('website') }}</span>
                            @endif
                        
                        </div>
                        <div class="form-group">
                            <label for="published_at">published_at</label>
                            <input class="form-control date {{ $errors->has('published_at') ? 'is-invalid' : '' }}" type="text"
                                name="published_at" id="published_at" value="{{ old('published_at', $advisor->published_at) }}">
                            @if($errors->has(''))
                            <span class="text-danger">{{ $errors->first('') }}</span>
                            @endif
                        
                        </div>
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    Dropzone.options.photpDropzone = {
    url: '{{ route('admin.advisors.storeMedia') }}',
    maxFilesize: 125, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 125,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="photp"]').remove()
      $('form').append('<input type="hidden" name="photp" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="photp"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($advisor) && $advisor->photp)
      var file = {!! json_encode($advisor->photp) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, '{{ $advisor->photp->getUrl('thumb') }}')
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="photp" value="' + file.file_name + '">')
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