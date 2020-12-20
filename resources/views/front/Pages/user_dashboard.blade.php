@extends("layouts.root",['title'=>$title,'header'=>2])

@section('content')

    <div id="site-wrapper" class="site-wrapper panel dashboards">
    @include('front.Pages.partials.vendor_dashboard_content')
    </div>
@endsection
