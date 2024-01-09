@extends('admin.admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">


    <div class="row profile-body">
      <!-- left wrapper start -->
      <div class="d-none d-md-block col-md-4 col-xl-4 left-wrapper">
        <div class="card rounded">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-2">

              <div>
                <img class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ?url('upload/admin_images/'.$profileData->photo) : url('upload/no_image.jpg')}}" alt="profile">
                <span class="h4 ms-3 ">{{ $profileData->name }}</span>
              </div>

            </div>

            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Username:</label>
              <p class="text-muted">{{ $profileData->username }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">email:</label>
              <p class="text-muted">{{ $profileData->email }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Phone:</label>
              <p class="text-muted">{{ $profileData->phone }}</p>
            </div>
            <div class="mt-3">
              <label class="tx-11 fw-bolder mb-0 text-uppercase">Adress:</label>
              <p class="text-muted">{{ $profileData->adress }}</p>
            </div>
            <div class="mt-3 d-flex social-links">
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="github"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="twitter"></i>
              </a>
              <a href="javascript:;" class="btn btn-icon border btn-xs me-2">
                <i data-feather="instagram"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
      <!-- left wrapper end -->
      <!-- middle wrapper start -->
      <div class="col-md-8 col-xl-8 middle-wrapper">
        <div class="row">
            <div class="card">
            <div class="card-body">

                <h6 class="card-title">Update Admin Profil</h6>

                <form method="POST" action="{{ route('admin.profile.store') }}" class="forms-sample" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputUsername1" class="form-label">Username</label>
                        <input type="text" name="username" class="form-control" id="exampleInputUsername1"
                        autocomplete="off" value="{{ $profileData->username }}" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputname1" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="exampleInputname1"
                        autocomplete="off" value="{{ $profileData->name }}" placeholder="name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputemail1" class="form-label">Email</label>
                        <input type="text" name="email" class="form-control" id="exampleInputemail1"
                        autocomplete="off" value="{{ $profileData->email }}" placeholder="email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputphone1" class="form-label">Phone</label>
                        <input type="text" name="phone" class="form-control" id="exampleInputUsername1"
                        autocomplete="off" value="{{ $profileData->phone }}" placeholder="Username">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputAdress1" class="form-label">Adress</label>
                        <input type="text" name="adress" class="form-control" id="exampleInputAdress1"
                        autocomplete="off" value="{{ $profileData->adress }}" placeholder="Adress">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPhoto1" class="form-label">Photo</label>
                        <input type="file" name="photo" class="form-control" id="image">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputPhoto2" class="form-label"></label>
                        <img id="showImage" class="wd-100 rounded-circle" src="{{ (!empty($profileData->photo)) ?url('upload/admin_images/'.$profileData->photo)
                         : url('upload/no_image.jpg')}}" alt="profile">
                    </div>




                    <button type="submit" class="btn btn-primary me-2">Enregistrer</button>

                </form>

            </div>
            </div>
        </div>
          </div>

        </div>
      </div>

<script type="text/javascript">
    $(document).ready(function(){
        $('#image').change(function(e){
            var reader = new FileReader();
            reader.onload = function(e){
                $('#showImage').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });

</script>





@endsection