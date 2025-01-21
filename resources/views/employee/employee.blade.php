<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Employee Management</title>
</head>

<body>
<div class="container" style="margin-top: 80px">

    <!-- Title -->
    <div class="row mb-5">
        <div class="col">
            <h1 class="text-center">Employee Management</h1>
        </div>
    </div>

    <!-- Buttons -->
    <div class="row mb-3">
        <!-- Search Bar -->
        <div class="col">
            <div class="d-flex">
                <input type="text" class="form-control me-2 w-50" id="txtSearchInput" placeholder="Search Here">
                <button class="btn btn-success me-2" id="searchEmployee">Search</button>
            </div>
        </div>
        <!-- + Add -->
        <div class="col text-end">
            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEmployeeModal">+ Add</button>
        </div>
    </div>

    <!-- Add Employee -->
    <div class="modal fade" id="addEmployeeModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add New Employee</h5>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="employeeName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="employeeName">
                        </div>
                        <div class="mb-3">
                            <label for="employeeAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="employeeAddress">
                        </div>
                        <div class="mb-3">
                            <label for="employeeSalary" class="form-label">Salary</label>
                            <input type="number" class="form-control" id="employeeSalary">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" id="storeEmployee">Submit</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Update Employee -->
    <div class="modal fade" id="updateEmployeeModal">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Employee</h5>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="mb-3">
                            <label for="employeeName" class="form-label">Name</label>
                            <input type="text" class="form-control" id="updateEmployeeName">
                        </div>
                        <div class="mb-3">
                            <label for="employeeAddress" class="form-label">Address</label>
                            <input type="text" class="form-control" id="updateEmployeeAddress">
                        </div>
                        <div class="mb-3">
                            <label for="employeeSalary" class="form-label">Salary</label>
                            <input type="number" class="form-control" id="updateEmployeeSalary">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-warning" id="updateEmployee">Update</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Table -->
    <div style="overflow-y: auto; max-height: 400px;">
        <table class="table table-bordered">
            <thead class="table-light">
            <tr>
                <th class="col">ID</th>
                <th class="col-3">Name</th>
                <th class="col-3">Address</th>
                <th class="col-3">Salary</th>
                <th class="col-3">Actions</th>
            </tr>
            </thead>
            <tbody>
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('assets/js/notification.js') }}"></script>
<script src="{{ asset('assets/js/employee.js') }}"></script>
</body>
</html>
