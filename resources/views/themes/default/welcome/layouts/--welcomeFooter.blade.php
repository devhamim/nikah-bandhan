   <footer class="footer ">
        <div class="container">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="{{url('/')}}">
                            {{ env('APP_NAME') }}
                        </a>
                    </li>

                    @foreach($frontPages->where('page_type', 'Full Page') as $fp)

                    <li>
                        <a href="{{ route('page', $fp->route_name) }}">
                            {{ $fp->page_title }}
                        </a>
                    </li>

                    @endforeach
  
                    {{--   <li>
                        <a href="{{ route('page', 'contact_us') }}">
                            Contact Us
                        </a>
                    </li> --}}


 
                </ul>
            </nav>

            
            <div class="copyright pull-right">
                &copy;
                <script>
                    document.write(new Date().getFullYear())
                </script>, Developed by
                <a href="{{ url('/') }}">{{ env('APP_NAME_BIG') }}</a>

                <span class="fa-stack fa-2x" title="Diamond Softworld in Cooperation" style="font-size: 11px;">
                  <i class="fa fa-square-o fa-stack-2x text-primary"></i>
                  <i class="fa fa-diamond fa-stack-1x fa-inverse text-primary"></i>
                </span>. 

            </div>
        </div>
    </footer>