<!-- resources/views/layouts/dashboard.blade.php -->
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title', 'Dashboard')</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Custom scrollbar styling */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #1f2937;
        }

        ::-webkit-scrollbar-thumb {
            background: #4b5563;
            border-radius: 10px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #6b7280;
        }

        /* Smooth transitions */
        .transition-sidebar {
            transition: all 0.3s ease-in-out;
        }

        /* Card hover effects */
        .dashboard-card {
            transition: all 0.3s ease;
        }

        .dashboard-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }

        /* Custom loading animation */
        .loading-spinner {
            border: 3px solid rgba(255, 255, 255, 0.3);
            border-radius: 50%;
            border-top: 3px solid #3b82f6;
            width: 24px;
            height: 24px;
            animation: spin 1s linear infinite;
            display: none;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* Fade transitions */
        .fade-transition {
            transition: opacity 0.5s ease;
        }

        /* Sidebar collapsed state */
        .sidebar-collapsed .sidebar-text {
            display: none;
        }

        .sidebar-collapsed .sidebar-icon {
            margin-left: auto;
            margin-right: auto;
        }

        .sidebar-collapsed .nav-link {
            justify-content: center;
        }

        .sidebar-collapsed .search-box,
        .sidebar-collapsed .sidebar-section-title,
        .sidebar-collapsed .sidebar-footer-content {
            display: none;
        }

        /* Toggle button transitions */
        .toggle-sidebar-btn {
            transition: all 0.3s ease;
        }

        /* External toggle button */
        .external-toggle {
            position: fixed;
            top: 76px;
            left: 17px;
            z-index: 40;
            transition: all 0.3s ease;
        }

        .sidebar-open .external-toggle {
            left: 265px;
        }
    </style>
</head>

<body class="overflow-hidden font-sans bg-gray-50">
    <!-- External Toggle Button -->
    <button id="toggle-sidebar"
        class="fixed z-40 flex items-center justify-center w-8 h-8 text-gray-600 bg-white border border-gray-200 rounded-full shadow-md toggle-sidebar-btn hover:bg-gray-100 focus:outline-none">
        <i id="toggle-icon" class="fas fa-chevron-right"></i>
    </button>

    <div class="flex h-screen overflow-hidden sidebar-open">
        <!-- Sidebar -->
        <div id="sidebar"
            class="relative w-64 overflow-y-auto text-white shadow-lg transition-sidebar bg-gradient-to-b from-gray-800 to-gray-900">
            <!-- Sidebar Header -->
            <div class="flex items-center justify-center p-4">
                <div class="flex items-center">
                    <svg class="w-8 h-8 text-blue-400 sidebar-icon" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm0 14a6 6 0 110-12 6 6 0 010 12z" />
                    </svg>
                    <span class="ml-3 text-xl font-bold sidebar-text">MyDashboard</span>
                </div>
            </div>

            <!-- Search Box -->
            <div class="mx-3 my-3 search-box">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <i class="text-gray-400 fas fa-search"></i>
                    </span>
                    <input type="text"
                        class="w-full py-2 pl-10 pr-4 text-sm text-white placeholder-gray-400 bg-gray-700 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"
                        placeholder="Search...">
                </div>
            </div>

            <!-- Navigation -->
            <div class="mt-2">
                <p class="px-4 text-xs font-semibold tracking-wider text-gray-400 uppercase sidebar-section-title">Main
                </p>
                <nav class="px-2 mt-2 space-y-1">
                    <a href="/dashboard"
                        class="nav-link flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white group transition duration-200 {{ request()->is('dashboard') ? 'bg-gray-700 text-white' : '' }}">
                        <i class="w-6 h-6 fas fa-home sidebar-icon"></i>
                        <span class="ml-3 sidebar-text">Dashboard</span>
                    </a>
                    <a href="/profile"
                        class="nav-link flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white group transition duration-200 {{ request()->is('profile') ? 'bg-gray-700 text-white' : '' }}">
                        <i class="w-6 h-6 fas fa-user sidebar-icon"></i>
                        <span class="ml-3 sidebar-text">Profile</span>
                    </a>

                    <p
                        class="px-4 mt-6 text-xs font-semibold tracking-wider text-gray-400 uppercase sidebar-section-title">
                        Settings</p>
                    <a href="/settings"
                        class="nav-link flex items-center px-4 py-3 text-gray-300 rounded-lg hover:bg-gray-700 hover:text-white group transition duration-200 {{ request()->is('settings') ? 'bg-gray-700 text-white' : '' }}">
                        <i class="w-6 h-6 fas fa-cog sidebar-icon"></i>
                        <span class="ml-3 sidebar-text">Settings</span>
                    </a>
                    <a href="#" id="logout-link"
                        class="flex items-center px-4 py-3 text-gray-300 transition duration-200 rounded-lg nav-link hover:bg-red-600 hover:text-white group">
                        <i class="w-6 h-6 fas fa-sign-out-alt sidebar-icon"></i>
                        <span class="ml-3 sidebar-text">Logout</span>
                    </a>
                </nav>
            </div>

            <!-- User Info Footer -->
            <div class="absolute bottom-0 w-full p-4 border-t border-gray-700 sidebar-footer">
                <div class="flex items-center sidebar-footer-content">
                    <img src="https://via.placeholder.com/40" alt="Profile" class="w-10 h-10 rounded-full">
                    <div class="ml-3">
                        <p class="text-sm font-medium text-white">{{ Auth::user()->name ?? 'User Name' }}</p>
                        <p class="text-xs text-gray-400">{{ Auth::user()->email ?? 'user@example.com' }}</p>
                    </div>
                </div>
                <!-- Collapsed user icon -->
                <div class="hidden text-center sidebar-footer-icon">
                    <img src="https://via.placeholder.com/40" alt="Profile" class="w-10 h-10 mx-auto rounded-full">
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex flex-col flex-1 overflow-hidden">
            <!-- Navbar -->
            <div class="z-10 bg-white shadow-sm">
                <div class="flex items-center justify-between px-4 py-3">
                    <div class="flex items-center">
                        <h1 class="text-xl font-semibold text-gray-800">@yield('navbar-title', 'Dashboard Overview')</h1>
                        <span id="breadcrumb" class="ml-4 text-sm text-gray-500">
                            <a href="/dashboard" class="hover:text-blue-500">Home</a> / <span
                                class="text-gray-700">@yield('breadcrumb', 'Dashboard')</span>
                        </span>
                    </div>
                    <div class="flex items-center space-x-4">
                        <div class="relative" id="notification-container">
                            <button id="notification-button"
                                class="relative p-1 text-gray-600 rounded-full hover:bg-gray-100">
                                <i class="text-xl fas fa-bell"></i>
                                <span id="notification-badge"
                                    class="absolute top-0 right-0 inline-block w-3 h-3 bg-red-500 rounded-full"></span>
                            </button>
                            <div id="notification-dropdown"
                                class="absolute right-0 z-20 hidden py-2 mt-2 bg-white rounded-md shadow-lg w-80">
                                <div class="px-4 py-2 border-b">
                                    <p class="text-sm font-medium text-gray-700">Notifications</p>
                                </div>
                                <div id="notification-list" class="overflow-y-auto max-h-64">
                                    <div class="px-4 py-3 transition duration-200 hover:bg-gray-50">
                                        <p class="text-sm font-medium text-gray-800">System Update</p>
                                        <p class="text-xs text-gray-500">System maintenance scheduled for tonight.</p>
                                        <p class="mt-1 text-xs text-gray-400">2 hours ago</p>
                                    </div>
                                    <div class="px-4 py-3 transition duration-200 hover:bg-gray-50">
                                        <p class="text-sm font-medium text-gray-800">New Message</p>
                                        <p class="text-xs text-gray-500">You have a new message from Admin.</p>
                                        <p class="mt-1 text-xs text-gray-400">Yesterday</p>
                                    </div>
                                </div>
                                <div class="px-4 py-2 text-center border-t">
                                    <a href="#" class="text-xs text-blue-500 hover:text-blue-700">View all
                                        notifications</a>
                                </div>
                            </div>
                        </div>
                        <div class="relative" id="user-menu-container">
                            <button id="user-menu-button"
                                class="flex items-center text-gray-600 hover:text-gray-800 focus:outline-none">
                                <span class="mr-2">{{ Auth::user()->name ?? 'User' }}</span>
                                <img src="https://via.placeholder.com/32" alt="Profile"
                                    class="w-8 h-8 rounded-full">
                            </button>
                            <div id="user-menu-dropdown"
                                class="absolute right-0 z-20 hidden w-48 py-1 mt-2 bg-white rounded-md shadow-lg">
                                <a href="/profile"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Your Profile</a>
                                <a href="/settings"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Settings</a>
                                <div class="border-t border-gray-100"></div>
                                <form method="POST" action="/logout">
                                    @csrf
                                    <button type="submit"
                                        class="block w-full px-4 py-2 text-sm text-left text-gray-700 hover:bg-gray-100">
                                        Sign out
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Content Area -->
            <div class="flex-1 p-6 overflow-auto bg-gray-50">
                <div id="page-loader" class="mx-auto my-4 loading-spinner"></div>
                <div id="content-area">
                    @if (session('success'))
                        <div id="success-alert"
                            class="p-4 mb-4 text-green-700 bg-green-100 border-l-4 border-green-500 rounded shadow-sm fade-transition">
                            <div class="flex items-center">
                                <i class="mr-3 fas fa-check-circle"></i>
                                <p>{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    @if (session('error'))
                        <div id="error-alert"
                            class="p-4 mb-4 text-red-700 bg-red-100 border-l-4 border-red-500 rounded shadow-sm fade-transition">
                            <div class="flex items-center">
                                <i class="mr-3 fas fa-exclamation-circle"></i>
                                <p>{{ session('error') }}</p>
                            </div>
                        </div>
                    @endif

                            @yield('content')
                </div>
            </div>

            <!-- Footer -->
            <footer class="p-4 text-sm text-center text-gray-500 bg-white border-t">
                <p>&copy; {{ date('Y') }} Your Company. All rights reserved.</p>
            </footer>
        </div>
    </div>

    <!-- Logout Confirmation Modal (Hidden by default) -->
    <div id="logout-modal" class="fixed inset-0 z-40 flex items-center justify-center hidden bg-black bg-opacity-50">
        <div class="w-full max-w-md mx-4 overflow-hidden bg-white rounded-lg shadow-xl">
            <div class="flex items-center justify-between px-6 py-4 border-b">
                <h3 class="text-lg font-medium text-gray-900">Confirm Logout</h3>
                <button id="logout-modal-close" class="text-gray-400 hover:text-gray-500">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="px-6 py-4">
                <p class="text-gray-700">Are you sure you want to log out of your account?</p>
            </div>
            <div class="flex justify-end px-6 py-3 space-x-3 border-t bg-gray-50">
                <button id="logout-modal-cancel"
                    class="px-4 py-2 text-gray-800 transition duration-200 bg-gray-200 rounded hover:bg-gray-300">
                    Cancel
                </button>
                <button id="logout-modal-confirm"
                    class="px-4 py-2 text-white transition duration-200 bg-blue-500 rounded hover:bg-blue-600">
                    Confirm
                </button>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Toggle sidebar
            const body = document.body;
            const sidebar = document.getElementById('sidebar');
            const toggleSidebar = document.getElementById('toggle-sidebar');
            const toggleIcon = document.getElementById('toggle-icon');
            const sidebarFooter = document.querySelector('.sidebar-footer');
            const sidebarFooterContent = document.querySelector('.sidebar-footer-content');
            const sidebarFooterIcon = document.querySelector('.sidebar-footer-icon');
            const containerEl = document.querySelector('.flex.h-screen');
            let sidebarCollapsed = false;

            function updateTogglePosition() {
                if (sidebarCollapsed) {
                    toggleSidebar.style.left = '17px'; // Next to collapsed sidebar
                } else {
                    toggleSidebar.style.left = '265px'; // Just outside expanded sidebar
                }
            }

            // Initialize toggle button position
            updateTogglePosition();

            if (toggleSidebar) {
                toggleSidebar.addEventListener('click', function() {
                    sidebarCollapsed = !sidebarCollapsed;
                    if (sidebarCollapsed) {
                        // Collapse sidebar
                        sidebar.classList.remove('w-64');
                        sidebar.classList.add('w-16', 'sidebar-collapsed');
                        containerEl.classList.remove('sidebar-open');
                        toggleIcon.classList.remove('fa-chevron-left');
                        toggleIcon.classList.add('fa-chevron-right');
                        sidebarFooterContent.classList.add('hidden');
                        sidebarFooterIcon.classList.remove('hidden');
                    } else {
                        // Expand sidebar
                        sidebar.classList.remove('w-16', 'sidebar-collapsed');
                        sidebar.classList.add('w-64');
                        containerEl.classList.add('sidebar-open');
                        toggleIcon.classList.remove('fa-chevron-right');
                        toggleIcon.classList.add('fa-chevron-left');
                        sidebarFooterContent.classList.remove('hidden');
                        sidebarFooterIcon.classList.add('hidden');
                    }

                    // Update toggle button position
                    updateTogglePosition();
                });
            }

            // Notifications dropdown
            const notificationButton = document.getElementById('notification-button');
            const notificationDropdown = document.getElementById('notification-dropdown');

            if (notificationButton && notificationDropdown) {
                notificationButton.addEventListener('click', function(event) {
                    event.stopPropagation();
                    notificationDropdown.classList.toggle('hidden');
                    if (userMenuDropdown) {
                        userMenuDropdown.classList.add('hidden');
                    }
                });
            }

            // User menu dropdown
            const userMenuButton = document.getElementById('user-menu-button');
            const userMenuDropdown = document.getElementById('user-menu-dropdown');

            if (userMenuButton && userMenuDropdown) {
                userMenuButton.addEventListener('click', function(event) {
                    event.stopPropagation();
                    userMenuDropdown.classList.toggle('hidden');
                    if (notificationDropdown) {
                        notificationDropdown.classList.add('hidden');
                    }
                });
            }

            // Close dropdowns when clicking outside
            document.addEventListener('click', function() {
                if (notificationDropdown) {
                    notificationDropdown.classList.add('hidden');
                }
                if (userMenuDropdown) {
                    userMenuDropdown.classList.add('hidden');
                }
            });

            // Logout confirmation
            const logoutLink = document.getElementById('logout-link');
            const logoutModal = document.getElementById('logout-modal');
            const logoutModalClose = document.getElementById('logout-modal-close');
            const logoutModalCancel = document.getElementById('logout-modal-cancel');
            const logoutModalConfirm = document.getElementById('logout-modal-confirm');

            if (logoutLink && logoutModal) {
                logoutLink.addEventListener('click', function(event) {
                    event.preventDefault();
                    logoutModal.classList.remove('hidden');
                });

                if (logoutModalClose) {
                    logoutModalClose.addEventListener('click', function() {
                        logoutModal.classList.add('hidden');
                    });
                }

                if (logoutModalCancel) {
                    logoutModalCancel.addEventListener('click', function() {
                        logoutModal.classList.add('hidden');
                    });
                }

                if (logoutModalConfirm) {
                    logoutModalConfirm.addEventListener('click', function() {
                        // Submit logout form
                        const form = document.createElement('form');
                        form.method = 'POST';
                        form.action = '/logout';

                        const csrfToken = document.createElement('input');
                        csrfToken.type = 'hidden';
                        csrfToken.name = '_token';
                        csrfToken.value = document.querySelector('meta[name="csrf-token"]').getAttribute(
                            'content');

                        form.appendChild(csrfToken);
                        document.body.appendChild(form);
                        form.submit();
                    });
                }
            }

            // Auto-dismiss alerts
            const successAlert = document.getElementById('success-alert');
            const errorAlert = document.getElementById('error-alert');

            if (successAlert) {
                setTimeout(function() {
                    successAlert.style.opacity = '0';
                    setTimeout(function() {
                        successAlert.style.display = 'none';
                    }, 500);
                }, 5000);
            }

            if (errorAlert) {
                setTimeout(function() {
                    errorAlert.style.opacity = '0';
                    setTimeout(function() {
                        errorAlert.style.display = 'none';
                    }, 500);
                }, 5000);
            }

            // Page transitions
            window.loadPage = function(url, title) {
                const pageLoader = document.getElementById('page-loader');
                const contentArea = document.getElementById('content-area');

                if (pageLoader && contentArea) {
                    pageLoader.style.display = 'block';
                    contentArea.style.opacity = '0.5';

                    // Simulate AJAX loading delay
                    setTimeout(function() {
                        // In a real app, this would fetch content via AJAX

                        // Update breadcrumb
                        const breadcrumb = document.getElementById('breadcrumb');
                        if (breadcrumb) {
                            breadcrumb.innerHTML =
                                '<a href="/dashboard" class="hover:text-blue-500">Home</a> / <span class="text-gray-700">' +
                                title + '</span>';
                        }

                        pageLoader.style.display = 'none';
                        contentArea.style.opacity = '1';

                        // This would normally redirect, but for simulation we'll just return false
                        // window.location.href = url;
                    }, 500);
                }

                return false; // Prevent default link behavior
            };
        });
    </script>
    @stack('scripts')
</body>

</html>
