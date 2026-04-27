<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bukidnon Disaster Reporting System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background: linear-gradient(180deg, #e8f5e9 0%, #c8e6c9 100%);
            color: #1b4332;
            min-height: 100vh;
        }
        .brand-bar {
            background: #2d6a4f;
            color: #fff;
        }
        .card {
            border: 1px solid rgba(45,106,79,.18);
        }
        .btn-bukidnon {
            background-color: #40916c;
            border-color: #40916c;
            color: white;
        }
        .btn-bukidnon:hover {
            background-color: #2d6a4f;
            border-color: #2d6a4f;
        }
        .hero-icon {
            font-size: 2.5rem;
            margin-right: 0.5rem;
        }
    </style>
</head>
<body>
<div class="container py-5">
    <div class="text-center mb-4">
        <div class="d-inline-flex align-items-center justify-content-center rounded-circle bg-white shadow-sm" style="width:80px;height:80px;">
            <span class="hero-icon">🌿</span>
        </div>
        <h1 class="mt-3">Bukidnon Disaster Reporting System</h1>
        <p class="lead text-secondary">Submit disaster reports for Bukidnon City and help coordinate faster response.</p>
    </div>

    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow-sm mb-4">
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('reports.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="reporter_name" class="form-label">Reporter Name</label>
                            <input type="text" class="form-control" id="reporter_name" name="reporter_name" value="{{ old('reporter_name') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="contact_number" class="form-label">Contact Number</label>
                            <input type="text" class="form-control" id="contact_number" name="contact_number" maxlength="15" value="{{ old('contact_number') }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="disaster_type" class="form-label">Disaster Type</label>
                            <select class="form-select" id="disaster_type" name="disaster_type" required>
                                <option value="">Choose type</option>
                                <option value="Flood" {{ old('disaster_type') == 'Flood' ? 'selected' : '' }}>Flood</option>
                                <option value="Landslide" {{ old('disaster_type') == 'Landslide' ? 'selected' : '' }}>Landslide</option>
                                <option value="Fire" {{ old('disaster_type') == 'Fire' ? 'selected' : '' }}>Fire</option>
                                <option value="Earthquake" {{ old('disaster_type') == 'Earthquake' ? 'selected' : '' }}>Earthquake</option>
                                <option value="Storm" {{ old('disaster_type') == 'Storm' ? 'selected' : '' }}>Storm</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="barangay" class="form-label">Barangay</label>
                            <select class="form-select" id="barangay" name="barangay" required>
                                <option value="">Choose barangay</option>
                                @foreach($barangays as $barangay)
                                    <option value="{{ $barangay }}" {{ old('barangay') == $barangay ? 'selected' : '' }}>{{ $barangay }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="5" required>{{ old('description') }}</textarea>
                        </div>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('reports.index') }}" class="btn btn-outline-success">View All Reports</a>
                            <button type="submit" class="btn btn-bukidnon">Submit Report</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="text-center text-muted small">
                Built for Bukidnon City with a nature-inspired dashboard theme.
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
