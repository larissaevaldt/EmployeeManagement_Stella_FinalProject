{{-- both the navbars include te menu, and they are set to display none initially --}}
@include('partials._menu')
<div class="container-fluid p-0">
    <div class="container-fluid  my-nav">
        <div class="row">
            <div class="col-3 col-md-3 logo-div focusSet">
                <a href="/project">
                    <img src="{{ asset('/images/PRONTO_LOGO.png')}}" class="logo">
                </a>
            </div>
            <div class="nav-title-wrapper col-7 focusSet">
                <h4 class="nav-title">Employee Management System</h4>
            </div>
            <div class="toggle-btn-wrapper col-2 ">
                <div class="toggle-btn">
                    <img src="{{asset('/images/icons8-bulleted-list-90.png')}}" class="toggle-btn-img" id="icon">
                </div>
            </div>
        </div>
    </div>