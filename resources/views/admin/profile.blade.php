@extends('admin.layout.template')
@section('content')
<main>
   <div class="container-fluid">
      <h2 class="mt-30 page-title">Profile</h2>
      <ol class="breadcrumb mb-30">
         <li class="breadcrumb-item"><a href="/">Dashboard</a></li>
         <li class="breadcrumb-item active">My Profile</li>
      </ol>
      <div class="row">
         @if(session()->has('message'))         
         <div class="col-md-10">
            <div class="card card-static-2 mb-4">
                <div class="alert text-14 my-0"><i class="fas fa-exclamation"></i> {{session('message')}}  </div>
            </div>
         </div>
         @endif 
         <div class="col-lg-12">
            <a onclick="history.back()" class="cursor add-btn hover-btn">Back</a>
         </div>
         <div class="col-lg-6 col-md-6">
            <div class="card card-static-2 mb-30 mt-30">
               <form action="{{url('admin/profile')}}" method="post" class="card-body-table">
                  @csrf
                  <div class="news-content-right pd-20">
                     <div class="form-group">
                        <label class="form-label">Name*</label>
                        <input type="text" class="form-control bg-white" name="name" required="" value="{{$data[0]->name}}" placeholder="Name">
                        @error('name')
                         <div class="alert mt-3 text-14"><i class="fas fa-exclamation"></i> {{ $message }}</div>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label class="form-label">Mobile*</label>
                        <input type="number" name="mobile" class="form-control bg-white" {{($data[0]->mobile !='') ? 'readonly' : 'name=mobile' }} required="" value="{{$data[0]->mobile}}" placeholder="Mobile">
                        @error('mobile')
                         <div class="alert mt-3 text-14"><i class="fas fa-exclamation"></i> {{ $message }}</div>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label class="form-label">Email*</label>
                        <input type="email" name="email" class="form-control bg-white" readonly value="{{ucfirst($data[0]->email)}}" placeholder="Email">
                     </div>
                     <div class="form-group">
                        <label class="form-label">Update Password</label>
                        <input type="password" name="password" class="form-control bg-white" placeholder="Password">
                        @error('password')
                         <div class="alert mt-3 text-14"><i class="fas fa-exclamation"></i> {{ $message }}</div>
                        @enderror
                     </div>
                     <div class="form-group">
                        <label class="form-label">Added On*</label>
                        <input type="text" class="form-control bg-white" readonly value="{{date('d M, Y', strtotime($data[0]->created_at))}}" placeholder="Added On">
                     </div>
                     <button class="save-btn hover-btn" type="submit">Update</button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</main>
@endsection
