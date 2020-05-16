{{-- in the css menu.css display is set to none initially so it only appears when the icon is clicked --}}
<div class="menu">
    <ul class="first-menu">
        <li>
            <!-- url('/addproject') -->
            <a href="{{ route('project.create') }}">
            Add a new project
            </a>
        </li>
        <li class="border-top-bottom">
            <a href="{{ route('project.allFinsh') }}">
                View finished projects
            </a>
        </li>
        <li class="border-top-bottom">
            <a href="{{ route('message') }}">
                Send message to employees
            </a>
        </li>
        <li class="border-top-bottom employee">
            <span>Manage list of employees</span>
        </li>
        <li class="border-top-bottom client">
            <span>Manage list of clients</span>
        </li>
        <li class="border-top-bottom">
            <a href="{{ route('logout')  }}">
                Sign out
            </a>
        </li>
    </ul>
    <ul id="" class="d-none clientList te">
        <li class="border-top-bottom">
            <a href="{{ route('client.create')}}">Add a new client
        </a>
        </li>
        <li class="border-top-bottom">
            <a href="{{ route('client.updatePage') }}">Update client
        </a>
        </li>
        <li class="border-top-bottom">
            <a href="{{ route('client.deletePage')}}">Delete client
        </a>
        </li>
        <li class="border-top-bottom">
            <a href="{{ route('client.index')}}">View a list of clients
        </a>
        </li>
    </ul>
    <ul id="" class="d-none employeeList">
        <li class="border-top-bottom">
            <a href="{{ route('employee.create')}}">Add a new employee
        </a>
        </li>
        <li class="border-top-bottom">
            <a href="{{ route('employee.updatePage')}}">Update employees
        </a>
        </li>
        <li class="border-top-bottom">
            <a href="{{ route('employee.deletePage')}}">Delete employees
        </a>
        </li>
        <li class="border-top-bottom">
            <a href="{{ route('employee.active') }}">Update Weekly list of Active
        </a>
        </li>
        <li class="border-top-bottom">
            <a href="{{ route('employee.index')}}">View a list of all employee
        </a>
        </li>
        <li class="border-top-bottom">
            <a href="{{ route('employee.allActive') }}">View weekly list of active
        </a>
        </li>
    </ul>
</div>