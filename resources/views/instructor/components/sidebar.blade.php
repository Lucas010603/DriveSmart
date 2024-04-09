<link href="{{ asset('instructor-public/css/sidebar.css') }}" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

<nav class="vertical-menu-wrapper">
    <div class="vertical-menu-logo">
        <span class="open-menu-btn"><hr><hr><hr></span>
    </div>
    <ul class="vertical-menu">
        <a href="{{ route('instructor.lesson.personal') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-car'></i>
                <span>Week overzicht</span>
            </li>
        </a>
        <a href="{{ route('instructor.lesson.index') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-car'></i>
                <span>Mijn lessen</span>
            </li>
        </a>
        <a href="{{ route('instructor.strip_card.index') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-credit-card-front'></i>
                <span>Strippenkaarten</span>
            </li>
        </a>
        <a href="{{ route('instructor.strip_card.new') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-credit-card-front'></i>
                <span>Strippenkaart aanmaken</span>
            </li>
        </a>
        <a href="{{ route('instructor.student.index') }}" class="navItem">
            <li class="menu-item">
                <i class='bx bxs-user'></i>
                <span>Leerlingen</span>
            </li>
        </a>
        <li class="menu-item" onclick="signOut()">
            <i class="fas fa-sign-out-alt"></i>
            <span>Uitloggen</span>
        </li>
    </ul>
</nav>
<div class="content-wrapper">
    @yield("content")
</div>
<script>
    function signOut() {
        axios.post('{{ route("signOut") }}')
            .then(response => {
                window.location.href = '{{ route("login") }}';
            })
            .catch(error => {
                // Handle error
                console.error('Error signing out:', error);
            });
    }
</script>
