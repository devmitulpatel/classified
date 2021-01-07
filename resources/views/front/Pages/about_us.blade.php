@extends("layouts.root",['title'=>$title,'header'=>2])

@section('content')

    <div v-cloak id="site-wrapper" class="site-wrapper page-about" >
            @include('front.Pages.partials.about_us_content')
    </div>
@endsection

