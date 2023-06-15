@extends("main")

@section("content")

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1>Producenci</h1>
        <hr style="border: 1px solid gray"/>

<p>
    <a href="{{ url()->current() }}/create" class="btn btn-dark"><i class="bi bi-plus-circle"></i></a>
</p>
<table class="table">
    <thead class="bg-dark text-white shadow">
        <tr>
            <th class = "text-center">
                Id
            </th>
            <th class = "text-center">
                Nazwa
            </th>
            <th class = "text-center">
                Czy Aktywny?
            </th>
            <th class = "rounded-right text-center"></th>
        </tr>
    </thead>
    <tbody>
        @foreach($models as $model)
        <tr>
            <td class = "text-center">
                {{ $model->Id }}
            </td>
            <td class = "text-center">
                {{ $model->Title }}
            </td>
            <td class = "text-center">
                @if( $model->IsActive  === 1)
                Tak
                @else
                Nie
                @endif
            </td>
            <td class = "text-center">
                <a href="{{ url()->current() }}/edit/{{ $model->Id }}" class="btn btn-dark"><i class="bi bi-pencil"></i></a> |
                <a href="{{ url()->current() }}/details/{{ $model->Id }}" class="btn btn-dark"><i class="bi bi-eye-fill"></i></a> |
                <a href="{{ url()->current() }}/delete-details/{{ $model->Id }}" class="btn btn-dark"><i class="fas fa-trash"></i></a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
<!-- /.container-fluid -->
</div>
<!-- End of Main Content -->
@endsection