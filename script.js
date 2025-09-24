document.addEventListener('DOMContentLoaded', () => {
    // Sidebar navigation
    const tabs = document.querySelectorAll('.sidebar li');
    const sections = document.querySelectorAll('.content > div');
    tabs.forEach(tab => {
        tab.addEventListener('click', () => {
            tabs.forEach(t => t.classList.remove('active'));
            tab.classList.add('active');
            sections.forEach(s => s.style.display = 'none');
            document.getElementById(tab.dataset.tab).style.display = 'block';
        });
    });

    // Modal functions
    window.openModal = function (id) {
        document.getElementById(id).style.display = 'flex';
    };

    window.closeModal = function (id) {
        document.getElementById(id).style.display = 'none';
    };

    // Form handling for all modules
    const forms = [
        { id: 'admissionForm', table: 'admissionTable', fields: ['name', 'age', 'dob', 'gender', 'email', 'contact', 'course'], modal: 'admissionModal' },
        { id: 'feeForm', table: 'feeTable', fields: ['studentId', 'type', 'amount', 'date', 'mode'], modal: 'feeModal' },
        { id: 'hostelForm', table: 'hostelTable', fields: ['studentId', 'room', 'block', 'checkin'], modal: 'hostelModal' },
        { id: 'examForm', table: 'examTable', fields: ['studentId', 'subject', 'marks', 'result'], modal: 'examModal' },
        { id: 'libraryForm', table: 'libraryTable', fields: ['studentId', 'book', 'issueDate', 'returnDate'], modal: 'libraryModal' }
    ];

    forms.forEach(form => {
        const formElement = document.getElementById(form.id);
        const tableBody = document.querySelector(`#${form.table} tbody`);
        formElement.addEventListener('submit', e => {
            e.preventDefault();
            const row = tableBody.insertRow();
            form.fields.forEach(field => {
                row.insertCell().textContent = document.getElementById(field).value;
            });
            formElement.reset();
            closeModal(form.modal);
        });
    });

    // Chart.js for Dashboard
    new Chart(document.getElementById('myChart'), {
        type: 'bar',
        data: {
            labels: ['2019', '2020', '2021', '2022', '2023'],
            datasets: [{
                label: 'Admissions',
                data: [200, 300, 450, 500, 600],
                backgroundColor: '#52796f'
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    display: false
                }
            }
        }
    });
    function toggleDropdown() {
        document.getElementById("dropdownMenu").classList.toggle("show");
    }

    // Close dropdown if clicked outside
    window.addEventListener("click", function (event) {
        if (!event.target.closest(".user-profile")) {
            document.getElementById("dropdownMenu").classList.remove("show");
        }
    });
    // Admissions Trend (Line Chart)
    new Chart(document.getElementById('admissionsChart'), {
        type: 'line',
        data: {
            labels: ['2021', '2022', '2023', '2024', '2025'],
            datasets: [{
                label: 'Admissions',
                data: [300, 400, 500, 600, 700],
                borderColor: '#52796f',
                backgroundColor: 'rgba(82, 121, 111, 0.2)',
                tension: 0.3,
                fill: true,
                pointRadius: 5,
                pointBackgroundColor: '#354f52'
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: true } },
            scales: {
                x: { grid: { display: false } },
                y: { beginAtZero: true }
            }
        }
    });

    // Fees Collected vs Pending (Doughnut Chart)
    new Chart(document.getElementById('feesChart'), {
        type: 'doughnut',
        data: {
            labels: ['Collected', 'Pending'],
            datasets: [{
                data: [4500000, 550000],
                backgroundColor: ['#52796f', '#e76f51'],
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { position: 'bottom' }
            }
        }
    });


});