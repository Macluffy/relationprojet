<nav class="navbar navbar-expand-lg navbar-light bg-info">
    <div class="container-fluid">
        
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active fs-3" aria-current="page" href="/home" style="hover-text-color:black;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link fs-3" href="{{route('equipes.index')}} " style="hover-color:white;">Equipes</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link  fs-3" href="{{route('joueurs.index')}}" style="hover-color:white;">Joueurs</a>
                </li>
                
            </ul>
        </div>
    </div>
</nav>