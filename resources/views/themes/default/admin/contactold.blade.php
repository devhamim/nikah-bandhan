@extends('admin.master.dashboardmaster')


@push('css')

<!-- Select2 -->
<link rel="stylesheet" href="{{ asset('cp/plugins/select2/css/select2.min.css') }}">
<link rel="stylesheet" href="{{ asset('cp/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

@endpush

@section('content')
<section class="content">

    <br>

    <div class="row">
        <div class="col-md-12">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fa fa-edit"></i> Contact Requests
                    </h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm table-striped">
                            <thead>
                                <tr>
                                    <th>SL</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Phone Number</th>

                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>


                                @foreach ($contacts as $contact)

                                <tr>
                                    <td>{{ $i }}</td>


                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->business_email }}</td>
                                    <td>{{ $contact->message_body }}</td>
                                    <td>{{ $contact->phone_number }}</td>

                                    <td>
                                        {{-- <a href="{{ route('admin.editDestionation', $dest) }}"
                                            class="btn btn-sm btn-warning">Edit</a>
                                        <a href="{{ route('admin.deleteDestionation', $dest) }}"
                                            class="btn btn-sm btn-danger"
                                            onclick="return confirm('Do you want to delete this destination ?')">Delete</a>
                                        --}}
                                    </td>
                                </tr>
                                @php
                                $i++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $contacts->render() }}
                </div>
            </div>
        </div>
    </div>
</section>
@endsection