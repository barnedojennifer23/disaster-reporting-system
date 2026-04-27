<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;

class DisasterReportController extends Controller
{
    public function create()
    {
        $barangays = [
            'Baungon', 'Cabanglasan', 'Damulog', 'Dangcagan', 'Don Carlos',
            'Impasug-ong', 'Kadingilan', 'Kalilangan', 'Kibawe', 'Kitaotao',
            'Malaybalay', 'Malitbog', 'Manolo Fortich', 'Maramag', 'Pangantucan',
            'Quezon', 'San Fernando', 'Sumilao', 'Talakag', 'Valencia',
        ];

        return view('reports.create', compact('barangays'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'reporter_name' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'disaster_type' => 'required|in:Flood,Landslide,Fire,Earthquake,Storm',
            'barangay' => 'required|string|max:255',
            'description' => 'required|string',
        ]);

        Report::create($request->only([
            'reporter_name',
            'contact_number',
            'disaster_type',
            'barangay',
            'description',
        ]));

        return redirect()->route('reports.index')->with('success', 'Report submitted successfully.');
    }

    public function index()
    {
        $reports = Report::orderBy('created_at', 'desc')->get();

        return view('reports.index', compact('reports'));
    }

    public function updateStatus($id, $status)
    {
        $valid = ['Pending', 'Responding', 'Resolved'];

        if (! in_array($status, $valid, true)) {
            return redirect()->back()->with('error', 'Invalid report status.');
        }

        $report = Report::findOrFail($id);
        $report->update(['status' => $status]);

        return redirect()->back()->with('success', 'Report status updated to ' . $status . '.');
    }

    public function destroy($id)
    {
        $report = Report::findOrFail($id);
        $report->delete();

        return redirect()->back()->with('success', 'Report deleted successfully.');
    }
}
