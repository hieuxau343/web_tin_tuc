@extends('client.layouts.main')
<style>
    .post-content
</style>
@section('content')
    <div class="container">
        <div class="post-content" style="max-width: 640px">
            {!! html_entity_decode($post->content) !!}
        </div>
    </div>
@endsection
