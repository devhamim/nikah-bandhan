        <div class="text-center">

            <p class="w3-xxlarge">Users Online Now</p>

        </div>
        <br>

        <div class="container">

        <div class="box box-widget">
            <div class="box-body" style="background: #ddd; min-height: 200px;">

@foreach($users->chunk(4) as $users4)
        <div class="row">

            @foreach($users4 as $user)

            <div class="col-sm-3">
                @include('user.includes.cards.userHoverCard')
            </div>

            @endforeach

        </div>
        @endforeach




              
            </div>
            <div class="box-footer">
                {{ $users->links() }}
            </div>
        </div>
</div>

