@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.slider.title_singular') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.sliders.store") }}" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group {{ $errors->has('title') ? 'has-error' : '' }}">
                            <label for="title">{{ trans('cruds.slider.fields.title') }}</label>
                            <input class="form-control" type="text" name="title" id="title" value="{{ old('title', '') }}">
                            @if($errors->has('title'))
                                <span class="help-block" role="alert">{{ $errors->first('title') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.slider.fields.title_helper') }}</span>
                        </div>
                        <div class="form-group {{ $errors->has('image') ? 'has-error' : '' }}">
                            <label for="image">{{ trans('cruds.slider.fields.image') }}</label>
                            <div class="needsclick dropzone" id="image-dropzone">
                            </div>
                            @if($errors->has('image'))
                                <span class="help-block" role="alert">{{ $errors->first('image') }}</span>
                            @endif
                            <span class="help-block">1700*850</span>
                        </div>
                        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
                            <label for="description">{{ trans('cruds.slider.fields.description') }}</label>
                            <textarea class="form-control" name="description" id="description">{{ old('description') }}</textarea>
                            @if($errors->has('description'))
                                <span class="help-block" role="alert">{{ $errors->first('description') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.slider.fields.description_helper') }}</span>
                        </div>
                        <div class="form-group col-md-4 {{ $errors->has('btn_text') ? 'has-error' : '' }}">
                            <label for="btn_text">Button Text</label>
                            <input class="form-control" type="text" name="btn_text" id="btn_text" value="{{ old('btn_text', '') }}">
                            @if($errors->has('btn_text'))
                            <span class="help-block" role="alert">{{ $errors->first('btn_text') }}</span>
                            @endif
                           
                        </div>
                        <div class="form-group col-md-4{{ $errors->has('btn_link') ? 'has-error' : '' }}">
                            <label for="btn_link">Button link</label>
                            <input class="form-control" type="text" name="btn_link" id="btn_link" value="{{ old('btn_link', '') }}">
                            @if($errors->has('btn_link'))
                            <span class="help-block" role="alert">{{ $errors->first('btn_link') }}</span>
                            @endif
                           
                        </div>
                        <div class="form-group {{ $errors->has('position') ? 'has-error' : '' }}">
                            <label class="required">Content Position</label>
                            <select class="form-control" name="position" id="position" required>
                                <option value disabled {{ old('position', null) === null ? 'selected' : '' }}>{{ trans('global.pleaseSelect') }}
                                </option>
                                @foreach(App\Slider::position_SELECT as $key => $label)
                                <option value="{{ $key }}" {{ old('position', '') === (string) $key ? 'selected' : '' }}>{{ $label }}</option>
                                @endforeach
                            </select>
                            @if($errors->has('position'))
                            <span class="help-block" role="alert">{{ $errors->first('position') }}</span>
                            @endif
                        
                        </div>
                        <div class="form-group">
                            <label for="published_at">Published_at</label>
                            <input class="form-control date {{ $errors->has('published_at') ? 'is-invalid' : '' }}" type="text"
                                name="published_at" id="published_at" value="{{ old('published_at') }}">
                            @if($errors->has(''))
                            <span class="text-danger">{{ $errors->first('') }}</span>
                            @endif
                            <span class="help-block"></span>
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
        Dropzone.options.imageDropzone = {
        url: '{{ route('admin.sliders.storeMedia') }}',
        maxFilesize: 2, // MB
        acceptedFiles: '.jpeg,.jpg,.png,.gif',
        maxFiles: 1,
        addRemoveLinks: true,
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        params: {
        size: 2,
       
        },
        success: function (file, response) {
        $('form').find('input[name="image"]').remove()
        $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
        },
        removedfile: function (file) {
        file.previewElement.remove()
        if (file.status !== 'error') {
            $('form').find('input[name="image"]').remove()
            this.options.maxFiles = this.options.maxFiles + 1
        }
        },
        init: function () {
    @if(isset($slider) && $slider->image)
        var file = {!! json_encode($slider->image) !!}
            this.options.addedfile.call(this, file)
        this.options.thumbnail.call(this, file, '{{ $slider->image->getUrl('thumb') }}')
        file.previewElement.classList.add('dz-complete')
        $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
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