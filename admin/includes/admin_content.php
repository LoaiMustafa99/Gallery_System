<div class="col-lg-12">
                        <h1 class="page-header">
                            Admin
                            <small>Subheading</small>
                        </h1>
                        <?php
                        
                        
                        // $user = new User(); 
                        // $user->username = "Mustafa";
                        // $user->password = "123123";
                        // $user->first_name = "Mustafa";
                        // $user->last_name = "Ahamad";
                        // $user->create();

                        // $user = User::find_users_From_ID(1);
                        // $user->last_name = "Abd-alqader";

                        // $user->update();

                        // $user = User::find_users_From_ID(30);
                        // $user->delete();

                        $user = new User();
                        $user->username = "NEW USER";
                        $user->save();

                        // $users = User::find_all();

                        // foreach($users as $user){
                        //     echo $user->username;
                        // }

                        ?>
                        <ol class="breadcrumb">
                            <li>
                                <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                            </li>
                            <li class="active">
                                <i class="fa fa-file"></i> Blank Page
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->