$(document).ready(function () {

    let updatedEmployeeId = null;

    loadAllEmployees();

    $('#storeEmployee').click(function (e) {
        e.preventDefault();

        let employeeData = {
            name: $('#employeeName').val(),
            address: $('#employeeAddress').val(),
            salary: $('#employeeSalary').val(),
        };

        $.ajax({
            url: `store`,
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: employeeData,
            success: function (response) {
                successNotification(response.message);
                loadAllEmployees();
                $('#addEmployeeModal').modal('hide');
                $('#employeeName').val('');
                $('#employeeAddress').val('');
                $('#employeeSalary').val('');
            },
            error: function (xhr) {
                errorNotification(error.responseJSON.message);
            }
        });
    });

    // Update Model Shoes
    $(document).on('click', '.btn-warning', function (e) {
        e.preventDefault();

        // Get employee details from the clicked row
        let employeeRow = $(this).closest('tr');
        updatedEmployeeId = employeeRow.find('td:first').text();
        const name = employeeRow.find('td:nth-child(2)').text();
        const address = employeeRow.find('td:nth-child(3)').text();
        const salary = employeeRow.find('td:nth-child(4)').text();

        // Populate the update modal fields with employee data
        $('#updateEmployeeName').val(name);
        $('#updateEmployeeAddress').val(address);
        $('#updateEmployeeSalary').val(salary);

        // Show the update modal
        $('#updateEmployeeModal').modal('show');
    });

    $('#updateEmployee').click(function (e) {
        e.preventDefault();

        let updatedEmployeeData = {
            name: $('#updateEmployeeName').val(),
            address: $('#updateEmployeeAddress').val(),
            salary: $('#updateEmployeeSalary').val(),
        };

        $.ajax({
            url: `update/${updatedEmployeeId}`,
            method: 'PATCH',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: updatedEmployeeData,
            success: function (response) {
                successNotification(response.message);
                loadAllEmployees();
                $('#updateEmployeeModal').modal('hide');
                $('#updateEmployeeName').val('');
                $('#updateEmployeeAddress').val('');
                $('#updateEmployeeSalary').val('');
            },
            error: function (xhr) {
                errorNotification(xhr.responseJSON.message);
            }
        });
    });

    $(document).on('click', '.deleteEmployee', function (e) {
        e.preventDefault();

        let deletedEmployeeId = $(this).data('id');

        confirmDeletion(() => {
            $.ajax({
                url: `delete/${deletedEmployeeId}`,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (response) {
                    successNotification(response.message);
                    loadAllEmployees();
                },
                error: function (xhr) {
                    errorNotification(xhr.responseJSON.message);
                }
            });
        });
    });

    $('#searchEmployee').click(function (e) {
        e.preventDefault();

        let selectedEmployeeId = $('#txtSearchInput').val();

        if (!selectedEmployeeId) {
            errorNotification('Please enter an Employee ID to search.');
            return;
        }

        $.ajax({
            url: `getById/${selectedEmployeeId}`,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                $('#txtSearchInput').val('');
                let employee = response.data;
                let tableRows = `
                <tr>
                    <td>${employee.id}</td>
                    <td>${employee.name}</td>
                    <td>${employee.address}</td>
                    <td>${employee.salary}</td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning btn-sm w-25" id="updateEmployee">Edit</button>
                        <button type="button" class="btn btn-danger btn-sm w-25 deleteEmployee" data-id="${employee.id}">Delete</button>
                    </td>
                </tr>
            `;
                $('table tbody').html(tableRows);
            },
            error: function (xhr) {
                $('table tbody').empty();
                errorNotification(xhr.responseJSON?.message);
            }
        });
    });

    $('#getAllEmployees').click(function (e) {
        e.preventDefault();
        loadAllEmployees();
    });

    function loadAllEmployees() {
        $.ajax({
            url: `getAll`,
            method: 'GET',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (response) {
                let employees = response.data;
                let tableRows = '';
                employees.forEach(function (employee) {
                    tableRows += `
                    <tr>
                        <td>${employee.id}</td>
                        <td>${employee.name}</td>
                        <td>${employee.address}</td>
                        <td>${employee.salary}</td>
                        <td class="text-center">
                            <button type="button" class="btn btn-warning btn-sm w-25" id="updateEmployee">Edit</button>
                            <button type="button" class="btn btn-danger btn-sm w-25 deleteEmployee" data-id="${employee.id}">Delete</button>
                        </td>
                    </tr>
                `;
                });
                $('table tbody').html(tableRows);
            },
            error: function (xhr) {
                errorNotification(error.responseJSON.message);
            }
        });
    }
});
