<?php $r = \Route::current()->getAction() ?>
<?php $route = (isset($r['as'])) ? $r['as'] : ''; ?>

<a href="/" class="logo">
    <img src="<?php echo e(App\Configuration::first()->logo); ?>" alt="">
</a>

<ul class="sidebar-menu">

    <li class="treeview">
        <a href="#">
            <i class="fa fa-graduation-cap"></i> <span>الدرجات والشهادات</span>
            <span class="pull-left-container">
                <i class="fa fa-angle-left pull-left"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="<?php echo ( starts_with($route, ADMIN.'.marks') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.marks.index')); ?>">
                    <span>الدرجات الشهرية</span>
                </a>
            </li>
            <li class="<?php echo ( starts_with($route, ADMIN.'.certifications') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.certifications.index')); ?>">
                    <span>الشهادات</span>
                </a>
            </li>
        </ul>
    </li>
<?php if(auth()->user()->role > 5): ?>
    
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pencil"></i> <span>التسجيل والحلقات</span>
            <span class="pull-left-container">
                <i class="fa fa-angle-left pull-left"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="<?php echo ( starts_with($route, ADMIN.'.students') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.students.index')); ?>">
                    <span>الطالبات</span>
                </a>
            </li>
            <li class="<?php echo ( starts_with($route, ADMIN.'.registrations') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.registrations.index', ['status' => 0])); ?>">
                    <span>التسجيل</span>
                </a>
            </li>
            <li class="<?php echo ( starts_with($route, ADMIN.'.classrooms') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.classrooms.index')); ?>">
                    <span>الحلقات</span>
                </a>
            </li>
            <li class="<?php echo ( starts_with($route, ADMIN.'.registrations.stats') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.registrations.stats')); ?>">
                    <span>احصائيات</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-sort-alpha-asc"></i> <span>الاحصائيات والاعلانات</span>
            <span class="pull-left-container">
                <i class="fa fa-angle-left pull-left"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <!--<li class="<?php echo ( starts_with($route, ADMIN.'.divisions') ) ? "active" : '' ?>">-->
            <!--    <a href="<?php echo e(route(ADMIN.'.divisions.index')); ?>">-->
            <!--        <span>الدورات</span>-->
            <!--    </a>-->
            <!--</li>-->
            <li class="<?php echo ( starts_with($route, ADMIN.'.advertisements') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.advertisements.index')); ?>">
                    <span>الاعلانات</span>
                </a>
            </li>
            
            <li class="<?php echo ( starts_with($route, ADMIN.'.divisions.stats') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.divisions.stats')); ?>">
                    <span>احصائيات</span>
                </a>
            </li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
            <i class="fa fa-sort-alpha-asc"></i> <span> الاقسام والمسارات</span>
            <span class="pull-left-container">
                <i class="fa fa-angle-left pull-left"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="<?php echo ( starts_with($route, ADMIN.'.sections') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.sections.index')); ?>">
                    <span>المسارات</span>
                </a>
            </li>
            <li class="<?php echo ( starts_with($route, ADMIN.'.departments') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.departments.index')); ?>">
                    <span>الاقسام</span>
                </a>
            </li>
            
           
        </ul>
    </li>
    <?php if(auth()->user()->role > 10): ?>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-users"></i> <span>التوظيف والصلاحيات </span>
                <span class="pull-left-container">
                    <i class="fa fa-angle-left pull-left"></i>
                </span>
            </a>

            <ul class="treeview-menu">
                <li class="<?php echo ( starts_with($route, ADMIN.'.jobs') ) ? "active" : '' ?>">
                    <a href="<?php echo e(route(ADMIN.'.jobs.index')); ?>">
                        <span>الوظائف</span>
                    </a>
                </li>
                <li class="<?php echo ( starts_with($route, ADMIN.'.job-requests') ) ? "active" : '' ?>">
                    <a href="<?php echo e(route(ADMIN.'.job-requests.index')); ?>">
                        <span>طلبات التوظيف</span>
                    </a>
                </li>
                <li class="<?php echo ( starts_with($route, ADMIN.'.users') ) ? "active" : '' ?>">
                    <a href="<?php echo e(route(ADMIN.'.users.index')); ?>">
                        <span>المستخدمين</span>
                    </a>
                </li>
                <li class="<?php echo ( starts_with($route, ADMIN.'.stats') ) ? "active" : '' ?>">
                    <a href="<?php echo e(route(ADMIN.'.stats.index')); ?>">
                        <span>احصائيات</span>
                    </a>
                </li>
            </ul>
        </li>

        <li class="treeview">
            <a href="#">
                <i class="fa fa-cogs"></i> <span>إعدادات عامة </span>
                <span class="pull-left-container">
                    <i class="fa fa-angle-left pull-left"></i>
                </span>
            </a>
            
            <ul class="treeview-menu">
                <li class="<?php echo ( starts_with($route, ADMIN.'.configurations') ) ? "active" : '' ?>">
                    <a href="<?php echo e(route(ADMIN.'.configurations.index')); ?>">
                        <span>عن المؤسسة</span>
                    </a>
                </li>
                <li class="<?php echo ( starts_with($route, ADMIN.'.nationalities') ) ? "active" : '' ?>">
                    <a href="<?php echo e(route(ADMIN.'.nationalities.index')); ?>">
                        <span>الجنسيات</span>
                    </a>
                </li>

                <li class="<?php echo ( starts_with($route, ADMIN.'.activities') ) ? "active" : '' ?>">
                    <a href="<?php echo e(route(ADMIN.'.activities.index')); ?>">
                        <span>النشاطات</span>
                    </a>
                </li>
                <li class="<?php echo ( starts_with($route, ADMIN.'.telecoms') ) ? "active" : '' ?>">
                    <a href="<?php echo e(route(ADMIN.'.telecoms.index')); ?>">
                        <span>المكالمات</span>
                    </a>
                </li>
                <li class="<?php echo ( starts_with($route, ADMIN.'.periods') ) ? "active" : '' ?>">
                    <a href="<?php echo e(route(ADMIN.'.periods.index')); ?>">
                        <span>الفترات</span>
                    </a>
                </li>
            </ul>
        </li>
    <?php endif; ?>

<?php endif; ?>
<li>
    <a target="_blank" href="https://www.hit.sa/#section4">
        <i class="fa fa-life-ring" aria-hidden="true"></i> <span>الدعم الفني</span>
    </a>
</li>
    <li class="<?php echo ( starts_with($route, ADMIN.'.levels') ) ? "active" : '' ?>">
        <a href="<?php echo e(route(ADMIN.'.levels.index')); ?>">
            <i class="fa fa-industry" aria-hidden="true"></i> <span>المستويات</span>
        </a>
    </li>
    <li class="<?php echo ( starts_with($route, ADMIN.'.levelSections') ) ? "active" : '' ?>">
        <a href="<?php echo e(route(ADMIN.'.levelSections.index')); ?>">
            <i class="fa fa-industry" aria-hidden="true"></i> <span>الاقسام والمسارات</span>
        </a>
    </li>

</ul>
