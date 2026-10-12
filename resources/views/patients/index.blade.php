
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patients - Clinic Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans text-gray-800">

    <div class="min-h-screen p-6">
        <div class="mx-auto max-w-7xl">

            <div class="mb-6 flex flex-col justify-between gap-4 sm:flex-row sm:items-center">
                <div>
                    <h1 class="text-3xl font-bold">Patients</h1>
                    <p class="mt-1 text-gray-600">
                        Manage your clinic's patient records.
                    </p>
                </div>

                <a href="{{ route('patients.create') }}"
                   class="rounded-lg bg-blue-600 px-5 py-3 text-center font-semibold text-white hover:bg-blue-700">
                    Register New Patient
                </a>
            </div>

            @if (session('success'))
                <div class="mb-4 rounded-lg bg-green-100 p-4 text-green-800">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="mb-4 rounded-lg bg-red-100 p-4 text-red-800">
                    <ul class="list-inside list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="overflow-hidden rounded-xl bg-white shadow">
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-gray-200 text-gray-700">
                            <tr>
                                <th class="px-6 py-4">Patient Number</th>
                                <th class="px-6 py-4">Full Name</th>
                                <th class="px-6 py-4">Date of Birth</th>
                                <th class="px-6 py-4">Sex</th>
                                <th class="px-6 py-4">Contact Number</th>
                                <th class="px-6 py-4">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="divide-y divide-gray-200">
                            @forelse ($patients as $patient)
                                <tr class="hover:bg-gray-50">
                                    <td class="px-6 py-4">
                                        {{ $patient->patient_number }}
                                    </td>

                                    <td class="px-6 py-4 font-medium">
                                        {{ $patient->first_name }}
                                        {{ $patient->middle_name }}
                                        {{ $patient->last_name }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $patient->date_of_birth->format('M d, Y') }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $patient->sex }}
                                    </td>

                                    <td class="px-6 py-4">
                                        {{ $patient->contact_number }}
                                    </td>

                                    <td class="px-6 py-4">
                                        <div class="flex flex-wrap gap-3">
                                            <a href="{{ route('patients.show', $patient) }}"
                                               class="font-semibold text-blue-600 hover:underline">
                                                View
                                            </a>

                                            <a href="{{ route('patients.edit', $patient) }}"
                                               class="font-semibold text-green-600 hover:underline">
                                                Edit
                                            </a>

                                            <form action="{{ route('patients.destroy', $patient) }}"
                                                  method="POST"
                                                  onsubmit="return confirm('Are you sure you want to delete this patient?');">
                                                @csrf
                                                @method('DELETE')

                                                <button type="submit"
                                                        class="font-semibold text-red-600 hover:underline">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6"
                                        class="px-6 py-10 text-center text-gray-500">
                                        No patient records found. Register your first patient to get started.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="border-t border-gray-200 px-6 py-4">
                    {{ $patients->links() }}
                </div>
            </div>

            <div class="mt-6">
                <a href="{{ route('dashboard') }}"
                   class="font-semibold text-gray-600 hover:text-gray-900">
                    &larr; Back to Dashboard
                </a>
            </div>

        </div>
    </div>

</body>
</html>
