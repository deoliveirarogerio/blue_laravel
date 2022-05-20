<nav class="navbar navbar-dark navbar-expand-lg bg-dark">
    <div class="container">
      <a class="navbar-brand" href="{{ route('contacts.index') }}">Blue</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="{{ route('contacts.index') }}">Home</a>
          </li>
        
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Contatos
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <li><a class="dropdown-item" href="{{ route('contacts.create') }}">Novo Contato</a></li>
              <li><a class="dropdown-item" href="{{ route('contacts.index') }}">Listar Contato</a></li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>