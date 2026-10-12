
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient - Clinic Management System</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans text-gray-800">

    <div class="min-h-screen p-6">
        <div class="mx-auto max-w-4xl">

            <div class="mb-6">
                <h1 class="text-3xl font-bold">Edit Patient</h1>
                <p class="mt-1 text-gray-600">
                    Update the patient's information below.
                </p>
            </div>

            @if ($errors->any())
                <div class="mb-6 rounded-lg bg-red-100 p-4 text-red-800">
                    <p class="mb-2 font-semibold">Please correct the following errors:</p>
                    <ul class="list-inside list-disc">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('patients.update', $patient) }}"
                  method="POST"
                  class="rounded-xl bg-white p-6 shadow">
                @csrf
                @method('PUT')

                <div class="mb-6">
                    <h2 class="mb-4 border-b pb-2 text-xl font-semibold">
                        Patient Information
                    </h2>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <div>
                            <label for="patient_number" class="mb-1 block font-medium">
                                Patient Number *
                            </label>
                            <input type="text" id="patient_number" name="patient_number"
                                   value="{{ old('patient_number', $patient->patient_number) }}"
                                   required
                                   class="w-full rounded-lg border border-gray-300 p-3 focus:border-blue-500 focus:outline-none">
                        </div>

                        <div>
                            <label for="date_of_birth" class="mb-1 block font-medium">
                                Date of Birth *
                            </label>
                            <input type="date" id="date_of_birth" name="date_of_birth"
                                   value="{{ old('date_of_birth', $patient->date_of_birth->format('Y-m-d')) }}"
                                   max="{{ date('Y-m-d', strtotime('-1 day')) }}"
                                   required
                                   class="w-full rounded-lg border border-gray-300 p-3 focus:border-blue-500 focus:outline-none">
                        </div>

                        <div>
                            <label for="first_name" class="mb-1 block font-medium">
                                First Name *
                            </label>
                            <input type="text" id="first_name" name="first_name"
                                   value="{{ old('first_name', $patient->first_name) }}"
                                   required
                                   class="w-full rounded-lg border border-gray-300 p-3 focus:border-blue-500 focus:outline-none">
                        </div>

                        <div>
                            <label for="middle_name" class="mb-1 block font-medium">
                                Middle Name
                            </label>
                            <input type="text" id="middle_name" name="middle_name"
                                   value="{{ old('middle_name', $patient->middle_name) }}"
                                   class="w-full rounded-lg border border-gray-300 p-3 focus:border-blue-500 focus:outline-none">
                        </div>

                        <div>
                            <label for="last_name" class="mb-1 block font-medium">
                                Last Name *
                            </label>
                            <input type="text" id="last_name" name="last_name"
                                   value="{{ old('last_name', $patient->last_name) }}"
                                   required
                                   class="w-full rounded-lg border border-gray-300 p-3 focus:border-blue-500 focus:outline-none">
                        </div>

                        <div>
                            <label for="sex" class="mb-1 block font-medium">
                                Sex *
                            </label>
                            <select id="sex" name="sex" required
                                    class="w-full rounded-lg border border-gray-300 bg-white p-3 focus:border-blue-500 focus:outline-none">
                                <option value="">Select sex</option>
                                <option value="Male"
                                    @selected(old('sex', $patient->sex) === 'Male')>
                                    Male
                                </option>
                                <option value="Female"
                                    @selected(old('sex', $patient->sex) === 'Female')>
                                    Female
                                </option>
                            </select>
                        </div>

                        <div>
                            <label for="contact_number" class="mb-1 block font-medium">
                                Contact Number (11 digits) *
                            </label>
                            <input type="tel" id="contact_number" name="contact_number"
                                   value="{{ old('contact_number', $patient->contact_number) }}"
                                   inputmode="numeric" pattern="[0-9]{11}"
                                   maxlength="11" minlength="11" required
                                   title="Enter exactly 11 digits."
                                   class="w-full rounded-lg border border-gray-300 p-3 focus:border-blue-500 focus:outline-none">
                        </div>

                        <div>
                            <label for="email" class="mb-1 block font-medium">
                                Email Address
                            </label>
                            <input type="email" id="email" name="email"
                                   value="{{ old('email', $patient->email) }}"
                                   class="w-full rounded-lg border border-gray-300 p-3 focus:border-blue-500 focus:outline-none">
                        </div>

                        <div class="md:col-span-2">
                            <label for="address" class="mb-1 block font-medium">
                                Complete Address *
                            </label>
                            <textarea id="address" name="address" rows="3" required
                                      class="w-full rounded-lg border border-gray-300 p-3 focus:border-blue-500 focus:outline-none">{{ old('address', $patient->address) }}</textarea>
                        </div>
                    </div>
                </div>

                <div class="mb-6">
                    <h2 class="mb-4 border-b pb-2 text-xl font-semibold">
                        Emergency Contact
                    </h2>

                    <div class="grid grid-cols-1 gap-5 md:grid-cols-2">
                        <div>
                            <label for="emergency_contact_name"
                                   class="mb-1 block font-medium">
                                Emergency Contact Name *
                            </label>
                            <input type="text" id="emergency_contact_name"
                                   name="emergency_contact_name"
                                   value="{{ old('emergency_contact_name', $patient->emergency_contact_name) }}"
                                   required
                                   class="w-full rounded-lg border border-gray-300 p-3 focus:border-blue-500 focus:outline-none">
                        </div>

                        <div>
                            <label for="emergency_contact_number"
                                   class="mb-1 block font-medium">
                                Emergency Contact Number (11 digits) *
                            </label>
                            <input type="tel" id="emergency_contact_number"
                                   name="emergency_contact_number"
                                   value="{{ old('emergency_contact_number', $patient->emergency_contact_number) }}"
                                   inputmode="numeric" pattern="[0-9]{11}"
                                   maxlength="11" minlength="11" required
                                   title="Enter exactly 11 digits."
                                   class="w-full rounded-lg border border-gray-300 p-3 focus:border-blue-500 focus:outline-none">
                        </div>
                    </div>
                </div>

                <p class="mb-5 text-sm text-gray-500">
                    Fields marked with * are required.
                </p>

                <div class="flex flex-col gap-3 sm:flex-row">
                    <button type="submit"
                            class="rounded-lg bg-blue-600 px-6 py-3 font-semibold text-white hover:bg-blue-700">
                        Save Changes
                    </button>

                    <a href="{{ route('patients.index') }}"
                       class="rounded-lg bg-gray-200 px-6 py-3 text-center font-semibold text-gray-700 hover:bg-gray-300">
                        Cancel
                    </a>
                </div>
            </form>

        </div>
    </div>

</body>
</html>
