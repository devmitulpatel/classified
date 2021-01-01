@extends("layouts.root",['title'=>$title,'header'=>2])

@section('content')

    <div v-cloak id="site-wrapper" class="site-wrapper page-submit-listing" >
        @include('front.Pages.partials.add_listing_form')
    </div>
@endsection

