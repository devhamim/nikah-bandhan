@php
/*
--------------------------------------------------------------------------
Popular Tag Widget
Responsibility: Displaying popular tags in the website.
---------------------------------------------------------------------------
*/
@endphp
<div class="right-widget branding-border" style="">
        <div class="p-2 sidebar-widget b-c-b"
                style="border-bottom:1px solid lightgray;color:white;background-image:url({{asset('images/tech-design.png')}});background-repeat:no-repeat;background-position:right top; ">
                <i class="fas fa-tags"></i> Popular Tags
        </div>
        <div class="p-2">
                <ul id="popular_tags" class="">
                        <li>পেনড্রাইভ <span class="badge badge-secondary">39</span></li>
                        <li>হার্ডডিস্ক <span class="badge badge-secondary">39</span></li>
                        <li>ল্যাপটপ-ব্যাটারী <span class="badge badge-secondary">39</span></li>
                        <li>আ্যন্ড্রয়েড-চার্জার <span class="badge badge-secondary">39</span></li>
                        <li>স্লো-পিসি <span class="badge badge-secondary">39</span></li>
                </ul>
        </div>
</div>

@push('styles_inside_head_tag')
<style>

</style>
@endpush