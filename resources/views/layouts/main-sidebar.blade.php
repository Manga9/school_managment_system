<div class="container-fluid">
    <div class="row">
        <!-- Left Sidebar start-->
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <li>
                        <a href="{{route('dashboard')}}">
                            <i class="ti-dashboard"></i> <span class="right-nav-text">{{trans('main-sidebar.dashboard')}}</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left"><i class="ti-agenda"></i><span
                                    class="right-nav-text">{{trans('grades.grades')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{route('grades.index')}}">{{trans('grades.grades-list')}}</a></li>
                            <li><a href="{{route('grades.create')}}">{{trans('grades.add')}}</a></li>
                        </ul>
                    </li>
                    <!-- menu item calendar-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#calendar-menu">
                            <div class="pull-left"><i class="ti-bag"></i><span
                                    class="right-nav-text">{{trans('classrooms.classrooms')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="calendar-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('classrooms.index')}}">{{trans('classrooms.classrooms-list')}} </a> </li>
                        </ul>
                    </li>
                    <!-- menu item todo-->
                    <li>
                        <a href="{{route('sections.index')}}"><i class="ti-notepad"></i><span class="right-nav-text">{{trans('sections.sections')}}</span> </a>
                    </li>
                    <li>
                        <a href="{{route('add_parents')}}"><div class="pull-left"><i class="ti-user"></i><span
                                class="right-nav-text">{{trans('parents.parents')}}</span></div>
                            <div class="clearfix"></div></a>
                    </li>

                    <!-- menu font icon-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#font-icon">
                            <div class="pull-left"><i class="ti-user"></i><span class="right-nav-text">{{trans('teachers.teachers')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="font-icon" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('teachers.index')}}">{{trans('teachers.teachers-list')}}</a> </li>
                            <li> <a href="{{route('teachers.create')}}">{{trans('teachers.add')}}</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Form">
                            <div class="pull-left"><i class="ti-user"></i><span class="right-nav-text">{{trans('students.students')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Form" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('students.index')}}">{{trans('students.students-list')}}</a> </li>
                            <li> <a href="{{route('students.create')}}">{{trans('students.add')}}</a> </li>
                            <li> <a href="{{route('promotions.index')}}">{{trans('students.promotionsTable')}}</a> </li>
                            <li> <a href="{{route('promotions.create')}}">{{trans('students.promotionsCreate')}}</a> </li>
                            <li> <a href="{{route('graduates.index')}}">{{trans('students.graduatedTable')}}</a> </li>
                            <li> <a href="{{route('graduates.create')}}">{{trans('students.graduatedCreate')}}</a> </li>
                        </ul>
                    </li>
                    <!-- menu item table -->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#table">
                            <div class="pull-left"><i class="ti-money"></i><span class="right-nav-text">{{trans('fees.accounts')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="table" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('fees.index')}}">{{trans('fees.fees')}}</a> </li>
                            <li> <a href="{{route('feeInvoices.index')}}">{{trans('students.InvoicesFees')}}</a> </li>
                            <li> <a href="{{route('processingFees.index')}}">{{trans('students.processingFee')}}</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#custom-page">
                            <div class="pull-left"><i class="ti-file"></i><span class="right-nav-text">{{trans('attendance.attendance')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="custom-page" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('attendance.index')}}">{{trans('attendance.list')}}</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#exams">
                            <div class="pull-left"><i class="ti-id-badge"></i><span
                                    class="right-nav-text">{{trans('subjects.subjects')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="exams" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('subjects.index')}}">{{trans('subjects.subjects-list')}}</a> </li>
                        </ul>
                    </li>
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#questions">
                            <div class="pull-left"><i class="ti-id-badge"></i><span
                                    class="right-nav-text">{{trans('exam.exams')}}</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="questions" class="collapse" data-parent="#sidebarnav">
                            <li> <a href="{{route('exams.index')}}">{{trans('exam.exams-list')}}</a> </li>
                            <li> <a href="{{route('questions.index')}}">{{trans('question.questions')}}</a> </li>
                        </ul>
                    </li>                   
                    <!-- menu item timeline-->
                    <li>
                        <a href="timeline.html"><i class="ti-panel"></i><span class="right-nav-text">timeline</span>
                        </a>
                    </li>
                    <!-- menu item Multi level-->
                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#multi-level">
                            <div class="pull-left"><i class="ti-layers"></i><span class="right-nav-text">Multi
                                    level Menu</span></div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="multi-level" class="collapse" data-parent="#sidebarnav">
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#auth">Level
                                    item 1<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="auth" class="collapse">
                                    <li>
                                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#login">Level
                                            item 1.1<div class="pull-right"><i class="ti-plus"></i></div>
                                            <div class="clearfix"></div>
                                        </a>
                                        <ul id="login" class="collapse">
                                            <li>
                                                <a href="javascript:void(0);" data-toggle="collapse"
                                                   data-target="#invoice">level item 1.1.1<div class="pull-right"><i
                                                            class="ti-plus"></i></div>
                                                    <div class="clearfix"></div>
                                                </a>
                                                <ul id="invoice" class="collapse">
                                                    <li> <a href="#">level item 1.1.1.1</a> </li>
                                                    <li> <a href="#">level item 1.1.1.2</a> </li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                    <li> <a href="#">level item 1.2</a> </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" data-toggle="collapse" data-target="#error">level
                                    item 2<div class="pull-right"><i class="ti-plus"></i></div>
                                    <div class="clearfix"></div>
                                </a>
                                <ul id="error" class="collapse">
                                    <li> <a href="#">level item 2.1</a> </li>
                                    <li> <a href="#">level item 2.2</a> </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <!-- Left Sidebar End-->