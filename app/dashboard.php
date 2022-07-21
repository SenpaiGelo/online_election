<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../public/css/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" href="./includes/css/style.css">
        <script src="../public/js/jquery.js"></script>
        <script src="../public/js/bootstrap/bootstrap.min.js"></script>
        <script src="https://use.fontawesome.com/c91a97da7b.js"></script>
        <script src="./configuration/server-custom.js" ></script>
        <title>Administrator | Online Election</title>
    </head>
    <body>
    	<div id="root" >
    		<div id="sidebar">
    			<center class="mt-2 p-2" >
                    <img class="rounded-circle shadow " src="../public/images/logo.jpg" width="40px" height="40px" alt=""> <hr class="bg-white" >
                </center>
                <div class="sidebar-center d-flex justify-content-center align-items-center">
                    <ul class="list-unstyled" >
                        <li class="text-center" >
                            <a href="#dashboard" ><i class="fa fa-home" title="Dashboard" ></i></a>
                        </li>
                        <li class="text-center">
                            <a href="#start-election"><i class="fa fa-play" title="Start Election" ></i></a>
                        </li>
                        <li class="text-center">
                            <a href="#students"><i class="fa fa-user" title="Students" ></i></a>
                        </li>
                        <li class="text-center" >
                            <a href="#partylists"><i class="fa fa-sitemap" title="Partylist" ></i></a>
                        </li>
                        <li class="text-center">
                            <a href="#candidates"><i class="fa fa-users" title="Candidate" ></i></a>
                        </li>
                    </ul>
                </div>
                <div class="d-flex justify-content-center align-items-center" >
                    <a href="#" id="logout" ><i class="fa fa-sign-out" ></i></a>
                </div>
    		</div>
    		<div id="content">
                <div id="dashboard">
                    <div class="container-fluid">
                        <div class="shadow p-3 m-2 rounded bg-white" >
                            <h6 class="fw-bolder text-dark text-uppercase" >Home</h6>
                        </div>
                        <div class="shadow p-2 m-2 mt-3 rounded bg-white" >
                            <div class="row mb-2 text-white">
                                <div class="col-sm-6">
                                    <div class="p-2 m-2 rounded  bg-primary">
                                        <h1 class="text-center fw-bolder" >100</h1>
                                        <h6>TOTAL STUDENTS</h6>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="p-2 m-2 rounded bg-danger">
                                        <h1 class="text-center fw-bolder" >100</h1>
                                        <h6>TOTAL PARTYLISTS</h6>
                                    </div>
                                </div>
                            </div>
                            <div class="p-2 text-dark" >
                                <h6>LAST ELECTION WINNER</h6>
                                <div id="fetchwinner">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end dashboard -->
                <div id="start-election">
                    <div class="container-fluid">
                        <div class="shadow p-3 m-2 rounded bg-white" >
                            <h6 class="fw-bolder text-dark text-uppercase" >Election</h6>
                        </div>
                        <div class="shadow p-2 m-2 mt-3 rounded bg-white" >
                            
                        </div>
                    </div>
                </div>
                <!-- end start-election -->
                <div id="students">
                    <div class="container-fluid">
                        <div class="shadow p-3 m-2 rounded bg-white" >
                            <h6 class="fw-bolder text-dark text-uppercase" >Students</h6>
                            <div class="input-group mb-3">
                                <input id="student-search-id" type="text" class="form-control" placeholder="Search ID" >
                                <div class="input-group-append">
                                    <button id="student-search-btn" class="btn btn-primary" >Search</button>
                                </div>
                            </div>
                        </div>
                        <div class="shadow p-2 m-2 mt-3 rounded bg-white" >
                            <div class="text-end mb-2">
                                <label class="fw-lighter text-uppercase" for="">show</label>
                                <select id="student-show-students">
                                    <option value="10">10</option>
                                    <option value="100">100</option>
                                    <option value="500">500</option>
                                    <option value="1000">1000</option>
                                    <option value="3000">3000</option>
                                    <option value="5000">5000</option>
                                </select>
                            </div>
                            <table class="table table-striped table-bordered table-responsive" >
                                <thead class="bg-dark text-white" >
                                    <tr>
                                        <th>Profile</th>
                                        <th>Student ID</th>
                                        <th>Firstname</th>
                                        <th>Lastname</th>
                                    </tr>
                                </thead>
                                <tbody id="fetchstudent" >

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <!-- end students -->
                <div id="partylists">
                    <div class="container-fluid">
                        <div class="shadow p-3 m-2 rounded bg-white" >
                            <h6 class="fw-bolder text-dark text-uppercase" >Partylists</h6>
                        </div>
                        <div class="shadow p-2 m-2 mt-3 rounded bg-white" >
                            
                        </div>
                    </div>
                </div>
                <!-- end partylist -->
                <div id="candidates">
                    <div class="container-fluid">
                        <div class="shadow p-3 m-2 rounded bg-white" >
                            <h6 class="fw-bolder text-dark text-uppercase" >Candidates</h6>
                        </div>
                        <div class="shadow p-2 m-2 mt-3 rounded bg-white" >
                            
                        </div>
                    </div>
                </div>
                <!-- end candidates -->
    		</div>
    	</div>
    </body>
</html>