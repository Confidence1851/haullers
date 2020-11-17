@extends('admin.layout.app')

@section('content')

    <!-- Main Content -->
    <div class="main-content">
        <section class="section">
          <div class="section-body">
    
                <div class="card">
                  <div class="card-header">
                    <h4>Payments</h4>
                  </div>
                  <div class="card-body">
                  @if (Session::has('flash_message_error'))
                        <div class="alert alert-error alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{!! session('flash_message_error') !!}</strong>
                        </div>        
                    @endif
                    @if (Session::has('flash_message_success'))
                        <div class="alert alert-success alert-block">
                            <button type="button" class="close" data-dismiss="alert">x</button>
                                <strong>{!! session('flash_message_success') !!}</strong>
                        </div>        
                    @endif
                   <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                      <thead>
                <tr>
                  <th>  ID</th>
                  <th>  Name</th>
                  <th>  Email</th>
                  <th>  Subject </th>
                  <th>  Message </th>
                  <th>Actions</th>
                </tr>
              </thead>
              <tbody>
              @foreach ($contacts as $contact)
                <tr class="gradeX">
                  <td> {{ $contact->id }}</td>
                  <td> {{ $contact->fname }} {{ $contact->lname }}</td>
                   <td> {{ $contact->email }}</td>
                   <td> {{ $contact->subject }}</td>
                   <td> {{ \Illuminate\Support\Str::limit($contact->message,20, '(....)') }}</td>
                  <div class="fr"><td class="center"><a href="#myModal{{ $contact->id }}" data-toggle="modal" class="btn btn-success btn-sm"><i class="ti-eye"></i></a>
                  <a id="delCat" href="{{ route('admin.deleteContact' , $contact->id) }}" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a></td></div>
                </tr>
               
                  <div class="modal fade bd-example-modal-md" id="myModal{{ $contact->id }}">
                    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">{{ $contact->fname }} &nbsp;{{ $contact->lname }}</h5>
                            <button type="button" class="close" data-dismiss="modal"><span>&times;</span></button>
                        </div>
                        <div class="modal-body">
                             <p>Contact Message: {{ $contact->message }}</p></div>
                      </div>
                    </div>
                  </div>
                          
              @endforeach
              </tbody>
            </table>
                  </div>
                </div>
              </div>
                           
        </section>
    </div>

 <!-- JS Libraies -->
  <script src="dashboard/datatables/datatables.min.js"></script>
  <script src="dashboard/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="dashboard/jquery-ui/jquery-ui.min.js"></script>

@endsection