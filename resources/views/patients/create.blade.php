<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Patient - Clinic Patient Records</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            background: #f3f6fa;
            color: #212529;
            font-family: 'Figtree', sans-serif;
        }

        .navbar {
            width: 100%;
            background: #0d6efd;
        }

        .navbar-inner {
            max-width: 1500px;
            margin: auto;
            padding: 12px 30px;
            min-height: 72px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .navbar-brand {
            color: white;
            font-size: 26px;
            font-weight: 700;
            text-decoration: none;
        }

        .navbar-actions {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .nav-btn {
            display: inline-block;
            padding: 9px 13px;
            border: 1px solid rgba(255,255,255,.7);
            border-radius: 5px;
            color: white;
            text-decoration: none;
            font-size: 15px;
        }

        .nav-btn-light {
            color: #212529;
            background: #f8f9fa;
            border-color: #f8f9fa;
        }

        .page-container {
            max-width: 1500px;
            margin: 48px auto;
            padding: 0 28px;
        }

        .page-heading {
            margin-bottom: 30px;
        }

        .page-heading h1 {
            margin: 0;
            font-size: 40px;
            line-height: 1.25;
            font-weight: 700;
            color: #212529;
        }

        .page-heading p {
            margin: 12px 0 0;
            color: #596579;
            font-size: 20px;
        }

        .alert {
            margin-bottom: 22px;
            padding: 16px 20px;
            border-radius: 8px;
        }

        .alert-danger {
            background: #f8d7da;
            color: #842029;
        }

        .alert-danger ul {
            margin: 8px 0 0;
            padding-left: 22px;
        }

        .form-card {
            padding: 32px;
            background: white;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.045);
        }

        .section-title {
            margin: 0 0 24px;
            padding-bottom: 12px;
            border-bottom: 1px solid #e9ecef;
            font-size: 23px;
            font-weight: 600;
        }

        .form-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            column-gap: 22px;
            row-gap: 23px;
        }

        .form-group {
            min-width: 0;
        }

        .form-group.full-width {
            grid-column: 1 / -1;
        }

        .form-group label {
            display: block;
            margin-bottom: 10px;
            font-size: 19px;
            font-weight: 400;
            color: #212529;
        }

        .required {
            color: #dc3545;
        }

        .form-control {
            display: block;
            width: 100%;
            min-height: 49px;
            padding: 10px 14px;
            border: 1px solid #d9dfe7;
            border-radius: 8px;
            background-color: #fff;
            color: #212529;
            font-family: inherit;
            font-size: 17px;
            transition: border-color .15s, box-shadow .15s;
        }

        .form-control:focus {
            outline: none;
            border-color: #86b7fe;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, .15);
        }

        textarea.form-control {
            min-height: 110px;
            resize: vertical;
        }

        .form-section {
            margin-bottom: 34px;
        }

        .required-note {
            margin: 0 0 22px;
            color: #6c757d;
            font-size: 14px;
        }

        .form-actions {
            display: flex;
            align-items: center;
            flex-wrap: wrap;
            gap: 12px;
        }

        .btn {
            display: inline-block;
            padding: 12px 22px;
            border: 1px solid transparent;
            border-radius: 6px;
            font-family: inherit;
            font-size: 16px;
            font-weight: 600;
            text-align: center;
            text-decoration: none;
            cursor: pointer;
        }

        .btn-primary {
            color: white;
            background: #0d6efd;
            border-color: #0d6efd;
        }

        .btn-primary:hover {
            color: white;
            background: #0b5ed7;
        }

        .btn-secondary {
            color: #343a40;
            background: #e9ecef;
            border-color: #e9ecef;
        }

        .btn-secondary:hover {
            background: #dfe3e6;
        }

        @media (max-width: 700px) {
            .navbar-inner {
                padding: 14px 16px;
            }

            .navbar-brand {
                font-size: 21px;
            }

            .page-container {
                margin: 28px auto;
                padding: 0 14px;
            }

            .page-heading h1 {
                font-size: 30px;
            }

            .page-heading p {
                font-size: 16px;
            }

            .form-card {
                padding: 20px;
            }

            .form-grid {
                grid-template-columns: 1fr;
                row-gap: 19px;
            }

            .form-group.full-width {
                grid-column: auto;
            }

            .form-group label {
                font-size: 16px;
            }

            .navbar-actions {
                gap: 7px;
            }

            .nav-btn {
                padding: 8px 9px;
                font-size: 13px;
            }
        }
    </style>
</head>

