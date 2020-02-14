<!DOCTYPE html>
<html lang="en-US">

<head>
    <!-- css -->
 
    <link rel="stylesheet" type="text/css" href="{{ asset('pdf/ipages.min.css') }}">
    <style>
            #flipbook {
                height: 100% !important;
                position: absolute;
                top: 0;
                right: 0;
                width: 100%;
            }
    </style>
    <!-- /end css -->
</head>

<body>
    <p>This is just a simple example to show you how the plugin works with PDF</p>

    <!-- flipbook markup -->
    <div id="flipbook" style="height:300px;"></div>
    <!-- /end flipbook markup -->

    <!-- scripts-section -->
    <script type="text/javascript" src="{{ asset('js/jquery-1.12.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pdf/pdf.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('pdf/jquery.ipages.min.js') }}"></script>
    <script>
        $(document).ready(function() {
	var options = {
		responsive:true,
		autoFit:true,
		autoHeight: false,
		
		padding:{
			top:30,
			left:10,
			right:10,
			bottom:70
        },
        @if($digitalBrochure->pdf)
          pdfUrl: '{{ $digitalBrochure->pdf->getUrl() }}',
        @endif

		
		pdfAutoCreatePages: true,
		pdfBookSizeFromDocument: true,
		pageNumbers: false,
		
		zoom:1,
		
		toolbarControls: [
			{type:'share',        active:true},
			{type:'sound',        active:true, optional: false},
			{type:'outline',      active:true},
			{type:'thumbnails',   active:true},
			{type:'gotofirst',    active:true},
			{type:'prev',         active:true},
			{type:'pagenumber',   active:false},
			{type:'next',         active:true},
			{type:'gotolast',     active:true},
			{type:'zoom-in',      active:false},
			{type:'zoom-out',     active:false},
			{type:'zoom-default', active:false},
			{type:'optional',     active:false},
			{type:'download',     active:true, optional: false},
			{type:'fullscreen',   active:true, optional: false},
		],
		
		bookmarks: [
			{text:'Profile List', link:'', folded: false, bookmarks:[
				{text:'Avirtum', link:'http://avirtum.com', target:'blank'},
				{text:'Twitter', link:'https://twitter.com/avirtumcom', target:'blank'},
				{text:'YouTube', link:'https://www.youtube.com/channel/UCvENmD-ml85Lie9KFjbusnw', target:'blank'},
				{text:'CodeCanyon', link:'https://codecanyon.net/user/avirtum/portfolio?ref=avirtum', target:'blank'}, // target: self, blank, page
			]},
			{text:'The page 1 from begin', link:'1'},
			{text:'The page 2 from begin', link:'2'},
			{text:'The page 3 from begin', link:'2'},
			{text:'The page 1 from end', link:'-1'},
			{text:'The page 2 from end', link:'-2'},
			{text:'The page 3 from end', link:'-3'}
		],
	};
	
	$('#flipbook').ipages(options);

	
	// Events
	$('#flipbook').on('ipages:ready', function(e, plugin) {
		console.log('event:ready');
	});
	
	$('#flipbook').on('ipages:showpage', function(e, plugin, page) {
		console.log('event:showpage [' + page + ']');
	});
	
	$('#flipbook').on('ipages:hidepage', function(e, plugin, page) {
		console.log('event:hidepage [' + page + ']');
	});
});
    </script>
    <!-- /end scripts-section -->
</body>

</html>