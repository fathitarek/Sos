@super
<li class="{{ Request::is('admin/users*') ? 'active' : '' }}">
    <a href="/admin/users"><i class="fa fa-edit"></i><span>Users</span></a>
</li>
<li class="{{ Request::is('admin/menu*') ? 'active' : '' }}">
    <a href="/admin/menus"><i class="fa fa-edit"></i><span>Menus</span></a>
</li>
<li class="{{ Request::is('admin/doctor*') ? 'active' : '' }}">
    <a href="/admin/doctors"><i class="fa fa-edit"></i><span>Doctors</span></a>
</li>
<li class="{{ Request::is('admin/cities*') ? 'active' : '' }}">
    <a href="{!! route('cities.index') !!}"><i class="fa fa-edit"></i><span>Cities</span></a>
</li>

<li class="{{ Request::is('admin/regions*') ? 'active' : '' }}">
    <a href="{!! route('regions.index') !!}"><i class="fa fa-edit"></i><span>Regions</span></a>
</li>

<li class="{{ Request::is('locations*') ? 'active' : '' }}">
    <a href="{!! route('locations.index') !!}"><i class="fa fa-edit"></i><span>Locations</span></a>
</li>
<li class="{{ Request::is('roles*') ? 'active' : '' }}">
    <a href="{!! route('roles.index') !!}"><i class="fa fa-edit"></i><span>Roles</span></a>
</li>

<li class="{{ Request::is('routes*') ? 'active' : '' }}">
    <a href="{!! route('routes.index') !!}"><i class="fa fa-edit"></i><span>Routes</span></a>
</li>

<li class="{{ Request::is('specialties*') ? 'active' : '' }}">
    <a href="{!! route('specialties.index') !!}"><i class="fa fa-edit"></i><span>Specialties</span></a>
</li>

<li class="{{ Request::is('employers*') ? 'active' : '' }}">
    <a href="{!! route('employers.index') !!}"><i class="fa fa-edit"></i><span>Employers</span></a>
</li>

<li class="{{ Request::is('insuranceCompanies*') ? 'active' : '' }}">
    <a href="{!! route('insuranceCompanies.index') !!}"><i class="fa fa-edit"></i><span>Insurance Companies</span></a>
</li>

<li class="{{ Request::is('settings*') ? 'active' : '' }}">
    <a href="{!! route('settings.index') !!}"><i class="fa fa-edit"></i><span>Settings</span></a>
</li>

<li class="{{ Request::is('menuItems*') ? 'active' : '' }}">
    <a href="{!! route('menuItems.index') !!}"><ia class="fa fa-edit"></i><span>Menu Items</span></a>
</li>

<li class="{{ Request::is('patients*') ? 'active' : '' }}">
    <a href="{!! route('patients.index') !!}"><ia class="fa fa-edit"></i><span>Patients</span></a>
</li>
@endsuper

@companyAdmin
<li class="{{ Request::is('insuranceCompanies*') ? 'active' : '' }}">
    <a href="{!! route('insuranceCompanies.index') !!}"><i class="fa fa-edit"></i><span>Insurance Companies</span></a>
</li>
@endcompanyAdmin

@docAdmin
<li class="{{ Request::is('admin/doctor*') ? 'active' : '' }}">
    <a href="/admin/doctors"><i class="fa fa-edit"></i><span>Doctors</span></a>
</li>
@enddocAdmin

<li class="{{ Request::is('admin') ? 'active' : '' }}">
    <a href="{!! url('/logout') !!}"
       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
        <i class="fa fa-edit"></i><span>Sign Out</span>
    </a>
    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
        {{ csrf_field() }}
    </form>
</li>
<li class="{{ Request::is('visits*') ? 'active' : '' }}">
    <a href="{!! route('visits.index') !!}"><i class="fa fa-edit"></i><span>Visits</span></a>
</li>

