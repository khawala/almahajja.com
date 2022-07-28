<?php $r = \Route::current()->getAction() ?>
<?php $route = (isset($r['as'])) ? $r['as'] : ''; ?>

<a href="/" class="logo">
    <img src="<?php echo e(App\Configuration::first()->logo); ?>" alt="">
</a>

<ul class="sidebar-menu">
 <li class="treeview">
        <a href="#">
            <i class="fa fa-sort-alpha-asc"></i> <span>  الاقسام والمسارات </span>
            <span class="pull-left-container">
                <i class="fa fa-angle-left pull-left"></i>
            </span>
        </a>
        <ul class="treeview-menu">
                
             <li class="<?php echo ( starts_with($route, ADMIN.'.departments') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.departments.index')); ?>">
                    <span>الاقسام</span>
                </a>
            </li>
            
            <li class="<?php echo ( starts_with($route, ADMIN.'.sections') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.sections.index')); ?>">
                    <span>المسارات</span>
                </a>
            </li>
           
             <li class="<?php echo ( starts_with($route, ADMIN.'.levels') ) ? "active" : '' ?>">
        <a href="<?php echo e(route(ADMIN.'.levels.index')); ?>">
             <span>المستويات</span>
        </a>
    </li>
    <li class="<?php echo ( starts_with($route, ADMIN.'.levelSections') ) ? "active" : '' ?>">
        <a href="<?php echo e(route(ADMIN.'.levelSections.index')); ?>">
           <span>المستويات والمسارات</span>
        </a>
    </li>
     <li class="<?php echo ( starts_with($route, ADMIN.'.classrooms') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.classrooms.index')); ?>">
                    <span>الحلقات</span>
                </a>
            </li>
      <?php if(auth()->user()->role ==10): ?>
        <li class="<?php echo ( starts_with($route, ADMIN.'.students') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.students.index')); ?>">
                    <span>الطلاب</span>
                </a>
            </li>
         <li class="<?php echo ( starts_with($route, ADMIN.'.teachers') ) ? "active" : '' ?>">
        <a href="<?php echo e(route(ADMIN.'.teachers.index')); ?>">
           <span> المعلمات</span>
        </a>
    </li>  
            <?php endif; ?>
         
        </ul>
    </li>
     <li class="treeview">
        <a href="#">
            <i class="fa fa-graduation-cap"></i> <span> الطلبات</span>
            <span class="pull-left-container">
                <i class="fa fa-angle-left pull-left"></i>
            </span>
        </a>
        <ul class="treeview-menu">
               <li class="<?php echo ( starts_with($route, ADMIN.'.registrations') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.registrations.index', ['status' => 0])); ?>">
                    <span>طلبات التسجيل</span>
                </a>
            </li>
                <?php if(auth()->user()->role > 10): ?>
                 <li class="<?php echo ( starts_with($route, ADMIN.'.job-requests') ) ? "active" : '' ?>">
                    <a href="<?php echo e(route(ADMIN.'.job-requests.index')); ?>">
                        <span>طلبات التوظيف</span>
                    </a>
                </li>
                <?php endif; ?>
        </ul>
    </li>
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
        <?php if(auth()->user()->role > 10): ?>
     <li class="treeview">
        <a href="#">
            <i class="fa fa-graduation-cap"></i> <span> المستخدمين</span>
            <span class="pull-left-container">
                <i class="fa fa-angle-left pull-left"></i>
            </span>
        </a>
        <ul class="treeview-menu">
                    <li class="<?php echo ( starts_with($route, ADMIN.'.students') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.students.index')); ?>">
                    <span>الطلاب</span>
                </a>
            </li>
 <li class="<?php echo ( starts_with($route, ADMIN.'.users') ) ? "active" : '' ?>">
                    <a href="<?php echo e(route(ADMIN.'.users.index',['role'=>'admin'])); ?>">
                        <span>الإداريين</span>
                    </a>
                </li>
                 <li class="<?php echo ( starts_with($route, ADMIN.'.users') ) ? "active" : '' ?>">
                    <a href="<?php echo e(route(ADMIN.'.users.index',['role'=>'supervisor'])); ?>">
                        <span>المشرفين</span>
                    </a>
                </li>
                         <li class="<?php echo ( starts_with($route, ADMIN.'.teachers') ) ? "active" : '' ?>">
        <a href="<?php echo e(route(ADMIN.'.teachers.index')); ?>">
           <span> المعلمات</span>
        </a>
    </li>  
        </ul>
    </li>
    <?php endif; ?>
<?php if(auth()->user()->role > 10): ?>
     <li class="<?php echo ( starts_with($route, ADMIN.'.jobs') ) ? "active" : '' ?>">
                    <a href="<?php echo e(route(ADMIN.'.jobs.index')); ?>">
                        <i class="fa fa-users"></i>   <span>الوظائف</span>
                      
                    </a>
                </li>

   
    <?php if(auth()->user()->role > 10): ?>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-users"></i> <span> الإحصائيات </span>
                <span class="pull-left-container">
                    <i class="fa fa-angle-left pull-left"></i>
                </span>
            </a>

            <ul class="treeview-menu">
    
           
               
                 <li class="<?php echo ( starts_with($route, ADMIN.'.registrations.stats') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.registrations.stats')); ?>">
                    <span>احصائيات طلبات التسجيل</span>
                </a>
            </li>
                  <li class="<?php echo ( starts_with($route, ADMIN.'.stats') ) ? "active" : '' ?>">
                    <a href="<?php echo e(route(ADMIN.'.stats.index')); ?>">
                       <span>احصائيات طلبات التوظيف</span>
                    </a>
                </li>
                   <li class="<?php echo ( starts_with($route, ADMIN.'.invoice.getReport') ) ? "active" : '' ?>">
                    <a href="<?php echo e(route(ADMIN . '.invoice.getReport')); ?>">
                      
                        <span>  تقرير الفواتير</span>
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
                 <li class="<?php echo ( starts_with($route, ADMIN.'.advertisements') ) ? "active" : '' ?>">
                <a href="<?php echo e(route(ADMIN.'.advertisements.index')); ?>">
                    <span>الاعلانات</span>
                </a>
            </li>
            
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
                <li>
    <a target="_blank" href="http://wa.me/+966548313071">
        <i class="fa fa-life-ring" aria-hidden="true"></i> <span>الدعم الفني</span>
    </a>
</li>
 <li class="<?php echo ( starts_with($route, ADMIN.'.settings') ) ? "active" : '' ?>">
                    <a href="<?php echo e(route(ADMIN.'.settings.index')); ?>">
                        <span>الإعدادات</span>
                    </a>
                </li>
            </ul>
        </li>
    <?php endif; ?>

<?php endif; ?>

   

</ul>
