<div class="page-breadcrumb">
    <div class="row">
        <div class="col-12 align-self-center d-flex align-items-center">
            <!-- Back Button with Icon -->
            <button type="button" class="btn btn-light me-2" onclick="history.back()">
                <i class="fas fa-angle-left"></i>
            </button>

            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">{{ $title }}</h4>
        </div>
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb m-0 p-0">
                    <li class="breadcrumb-item">
                        <a href="{{ route('dashboard') }}" class="text-muted">Home</a>
                    </li>
                    @foreach ($breadcrumbs as $breadcrumb)
                        <li class="breadcrumb-item {{ $loop->last ? 'text-muted active' : '' }}">
                            @if (!$loop->last)
                                <a href="{{ $breadcrumb['url'] }}" class="text-muted">{{ $breadcrumb['name'] }}</a>
                            @else
                                {{ $breadcrumb['name'] }}
                            @endif
                        </li>
                    @endforeach
                </ol>
            </nav>
        </div>
    </div>
</div>
