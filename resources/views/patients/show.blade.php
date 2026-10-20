<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Details - Clinic Management System</title>

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

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, .05);
            margin-bottom: 24px;
        }

        .patient-header {
            text-align: center;
            padding: 8px 0 28px;
            border-bottom: 1px solid #e5e7eb;
            margin-bottom: 25px;
        }

        .patient-header h2 {
            margin: 0 0 8px;
            font-size: 24px;
            font-weight: 700;
        }

        .patient-number {
            color: #6b7280;
            font-size: 16px;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            padding-bottom: 10px;
            margin: 25px 0 18px;
            border-bottom: 1px solid #e5e7eb;
        }

        .details-grid {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 22px 30px;
        }

        .detail-item {
            min-width: 0;
        }

        .detail-label {
            display: block;
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 6px;
        }

        .detail-value {
            display: block;
            color: #212529;
            font-size: 16px;
            font-weight: 600;
            overflow-wrap: anywhere;
        }

        .btn {
            display: inline-block;
            padding: 10px 16px;
            border-radius: 6px;
            text-decoration: none;
            text-align: center;
            font-family: inherit;
            font-size: 14px;
            cursor: pointer;
            border: 1px solid transparent;
        }

        .btn-primary {
            background: #0d6efd;
            color: white;
            border-color: #0d6efd;
        }

        .btn-primary:hover {
            background: #0b5ed7;
        }

        .btn-outline {
            background: white;
            color: #0d6efd;
            border-color: #86b7fe;
        }

        .btn-outline:hover {
            background: #f0f6ff;
        }

        .btn-secondary {
            background: white;
            color: #495057;
            border-color: #ced4da;
        }

        .button-group {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 25px;
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

            .card {
                padding: 18px;
            }

            .details-grid {
                grid-template-columns: 1fr;
                gap: 18px;
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
            <h1>Patient Details</h1>
            <p>View the complete patient information.</p>
        </div>

        <section class="card">

            <div class="patient-header">
                <h2>
                    {{ $patient->first_name }}
                    {{ $patient->middle_name ? $patient->middle_name . ' ' : '' }}
                    {{ $patient->last_name }}
                </h2>

                <div class="patient-number">
                    Patient Number: {{ $patient->patient_number }}
                </div>
            </div>

            <h3 class="section-title">Personal Information</h3>

            <div class="details-grid">
                <div class="detail-item">
                    <span class="detail-label">First Name</span>
                    <span class="detail-value">{{ $patient->first_name }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Middle Name</span>
                    <span class="detail-value">{{ $patient->middle_name ?: '—' }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Last Name</span>
                    <span class="detail-value">{{ $patient->last_name }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Date of Birth</span>
                    <span class="detail-value">
                        {{ $patient->date_of_birth
                            ? \Carbon\Carbon::parse($patient->date_of_birth)->format('F d, Y')
                            : '—' }}
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Sex</span>
                    <span class="detail-value">{{ $patient->sex }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Contact Number</span>
                    <span class="detail-value">{{ $patient->contact_number }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Email Address</span>
                    <span class="detail-value">{{ $patient->email ?: '—' }}</span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Address</span>
                    <span class="detail-value">{{ $patient->address }}</span>
                </div>
            </div>

            <h3 class="section-title">Emergency Contact Information</h3>

            <div class="details-grid">
                <div class="detail-item">
                    <span class="detail-label">Emergency Contact Name</span>
                    <span class="detail-value">
                        {{ $patient->emergency_contact_name }}
                    </span>
                </div>

                <div class="detail-item">
                    <span class="detail-label">Emergency Contact Number</span>
                    <span class="detail-value">
                        {{ $patient->emergency_contact_number }}
                    </span>
                </div>
            </div>

            <div class="button-group">
                <a href="{{ route('patients.edit', $patient->id) }}"
                   class="btn btn-primary">
                    Edit Patient
                </a>

                <a href="{{ route('patients.index') }}"
                   class="btn btn-secondary">
                    Back to Patient List
                </a>
            </div>

        </section>

        <a href="{{ url('/dashboard') }}" class="back-link">
            ← Back to Dashboard
        </a>

    </main>

</body>
</html>