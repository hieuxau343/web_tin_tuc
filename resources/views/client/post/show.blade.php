@extends('client.layouts.main')
<style>
    .post-content
</style>
@section('content')
    <div class="container">
        <div class="post-content">
            {!! html_entity_decode($post->content) !!}
        </div>
    </div>
@endsection
