
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details - Clinic Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans text-gray-800">

    <div class="min-h-screen p-6">
        <div class="mx-auto max-w-4xl">

            <div class="mb-6">
                <h1 class="text-3xl font-bold">Patient Details</h1>
                <p class="mt-1 text-gray-600">
                    View the complete patient information.
                </p>
            </div>

            <div class="rounded-xl bg-white p-6 shadow">

                <div class="mb-6 flex flex-col justify-between gap-3 sm:flex-row sm:items-center">
                    <div>
                        <h2 class="text-2xl font-bold">
                            {{ $patient->first_name }}
                            {{ $patient->middle_name }}
                            {{ $patient->last_name }}
                        </h2>
                        <p class="mt-1 text-gray-500">
                            Patient Number: {{ $patient->patient_number }}
                        </p>
                    </div>

                    <a href="{{ route('patients.edit', $patient) }}"
                       class="rounded-lg bg-green-600 px-5 py-3 text-center font-semibold text-white hover:bg-green-700">
                        Edit Patient
                    </a>
                </div>

                <div class="mb-6">
                    <h3 class="mb-4 border-b pb-2 text-lg font-semibold">
                        Personal Information
                    </h3>

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <p class="text-sm text-gray-500">First Name</p>
                            <p class="font-medium">{{ $patient->first_name }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Middle Name</p>
                            <p class="font-medium">{{ $patient->middle_name ?: 'Not provided' }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Last Name</p>
                            <p class="font-medium">{{ $patient->last_name }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Date of Birth</p>
                            <p class="font-medium">
                                {{ $patient->date_of_birth->format('F d, Y') }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Sex</p>
                            <p class="font-medium">{{ $patient->sex }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Contact Number</p>
                            <p class="font-medium">{{ $patient->contact_number }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Email Address</p>
                            <p class="font-medium">{{ $patient->email ?: 'Not provided' }}</p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Complete Address</p>
                            <p class="font-medium">{{ $patient->address }}</p>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h3 class="mb-4 border-b pb-2 text-lg font-semibold">
                        Emergency Contact
                    </h3>

                    <div class="grid grid-cols-1 gap-5 sm:grid-cols-2">
                        <div>
                            <p class="text-sm text-gray-500">Contact Name</p>
                            <p class="font-medium">
                                {{ $patient->emergency_contact_name }}
                            </p>
                        </div>

                        <div>
                            <p class="text-sm text-gray-500">Contact Number</p>
                            <p class="font-medium">
                                {{ $patient->emergency_contact_number }}
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mb-6 border-t pt-4 text-sm text-gray-500">
                    <p>
                        Registered on:
                        {{ $patient->created_at->format('F d, Y h:i A') }}
                    </p>
                    <p>
                        Last updated:
                        {{ $patient->updated_at->format('F d, Y h:i A') }}
                    </p>
                </div>

                <a href="{{ route('patients.index') }}"
                   class="inline-block rounded-lg bg-gray-200 px-5 py-3 font-semibold text-gray-700 hover:bg-gray-300">
                    &larr; Back to Patients
                </a>

            </div>
        </div>
    </div>

</body>
</html>
