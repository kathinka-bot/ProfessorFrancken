@extends('admin.base-layout')

@section('main-content')
    <div class="row">
        <div class="col-12 col-lg-2 col-md-3 bd-sidebar">
            <nav class="bd-links" id="docsNavbarContent">
                @foreach ($menu as $item)

                <div class="bd-toc-item active">
                    <span class="bd-toc-link">
                        {{ $item['name'] }}
                    </span>

                    <ul class="nav bd-sidenav">
                        @foreach ($item['items'] as $subItem)
                        <?php $active = Request::segment(3) == $subItem['url'] ? 'active' : ''; ?>
                        <li class="{{ $active }}">
                            <a  href="/admin/{{ $item['url'] }}/{{ $subItem['url'] }}">
                                @if (! $subItem['works'])
                                    <i class="fa fa-times" aria-hidden="true"></i>
                                @endif

                                {{ $subItem['name'] }}
                            </a>
                        </li>
                        @endforeach
                    </ul>
                </div>
                @endforeach
            </nav>
        </div>
        <div class="col-12 col-lg-10 col-md-9 bd-content">
            @yield('content')
        </div>
    </div>
@endsection
