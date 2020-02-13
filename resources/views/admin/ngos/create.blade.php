@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.ngos.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="name">{{ trans('cruds.ngo.fields.name') }}</label>
                <input class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" id="name" value="{{ old('name', '') }}" required>
                @if($errors->has('name'))
                    <span class="text-danger">{{ $errors->first('name') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ngo.fields.name_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="photo">{{ trans('cruds.ngo.fields.photo') }}</label>
                <div class="needsclick dropzone {{ $errors->has('photo') ? 'is-invalid' : '' }}" id="photo-dropzone">
                </div>
                @if($errors->has('photo'))
                    <span class="text-danger">{{ $errors->first('photo') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ngo.fields.photo_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="videolink">{{ trans('cruds.ngo.fields.videolink') }}</label>
                <input class="form-control {{ $errors->has('videolink') ? 'is-invalid' : '' }}" type="text" name="videolink" id="videolink" value="{{ old('videolink', '') }}">
                @if($errors->has('videolink'))
                    <span class="text-danger">{{ $errors->first('videolink') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ngo.fields.videolink_helper') }}</span>
            </div>

            <div class="form-group">
                <label for="description">{{ trans('cruds.ngo.fields.description') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description') ? 'is-invalid' : '' }}" name="description" id="description">{{ old('description') }}</textarea>
                @if($errors->has('description'))
                    <span class="text-danger">{{ $errors->first('description') }}</span>
                @endif
                <span class="help-block">{{ trans('cruds.ngo.fields.description_helper') }}</span>
            </div>
            <div class="form-group">
                <div class="card">
                    <div class="card-body">
                    
                        <label for="species">{{ trans('cruds.ngo.fields.species') }}</label>
                        <!-- <div style="padding-bottom: 4px">
                            <span class="btn btn-info btn-xs select-all" style="border-radius: 0">{{ trans('global.select_all') }}</span>
                            <span class="btn btn-info btn-xs deselect-all" style="border-radius: 0">{{ trans('global.deselect_all') }}</span>
                        </div> -->
                        
                        <select require multiple="multiple" class="form-control select-multiple  {{ $errors->has('species') ? 'is-invalid' : '' }}" name="species[]" id="species" required>
                            @foreach($species as $id => $species)
                                <option value="{{ $id }}" {{ in_array($id, old('species', [])) ? 'selected' : '' }}>{{ $species }}</option>
                            @endforeach
                        </select>

                        @if($errors->has('species'))
                            <span class="text-danger">{{ $errors->first('species') }}</span>
                        @endif
                        <span class="help-block">{{ trans('cruds.ngo.fields.species_helper') }}</span>
                    
                    </div>
                </div>
                <!-- End Select -->

               <!-- Editable table -->
                <div id="yearsPrice" class="card">           
                
                </div>
                <!-- Editable table -->
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
<script src="{{url('js/ediTable.min.js')}}"></script>

<style>
    .select2-results__option{
        padding:5px 10px;
    }
    .pt-3-half {
    padding-top: 1.4rem;
    }

</style>
<script>
    const defaultObj = <?php echo json_encode($default);?>;
    const nonPrice = <?php echo json_encode($default);?>;
    var ngoprice = <?php echo json_encode($ngoprices);?>;
        if( Object.entries(ngoprice).length == 0 ){
            ngoprice = {0:_.clone(defaultObj)};
        }
    var Selected = {0:_.clone(defaultObj)};
    var $tableID = $('.card-body .table-editable');
    const $select2 = $('#species');
    const $tablewrap = $('#yearsPrice');
    const tableClass = 'div.table-editable';
    const $BTN = $('.export-btn');
    const $EXPORT = $('.export');
    var   data    = {'id':0};
    var _BodyClass = ".select_"+data.id;
    var _FindClass = "select_"+data.id;
    var _tableClassN ='ediTable_'+data.id;
    var _tableClass ='.ediTable_'+data.id;
    const yearInputName = 'years_';
    const priceInputName = 'prices_';
    // var _Table;
    var newTable =`
    <div class="card-body">
        <div id="table" class="table-editable">
            <h4 class=" text-left font-weight-bold text-uppercase d-inline p-0">Years and Donation Price</h4>
            <span class="table-add float-right mb-3 mr-2"><a href="#!" class="text-success"><i
                    class="fas fa-plus fa-2x" aria-hidden="true"></i></a></span>
                    <table class="table table-bordered table-responsive-md table-striped text-center" >
                    </table>
        </div>
    </div>`;

    const TableHead =[
        {
            title:"#",
            type:"text",
            editable:false,

        },
        {
            title:"Specie",
            type:"text",
            editable:false,
        },


        {
            title:"Year",
            type:"text",
            validation:true
        },
    
        {
            title:"Price",
            type:"text",
            required:true,
            validation:true,
        } 
    ];
    const TableButton = {
        edit:{
            active:true,
            text:"<i class=\" text-info fas fa-edit fa-2x\"></i>",
            textActive:"<i class=\" text-success fas fa-save fa-2x\"></i>",
            selector:"edit",
        },
        delete:{
            active:true,
            text:"<i class=\" text-danger fas fa-trash fa-2x\"></i>",
            selector:"delete", // class
        },
    
    };

    jQuery(document).ready(function() {
        $select2.select2({
            placeholder: "Select Species Name",
        });
        if(ngoprice[0] !== undefined && $select2[0].selectedOptions.length > 0){
            $($select2[0].selectedOptions).each(function(key,item){
                ngoprice[item.value] = _.clone(ngoprice[0])
                if( ngoprice[0] == undefined )
                    delete ngoprice[0];
                // $select2.trigger('change');
                let data = {
                'selected':true,
                "id": item.value,
                "text": $(item).text(),
                "title": ""
                };

                $select2.trigger({
                    type: 'select2:select',
                    params: {
                        data: data
                    }
                });
            });            
        }else{

        showTable();   
        }
        
    });
    $(document).on('click','.table-add',function(e){
        console.log(e)
        console.log("Added Column");
    });
    $select2.on('select2:select select2:unselect',function(e){
        console.log(e.params.data);
        data = e.params.data;
        _BodyClass = ".select_"+data.id;
        _FindClass = "select_"+data.id;
        _tableClassN ='ediTable_'+data.id;
         _tableClass ='.ediTable_'+data.id;
        let cardBody = $tablewrap.find('.card-body');
         if( 
        $tablewrap.find('.card-body').length >= 0
        && data.selected
        ){
            setData(data);

            if( cardBody.data('index') == 0 && cardBody.length == 1){
                cardBody.remove();
                console.log('removed Table')
            }
            addTable();
            showTable(data.id);  

        }else if(!data.selected){
            $tablewrap.find(_BodyClass).remove();
                if( ngoprice[data.id] == 0 ){
                    delete ngoprice[data.id];
                    console.log('delete')
                }
             $(document).find('input[name='+yearInputName+data.id+']').remove();
             $(document).find('input[name='+priceInputName+data.id+']').remove();
        }

    });
    function setData(data){
        console.log( 'Data Setting' );
        var Obj = _.clone(defaultObj);
        if( ngoprice[0] !== undefined ){
            Obj =  _.clone(ngoprice[0]);
        }
        if( ngoprice[data.id] !== undefined){
            Obj = _.clone(ngoprice[data.id]);
        }       
        Obj = $.each(_.clone(Obj),function(key,val){
            if( val == undefined ){
                delete Obj[key];
                return false;
            }
            if( data.id )
                val.specie = data.text;
            if( val.price > 0)
                setInput(val,data.id);
          
        });
        Selected[data.id] = _.clone(Obj);
        ngoprice[data.id] = _.clone(Obj);
        if( data.id ){
            delete ngoprice[0];
        }
    }
    function editTable(tableClass,jsonObject){
        // function editTable(){
        // console.log(jsonObject);
      $(document).find(tableClass).ediTable(
            {
                json:
                {
                    head:TableHead,
                    // body:jsonObject,
                    body:jsonObject,
                },      
                button:TableButton,
                // add:true,
                sortable:false,
                keyboard:true,
                beforeEdit:function(values,$tr){
                    // console.log(values)
                    // console.log($tr)
                    return false;
                },
                afterSave:function(values,oldvalues){
                    let table = $(document).find(tableClass);
                    let trIndex = values.index ;
                    let objIndex = values.index -1;
                    console.log(values)
                    if( table.data('index') != 0 ){

                        setInput(values,table.data('index'));
              
                    }else{
                        // ngoprice[objIndex] = values;
                    }
                    ngoprice[table.data('index')][objIndex] = values;
                    // console.log(values,oldvalues);
                    // formdata=new FormData();
                    // $.each(values,function(index,cellValue){
                    //     console.log(cellValue);
                    //     formdata.append(index,cellValue);
                    // });
                    // $.ajax({
                    //     url:"/path/serverFile[.extension]",
                    //     data:formdata,
                    //     type:"method",
                    //     success:function(resp){

                    //     }
                    // });
                },
                afterDelete:function(values)
                {
                    let table = $(document).find(tableClass);
                    let trIndex = values.index ;
                    let objIndex = values.index -1;
                    if( table.data('index') != 0 ){

                        // removeInput(values,table.data('index'));
                        $(document).find('.'+yearInputName+table.data('index')+"_"+values.index).remove();
                        $(document).find('.'+priceInputName+table.data('index')+"_"+values.index).remove();
                        ngoprice[table.data('index')][objIndex] == null;
                        delete ngoprice[table.data('index')][objIndex];
                    }
                    // $.ajax({
                    //     url:"/path/serverFile[.extension]",
                    //     data:{id:values._id},
                    //     success:function(resp){

                    //     }
                    // })
                },
                requiredAction:function($tr)
                {
                    console.log($tr);
                }
            }
        );
    }

    function showTable(key = 0){
        // console.log('less  0')
        // console.log(key)
        // console.log(_tableClass)
        if( key > 0 ){            
            editTable(_tableClass,ngoprice[key]);
            return;
        }
        // console.log('Large 0')
        $.each(ngoprice,function(key,item){
            data.id = key;
            _tableClass = '.ediTable_'+key
            _tableClassN = 'ediTable_'+key
             _BodyClass = ".select_"+data.id;
             _FindClass = "select_"+data.id;
            // console.log(_tableClass);
            // console.log(key);
            // console.log(data.id);
            $.each(item,function(key,itemVal){
                if( itemVal.price > 0 ){
                    setInput(itemVal,data.id);
                }
            });
            addTable();
            editTable(_tableClass,_.clone(item));
        })
    }
    function addTable(){
        console.log('added new Table')
        let tableNew = $(newTable).addClass(_FindClass).attr('data-index',data.id)
        .find('table').attr('data-index',data.id).addClass(_tableClassN).parents('div.card-body');
        // console.log(tableNew)
        $tablewrap.append(tableNew);
    }
    function setInput(val,index){
        let yearInput = $('<input class="'+(yearInputName+index+"_"+val.index)+'" type="hidden" name="'+(yearInputName+index)+'[]" value="'+val.year+'">')
        let priceInput = $('<input class="'+(yearInputName+index+"_"+val.index)+'" type="hidden" name="'+(priceInputName+index)+'[]" value="'+val.price+'">')
        $tablewrap.find('.'+yearInputName+index+"_"+val.index).remove()
        $tablewrap.find('.'+yearInputName+index+"_"+val.index).remove()
        $tablewrap.append(yearInput)
        $tablewrap.append(priceInput)         
    }
    function dynInput(cbox) {
      if (cbox.checked) {
        var input = document.createElement("input");
        input.type = "money";
         input.name = "price[]";
         input.value = "{{ old('price') }}";
        var div = document.createElement("div");
        div.id = "price"+cbox.id;
        div.innerHTML = "Donate "+cbox.id;
        div.appendChild(input);
        document.getElementById("insertinputs").appendChild(div);
      } else {
        document.getElementById( "price"+cbox.id ).remove();
      }
    }
    Dropzone.options.photoDropzone = {
        url: '{{ route('admin.ngos.storeMedia') }}',
        maxFilesize: 2, // MB
        acceptedFiles: '.jpeg,.jpg,.png,.gif',
        maxFiles: 1,
        addRemoveLinks: true,
        headers: {
        'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        params: {
        size: 2,
        width: 4096,
        height: 4096
        },
        success: function (file, response) {
        $('form').find('input[name="photo"]').remove()
        $('form').append('<input type="hidden" name="photo" value="' + response.name + '">')
        },
        removedfile: function (file) {
        file.previewElement.remove()
        if (file.status !== 'error') {
            $('form').find('input[name="photo"]').remove()
            this.options.maxFiles = this.options.maxFiles + 1
        }
        },
        init: function () {
        @if(isset($ngo) && $ngo->photo)
            var file = {!! json_encode($ngo->photo) !!}
                this.options.addedfile.call(this, file)
            this.options.thumbnail.call(this, file, '{{ $ngo->photo->getUrl('thumb') }}')
            file.previewElement.classList.add('dz-complete')
            $('form').append('<input type="hidden" name="photo" value="' + file.file_name + '">')
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
@push('style')
{{-- <link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/choices.js@9.0.1/public/assets/styles/base.min.css"
/>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css"
/> --}}

@push('script')
{{-- <script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script> --}}
