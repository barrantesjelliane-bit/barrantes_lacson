<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Patient - Clinic Management System</title>

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            background: #f1f5f9;
            color: #212529;
            font-size: 14px;
        }

        .navbar {
            min-height: 53px;
            background: #0d6efd;
            color: white;
            padding: 6px 28px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
        }

        .brand {
            color: white;
            font-size: 21px;
            font-weight: 700;
            text-decoration: none;
        }

        .nav-actions {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .nav-btn {
            padding: 8px 12px;
            border: 1px solid rgba(255,255,255,.65);
            border-radius: 5px;
            color: white;
            text-decoration: none;
            font-size: 13px;
        }

        .nav-btn.register {
            background: white;
            color: #212529;
            border-color: white;
        }

        .container {
            width: calc(100% - 56px);
            max-width: 1400px;
            margin: 34px auto;
        }

        .page-heading {
            margin-bottom: 25px;
        }

        .page-heading h1 {
            margin: 0 0 5px;
            font-size: 32px;
            font-weight: 700;
        }

        .page-heading p {
            margin: 0;
            color: #6b7280;
            font-size: 16px;
        }

        .form-card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, .05);
            margin-bottom: 25px;
        }

        .section-title {
            font-size: 22px;
            font-weight: 700;
            margin: 0 0 24px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e5e7eb;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 20px 24px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
            min-width: 0;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        label {
            display: block;
            font-size: 15px;
            font-weight: 600;
            margin-bottom: 8px;
            color: #212529;
        }

        .required {
            color: #dc3545;
        }

        input,
        select,
        textarea {
            width: 100%;
            padding: 11px 14px;
            border: 1px solid #ced4da;
            border-radius: 8px;
            font-family: inherit;
            font-size: 15px;
            color: #212529;
            background: white;
            outline: none;
            transition: border-color .2s, box-shadow .2s;
        }

        input,
        select {
            min-height: 48px;
        }

        textarea {
            min-height: 100px;
            resize: vertical;
        }

        input:focus,
        select:focus,
        textarea:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, .15);
        }

        .error-message {
            margin-top: 6px;
            font-size: 13px;
            color: #dc3545;
        }

        .alert-error {
            background: #f8d7da;
            color: #842029;
            border: 1px solid #f5c2c7;
            padding: 14px 16px;
            border-radius: 7px;
            margin-bottom: 20px;
        }

        .alert-error ul {
            margin: 8px 0 0;
            padding-left: 20px;
        }

        .button-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 28px;
            padding-top: 22px;
            border-top: 1px solid #e5e7eb;
        }

        .btn {
            display: inline-block;
            padding: 11px 18px;
            border: 1px solid transparent;
            border-radius: 6px;
            text-decoration: none;
            text-align: center;
            font-family: inherit;
            font-size: 14px;
            cursor: pointer;
        }

        .btn-primary {
            background: #0d6efd;
            color: white;
            border-color: #0d6efd;
        }

        .btn-primary:hover {
            background: #0b5ed7;
        }

        .btn-secondary {
            background: white;
            color: #495057;
            border-color: #ced4da;
        }

        .btn-secondary:hover {
            background: #f8f9fa;
        }

        .back-link {
            display: inline-block;
            color: #0d6efd;
            text-decoration: none;
            font-size: 15px;
        }

        .back-link:hover {
            text-decoration: underline;
        }

        @media (max-width: 650px) {
            .navbar {
                padding: 12px 16px;
                align-items: flex-start;
                flex-direction: column;
            }

            .brand {
                font-size: 19px;
            }

            .container {
                width: calc(100% - 30px);
                margin-top: 25px;
            }

            .page-heading h1 {
                font-size: 27px;
            }

            .form-card {
                padding: 18px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                gap: 18px;
            }

            .form-group.full-width {
                grid-column: auto;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar">
        <a href="{{ route('patients.index') }}" class="brand">
            Clinic Patient Records
        </a>

        <div class="nav-actions">
            <a href="{{ route('patients.index') }}" class="nav-btn">
                Patient List
            </a>

            <a href="{{ route('patients.create') }}" class="nav-btn register">
                + Register Patient
            </a>
        </div>
    </nav>

    <main class="container">

        <div class="page-heading">
            <h1>Edit Patient</h1>
            <p>Update the patient's information below.</p>
        </div>

        @if ($errors->any())
            <div class="alert-error">
                <strong>Please correct the following errors:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="form-card">

            <form action="{{ route('patients.update', $patient->id) }}" method="POST">
                @csrf
                @method('PUT')

                <h2 class="section-title">Patient Information</h2>

                <div class="form-grid">

                    <div class="form-group">
                        <label for="patient_number">
                            Patient Number <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            id="patient_number"
                            name="patient_number"
                            value="{{ old('patient_number', $patient->patient_number) }}"
                            maxlength="255"
                            required
                        >
                        @error('patient_number')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="date_of_birth">
                            Date of Birth <span class="required">*</span>
                        </label>
                        <input
                            type="date"
                            id="date_of_birth"
                            name="date_of_birth"
                            value="{{ old('date_of_birth', $patient->date_of_birth ? \Carbon\Carbon::parse($patient->date_of_birth)->format('Y-m-d') : '') }}"
                            max="{{ date('Y-m-d', strtotime('-1 day')) }}"
                            required
                        >
                        @error('date_of_birth')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="first_name">
                            First Name <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            id="first_name"
                            name="first_name"
                            value="{{ old('first_name', $patient->first_name) }}"
                            maxlength="255"
                            required
                        >
                        @error('first_name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>
                        <input
                            type="text"
                            id="middle_name"
                            name="middle_name"
                            value="{{ old('middle_name', $patient->middle_name) }}"
                            maxlength="255"
                        >
                        @error('middle_name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="last_name">
                            Last Name <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            id="last_name"
                            name="last_name"
                            value="{{ old('last_name', $patient->last_name) }}"
                            maxlength="255"
                            required
                        >
                        @error('last_name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="sex">
                            Sex <span class="required">*</span>
                        </label>
                        <select id="sex" name="sex" required>
                            <option value="">Select sex</option>
                            <option value="Male" {{ old('sex', $patient->sex) == 'Male' ? 'selected' : '' }}>
                                Male
                            </option>
                            <option value="Female" {{ old('sex', $patient->sex) == 'Female' ? 'selected' : '' }}>
                                Female
                            </option>
                        </select>
                        @error('sex')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="contact_number">
                            Contact Number (11 digits) <span class="required">*</span>
                        </label>
                        <input
                            type="tel"
                            id="contact_number"
                            name="contact_number"
                            value="{{ old('contact_number', $patient->contact_number) }}"
                            pattern="[0-9]{11}"
                            minlength="11"
                            maxlength="11"
                            inputmode="numeric"
                            required
                        >
                        @error('contact_number')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input
                            type="email"
                            id="email"
                            name="email"
                            value="{{ old('email', $patient->email) }}"
                            maxlength="255"
                        >
                        @error('email')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group full-width">
                        <label for="address">
                            Address <span class="required">*</span>
                        </label>
                        <textarea
                            id="address"
                            name="address"
                            required
                        >{{ old('address', $patient->address) }}</textarea>
                        @error('address')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <h2 class="section-title" style="margin-top: 32px;">
                    Emergency Contact Information
                </h2>

                <div class="form-grid">

                    <div class="form-group">
                        <label for="emergency_contact_name">
                            Emergency Contact Name <span class="required">*</span>
                        </label>
                        <input
                            type="text"
                            id="emergency_contact_name"
                            name="emergency_contact_name"
                            value="{{ old('emergency_contact_name', $patient->emergency_contact_name) }}"
                            maxlength="255"
                            required
                        >
                        @error('emergency_contact_name')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="emergency_contact_number">
                            Emergency Contact Number (11 digits) <span class="required">*</span>
                        </label>
                        <input
                            type="tel"
                            id="emergency_contact_number"
                            name="emergency_contact_number"
                            value="{{ old('emergency_contact_number', $patient->emergency_contact_number) }}"
                            pattern="[0-9]{11}"
                            minlength="11"
                            maxlength="11"
                            inputmode="numeric"
                            required
                        >
                        @error('emergency_contact_number')
                            <span class="error-message">{{ $message }}</span>
                        @enderror
                    </div>

                </div>

                <div class="button-group">
                    <button type="submit" class="btn btn-primary">
                        Update Patient
                    </button>

                    <a href="{{ route('patients.show', $patient->id) }}"
                       class="btn btn-secondary">
                        Cancel
                    </a>

                    <a href="{{ route('patients.index') }}"
                       class="btn btn-secondary">
                        Back to Patient List
                    </a>
                </div>

            </form>

        </section>

        <a href="{{ url('/dashboard') }}" class="back-link">
            ← Back to Dashboard
        </a>

    </main>

</body>
</html>