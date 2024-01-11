@extends('template.default')

@section('content')

<div id="content" class="main-content ">

<div class="layout-px-spacing">
                        <div class="middle-content container-xxl p-0">
                            <!-- BEGIN GLOBAL MANDATORY STYLES -->
         <!-- END GLOBAL MANDATORY STYLES -->
         
                                
                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Planning</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Route Plans</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->

    
    <div class="row" id="cancel-row">
                    
        <div class="col-xl-12 col-lg-12 col-sm-12 layout-top-spacing layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="invoice-list" class="table dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th class="checkbox-column"> Record no. </th>
                            <th>From</th>
                            <th>To</th>
                            <th>Activity</th>
                            <th>Distance</th>
                            <th>Type</th>                    
                            <th>Category</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    
                    <tbody>
                        @foreach ($routes as $route)                                         
                        <tr>
                            <td class="checkbox-column"> 1 </td>
                            <td><a href="./app-invoice-preview.html"><span class="inv-number">{{ $route->from }}</span></a></td>
                         
                            <td><span class="inv-amount"> <p class="align-self-center mb-0 user-name">{{ $route->to }}</p></span></td>
                            <td><span class="inv-email"> {{ $route->activity }}</span></td>
                            <td>
                            <span class="inv-amount">{{ $route->distance }}</span>
                             </td>  
                                                                      
                            <td>
                            <span class="inv-amount">{{ $route->Type }}</span>
                           </td>  
                            <td><span class="inv-date"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> {{ $route->routeCategory }}</span></td>
                            <td>
                                <a class="badge badge-light-primary text-start me-2 action-edit" href="/planning/showrouteplan/{{$route->id}}">Monthly</a>   
                                <a class="badge badge-light-primary text-start me-2 action-edit" href="/planning/showrouteplanweekly/{{$route->id}}">Weekly</a>  
                                <a class="badge badge-light-primary text-start me-2 action-edit" href="/planning/showrouteplandaily/{{$route->id}}">Daily</a>                          
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>



   </div>

@endsection











