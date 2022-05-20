@extends ('_layouts.default')

@section ('content')
<div class="container py-4">
    <div class="row">
        <div class="col-md-12">
            <h1>Lista de Contatos</h1> <a href="{{ route('contacts.create') }}" class="btn btn-success">Novo Contato</a>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            @if (session('message'))
            <div class="alert alert-success mt-3" role="alert">
                    {{ session('message') }}
                </div>
            @endif
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th>Nome</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($contacts) > 0)
                        @foreach ($contacts as $contact)
                            <tr>
                                <td>{{ $contact->id }}</td>
                                <td>{{ $contact->name }}</td>
                                <td>{{ $contact->phone }}</td>
                                <td>{{ $contact->email }}</td>
                                <td>
                                    <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-primary">Editar</a>
                                    <form action="{{ route('contacts.destroy', $contact->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger">Excluir</button>
                                </td>
                            </tr>
                        @endforeach
                        
                    @endif
                </tbody>

@endsection
