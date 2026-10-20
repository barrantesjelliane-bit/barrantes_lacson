<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Patient Records</title>

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: 'Figtree', sans-serif;
            background: #f1f5f9;
            color: #1f2937;
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
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 20px;
            margin-bottom: 25px;
        }

        .page-heading h1 {
            margin: 0 0 5px;
            font-size: 32px;
            font-weight: 700;
            color: #212529;
        }

        .page-heading p {
            margin: 0;
            color: #6b7280;
            font-size: 16px;
        }

        .btn {
            display: inline-block;
            padding: 10px 15px;
            border-radius: 6px;
            text-decoration: none;
            text-align: center;
            font-family: inherit;
            font-size: 13px;
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

        .count-card {
            background: white;
            width: 377px;
            max-width: 100%;
            min-height: 103px;
            padding: 20px 17px;
            margin-bottom: 24px;
            border-radius: 12px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, .05);
        }

        .count-label {
            color: #6b7280;
            font-size: 14px;
            margin-bottom: 5px;
        }

        .count-number {
            color: #0d6efd;
            font-size: 32px;
            line-height: 1.2;
            font-weight: 700;
        }

        .table-card {
            background: white;
            padding: 24px;
            border-radius: 12px;
            box-shadow: 0 5px 18px rgba(0, 0, 0, .05);
            margin-bottom: 25px;
        }

        .alert-success {
            background: #d1e7dd;
            color: #0f5132;
            border: 1px solid #badbcc;
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 18px;
        }

        .alert-error {
            background: #f8d7da;
            color: #842029;
            border: 1px solid #f5c2c7;
            padding: 12px 15px;
            border-radius: 6px;
            margin-bottom: 18px;
        }

        .search-form {
            display: flex;
            align-items: center;
            gap: 8px;
            margin-bottom: 24px;
        }

        .search-input {
            flex: 1;
            min-width: 0;
            height: 39px;
            padding: 9px 12px;
            border: 1px solid #dbe1e8;
            border-radius: 6px;
            font-family: inherit;
            font-size: 13px;
            outline: none;
        }

        .search-input:focus {
            border-color: #86b7fe;
            box-shadow: 0 0 0 3px rgba(13, 110, 253, .12);
        }

        .search-btn {
            height: 41px;
            padding: 0 16px;
        }

        .btn-clear {
            height: 41px;
            padding: 0 15px;
            display: inline-flex;
            align-items: center;
            border: 1px solid #cbd5e1;
            border-radius: 6px;
            color: #6b7280;
            text-decoration: none;
        }

        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            white-space: nowrap;
        }

        thead {
            background: #f8f9fa;
        }

        th {
            text-align: left;
            padding: 16px 9px;
            font-weight: 700;
            color: #111827;
            border-bottom: 1px solid #e5e7eb;
        }

        td {
            padding: 14px 9px;
            border-bottom: 1px solid #e5e7eb;
            color: #374151;
        }

        tbody tr:hover {
            background: #fafafa;
        }

        .actions {
            display: flex;
            align-items: center;
            gap: 7px;
        }

        .action-btn {
            display: inline-block;
            padding: 7px 10px;
            border: 1px solid;
            border-radius: 6px;
            background: white;
            font-family: inherit;
            font-size: 13px;
            text-decoration: none;
            cursor: pointer;
        }

        .view-btn {
            color: #0d6efd;
            border-color: #86b7fe;
        }

        .edit-btn {
            color: #198754;
            border-color: #75b798;
        }

        .delete-btn {
            color: #dc3545;
            border-color: #f1aeb5;
        }

        .action-btn:hover {
            opacity: .75;
        }

        .delete-form {
            display: inline;
            margin: 0;
        }

        .empty-message {
            text-align: center;
            padding: 25px;
            color: #6b7280;
        }

        .pagination {
            margin-top: 20px;
        }

        .back-link {
            display: inline-block;
            margin-top: 0;
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

            .page-heading {
                align-items: flex-start;
                flex-direction: column;
            }

            .page-heading h1 {
                font-size: 27px;
            }

            .table-card {
                padding: 14px;
            }

            .search-form {
                flex-wrap: wrap;
            }

            .search-input {
                flex-basis: 100%;
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
            <div>
                <h1>Patient Records</h1>
                <p>Manage registered clinic patients.</p>
            </div>

            <a href="{{ route('patients.create') }}" class="btn btn-primary">
                + Register New Patient
            </a>
        </div>

        @if (session('success'))
            <div class="alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                <strong>Please check the following:</strong>
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <section class="count-card">
            <div class="count-label">Total Registered Patients</div>
            <div class="count-number">{{ $totalPatients }}</div>
        </section>

        <section class="table-card">

            <form action="{{ route('patients.index') }}" method="GET" class="search-form">
                <input
                    type="text"
                    name="search"
                    class="search-input"
                    placeholder="Search patient number or name..."
                    value="{{ $search ?? request('search') }}"
                >

                <button type="submit" class="btn btn-primary search-btn">
                    Search
                </button>

                <a href="{{ route('patients.index') }}" class="btn-clear">
                    Clear
                </a>
            </form>

            <div class="table-wrapper">
                <table>
                    <thead>
                        <tr>
                            <th>Patient No.</th>
                            <th>Full Name</th>
                            <th>Birth Date</th>
                            <th>Sex</th>
                            <th>Contact Number</th>
                            <th>Actions</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($patients as $patient)
                            <tr>
                                <td>{{ $patient->patient_number }}</td>

                                <td>
                                    {{ $patient->first_name }}
                                    {{ $patient->middle_name ? $patient->middle_name . ' ' : '' }}
                                    {{ $patient->last_name }}
                                </td>

                                <td>
                                    {{ $patient->date_of_birth
                                        ? \Carbon\Carbon::parse($patient->date_of_birth)->format('M d, Y')
                                        : '—' }}
                                </td>

                                <td>{{ $patient->sex }}</td>

                                <td>{{ $patient->contact_number }}</td>

                                <td>
                                    <div class="actions">
                                        <a
                                            href="{{ route('patients.show', $patient->id) }}"
                                            class="action-btn view-btn"
                                        >
                                            View
                                        </a>

                                        <a
                                            href="{{ route('patients.edit', $patient->id) }}"
                                            class="action-btn edit-btn"
                                        >
                                            Edit
                                        </a>

                                        <form
                                            action="{{ route('patients.destroy', $patient->id) }}"
                                            method="POST"
                                            class="delete-form"
                                            onsubmit="return confirm('Are you sure you want to delete this patient?');"
                                        >
                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="action-btn delete-btn">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="empty-message">
                                    No patient records found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            @if (method_exists($patients, 'links'))
                <div class="pagination">
                    {{ $patients->withQueryString()->links() }}
                </div>
            @endif

        </section>

        <a href="{{ url('/dashboard') }}" class="back-link">
            ← Back to Dashboard
        </a>

    </main>

</body>
</html>