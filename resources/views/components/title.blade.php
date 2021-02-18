<div class="page-title-area" style="background-image: url({{ asset($backgroundImg) }})">
    <div class="d-table">
        <div class="d-table-cell">
            <div class="container">
                <div class="title-item">
                    <h2>{{ $title }}</h2>
                    <ul>
                        <li>
                            <a href="{{ route('index') }}">Home</a>
                        </li>
                        <li>
                            <span>/</span>
                        </li>
                        <li>
                            {{ $title }}
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
