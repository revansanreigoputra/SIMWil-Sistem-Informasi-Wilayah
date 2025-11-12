<header class="navbar navbar-expand-md d-none d-lg-flex d-print-none">
    <div class="container-xl">
        <!-- BEGIN NAVBAR TOGGLER -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar-menu"
            aria-controls="navbar-menu" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <!-- END NAVBAR TOGGLER -->
        <div class="flex-row navbar-nav order-md-last">
            <div class="d-none d-md-flex">
                <div class="nav-item dropdown d-none d-md-flex">
                    <a href="#" class="px-0 nav-link" data-bs-toggle="dropdown" tabindex="-1"
                        aria-label="Show notifications" data-bs-auto-close="outside" aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-1">
                            <path
                                d="M10 5a2 2 0 1 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6">
                            </path>
                            <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
                        </svg>
                        <span class="badge bg-red" id="notification-badge" style="display: none;"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-arrow dropdown-menu-end dropdown-menu-card">
                        <div class="card">
                            <div class="card-header d-flex">
                                <h3 class="card-title">Notifikasi</h3>
                                <button type="button" class="btn-close ms-auto" data-bs-dismiss="dropdown"
                                    aria-label="Close"></button>
                            </div>
                            <div class="list-group list-group-flush list-group-hoverable" id="notification-list">
                                <div class="py-4 text-center list-group-item" id="no-notification-placeholder">
                                    <div class="text-muted">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="mb-2 icon">
                                            <path d="M20 6L9 17l-5-5"></path>
                                        </svg>
                                        <div>Tidak ada notifikasi Permohonan Surat Masuk</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="p-0 px-2 nav-link d-flex lh-1" data-bs-toggle="dropdown"
                    aria-label="Open user menu">
                    <span class="avatar avatar-sm me-2"
                        style="background-image: url({{ asset('static/avatars/000m.jpg') }})"></span>
                    <div class="d-none d-xl-block ps-2">
                        <div>{{ auth()->user() ? auth()->user()->name : '' }}</div>
                        <div class="mt-1 small text-secondary">
                            {{ auth()->user() ? auth()->user()->getRoleNames()->first() : '' }}
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                    <a href="#" class="dropdown-item">Settings</a>
                    <form method="POST" action="{{ route('logout') }}" class="d-inline">
                        @csrf
                        <a href="#" class="dropdown-item"
                            onclick="event.preventDefault(); this.closest('form').submit();">
                            Logout
                        </a>
                    </form>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navbar-menu">
        </div>
    </div>
</header>
@push('addon-script')
    <script>
        $(document).ready(function() {
            const badge = $('#notification-badge');
            const list = $('#notification-list');
            const placeholder = $('#no-notification-placeholder');
            const pollingInterval = 30000;
            
            
            const readKey = 'permohonan_read_ids';

            // --- FUNGSI LOCALSTORAGE ---
            function getReadIds() {
                const storedIds = localStorage.getItem(readKey);
                
                try {
                    return storedIds ? JSON.parse(storedIds) : [];
                } catch (e) {
                    console.error("Error parsing read IDs from localStorage:", e);
                    return [];
                }
            }

            // Menandai ID notifikasi sebagai sudah dibaca di LocalStorage
            function markNotificationAsRead(id) {
                let readIds = getReadIds();
                if (!readIds.includes(id)) {
                    readIds.push(id);
                    localStorage.setItem(readKey, JSON.stringify(readIds));
                }
            }

            // --- FUNGSI FETCH NOTIFIKASI ---
            
            function fetchNotifications() {
                const readIds = getReadIds();  

                $.ajax({
                    url: "{{ route('notifications.unverified') }}",
                    type: 'GET',
                    dataType: 'json',
                    success: function(data) {
                       
                        const filteredNotifications = data.notifications.filter(notif => {
                            
                            return !readIds.includes(parseInt(notif.id)); 
                        });

                        const currentCount = filteredNotifications.length;

                       
                        if (currentCount > 0) {
                            badge.text(currentCount).show();
                        } else {
                            badge.hide();
                        }

                        // 3. Render List
                        if (currentCount > 0) {
                            placeholder.hide();
                            list.find('.notification-item').remove();

                            let html = '';
                            filteredNotifications.forEach(notif => {
                                html += `
                                <div class="list-group-item notification-item">
                                    <div class="row align-items-center">
                                        <div class="col-auto"><span class="status-dot status-dot-animated bg-red d-block"></span></div>
                                        <div class="col text-truncate">
                                            <a href="${notif.url}" class="text-body d-block notification-link" data-id="${notif.id}">${notif.pemohon}</a>
                                            <div class="d-block text-muted text-truncate mt-n1">
                                                Mengajukan surat: <strong>${notif.jenis_surat}</strong>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <a href="${notif.url}" class="list-group-item-actions notification-link" data-id="${notif.id}">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon text-muted" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" /><path d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" /></svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                `;
                            });
                            list.prepend(html);
                        } else {
                            list.find('.notification-item').remove();
                            placeholder.show();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("Notification polling error:", error);
                    }
                });
            }

            // --- EVENT LISTENER & POLLING ---

            // Initial fetch
            fetchNotifications();
            // Poll every X seconds
            setInterval(fetchNotifications, pollingInterval);

            // Event listener untuk menangani klik notifikasi
            $(document).on('click', '.notification-link', function(e) {
                e.preventDefault();
                // Ambil ID notifikasi, pastikan diubah ke integer
                const notificationId = parseInt($(this).data('id')); 
                const targetUrl = $(this).attr('href');

                // 1. Tandai sebagai sudah dibaca di LocalStorage
                markNotificationAsRead(notificationId);
                
                // 2. Refresh daftar notifikasi di dropdown untuk menghapus item yang baru diklik
                fetchNotifications(); 
                
                // 3. Arahkan pengguna ke halaman target
                window.location.href = targetUrl;
            });
        });
    </script>
@endpush
