@extends('admin.layout.template')
@section('content')
<main>
   <div class="container-fluid">
      <h2 class="mt-30 page-title">Dashboard</h2>
      <ol class="breadcrumb mb-30">
         <li class="breadcrumb-item active">Dashboard</li>
      </ol>
      <div class="container px-0">
         <div class="row">
            @if(session()->has('message'))         
            <div class="col-md-10">
               <div class="card card-static-2 mb-4">
                  <div class="alert text-14 my-0"><i class="fas fa-exclamation"></i> {{session('message')}}  </div>
               </div>
            </div>
            @endif 
            <div class="col-xl-12 col-md-12">
               <div class="card card-static-2 mb-30">
                  <div class="card-title-2">
                     <h4>Recent Orders</h4>
                  </div>
                  <div class="card-body-table">
                     <div class="table-responsive">
                        <table class="yajra-datatable table ucp-table table-hover">
                           <thead>
                              <tr>
                                 <th style="width:130px">User ID</th>
                                 <th>Name</th>
                                 <th style="width:200px">Address</th>
                              </tr>
                           </thead>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</main>
@endsection
@push('scripts')
<script>
   $(document).ready(function(){

      var table = $('.yajra-datatable').DataTable({
         processing: true,
         serverSide: true,
         ajax: "{{ url('admin/data-table') }}",
         columns: [
               {data: 'id', name: 'id', orderable: false, searchable: false},
               {data: 'name', name: 'name', orderable: true, searchable: true},
               {data: 'address', name: 'address', orderable: false, searchable: false},
         ]
      });

});
</script>
@endpush