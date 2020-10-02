@if(Auth::user()->isRoot() || Auth::user()->isOwner())
    @include('layouts.partials.admins.owner')
    @elseif(Auth::user()->isCs())
    @include('layouts.partials.admins.cs')
    @elseif(Auth::user()->isCreator())
    @include('layouts.partials.admins.creator')
@endif
