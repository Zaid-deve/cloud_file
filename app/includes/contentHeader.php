<div class="content-header py-3 px-4">
    <div class="d-flex justify-content-between content-header-top gap-3 flex-wrap">
        <div class="content-header-tree d-flex align-items-center gap-2">
            <span class="fw-bold">My Files</span>
            <span class='bx bx-chevron-right'></i></span>
            <span class="fw-bold">Folders</span>
        </div>

        <div class="content-header-top-btns d-flex align-items-center gap-3">
            <a href="#" class="btn btn-stroke has-icon"><i class='bx bx-star'></i> Go Pro</a>
            <button href="#" class="btn btn-primary has-icon"><i class='bx bx-share bx-rotate-180'></i> Share</button>
        </div>
    </div>

    <div class="content-header-bottom mt-4 d-flex gap-3 flex-wrap">
        <div class="content-header-searchbar d-flex align-items-center position-relative">
            <div class="content-header-search-icon">
                <i class='bx bx-search'></i>
            </div>
            <input type="text" class="form-control border-0" id="content-header-search-inp" placeholder="Search files and folders...">
            <div class="content-header-search-icon btn-filter-toggler ms-auto" tabindex="-1">
                <i class='bx bx-filter'></i>
            </div>
            <div class="position-absolute top-100 end-0 z-2 bg-white rounded-4 content-header-filter">
                <ul class="list-group">
                    <li class="list-group-item">
                        <a href="?filter=size" class="d-flex gap-2 align-items-center">
                            <i class='bx bx-up-arrow-alt'></i>
                            <span>By Size</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="?filter=date" class="d-flex gap-2 align-items-center">
                            <i class='bx bx-calendar'></i>
                            <span>By Date</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="?filter=name" class="d-flex gap-2 align-items-center">
                            <i class='bx bx-font-size'></i>
                            <span>By Name</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>

        <div class="content-header-btns ms-auto d-flex gap-2 align-items-center">
            <button class="btn btn-stroke rounded-circle has-icon">
                <i class='bx bx-cog'></i>
            </button>
            <button class="btn btn-stroke rounded-circle has-icon">
                <i class='bx bx-link-alt'></i>
            </button>
            <button class="btn btn-stroke rounded-circle has-icon">
                <i class='bx bx-plus'></i>
            </button>
            <a href="<?php echo "$httpurl/app/user/profile.php" ?>" class="btn btn-stroke rounded-circle">
                <img src="<?php echo "$httpurl/app/images/user-default.png" ?>" alt="#" class="img-cover h-100 w-100 rounded-circle">
            </a>
        </div>
    </div>
</div>