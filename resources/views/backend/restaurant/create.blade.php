@extends('admin.admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="row">
    <div class="card">
    <div class="card-body">

        <h6 class="card-title">Ajouter un Restaurant</h6>

        <form method="POST" action="{{ route('store.restaurant') }}" class="forms-sample" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nom du restaurant</label>
                <input type="text" name="name" class="form-control" id="name"
                autocomplete="off" value="{{ $restaurant->name ??'' }}" placeholder="name">
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description du restaurant</label>
                <input type="text" name="description" class="form-control value={{ $restaurant->description ??''}}" id="description"
                autocomplete="off"  placeholder="description">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Addresse du Restaurant</label>
                <input type="text" name="address" class="form-control" id="address"
                autocomplete="off" value="{{ $restaurant->address ??''}}" placeholder="address">
            </div>

            <div class="mb-3">
                <label for="phone" class="form-label">Téléphone du Restaurant</label>
                <input type="text" name="phone" class="form-control" id="phone"
                autocomplete="off" value="{{ $restaurant->phone ??'' }}" placeholder="phone">
            </div>
            <div class="mb-3">
                <label for="type_cuisine" class="form-label">Type de Cuisine</label>
                <input type="text" name="type_cuisine" class="form-control" id="type_cuisine"
                autocomplete="off" value="{{ $restaurant->type_cuisine ??''}}" placeholder="type_cuisine">
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input type="file" name="photo" accept="image/*" onchange="showFile(event)" class="form-control" id="photo">
            </div>
            <div class="mb-3">
                <label for="exampleInputPhoto2" class="form-label"></label>
                <img id="file-preview" class="wd-100 rounded-circle" src="{{ (!empty($restaurant->photo??'')) ?url('upload/restaurant_images/'.$restaurant->photo??'')
                 : url('upload/no_image.jpg')}}" alt="profile">
            </div>
            <button type="submit" class="btn btn-primary me-2">Submit</button>

        </form>

    </div>
    </div>
</div>
<script >
   function showFile(event){
    var input = event.target;
    var reader = new FileReader();
    reader.onload = function(){
        var dataURL = reader.result;
        var output = document.getElementById('file-preview');
        output.src = dataURL;
    };
    reader.readAsDataURL(input.files[0]);
   }

</script>

@endsection
