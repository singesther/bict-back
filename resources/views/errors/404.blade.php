@extends('frontend.layouts.main')

@section('title', '| 404 Error page')

@section('styles')
<style type="text/css">

</style>
@endsection

@section('content')
<div class="error-page" style="margin: 15% 0% 20% 0%;text-align: center;">

<h2 class="headline text-info"> 404 Error</h2>

<div class="error-content">

    <h3><i class="fa fa-warning text-yellow"></i> Oops! Page not found.</h3>

    <p>

        We could not find the page you were looking for.
        Meanwhile, you may return to <a href="/">home page</a> or try using the search form.

    </p>

</div>

</div>
@endsection

