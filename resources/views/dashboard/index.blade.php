@extends('app')
@section('main')
<section class="section">
    {{ Auth::user()->name }} <br>
    {{ Auth::user()->email }} <br>
    {{ Auth::user()->id_level }} <br>

    </section>

    @endsection