<body>

    <!-- Blue Navigation Bar -->
    <nav class="navbar">
        <div class="navbar-inner">
            <a href="{{ route('patients.index') }}" class="navbar-brand">
                Clinic Patient Records
            </a>

            <div class="navbar-actions">
                <a href="{{ route('patients.index') }}" class="nav-btn">
                    Patient List
                </a>

                <a href="{{ route('patients.create') }}"
                   class="nav-btn nav-btn-light">
                    + Register Patient
                </a>
            </div>
        </div>
    </nav>

    <main class="page-container">

        <!-- Page Heading -->
        <div class="page-heading">
            <h1>Register New Patient</h1>
            <p>Enter the patient's information below.</p>
        </div>

        <!-- Validation Errors -->
        @if ($errors->any())
            <div class="alert alert-danger">
                <strong>Please correct the following errors:</strong>

                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Registration Form -->
        <form action="{{ route('patients.store') }}"
              method="POST"
              class="form-card">

            @csrf

            <!-- Patient Information -->
            <section class="form-section">
                <h2 class="section-title">Patient Information</h2>

                <div class="form-grid">

                    <div class="form-group">
                        <label for="patient_number">
                            Patient Number <span class="required">*</span>
                        </label>

                        <input type="text"
                               id="patient_number"
                               name="patient_number"
                               value="{{ old('patient_number') }}"
                               maxlength="50"
                               required
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="sex">
                            Sex <span class="required">*</span>
                        </label>

                        <select id="sex"
                                name="sex"
                                required
                                class="form-control">
                            <option value="">Select sex</option>
                            <option value="Male" @selected(old('sex') === 'Male')>
                                Male
                            </option>
                            <option value="Female" @selected(old('sex') === 'Female')>
                                Female
                            </option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="first_name">
                            First Name <span class="required">*</span>
                        </label>

                        <input type="text"
                               id="first_name"
                               name="first_name"
                               value="{{ old('first_name') }}"
                               maxlength="100"
                               required
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="last_name">
                            Last Name <span class="required">*</span>
                        </label>

                        <input type="text"
                               id="last_name"
                               name="last_name"
                               value="{{ old('last_name') }}"
                               maxlength="100"
                               required
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="middle_name">Middle Name</label>

                        <input type="text"
                               id="middle_name"
                               name="middle_name"
                               value="{{ old('middle_name') }}"
                               maxlength="100"
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="date_of_birth">
                            Date of Birth <span class="required">*</span>
                        </label>

                        <input type="date"
                               id="date_of_birth"
                               name="date_of_birth"
                               value="{{ old('date_of_birth') }}"
                               max="{{ date('Y-m-d', strtotime('-1 day')) }}"
                               required
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="contact_number">
                            Contact Number (11 digits) <span class="required">*</span>
                        </label>

                        <input type="tel"
                               id="contact_number"
                               name="contact_number"
                               value="{{ old('contact_number') }}"
                               inputmode="numeric"
                               pattern="[0-9]{11}"
                               maxlength="11"
                               minlength="11"
                               required
                               title="Enter exactly 11 digits."
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>

                        <input type="email"
                               id="email"
                               name="email"
                               value="{{ old('email') }}"
                               class="form-control">
                    </div>

                    <div class="form-group full-width">
                        <label for="address">
                            Complete Address <span class="required">*</span>
                        </label>

                        <textarea id="address"
                                  name="address"
                                  rows="3"
                                  required
                                  class="form-control">{{ old('address') }}</textarea>
                    </div>

                </div>
            </section>

            <!-- Emergency Contact -->
            <section class="form-section">
                <h2 class="section-title">Emergency Contact</h2>

                <div class="form-grid">

                    <div class="form-group">
                        <label for="emergency_contact_name">
                            Emergency Contact Name <span class="required">*</span>
                        </label>

                        <input type="text"
                               id="emergency_contact_name"
                               name="emergency_contact_name"
                               value="{{ old('emergency_contact_name') }}"
                               required
                               class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="emergency_contact_number">
                            Emergency Contact Number (11 digits)
                            <span class="required">*</span>
                        </label>

                        <input type="tel"
                               id="emergency_contact_number"
                               name="emergency_contact_number"
                               value="{{ old('emergency_contact_number') }}"
                               inputmode="numeric"
                               pattern="[0-9]{11}"
                               maxlength="11"
                               minlength="11"
                               required
                               title="Enter exactly 11 digits."
                               class="form-control">
                    </div>

                </div>
            </section>

            <p class="required-note">
                Fields marked with <span class="required">*</span> are required.
            </p>

            <!-- Form Buttons -->
            <div class="form-actions">
                <button type="submit" class="btn btn-primary">
                    Register Patient
                </button>

                <a href="{{ route('patients.index') }}"
                   class="btn btn-secondary">
                    Cancel
                </a>
            </div>

        </form>

    </main>

</body>
</html>