<?php
require_once __DIR__ . '/../../config/config.php';

//get the session var(s), if any
$role = $_SESSION['role'] ?? "";

//ADMINISTRATORS
if ($role == "administrator") {
    echo '
    <nav id="sidebarMenu"
    	class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
    	style="height: fit-content;">
    	<div class="position-sticky pt-3">
    		<ul class="nav flex-column">
    			<li class="nav-item"><a class="nav-link" href="' . URL_PUBLIC . '/users/users_view.php?users=all"> <span
    					data-feather="users"></span> Users
    			</a>
    				<ul style="margin-left: 1rem; list-style-type: circle;">
    					<li class="nav-item"><a class="nav-link" href="' . URL_PUBLIC . '/users/users_view.php?users=A">Administrators</a></li>
    					<li class="nav-item"><a class="nav-link" href="' . URL_PUBLIC . '/users/users_view.php?users=L">Librarians </a></li>
    					<li class="nav-item"><a class="nav-link" href="' . URL_PUBLIC . '/users/users_view.php?users=M">Members </a></li>
    				</ul>
    			</li>
    			<li style="margin-left: 1rem; class="nav-item"><a class="nav-link" href="#"> <span
    					data-feather="user-plus"></span>&nbsp;&nbsp;Add Librarian
    			</a></li>
    			<li style="margin-left: 1rem; class="nav-item"><a class="nav-link" href="#"> <span
    					data-feather="user-plus"></span>&nbsp;&nbsp;Add Member
    			</a></li>
    		</ul>
    	</div>
    </nav>
';
} //LIBRARIANS
elseif ($role == "librarian") {
    echo '
    <nav id="sidebarMenu"
    	class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse"
    	style="height: fit-content;">
    	<div class="position-sticky pt-3">
    		<ul class="nav flex-column">
    			<li class="nav-item"><a class="nav-link" href="' . URL_PUBLIC . '/dashboard.php#"> <span
    					data-feather="users"></span> Users
    			</a>
    				<ul style="margin-left: 1rem; list-style-type: circle;">
    					<li class="nav-item"><a class="nav-link" href="' . URL_PUBLIC . '/users/users_view.php?users=M">Members </a></li>
    				</ul>
    			</li>
    			<li style="margin-left: 1rem; class="nav-item"><a class="nav-link" href="#"> <span
    					data-feather="user-plus"></span>&nbsp;&nbsp;Add Member
    			</a></li>
    		</ul>
    	</div>
    </nav>
';
} //MEMBERS
else {
    //placeholder
}
?>