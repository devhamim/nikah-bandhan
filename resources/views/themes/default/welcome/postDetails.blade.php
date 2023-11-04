@extends('welcome.layouts.welcomeMaster')
{{-- @section('title', 'Dhaka Metro News') --}}

@push('css')


       <!-- You can use Open Graph tags to customize link previews.
    Learn more: https://developers.facebook.com/docs/sharing/webmasters -->
  <meta property="og:url"           content="{{route('welcome.postDetails',[$post, $post->excerpt])}}" />
  <meta property="og:type"          content="post" />
  <meta property="og:title"         content="{{$post->title}}" />
  <meta property="og:description"   content="{{str_limit($post->excerpt,160)}}" />
  <meta property="og:image"         content="{{asset($post->fi())}}" />


@endpush

@section('content')

@include('welcome.parts.postDetails')

@endsection


@push('js')
@endpush
