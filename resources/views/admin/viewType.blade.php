@include('layouts.header')

<!-- main-content -->
<div class="main-content">
    <div class="main-content-inner">
        <div class="main-content-wrap">
            <div class="flex items-center flex-wrap justify-between gap20 mb-27">
                <h3>TV Types</h3>
            </div>

            <div class="wg-box">
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show">
                        <strong>Oops! Errors:</strong>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                        <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                <div class="title-box">
                    <div class="body-text">Manage TV Types</div>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered align-middle table-striped">
                        <thead class="">
                            <tr>
                                <th scope="col" class="text-center">ID</th>
                                <th scope="col" class="text-center">TV Type</th>
                            </tr>
                        </thead>
                        <tbody class="text-center">
                            @foreach($tvTypes as $type)
                                <tr>
                                    <td class="fw-bold">{{ $type->id }}</td>
                                    <td>{{ $type->name }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>





                <div class="divider"></div>
                
                <!-- Pagination -->
                <!-- Pagination -->
<div class="flex items-center justify-between flex-wrap gap10">
    <div class="text-tiny">
        Showing {{ $tvTypes->firstItem() }} to {{ $tvTypes->lastItem() }} of {{ $tvTypes->total() }} entries
    </div>
    <ul class="wg-pagination">
        {{-- Previous Page Link --}}
        @if ($tvTypes->onFirstPage())
            <li class="disabled">
                <span><i class="icon-chevron-left"></i></span>
            </li>
        @else
            <li>
                <a href="{{ $tvTypes->previousPageUrl() }}&search={{ request('search') }}">
                    <i class="icon-chevron-left"></i>
                </a>
            </li>
        @endif

        {{-- Pagination Elements --}}
        @foreach ($tvTypes->getUrlRange(1, $tvTypes->lastPage()) as $page => $url)
            <li class="{{ $page == $tvTypes->currentPage() ? 'active' : '' }}">
                <a href="{{ $url }}&search={{ request('search') }}">{{ $page }}</a>
            </li>
        @endforeach

        {{-- Next Page Link --}}
        @if ($tvTypes->hasMorePages())
            <li>
                <a href="{{ $tvTypes->nextPageUrl() }}&search={{ request('search') }}">
                    <i class="icon-chevron-right"></i>
                </a>
            </li>
        @else
            <li class="disabled">
                <span><i class="icon-chevron-right"></i></span>
            </li>
        @endif
    </ul>
</div>


            </div>
        </div>
    </div>
</div>

@include('layouts.footer')


<style>
/* Basic Table Styling */
.table {
    width: 100%;
    border-collapse: collapse;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 4px 12px rgba(227, 213, 213, 0.1);
}

.table thead {
    background-color: rgba(212, 217, 221, 0.8); /* Dark Header with transparency */
    color: black;
    text-align: center;
}

.table th, .table td {
    padding: 12px 16px;
    text-align: center;
    font-size: 16px;
}

.table td {
    background-color: rgba(249, 249, 249, 0.9); /* Light background with transparency */
}

.table-hover tbody tr:hover {
    background-color: rgba(241, 241, 241, 0.9); /* Transparent Hover Effect */
}

.table-bordered {
    border: 1px solid rgba(222, 226, 230, 0.8); /* Transparent borders */
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(248, 249, 250, 0.9); /* Transparent striped rows */
}

/* Table Responsive Styling */
.table-responsive {
    margin: 20px 0;
    overflow-x: auto;
}

/* Table Row Styling for Modern Look */
.table tbody tr {
    transition: background-color 0.3s ease, transform 0.3s ease;
}

.table tbody tr:hover {
    background-color: rgba(241, 241, 241, 0.9);
    transform: translateY(-2px); /* Lift effect on hover */
}

.table td, .table th {
    border: 1px solid rgba(222, 226, 230, 0.8); /* Transparent borders */
}

/* Optional: Add smooth transition effect to table borders */
.table td, .table th {
    transition: border-color 0.3s ease;
}

.table td:hover, .table th:hover {
    border-color: #007bff;
}

/* Table Column Heading Style */
.table th {
    font-weight: bold;
}

/* Table Font Style */
body {
    font-family: 'Roboto', sans-serif;
}

/* Mobile Responsiveness: Stack columns on small screens */
@media (max-width: 768px) {
    .table th, .table td {
        padding: 8px 12px;
    }
}


</style>