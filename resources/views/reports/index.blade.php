<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Reports - Bukidnon Disaster Reporting System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(180deg, #f1f8f4 0%, #d9f0e2 100%);
            color: #1b4332;
            min-height: 100vh;
        }
        .page-header {
            background: #40916c;
            color: white;
        }
        .badge-pending { background: #f7d794; color: #453750; }
        .badge-responding { background: #52b788; color: #fff; }
        .badge-resolved { background: #2d6a4f; color: #fff; }
        .btn-bukidnon { background-color: #40916c; border-color: #40916c; color: #fff; }
        .btn-bukidnon:hover { background-color: #2d6a4f; border-color: #2d6a4f; }
        .card {
            border: 1px solid rgba(45,106,79,.16);
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="card page-header shadow-sm mb-4">
        <div class="card-body text-center py-4">
            <h1 class="mb-1">Bukidnon Disaster Reporting System</h1>
            <p class="mb-0">All submitted reports for Bukidnon City. Manage status and remove resolved incidents.</p>
        </div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="mb-4 text-end">
        <a href="{{ route('reports.create') }}" class="btn btn-bukidnon">Submit New Report</a>
    </div>

    @forelse($reports as $report)
        <div class="card mb-3 shadow-sm">
            <div class="card-body">
                <div class="d-flex justify-content-between flex-wrap gap-2">
                    <div>
                        <h5 class="card-title mb-1">{{ $report->disaster_type }} in {{ $report->barangay }}</h5>
                        <p class="text-muted mb-1"><strong>{{ $report->reporter_name }}</strong> • {{ $report->contact_number }}</p>
                    </div>
                    <div class="text-end">
                        <span class="badge @if($report->status === 'Pending') badge-pending @elseif($report->status === 'Responding') badge-responding @else badge-resolved @endif px-3 py-2">{{ $report->status }}</span>
                        <div class="text-muted small mt-1">{{ $report->created_at->format('M d, Y H:i') }}</div>
                    </div>
                </div>
                <p class="mt-3 mb-3">{{ $report->description }}</p>
                <div class="d-flex flex-wrap gap-2">
                    <form action="{{ route('reports.updateStatus', ['id' => $report->id, 'status' => 'Responding']) }}" method="POST" class="m-0">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-outline-secondary btn-sm">Mark Responding</button>
                    </form>
                    <form action="{{ route('reports.updateStatus', ['id' => $report->id, 'status' => 'Resolved']) }}" method="POST" class="m-0">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-outline-success btn-sm">Mark Resolved</button>
                    </form>
                    <form action="{{ route('reports.destroy', $report->id) }}" method="POST" class="m-0">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @empty
        <div class="alert alert-info">No reports have been submitted yet. Start by filing a new report.</div>
    @endforelse
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
