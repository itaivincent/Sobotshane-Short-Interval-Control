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
                                    <form method="post"  id="assets" action="{{ route('assignments.storeassetdriver') }}">
                                      @csrf   
    
                                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Select an Asset</h6>                              
    
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                            <label class="form-label">Assets</label>
                                                                <div class="invoice-action-currency">
                                                                    <div class="dropdown selectable-dropdown cardName-select">
                                                                    <select name="asset" class="form-select">
                                                                    <option selected="">Choose an Asset</option>
                                                                    @foreach ( $assets as $asset)
                                                                    <option value="{{$asset->id}}"> {{$asset->make}}  {{$asset->model}}  {{ $asset->assetType }} Capacity {{$asset->payloadCapacity}}</option>                                                                                                       
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


                    <!-- Assets -->
                                    
                                    <h6 class="">Select Driver</h6>                                     
                    
                    <div class="col-lg-12" id="assets" >
                        <div class="statbox widget box box-shadow">
                            <div class="widget-content widget-content-area">
                                <table id="styl-1" class="table style-2 dt-table-hover">
                                    <thead>
                                        <tr>
                                            <th class="checkbox-column dt-no-sorting"> Record Id </th>
                                            <th>Name</th>
                                            <th class="text-center">Surname</th>
                                            <th>Group</th>
                                            <th>Licence Exp Date</th>
                                            <th>Vehicle Type</th>                          
                                            <th class="text-center">Status</th>
                                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $drivers as $asset)
                                        <tr>
                                            <td class="text-center">
                                            <input type="checkbox"  name="driverIds[]" value="{{ $asset->id }}">
                                            </td>
                                            <td class="text-center">{{$asset->name}}</td>
                                            <td class="text-center">{{$asset->surname}}</td>
                                            <td class="text-center">{{$asset->group}}</td>
                                            <td class="text-center">{{$asset->licenseExpireDate}}</td>
                                            <td class="text-center">{{$asset->vehicleType}}</td>
                                            <td class="text-center"><span class="shadow-none badge badge-primary">Approved</span></td>
                                        </tr> 
                                        @endforeach                                                                                                                       
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
              
                                          
                                    
                                        <button type="submit" onclick="getSelectedCheckboxes()" class="btn btn-primary  float-end mt-3">Make Assignments</button>
                                    </form>
                                    </div>
                                </div>
                               
                          
                            </div>
                            
                        </div>
                        
                    </div>

                    

                </div>

            </div>

            
  
@endsection
