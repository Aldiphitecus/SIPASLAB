<h1 class="mt-4 fw-bold">{{ $breadcrumb->title }}</h1>
<ol class="breadcrumb mb-4">
    @foreach ($breadcrumb->list as $key => $value)
        @if ($key == count($breadcrumb->list) - 1)
            <li class="breadcrumb-item active">{{ $value }}</li>
        @else
            <li class="breadcrumb-item">{{ $value }}</li>
        @endif
    @endforeach
</ol>
