@extends("main")

@section("content")
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="align-items-center justify-content-between mb-4">
        <h1>Zamówienia</h1>
        <hr style="border: 1px solid gray"/>

        <div id="content" style="margin-bottom:20px;">
            <a href="/orders/create" class="btn btn-dark"><i class="bi bi-plus-circle"></i></a>
            <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" style="width: 500px;" action="/orders/search" method="GET">
                @csrf
                <div class="input-group shadow rounded-left">
                    <input type="text" name="search" class="form-control bg-white border-0 small" placeholder="Wyszukaj..." aria-label="Search" aria-describedby="basic-addon2">
                    <div class="input-group-append">
                        <button class="btn btn-dark" type="submit">
                            <i class="fas fa-search fa-sm"></i>
                        </button>
                    </div>
                </div>
            </form>
        </div>
<table class="table">
    <thead class="bg-dark text-white shadow">
        <tr>
            <th class = "text-center">
                Dane klienta
            </th>
            <th class = "text-center">
                Numer zamówienia
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
                {{ $model->Clients->Name }} {{ $model->Clients->Surname }}
            </td>
            <td class = "text-center">
                {{ $model->Id }}
            </td>
            <td class = "text-center">
                @if( $model->IsActive  === 1)
                Tak
                @else
                Nie
                @endif
            </td>
            <td class = "text-center" style="max-width:200px;">
                <a href="/orders/edit/{{ $model->Id }}" class="btn btn-dark"><i class="bi bi-pencil"></i></a> |
                <a href="/orders/details/{{ $model->Id }}" class="btn btn-dark"><i class="bi bi-eye-fill"></i></a> |
                <a href="/orders/delete-details/{{ $model->Id }}" class="btn btn-dark"><i class="fas fa-trash"></i></a> |
                <a href="/orders-preview/{{ $model->ClientsId }}" class="btn btn-dark">Wszystkie zamówienia klienta</a>
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