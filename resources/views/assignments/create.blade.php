@extends('template.default')

@section('content')
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">

                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Assets</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Create an asset</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->
                         
                    <div class="account-settings-container layout-top-spacing">
    
                        <div class="account-content">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                    <h2>Assign Contract to Routes and Assets</h2>

                                </div>
                            </div>
    
                            <div class="tab-content" id="animateLineContent-4">
                            
                                <div class="tab-panel" id="animated-underline-profile" role="tabpanel" aria-labelledby="animated-underline-profile-tab">
                                    <div class="row">
                                    <form method="post"  id="assets" action="{{ route('assignments.store') }}">
                                      @csrf   
    
                                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Select a Contract</h6>                              
    
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                            <label class="form-label">Contracts</label>
                                                                <div class="invoice-action-currency">
                                                                    <div class="dropdown selectable-dropdown cardName-select">
                                                                    <select name="trailerType" class="form-select">
                                                                    <option selected="">Choose a Contract</option>
                                                                    @foreach ( $contracts as $contract)
                                                                    <option value="{{$contract->id}}">{{$contract->number}} {{$contract->client}} {{$contract->provider}}</option>                                                                                                       
                                                                    @endforeach
                                                                                                                           
                                                                   </select>  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>                                                                                                                                          
                                                </div>
                                            </div>
                                        </div>
                                        </br>


                                        <!-- Routes -->
                         
                                       
                                                    <h6 class="">Select Routes</h6>                                     
    
                        <div class="col-lg-12">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-content widget-content-area">
                                    <table id="style-2" class="table style-2 dt-table-hover">
                                        <thead>
                                            <tr>
                                                <th class="checkbox-column dt-no-sorting"> Record Id </th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Email</th>
                                                <th>Mobile No.</th>
                                                <th class="text-center">Image</th>
                                                <th class="text-center">Status</th>
                                                <th class="text-center dt-no-sorting">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td class="checkbox-column"> 1 </td>
                                                <td>Jane</td>
                                                <td>Lamb</td>
                                                <td>johndoe@yahoo.com</td>
                                                <td>555-555-5555</td>
                                                <td class="text-center">
                                                    <span><img src="../src/assets/img/profile-9.jpeg" class="rounded-circle profile-img" alt="avatar"></span>
                                                </td>
                                                <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                                                <td class="text-center"><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></td>
                                            </tr>
                                          
                                        
                                                                                 
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                                   
                    


                    <!-- Assets -->
                    
                    <h6 class="">Select Assets</h6>                                     
    
    <div class="col-lg-12">
        <div class="statbox widget box box-shadow">
            <div class="widget-content widget-content-area">
                <table id="style-1" class="table style-2 dt-table-hover">
                    <thead>
                        <tr>
                            <th class="checkbox-column dt-no-sorting"> Record Id </th>
                            <th>First Name</th>
                            <th>Last Name</th>
                            <th>Email</th>
                            <th>Mobile No.</th>
                            <th class="text-center">Image</th>
                            <th class="text-center">Status</th>
                            <th class="text-center dt-no-sorting">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="checkbox-column"> 1 </td>
                            <td>Jane</td>
                            <td>Lamb</td>
                            <td>johndoe@yahoo.com</td>
                            <td>555-555-5555</td>
                            <td class="text-center">
                                <span><img src="../src/assets/img/profile-9.jpeg" class="rounded-circle profile-img" alt="avatar"></span>
                            </td>
                            <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                            <td class="text-center"><a href="javascript:void(0);" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Delete" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle table-cancel"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></td>
                        </tr>
                      
                    
                                                             
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
              
                                          
                                    
                                        <button type="submit" class="btn btn-primary  float-end mt-3">Make Assignments</button>
                                    </form>
                                    </div>
                                </div>
    
                           
                            </div>
                            
                        </div>
                        
                    </div>

                </div>

            </div>

@endsection
