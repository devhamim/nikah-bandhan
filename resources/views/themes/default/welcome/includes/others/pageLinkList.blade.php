{{-- <li class="dropdown nav-item">
    <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
        <i class="material-icons">contact_phone</i> Contact
    </a>
    <div class="dropdown-menu dropdown-with-icons">

        @foreach($frontPages->where('page_type', 'Full Page') as $fp)

 
            <a href="{{ route('page', $fp->route_name) }}" class="dropdown-item">
               <i class="material-icons">layers</i> {{ $fp->page_title }}
            </a>

        @endforeach

        @if (Browser::isDesktop())
        @else
        <a href="{{ route('welcome.successProfiles') }}" class="dropdown-item">
            <i class="material-icons">layers</i> Success Stories
        </a>
        @endif

    </div>
</li> --}}