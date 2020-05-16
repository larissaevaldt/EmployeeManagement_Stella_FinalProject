{{-- main includes html header, footer and scripts
the yields allow us to select the body to change according to which page we are creating and add any othe scripts as well --}}
@include('partials._head')
<body>
	@yield('body')
	@include('partials._footer')
	@include('partials._script')
	@yield('scriptAdd')
</body>
</html>