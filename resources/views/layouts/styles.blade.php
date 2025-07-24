<style>
  /* ==========================
     1. ROOT THEME VARIABLES
  ===========================*/
  :root {
    /* Sidebar */
    --sidebar-bg: #e3f2fd;
    --sidebar-hover: #bbdefb;
    --text-color: #0d47a1;

    /* Content & Layout */
    --content-bg: #f8f9fa;
    --card-bg: #ffffff;

    /* Topbar */
    --topbar-bg: #2196f3;
    --topbar-text: #ffffff;

    /* Color Variants */
    --bg-danger: #f8d7da;
    --bg-warning: #fff3cd;
    --bg-success: #d4edda;
    --bg-info: #d1ecf1;
    --bg-primary: #cfe2ff;
    --bg-secondary: #e2e3e5;
    --bg-purple: #e6e0f8;
    --bg-orange: #ffe5b4;
    --bg-teal: #d2f4ea;

    /* Table / DataTable */
    --table-bg: #ffffff;
    --table-text: #212529;
    --table-header-bg: #f1f5f9;
    --table-header-text: #1e293b;
    --table-border: #dee2e6;

    --dt-bg: #ffffff;
    --dt-text: #212529;
    --dt-header-bg: #f1f5f9;
    --dt-border: #dee2e6;
    --dt-hover: #f8fafc;
    --dt-pagination-bg: #ffffff;

    /* Button */
    --btn-primary-bg: #2b8efc;     
    --btn-primary-text: #ffffff;
    --btn-primary-hover: #0d6efd;
    --btn-success-bg: #28c76f;      
    --btn-success-text: #ffffff;
    --btn-success-hover: #1fa463;
    --btn-warning-bg: #ffe066;     
    --btn-warning-text: #000000;
    --btn-warning-hover: #ffca2c;
    --btn-danger-bg: #ff6b6b;
    --btn-danger-text: #ffffff;
    --btn-danger-hover: #e63946;
    --btn-secondary-bg: #adb5bd;
    --btn-secondary-text: #ffffff;
    --btn-secondary-hover: #8d99a6;

    /* Input */
    --form-bg: #ffffff;
    --form-text: #212529;
    --form-border: #ced4da;
    --form-placeholder: #6c757d;
    --form-focus-border: #0d6efd;
    --form-label: #212529;
  }

  [data-theme="dark"] {
    --sidebar-bg: #1f1f1f;
    --sidebar-hover: #333;
    --text-color: #ffffff;

    --content-bg: #121212;
    --topbar-bg: #0d47a1;
    --topbar-text: #ffffff;
    --card-bg: #1f1f1f;

    --bg-danger: #4b1e1e;
    --bg-warning: #4a3b1a;
    --bg-success: #1e3b2c;
    --bg-info: #1c3a42;
    --bg-primary: #1a2e50;
    --bg-secondary: #3a3b3d;
    --bg-purple: #3b2f4f;
    --bg-orange: #503518;
    --bg-teal: #1e4d3f;

    --table-bg: #1e293b;
    --table-text: #e2e8f0;
    --table-header-bg: #334155;
    --table-header-text: #f1f5f9;
    --table-border: #475569;

    --dt-bg: #1e293b;
    --dt-text: #e2e8f0;
    --dt-header-bg: #334155;
    --dt-border: #475569;
    --dt-hover: #2d3a4a;
    --dt-pagination-bg: #1e293b;

    --btn-primary-bg: #0d47a1;
    --btn-primary-text: #ffffff;
    --btn-primary-hover: #08306b;
    --btn-success-bg: #1b5e20;
    --btn-success-text: #ffffff;
    --btn-success-hover: #0d3b12;
    --btn-warning-bg: #f9a825;
    --btn-warning-text: #000000;
    --btn-warning-hover: #c17900;
    --btn-danger-bg: #b71c1c;
    --btn-danger-text: #ffffff;
    --btn-danger-hover: #7f0000;
    --btn-secondary-bg: #455a64;
    --btn-secondary-text: #ffffff;
    --btn-secondary-hover: #263238;
   
    /* Input */
    --form-bg: #2b2f35;
    --form-text: #f8f9fa;
    --form-border: #495057;
    --form-placeholder: #adb5bd;
    --form-focus-border: #66b2ff;
    --form-label: #eaeaea;
  }

  /* ==========================
     2. BODY & GLOBAL STYLING
  ===========================*/
  body {
    font-family: 'Inter', sans-serif;
    background-color: var(--content-bg);
    color: var(--text-color);
    transition: all 0.3s ease;
  }

  [data-theme="dark"] .text-muted {
    color: rgba(255, 255, 255, 0.6) !important;
  }

  /* ==========================
     3. NAVBAR / TOPBAR
  ===========================*/
  .navbar {
    background-color: var(--topbar-bg) !important;
    color: var(--topbar-text);
    transition: background-color 0.3s ease;
  }

  .navbar .nav-link,
  .navbar .navbar-brand,
  .navbar .dropdown-toggle {
    color: var(--topbar-text) !important;
  }

  .online-indicator {
    width: 10px;
    height: 10px;
    background-color: #28a745;
    border-radius: 50%;
    margin-left: 8px;
    box-shadow: 0 0 5px #28a745;
    border: 1.5px solid #fff;
  }

  /* ==========================
     4. SIDEBAR
  ===========================*/
  .sidebar {
    height: 100vh;
    position: fixed;
    top: 56px;
    left: 0;
    width: 220px;
    background-color: var(--sidebar-bg);
    padding-top: 1rem;
    transition: all 0.3s ease;
  }

  .sidebar a {
    padding: 0.75rem 1rem;
    display: block;
    color: var(--text-color);
    text-decoration: none;
    transition: background-color 0.3s ease;
  }

  .sidebar a.active {
    background-color: rgba(33, 150, 243, 0.1);
    color: #1976d2;
    font-weight: 600;
    border-left: 4px solid #2196f3;
  }

  .sidebar a:hover {
    background-color: var(--sidebar-hover);
  }

  /* ==========================
     5. CONTENT WRAPPER
  ===========================*/
  .content {
    margin-left: 220px;
    padding: 1.5rem;
    padding-top: 80px;
    background-color: var(--content-bg);
    min-height: 100vh;
    transition: all 0.3s ease;
  }

  .content-header {
    font-size: 1.5rem;
    font-weight: 600;
    margin-bottom: 1rem;
    color: var(--text-color);
  }

  /* ==========================
     6. CARD STYLING
  ===========================*/
  .main-card {
    background-color: var(--card-bg);
    color: var(--text-color);
    border: none;
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  /* ==========================
     7. TABLE STYLING
  ===========================*/
  .my-table thead {
    background-color: var(--table-header-bg);
    color: var(--table-header-text);
  }

  .my-table td,
  .my-table th {
    background-color: inherit;
    color: inherit;
    border-color: var(--table-border);
  }

  .my-table tbody tr:hover {
    background-color: rgba(0, 0, 0, 0.03);
  }

  [data-theme="dark"] .my-table tbody tr:hover {
    background-color: rgba(255, 255, 255, 0.05);
  }

  /* ==========================
     8. DATATABLES
  ===========================*/
  table.dataTable {
    background-color: var(--dt-bg) !important;
    color: var(--dt-text) !important;
    border-color: var(--dt-border);
  }

  table.dataTable thead {
    background-color: var(--dt-header-bg);
    color: var(--dt-text);
  }

  table.dataTable tbody tr:hover {
    background-color: var(--dt-hover);
  }

  /* ==========================
     9. PAGINATION
  ===========================*/
  .dataTables_wrapper .dataTables_paginate .paginate_button {
    background-color: var(--dt-pagination-bg) !important;
    color: var(--dt-text) !important;
    border: 1px solid var(--dt-border);
    border-radius: 0.25rem;
    margin: 0 2px;
    /* padding: 0.375rem 0.75rem; */
    font-size: 0.875rem;
    transition: all 0.3s ease;
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
    background-color: var(--bs-primary);
    color: #fff !important;
    border-color: var(--bs-primary);
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button.current {
    background-color: var(--bs-primary) !important;
    color: #fff !important;
    border-color: var(--bs-primary);
  }

  .dataTables_wrapper .dataTables_paginate .paginate_button.disabled {
    background-color: transparent;
    color: var(--dt-text);
    opacity: 0.5;
    border-color: var(--dt-border);
  }

  .dataTables_wrapper .dataTables_paginate {
    margin-top: 1rem;
    text-align: center !important;
  }

  /* ==========================
     10. SEARCH / SELECT FILTER
  ===========================*/
  .dataTables_wrapper .dataTables_filter input,
  .dataTables_wrapper .dataTables_length select {
    background-color: var(--dt-bg);
    color: var(--dt-text);
    border: 1px solid var(--dt-border);
  }

  /* ==========================
     11. RESPONSIVE DESIGN
  ===========================*/
  @media (max-width: 768px) {
    .sidebar {
      display: none;
    }

    .content {
      margin-left: 0;
    }

    .user-info-container {
      display: none !important;
    }
  }

  /* ==========================
   12. BUTTON THEME STYLING
  ========================== */
  .btn-primary {
    background-color: var(--btn-primary-bg) !important;
    color: var(--btn-primary-text) !important;
    border: none;
  }
  .btn-primary:hover {
    background-color: var(--btn-primary-hover) !important;
  }

  .btn-success {
    background-color: var(--btn-success-bg) !important;
    color: var(--btn-success-text) !important;
    border: none;
  }
  .btn-success:hover {
    background-color: var(--btn-success-hover) !important;
  }

  .btn-warning {
    background-color: var(--btn-warning-bg) !important;
    color: var(--btn-warning-text) !important;
    border: none;
  }
  .btn-warning:hover {
    background-color: var(--btn-warning-hover) !important;
  }

  .btn-danger {
    background-color: var(--btn-danger-bg) !important;
    color: var(--btn-danger-text) !important;
    border: none;
  }
  .btn-danger:hover {
    background-color: var(--btn-danger-hover) !important;
  }

  .btn-secondary {
    background-color: var(--btn-secondary-bg) !important;
    color: var(--btn-secondary-text) !important;
    border: none;
  }
  .btn-secondary:hover {
    background-color: var(--btn-secondary-hover) !important;
  }

  /* ==========================
   13. INPUT THEME STYLING
  ========================== */
  input.form-control,
  textarea.form-control,
  select.form-select {
    background-color: var(--form-bg);
    color: var(--form-text);
    border: 1px solid var(--form-border);
    transition: background-color 0.3s ease, color 0.3s ease;
  }

  input.form-control::placeholder,
  textarea.form-control::placeholder {
    color: var(--form-placeholder);
  }

  input.form-control:focus,
  textarea.form-control:focus,
  select.form-select:focus {
    border-color: var(--form-focus-border);
    background-color: var(--form-bg);
    color: var(--form-text);
    box-shadow: 0 0 0 0.25rem rgba(13, 110, 253, 0.25);
  }

  /* Label */
  label.form-label {
    color: var(--form-label);
  }
</style>
