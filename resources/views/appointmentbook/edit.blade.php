@extends('_layouts.default')

@section('content')
<div class="container py-4">
    <h1>Editar Contato</h1>
    <div class="col-lg-6 mx-auto">
        @if ($errors->any())
          <ul class="list-group">
              @foreach ($errors->all() as $error)
                <li class="flex justify-center items-center m-1 alert alert-warning" style="list-style: none">{{ $error }}</li>
              @endforeach
          </ul>
        @endif
        <a href="{{ route('contacts.index') }}" class="btn btn-info my-3">Voltar para lista</a>
        <form action="{{ route('contacts.update', $contact->id) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Seu nome</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $contact->name ?? old('name') }}">
          </div>
          <div class="mb-3">
            <label for="email" class="form-label">Seu E-mail</label>
            <input type="email" name="email" class="form-control" id="email" value="{{ $contact->email ?? old('email') }}">
          </div>
        <div class="mb-3">
            <label for="phone" class="form-label">Seu telefone</label>
            <input type="tel" name="phone" class="form-control" id="phone" value="{{ $contact->phone ?? old('phone') }}">
          </div>
          <div class="mb-3 form-group">
            <button class="btn btn-primary" type="submit">Atualizar</button>
          </div>
        </form>
    </div>
</div>
@endsection