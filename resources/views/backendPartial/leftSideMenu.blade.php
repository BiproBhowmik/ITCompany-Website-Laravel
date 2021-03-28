            <!-- ========== Left Sidebar Start ========== -->

            <div class="left side-menu">
                <div class="sidebar-inner slimscrollleft">
                    <div class="user-details">
                        <div class="pull-left">
                            <img src="{{ asset('images/users/av1.jpg') }}" alt="" class="thumb-md img-circle">
                        </div>
                        <div class="user-info">
                            <div class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">Joy <span class="caret"></span></a>
                                <ul class="dropdown-menu">
                                    <li><a href="{{ route('logOut') }}"><i class="md md-settings-power"></i> Logout</a></li>
                                </ul>
                            </div>
                            
                            <p class="text-muted m-0">Administrator</p>
                        </div>
                    </div>
                    <!--- Divider -->
                    <div id="sidebar-menu">
                        <ul>
                            <li>
                                <a href="{{ route('adminPage') }}" class="waves-effect"><i class="md md-home"></i><span> Dashboard </span></a>
                            </li>

                            <li>
                                <a href="{{ route('contact') }}" class="waves-effect"><i class="md md-event"></i><span> Contact </span></a>
                            </li>

                            <li>
                                <a href="{{ route('ourService') }}" class="waves-effect"><i class="md md-event"></i><span> Our Service </span></a>
                            </li>

                            <li>
                                <a href="{{ route('aboutUs') }}" class="waves-effect"><i class="md md-event"></i><span> About Us </span></a>
                            </li>

                            <li>
                                <a href="{{ route('portfolio') }}" class="waves-effect"><i class="md md-event"></i><span> Portfolio </span></a>
                            </li>

                            <li>
                                <a href="{{ route('fQna') }}" class="waves-effect"><i class="md md-event"></i><span> Frequent QnA </span></a>
                            </li>

                            <li>
                                <a href="{{ route('ourTeam') }}" class="waves-effect"><i class="md md-event"></i><span> Our Team </span></a>
                            </li>

                            <li>
                                <a href="{{ route('userMessage') }}" class="waves-effect"><i class="md md-event"></i><span> User Messages </span></a>
                            </li>

                            <li>
                                <a href="{{ route('slider') }}" class="waves-effect"><i class="md md-event"></i><span> Sliders </span></a>
                            </li>

                            
                            
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End --> 