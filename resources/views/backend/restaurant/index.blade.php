@extends('admin.admin_dashboard')

@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

<div class="page-content">

    <nav class="page-breadcrumb">
        <ol class="breadcrumb">
           <li class="breadcrumb-item"> <a href="{{ route('add.restaurant') }}" class="btn btn-inverse-info">Ajouter Restaurant</a></li>

        </ol>
    </nav>

    <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
    <div class="card">
    <div class="card-body">
    <h6 class="card-title">Liste Restaurants inscrit</h6>
    <div class="table-responsive">
      <table id="dataTableExample" class="table">
        <thead>
          <tr class="table-active">
            <th>ID</th>
            <th>Nom du Restaurant</th>
            <th>description</th>
            <th>Adresse</th>
            <th>Téléphone</th>
            <th>Type de cuisine</th>
            <th>photo</th>
            <th>créer le</th>
          </tr>
        </thead>
        <tbody>
            @foreach($restaurants as $restaurant)
          <tr>
            <td>{{ $restaurant->id }}</td>
            <td>{{ $restaurant->name}}</td>
            <td>{{ $restaurant->description }}</td>
            <td>{{ $restaurant->address }}</td>
            <td>{{ $restaurant->phone }}</td>
            <td>{{ $restaurant->type_cuisine }}</td>
            <td>
                <img src="{{ asset('upload/restaurant_images/' . $restaurant->photo) }}" alt="Photo de {{ $restaurant->name }}" style="width: 60px; height: 60px;">

            </td>
            <td>{{ $restaurant->dateFormated() }}</td>
            <td>
                <a href="{{ route('edit.restaurant',$restaurant->id) }}" class="btn btn-inverse-warning">Edit</a>
                <a href="" class="btn btn-inverse-danger" id="delete" >Delete</a>
            </td>
          </tr>
            @endforeach

        </tbody>
      </table>
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

    $(function(){
    $(document).on('click','#delete',function(e){
        e.preventDefault();
        var link = $(this).attr("href");


                  Swal.fire({
                    title: 'Are you sure?',
                    text: "Delete This Data?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                  }).then((result) => {
                    if (result.isConfirmed) {
                      window.location.href = link
                      Swal.fire(
                        'Deleted!',
                        'Your file has been deleted.',
                        'success'
                      )
                    }
                  })


    });

  });


</script>


@endsection
