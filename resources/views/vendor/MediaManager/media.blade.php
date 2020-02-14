@extends('layouts.admin')
@section('content')
    <!-- <section id="app" v-cloak> -->


        <div class="container is-fluid">
            <div class="columns">
                {{-- media manager --}}
                <div class="column">
                    @include('MediaManager::_manager')
                </div>
            </div>
        </div>
    <!-- </section> -->
@endsection

    @stack('styles')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/bulma@0.8.0/css/bulma.min.css">

    @stack('scripts')
    <!-- <script src="https://cdn.jsdelivr.net/npm/exif-js"></script> -->
    <script>
        window.onload = testing 
        function testing(){

            // let files = jQuery('input.dz-hidden-input');
            // let image = jQuery('img.link.image');
            // files.on('change',function(e){
            //         _this = this
            //         EXIF.getData(this, function() {
            //                 console.log('hey')
            //                 var allMetaData = EXIF.getAllTags(this);
            //                 console.log(this.exifdata)                         
            //         });
            //         // reader.readAsBinaryString(this.value);

            //         console.log($(this)[0].files);
            //         console.log(this.value);
            // })
            // image.on('click',function(){
            //     EXIF.getData(this, function() {
            //                 console.log('hey')
            //                 var allMetaData = EXIF.getAllTags(this);
            //                 console.log(allMetaData)                         
            //                 console.log(this.exifdata)                         
            //         });
            // });

        }


    </script>
    <!-- <script src="{{ asset("js/app.js") }}"></script> -->