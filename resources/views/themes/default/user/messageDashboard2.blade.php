<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Widgets</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('alt3/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('alt3/dist/css/adminlte.min.css')}}">
</head>
<body class="hold-transition sidebar-mini">

    <div class="container py-4" >
        <div class="row">
            <div class="col-lg-3">
               <div class="bg-white">
                @include('user.parts.leftsidebar')
               </div>
            </div>
            <div class="col-lg-9">
                <div class="wrapper d-fled">
                    <div class="container bg-white">
                      <!-- /.row -->
                      <!-- =========================================================== -->
                      <!-- Direct Chat -->
                      <h4 class="pt-2 mb-2 text-center">Inbox</h4>
                      @if ($userto)
                      @include('user.parts.directChat')
                  @else
                      @include('user.parts.directChatWithoutUser')
                  @endif

                      <!-- /.row -->
                    </div><!-- /.container-fluid -->
                  <br>
                  <!-- /.content -->

                  <a id="back-to-top" href="#" class="btn btn-primary back-to-top" role="button" aria-label="Scroll to top">
                    <i class="fas fa-chevron-up"></i>
                  </a>

              </div>
            </div>
        </div>
    </div>

<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{asset('alt3/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('alt3/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('alt3/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{asset('alt3/dist/js/demo.js')}}"></script>
</body>
</html>
