@extends('admin.admin_dashboard')

@section('admin')

<div class="row">
    <div class="card">
    <div class="card-body">

        <h6 class="card-title">Modifier Le Restaurant</h6>

        <form method="POST" action="{{ route('update_restaurant',['id=>$restaurant->id']) }}" class="forms-controm" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="exampleInputUsername1" class="form-label">Nom du restaurant</label>
                <input type="text" name="name" id="exampleInputUsername1" class="form-control
                @error('restaurant_name') is-invalid @enderror"  value="{{ $restaurant->name ??'' }}">
                @error('restaurant_name')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputUsername2" class="form-label">Description du restaurant</label>
                <input type="text" name="decription" id="exampleInputUsername2" class="form-control
                @error('restaurant_description') is-invalid @enderror" value="{{ $restaurant->description ??'' }}">
                @error('restaurant_description')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputUsername3" class="form-label">Adresse du restaurant</label>
                <input type="text" name="address" id="exampleInputUsername3" class="form-control
                @error('restaurant_address') is-invalid @enderror"  value="{{ $restaurant->address ??'' }}">
                @error('restaurant_address')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputUsername4" class="form-label">Téléphone du restaurant</label>
                <input type="text" name="phone" id="exampleInputUsername4" class="form-control
                @error('restaurant_phone') is-invalid @enderror"  value="{{ $restaurant->phone ??'' }}">
                @error('restaurant_phone')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="exampleInputUsername5" class="form-label">Type de cuisine</label>
                <input type="text" name="type_cuisine" id="exampleInputUsername5" class="form-control
                @error('restaurant_type_cuisine') is-invalid @enderror"  value="{{ $restaurant->type_cuisine ??'' }}">
                @error('restaurant_type_cuisine')
                <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>

            <div class="mb-3">
                <label for="exampleInputPhoto1" class="form-label">Photo</label>
                <input type="file" name="photo" class="form-control" id="image">
            </div>
            <div class="mb-3">
                <label for="exampleInputPhoto2" class="form-label"></label>
                <img id="showImage" class="wd-100 rounded-circle" src="{{ (!empty($restaurant->photo??'')) ?url('upload/restaurant_images/'.$restaurant->photo??'')
                 : url('upload/no_image.jpg')}}" alt="profile">
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>

        </form>

    </div>
    </div>
</div>


@endsection

