@extends('user.master.usermaster')
@section('content')
<style>

a:hover {
    background-color: transparent !important;
}
</style>
{{--Header Section ---}}
<div class="container py-2 mb-2" style="background: white">
<section class="w3-animate-zoom">


        <div class="row">
            @foreach($letastPosts as $lp)
            <div class="col-md-6">
                <img src="{{ route('imagecache', [ 'template'=>'large','filename' => $lp->fiName() ]) }}" class="img-fluid" alt="image"  width="100%">
                <a href="{{route('blogDetails2',['id'=>$lp->id,'excerpt'=>$lp->slug])}}"> {{Str::limit($lp->excerpt,100,'...') }}</a>

            </div>
           @endforeach
        </div>
</section>
<section class="mt-4">
    <div class="row">
        <div class="col-md-8">
            <div class="row">
                @foreach ($posts as $post)
                <div class="col-md-6 p-2">
                    <img src="{{ route('imagecache', [ 'template'=>'medium','filename' => $post->fiName() ]) }}" class="img-fluid w-100 w3-animate-zoom" alt="image" height="200">
                    <div class="post-title pt-2">
                        <a href="{{route('blogDetails2',['id'=>$post->id,'excerpt'=>$post->slug])}}" class="h5 w3-text-red w3-sans-serif w3-hover-opacity">
                            {{Str::limit($post->excerpt,70,'...') }}
                        </a>
                    </div>
                    <div class="post-autor w3-sans-serif">
                        <small class="w3-text-black font-weight-bold">{{$post->addedBy->name}}</small>
                        <small class="w3-text-gray">{{ date('d M y',strtotime($post->created_at))}}</small>
                    </div>
                    <p class="">
                        {{Str::limit($post->excerpt,500,'...') }}
                    </p>
                </div>
                <p class="w3-red">Lorem ipsum dolor sit amet consectetur adipisicing elit. Sit, saepe?</p>
                @endforeach

            </div>

        </div>
        <div class="col-md-4">
            <div class="pl-2">

            <div class="w3-border-bottom w3-border-red">
                <div class="w3-red w-50 text-center w3-border-red">
                    <span class="w3-text-white">POPULAR POST</span>
                </div>
            </div>
            <div class="populer-post">
                    <div class="mt-1">
                        @foreach ($popularPosts as $pp)
                        <div class="row mt-2">
                                <div class="col-4">
                                    <img src="{{ route('imagecache', [ 'template'=>'small','filename' => $pp->fiName() ]) }}" class="img-thumbnail" alt="">
                                </div>
                                <div class="col-8 pl-0">
                                    <a href="{{route('blogDetails2',['id'=>$pp->id,'excerpt'=>$pp->slug])}}" class="w3-sans-serif">{{Str::limit($pp->excerpt,47,'...') }}</a>
                                </div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="w3-border-bottom w3-border-red mt-3">
                    <div class="w3-red w-50 text-center w3-border-red">
                        <span class="w3-text-white">POPULAR Category</span>
                    </div>
                </div>
                <div class="populer-category">
                    @foreach ($popurlarCats as $cat)
                    <a href="{{route('categories',['id'=>$cat->id,'slug'=>$cat->title])}}" class="p-2 text-left">{{ $cat->title}}<span class="float-right">({{ $cat->postCount->count()}})</span> </a>
                    <br>
                    @endforeach
                </div>
            </div>

        </div>
    </div>
</section>

</div>
@endsection
