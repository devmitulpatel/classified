@extends("layouts.root",['title'=>$title??"Opps There is something wrong."])

@section('content')
    <div id="site-wrapper" class="site-wrapper page-404">
        <div id="wrapper-content" class="wrapper-content pt-0 pb-0">
            <div class="container">
                <div class="page-container text-center">
                    <div class="mb-7">
                        <svg class="icon icon-map-marker-crossed">
                            <use xlink:href="#icon-map-marker-crossed"></use>
                        </svg>
                    </div>
                    <div class="mb-7">
                        <h3 class="mb-7">Ohh! Page Not Found</h3>
                        <div class="text-gray">It seems we can’t find what you’re looking for. Perhaps
                            searching
                            can help or go back to <a href="index-2.html" class="text-primary text-decoration-underline">Homepage</a>.
                        </div>
                    </div>
                    <div class="form-search">
                        <form>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search again...">
                                <button class="btn btn-link input-group-append text-dark pr-3" type="submit"><i
                                        class="fal fa-search"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <svg aria-hidden="true" style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1"
         xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
        <defs>
            <symbol id="icon-map-marker-crossed" viewBox="0 0 32 32">
                <title>map-marker-crossed</title>
                <path
                    d="M28.504 1.779c-0.342-0.278-0.846-0.227-1.125 0.117l-2.786 3.429c-1.576-3.154-4.835-5.325-8.594-5.325-5.293 0-9.6 4.307-9.6 9.6 0 2.458 0.477 5.152 1.414 8.013 0.587 1.789 1.357 3.646 2.293 5.539l-3.53 4.344c-0.278 0.342-0.227 0.846 0.117 1.125 0.149 0.12 0.326 0.179 0.504 0.179 0.232 0 0.464-0.101 0.621-0.296l3.088-3.8c2.203 4.099 4.371 6.874 4.462 6.99 0.152 0.194 0.384 0.306 0.629 0.306s0.477-0.112 0.629-0.306c0.091-0.117 2.269-2.902 4.475-7.016 1.299-2.421 2.336-4.798 3.080-7.066 0.939-2.859 1.414-5.555 1.414-8.013 0-0.883-0.12-1.739-0.346-2.552l3.366-4.142c0.278-0.342 0.227-0.846-0.117-1.125zM8 9.6c0-4.411 3.589-8 8-8 3.395 0 6.302 2.126 7.462 5.117l-2.68 3.299c0.011-0.138 0.018-0.275 0.018-0.416 0-2.646-2.154-4.8-4.8-4.8s-4.8 2.154-4.8 4.8 2.154 4.8 4.8 4.8c0.482 0 0.946-0.072 1.386-0.205l-6.162 7.584c-1.65-3.477-3.222-7.912-3.222-12.181zM16 12.8c-1.765 0-3.2-1.435-3.2-3.2s1.435-3.2 3.2-3.2c1.765 0 3.2 1.435 3.2 3.2s-1.435 3.2-3.2 3.2zM24 9.6c0 5.197-2.333 10.643-4.291 14.296-1.445 2.698-2.906 4.843-3.709 5.962-0.8-1.114-2.251-3.246-3.694-5.936-0.099-0.184-0.198-0.374-0.299-0.568l11.939-14.694c0.037 0.309 0.056 0.622 0.056 0.939z"></path>
            </symbol>
        </defs>
    </svg>
@endsection

