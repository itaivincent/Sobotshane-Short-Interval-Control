@extends('template.default')

@section('content')
 <div id="content" class="main-content">


 
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">


                                
                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Users</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Parameters</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->



                    <div class="row layout-top-spacing">
                    
                        
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Modules</h6>
                                        </div>
                                        <div class="task-action">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>

                                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                                    <a class="dropdown-item" href="javascript:void(0);">Create Module</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">View Module </a>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-content">

                                        <div class="w-info">
                                            <p class="value"><span></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                                        </div>
                                        
                                    </div>

                                    <div class="w-progress-stats">                                            
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                        <div class="">
                                            <div class="w-icon">
                                                <p>57%</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>  

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Roles</h6>
                                        </div>
                                        <div class="task-action">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>

                                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                                    <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg" href="javascript:void(0);">Create User Role</a>
                                                    <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target="#allusers">View All Roles</a>                                              
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="w-content">

                                        <div class="w-info">
                                            <p class="value"><span></span> <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trending-up"><polyline points="23 6 13.5 15.5 8.5 10.5 1 18"></polyline><polyline points="17 6 23 6 23 12"></polyline></svg></p>
                                        </div>
                                        
                                    </div>

                                    <div class="w-progress-stats">                                            
                                        <div class="progress">
                                            <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>

                                        <div class="">
                                            <div class="w-icon">
                                                <p>57%</p>
                                            </div>
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>  
                    </div>

                </div>

            </div>
            <!--  BEGIN FOOTER  -->
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <span class="dynamic-year">2023</span> <a target="_blank" href="https://https://techiserve.com">TechIServe</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Powered by <a target="_blank" href="https://techiserve.com"><b>TechIServe</b></a></p>
                </div>

                
            </div>
            <!--  END FOOTER  -->
        </div>        
        </div>


          
                                  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="myLargeModalLabel"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="row">    
                                                <form method="post" action="{{ route('users.userRole') }}">
                                                     @csrf                                        
                                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                                    <div class="section general-info payment-info">
                                                        <div class="info">
                                                            <h6 class="">Add User Role</h6>                              

                                                            <div class="row mt-4">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">User Role</label>
                                                                        <input type="text" name="Name" class="form-control add-billing-address-input">
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Description</label>
                                                                        <input type="text"  name="Description" class="form-control">
                                                                    </div>
                                                                </div>                                                          
                                                            </div>        
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-light-dark" data-bs-dismiss="modal">Discard</button>
                                                    <button type="submit" class="btn btn-primary">Save</button>
                                                </div>
                                            </form>
                                            </div>
                                        </div>
                                    </div>






                                    
                                  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-lg" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="allusers"></h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                                      <svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                <div class="row layout-top-spacing">
                    
                                                    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                                                        <div class="widget-content widget-content-area br-8">
                                                            <table id="zero-config" class="table dt-table-hover" style="width:100%">
                                                                <thead>
                                                                    <tr>
                                                                        <th>Role Name</th>
                                                                        <th>Description</th>
                                                                        <th>Created By</th>
                                                                    
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach ($roles as $user) 
                                                                    <tr>
                                                                        <td>{{ $user->Name }}</td>
                                                                        <td>{{ $user->Description }}</td>
                                                                        <td>{{ $user->CreatedBy }}</td>
                                                                    
                                                                    </tr>             
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                
                                                </div>

                                               </div>                                       
                                        
                                            </div>
                                        </div>
                                    </div>
@endsection