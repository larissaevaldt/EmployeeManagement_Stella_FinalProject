{{-- both the navbars include te menu, and they are set to display none initially --}}
@include('partials._menu')
<div class="container-fluid p-0">
    <div class="container-fluid my-nav">
        <div class="row">
            <div class="col-3 col-md-3 logo-div focusSet">
                <a href="/project">
                    <img src="{{ asset('/images/PRONTO_LOGO.png')}}" class="logo ml-4 mt-2">
                </a>
            </div>
            <div class="col-8 focusSet">
                <div class="search-div">
                    <form class="search-form">
                        <input class="search-form-input" type="text" placeholder="" name="search" autocomplete="off" autofocus="" value="">
                        <div class="search-form-icon">
                            <img src="{{asset('/images/search_30px.png')}}">
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-1">
                <div class="toggle-btn">
                    <img src="{{asset('/images/icons8-bulleted-list-90.png')}}" class="toggle-btn-img" id="icon">
                </div>
            </div>
        </div>
    </div>