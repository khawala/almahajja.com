<?php $r = \Route::current()->getAction() ?>
<?php $route = (isset($r['as'])) ? $r['as'] : ''; ?>

<a href="/" class="logo">
    <img src="{{ App\Configuration::first()->logo }}" alt="">
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
                <a href="{{ route(ADMIN.'.marks.index') }}">
                    <span>الدرجات الشهرية</span>
                </a>
            </li>
            <li class="<?php echo ( starts_with($route, ADMIN.'.certifications') ) ? "active" : '' ?>">
                <a href="{{ route(ADMIN.'.certifications.index') }}">
                    <span>الشهادات</span>
                </a>
            </li>
        </ul>
    </li>
@if (auth()->user()->role > 5)
    
    <li class="treeview">
        <a href="#">
            <i class="fa fa-pencil"></i> <span>التسجيل والحلقات</span>
            <span class="pull-left-container">
                <i class="fa fa-angle-left pull-left"></i>
            </span>
        </a>
        <ul class="treeview-menu">
            <li class="<?php echo ( starts_with($route, ADMIN.'.students') ) ? "active" : '' ?>">
                <a href="{{ route(ADMIN.'.students.index') }}">
                    <span>الطالبات</span>
                </a>
            </li>
            <li class="<?php echo ( starts_with($route, ADMIN.'.registrations') ) ? "active" : '' ?>">
                <a href="{{ route(ADMIN.'.registrations.index', ['status' => 0]) }}">
                    <span>التسجيل</span>
                </a>
            </li>
            <li class="<?php echo ( starts_with($route, ADMIN.'.classrooms') ) ? "active" : '' ?>">
                <a href="{{ route(ADMIN.'.classrooms.index') }}">
                    <span>الحلقات</span>
                </a>
            </li>
            <li class="<?php echo ( starts_with($route, ADMIN.'.registrations.stats') ) ? "active" : '' ?>">
                <a href="{{ route(ADMIN.'.registrations.stats') }}">
                    <span>احصائيات</span>
                </a>
            </li>
        </ul>
    </li>

    <li class="treeview">
        <a href="#">
            <i class="fa fa-sort-alpha-asc"></i> <span> الاعلانات</span>
            <span class="pull-left-container">
                <i class="fa fa-angle-left pull-left"></i>
            </span>
        </a>
        <ul class="treeview-menu">
         
            <li class="<?php echo ( starts_with($route, ADMIN.'.advertisements') ) ? "active" : '' ?>">
                <a href="{{ route(ADMIN.'.advertisements.index') }}">
                    <span>الاعلانات</span>
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
                <a href="{{ route(ADMIN.'.sections.index') }}">
                    <span>المسارات</span>
                </a>
            </li>
            <li class="<?php echo ( starts_with($route, ADMIN.'.departments') ) ? "active" : '' ?>">
                <a href="{{ route(ADMIN.'.departments.index') }}">
                    <span>الاقسام</span>
                </a>
            </li>
            
           
        </ul>
    </li>
    @if (auth()->user()->role > 10)
        <li class="treeview">
            <a href="#">
                <i class="fa fa-users"></i> <span>التوظيف والصلاحيات </span>
                <span class="pull-left-container">
                    <i class="fa fa-angle-left pull-left"></i>
                </span>
            </a>

            <ul class="treeview-menu">
                <li class="<?php echo ( starts_with($route, ADMIN.'.jobs') ) ? "active" : '' ?>">
                    <a href="{{ route(ADMIN.'.jobs.index') }}">
                        <span>الوظائف</span>
                    </a>
                </li>
                <li class="<?php echo ( starts_with($route, ADMIN.'.job-requests') ) ? "active" : '' ?>">
                    <a href="{{ route(ADMIN.'.job-requests.index') }}">
                        <span>طلبات التوظيف</span>
                    </a>
                </li>
                <li class="<?php echo ( starts_with($route, ADMIN.'.users') ) ? "active" : '' ?>">
                    <a href="{{ route(ADMIN.'.users.index') }}">
                        <span>المستخدمين</span>
                    </a>
                </li>
                <li class="<?php echo ( starts_with($route, ADMIN.'.stats') ) ? "active" : '' ?>">
                    <a href="{{ route(ADMIN.'.stats.index') }}">
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
                    <a href="{{ route(ADMIN.'.configurations.index') }}">
                        <span>عن المؤسسة</span>
                    </a>
                </li>
                <li class="<?php echo ( starts_with($route, ADMIN.'.nationalities') ) ? "active" : '' ?>">
                    <a href="{{ route(ADMIN.'.nationalities.index') }}">
                        <span>الجنسيات</span>
                    </a>
                </li>

                <li class="<?php echo ( starts_with($route, ADMIN.'.activities') ) ? "active" : '' ?>">
                    <a href="{{ route(ADMIN.'.activities.index') }}">
                        <span>النشاطات</span>
                    </a>
                </li>
                <li class="<?php echo ( starts_with($route, ADMIN.'.telecoms') ) ? "active" : '' ?>">
                    <a href="{{ route(ADMIN.'.telecoms.index') }}">
                        <span>المكالمات</span>
                    </a>
                </li>
                <li class="<?php echo ( starts_with($route, ADMIN.'.periods') ) ? "active" : '' ?>">
                    <a href="{{ route(ADMIN.'.periods.index') }}">
                        <span>الفترات</span>
                    </a>
                </li>
            </ul>
        </li>
    @endif

@endif
<li>
    <a target="_blank" href="https://www.hit.sa/#section4">
        <i class="fa fa-life-ring" aria-hidden="true"></i> <span>الدعم الفني</span>
    </a>
</li>
    <li class="<?php echo ( starts_with($route, ADMIN.'.levels') ) ? "active" : '' ?>">
        <a href="{{ route(ADMIN.'.levels.index') }}">
            <i class="fa fa-industry" aria-hidden="true"></i> <span>المستويات</span>
        </a>
    </li>
    <li class="<?php echo ( starts_with($route, ADMIN.'.levelSections') ) ? "active" : '' ?>">
        <a href="{{ route(ADMIN.'.levelSections.index') }}">
            <i class="fa fa-industry" aria-hidden="true"></i> <span>الاقسام والمسارات</span>
        </a>
    </li>

</ul>
