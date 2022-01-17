<!-- /. NAV TOP  -->
<style>
    .active-link1 {
        display: none;
    }
</style>
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">



            <li class="active-link">
                <a href="/" class="p-3 mb-2 bg-info text-white"><i class="fa fa-user "></i>Dashboard</a>
            </li>

            <li class="active-link">
                <a href="{{route('faculty.index') }}" class="p-3 mb-2 bg-info text-white"><i class="fa fa-plus "></i>Faculty</a>
            </li>

            <li class="active-link">
                <a href="{{route('subject.index') }}" class="p-3 mb-2 bg-info text-white"><i class="fa fa-plus "></i>Subject</a>
            </li>
            <li class="active-link">
                <a href="{{route('student.index') }}" class="p-3 mb-2 bg-info text-white"><i class="fa fa-plus "></i>Student</a>
            </li>

            <li class="active-link">
                <a href="{{route('mark.index') }}" class="p-3 mb-2 bg-info text-white"><i class="fa fa-plus "></i>Student_Subject</a>
            </li>

        </ul>
    </div>

</nav>