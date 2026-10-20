<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display the list of patients.
     */
    public function index()
    {
        $search = request('search', '');

        $query = Patient::query();

        // Search by patient number, first name, or last name.
        if (!empty($search)) {
            $query->where(function ($q) use ($search) {
                $q->where('patient_number', 'like', "%{$search}%")
                  ->orWhere('first_name', 'like', "%{$search}%")
                  ->orWhere('last_name', 'like', "%{$search}%");
            });
        }

        // Get matching patients with pagination.
        $patients = $query->latest()->paginate(10)->withQueryString();

        // Count all registered patients, regardless of search.
        $totalPatients = Patient::count();

        // Pass all required variables to the Blade view.
        return view('patients.index', compact(
            'patients',
            'search',
            'totalPatients'
        ));
    }

    /**
     * Show the form for registering a new patient.
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly registered patient.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_number' => 'required|string|max:255|unique:patients,patient_number',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'sex' => 'required|in:Male,Female',
            'contact_number' => ['required', 'regex:/^[0-9]{11}$/'],
            'email' => 'nullable|email|max:255',
            'address' => 'required|string',
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_number' => ['required', 'regex:/^[0-9]{11}$/'],
        ], [
            'patient_number.unique' => 'This patient number is already registered.',
            'contact_number.regex' => 'The contact number must contain exactly 11 digits.',
            'emergency_contact_number.regex' => 'The emergency contact number must contain exactly 11 digits.',
            'date_of_birth.before' => 'The date of birth must be before today.',
        ]);

        Patient::create($validated);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient registered successfully.');
    }

    /**
     * Display a specific patient's details.
     */
    public function show(Patient $patient)
    {
        return view('patients.show', compact('patient'));
    }

    /**
     * Show the form for editing a patient.
     */
    public function edit(Patient $patient)
    {
        return view('patients.edit', compact('patient'));
    }

    /**
     * Update an existing patient's information.
     */
    public function update(Request $request, Patient $patient)
    {
        $validated = $request->validate([
            'patient_number' => 'required|string|max:255|unique:patients,patient_number,' . $patient->id,
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'last_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date|before:today',
            'sex' => 'required|in:Male,Female',
            'contact_number' => ['required', 'regex:/^[0-9]{11}$/'],
            'email' => 'nullable|email|max:255',
            'address' => 'required|string',
            'emergency_contact_name' => 'required|string|max:255',
            'emergency_contact_number' => ['required', 'regex:/^[0-9]{11}$/'],
        ], [
            'patient_number.unique' => 'This patient number is already registered.',
            'contact_number.regex' => 'The contact number must contain exactly 11 digits.',
            'emergency_contact_number.regex' => 'The emergency contact number must contain exactly 11 digits.',
            'date_of_birth.before' => 'The date of birth must be before today.',
        ]);

        $patient->update($validated);

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient information updated successfully.');
    }

    /**
     * Delete a patient record.
     */
    public function destroy(Patient $patient)
    {
        $patient->delete();

        return redirect()
            ->route('patients.index')
            ->with('success', 'Patient record deleted successfully.');
    }
}