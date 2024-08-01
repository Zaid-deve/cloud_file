<!-- SIDEBAR FOR WEB -->

<div class="sidebar d-flex flex-column h-100 py-4 px-3">
    <div class="sidebar-header">
        <div class="sidebar-logo d-flex align-items-center justify-content-between">
            <a href="/<?php echo $basedir ?>" class="brand-logo">
                <img src="<?php echo "$httpurl/app/images/brand-logo.png" ?>" alt="#" class="img-contain">
            </a>
            <button class="btn btn-toggle-sidebar-nav ms-auto d-block d-md-none" onclick="$('.sidebar-container')[0].classList.toggle('show-body')"><i class='bx bx-menu h3 text-muted'></i></button>
        </div>
    </div>

    <div class="sidebar-body d-flex flex-column h-100">
        <div class="sidebar-list h-100 position-relative pt-3">
            <div class="sidebar-group sidebar-list">
                <a class="sidebar-list-item d-flex align-items-center gap-2">
                    <span class="sidebar-list-icon"><i class='bx bx-home-alt-2'></i></span>
                    <span class="sidebar-list-text text-muted">Home</span>
                    <span class="badge rounded-pill ms-auto">14</span>
                </a>
                <a class="sidebar-list-item d-flex align-items-center gap-2">
                    <span class="sidebar-list-icon"><i class='bx bx-list-ul'></i></span>
                    <span class="sidebar-list-text text-muted">Tasks</span>
                    <span class="badge rounded-pill ms-auto">14</span>
                </a>
                <a class="sidebar-list-item d-flex align-items-center gap-2">
                    <span class="sidebar-list-icon"><i class='bx bx-group'></i></span>
                    <span class="sidebar-list-text text-muted">Users</span>
                </a>
                <a class="sidebar-list-item d-flex align-items-center gap-2">
                    <span class="sidebar-list-icon"><i class='bx bx-home-alt-2'></i></span>
                    <span class="sidebar-list-text text-muted">Apis</span>
                </a>
                <a class="sidebar-list-item d-flex align-items-center gap-2">
                    <span class="sidebar-list-icon"><i class='bx bx-credit-card'></i></span>
                    <span class="sidebar-list-text text-muted">Subscription</span>
                </a>
                <a class="sidebar-list-item d-flex align-items-center gap-2">
                    <span class="sidebar-list-icon"><i class='bx bx-cog'></i></span>
                    <span class="sidebar-list-text text-muted">Settings</span>
                </a>
                <a class="sidebar-list-item d-flex align-items-center gap-2">
                    <span class="sidebar-list-icon"><i class='bx bx-home-alt-2'></i></span>
                    <span class="sidebar-list-text text-muted">Help & Support</span>
                </a>
            </div>

            <div class="position-absolute start-0 w-100 sidebar-modal rounded-5">
                <div class="d-flex align-items-center">
                    <div class="sidebar-modal-icon rounded-circle">
                        <i class='bx bx-error'></i>
                    </div>
                    <button type="button" class="btn btn-close ms-auto" onclick="this.closest('.sidebar-modal').classList.add('d-none')">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="py-3">
                    <span>Enjoy unlimited access to our app <br> with only a small price monthly.</span>
                </div>
                <div class="sidebar-btns d-flex align-items-center gap-3">
                    <button class="btn p-0 m-0" onclick="this.closest('.sidebar-modal').classList.add('d-none')">
                        <p>Dismiss</p>
                    </button>
                    <button class="btn p-0 m-0" onclick="this.closest('.sidebar-modal').classList.add('d-none')">
                        <p class="text-primary">Go Pro</p>
                    </button>
                </div>
            </div>
        </div>

        <div class="sidebar-hr"></div>
        <div class="sidebar-bottom pt-4">
            <div class="d-flex align-items-center gap-2">
                <img src="<?php echo "$httpurl/app/images/user-default.png" ?> " alt="profile" height="40" width="40" class="img-cover rounded-circle bg-light">
                <span class="sidebar-username">Azunyan U. Wu</span>
                <a href="<?php echo "$httpurl/app/app/user/logout.php" ?>" class="ms-auto"><i class='bx bx-log-in h3 text-muted'></i></a>
            </div>
        </div>
    </div>
</div>