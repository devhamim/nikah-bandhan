@php
/*
---------------------------------------------------
Question Edit page
Displays the question edit form populated with
previous data.
---------------------------------------------------
*/
@endphp

@extends('user.layouts.secondaryLayout')

@section('sitebody')
<div class="p-3">
    <form id="quest_form" data-imgurl="/image/ajaj/upload"
        action="{{route('questions.update',['question'=>$question->id])}}" method="post">
        @csrf
        @method('PUT')
        <input class="form-control mb-2" type="text" name="title" id="" value="{{$question->title}}" style="">

        <div class="mb-2" id="editor">
            <textarea id="qdesc" name="qdesc" class="form-control" style="width:100%;"
                rows="5">{{$question->description}}</textarea>
        </div>

        {{-- <input type="text" class="form-control mb-2" placeholder="কিছু ট্যাট যুক্ত করুন"> --}}
        <div class="text-right">
            <button type="submit" class="btn btn-block btn-primary">সাবমিট</button>
        </div>
    </form>
</div>
@endsection
