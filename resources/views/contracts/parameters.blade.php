@extends('template.default')

@section('content')
 <div id="content" class="main-content">


 
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">


                                
                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Contract</a></li>
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
                                            <h6 class="value">Routes</h6>
                                        </div>
                                        <div class="task-action">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>

                                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">
                                                    <a  class="dropdown-item" data-bs-toggle="modal" data-bs-target="#inputFormModal">Create Route</a>
                                                    <a class="dropdown-item" href="javascript:void(0);">View Routes </a>
                                                   
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
                                                                                                      
                                    </div>
                                </div>
                            </div>
                        </div>  

                    

                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                            <div class="widget widget-card-four">
                                <div class="widget-content">
                                    <div class="w-header">
                                        <div class="w-info">
                                            <h6 class="value">Formulas</h6>
                                        </div>
                                        <div class="task-action">
                                            <div class="dropdown">
                                                <a class="dropdown-toggle" href="#" role="button" id="expenses" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                                </a>

                                                <div class="dropdown-menu left" aria-labelledby="expenses" style="will-change: transform;">                                                
                                                    <a class="dropdown-item"  data-bs-toggle="modal" data-bs-target=".bd-example-modal-lg">View All Formula</a>      
                                                    <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#inputFormulaModal">Create a Formula</a>                                            
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
                                                    <h5 class="modal-title" id="bd-example-modal-lg"></h5>
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




                                    <div class="modal fade inputForm-modal" id="inputFormModal" tabindex="-1" role="dialog" aria-labelledby="inputFormModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
  
                                            <div class="modal-header" id="inputFormModalLabel">
                                                <h5 class="modal-title">Create a <b>Route</b></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                            </div>
                                                                                       
                                            <div class="modal-body">
                                                <form  method="post" action="{{ route('contracts.routeStore') }}"class="mt-0">
                                                @csrf  
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                           
                                                            </span>
                                                            <input type="text"  name="from" class="form-control" placeholder="From" aria-label="name">
                                                        </div>
                                                    </div>

                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                     
                                                            </span>
                                                            <input type="text" name="to" class="form-control" placeholder="To" aria-label="password">
                                                        </div>
                                                    </div>   
                                                    
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                   
                                                            </span>
                                                            <input type="text" name="activity" class="form-control" placeholder="Activity" aria-label="password">
                                                        </div>
                                                    </div> 

                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                                     
                                                            </span>
                                                            <input type="text" name="distance" class="form-control" placeholder="Distance" aria-label="password">
                                                        </div>
                                                    </div> 
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                            <span class="input-group-text">
                                              
                                                            </span>
                                                            <input type="text" name="unit" class="form-control" placeholder="Unit" aria-label="password">
                                                        </div>
                                                    </div> 

                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                           
                                                                    <select name="routeCategory" class="form-select">
                                                                    <option selected="">Choose Type</option>
                                                                    <option value="Standard">Standard</option>
                                                                    <option value="Adhoc">Adhoc</option>
                                                                                                                                                                            
                                                                   </select>  
                                                                  
                                                        </div>
                                                    </div> 

                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                           
                                                                    <select name="type" class="form-select">
                                                                    <option selected="">Choose Category</option>
                                                                    <option value="Less than 1km">Less than 1km</option>
                                                                    <option value="Short Haul">Short Haul</option>
                                                                    <option value="Medium Haul">Medium Haul</option>  
                                                                    <option value="Long Haul">Long Haul</option>                                                                                                                  
                                                                   </select>  
                                                                  
                                                        </div>
                                                    </div>
  
                                            </div>
                                            <div class="modal-footer">                                            
                                                <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Create Route</button>
                                            </div>
                                            </form>
                                          </div>
                                        </div>
                                    </div>





                                    
                                    <div class="modal fade inputForm-modal" id="inputFormulaModal" tabindex="-1" role="dialog" aria-labelledby="inputFormModalLabel" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                          <div class="modal-content">
  
                                            <div class="modal-header" id="inputFormModalLabel">
                                                <h5 class="modal-title">Create a <b>Formula</b></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-hidden="true"><svg aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x"><line x1="18" y1="6" x2="6" y2="18"></line><line x1="6" y1="6" x2="18" y2="18"></line></svg></button>
                                            </div>
                                                                                       
                                            <div class="modal-body">
                                                <form  method="post" action="{{ route('contracts.formulaStore') }}"class="mt-0">
                                                @csrf  
                                                    <div class="form-group">
                                                        <div class="input-group mb-3">
                                                         
                                                            <textarea   name="formula" rows="4" class="form-control" placeholder="enter your formula..." aria-label="name"></textarea>
                                                        </div>
                                                    </div>

                                    
  
                                            </div>
                                            <div class="modal-footer">                                            
                                                <button type="submit" class="btn btn-primary mt-2 mb-2 btn-no-effect" data-bs-dismiss="modal">Calculate Formula</button>
                                            </div>
                                            </form>
                                          </div>
                                        </div>
                                    </div>
@endsection