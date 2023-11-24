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
                                <li class="breadcrumb-item active" aria-current="page">Update Status</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->

                    <div class="row invoice layout-top-spacing layout-spacing">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            
                            <div class="doc-container">
    
                                <div class="row">
                                    <div class="col-xl-9">
    
                                        <div class="invoice-content">
    
                                            <div class="invoice-detail-body">
    
                                                <div class="invoice-detail-title">
    
                                                    <div class="invoice-logo">
                                                        <div class="profile-image">

                                                            <!-- // The classic file input element we'll enhance
                                                            // to a file pond, we moved the configuration
                                                            // properties to JavaScript -->
                                        
                                                            <div class="invoice-title">
                                                        <input type="text" class="form-control" placeholder="Invoice Label" value="Update Asset Record">
                                                    </div>
                                        
                                                        </div>
                                                    </div>
                                                    
                                                
    
                                                </div>
    
                                                <div class="invoice-detail-header">
    
                                                    <div class="row justify-content-between">
                                                        <div class="col-xl-5 invoice-address-company">
    
                                                            <h4>Asset Details:</h4>
    
                                                            <form method="post" action="/assets/update/{{$asset->id}}">
                                                            @csrf 
                                                            @method('put')
                                                            <div class="invoice-address-company-fields">
    
                                                                <div class="form-group row">
                                                                    <label for="company-name" class="col-sm-3 col-form-label col-form-label-sm">Make</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="make" id="company-name" placeholder="Business Name" value="{{$asset->make}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-email" class="col-sm-3 col-form-label col-form-label-sm">Registration</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="registration" id="company-email" placeholder="name@company.com" value="{{$asset->registration}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-address" class="col-sm-3 col-form-label col-form-label-sm">Description</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm"  name="assetDescription" id="company-address" placeholder="XYZ Street" value="{{$asset->assetDescription}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-phone" class="col-sm-3 col-form-label col-form-label-sm">Vin Number</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm"  name="vinNumber" id="company-phone" placeholder="(123) 456 789" value="{{$asset->vinNumber}}">
                                                                    </div>
                                                                </div>
                                                                    
                                                                
                                                                <div class="form-group row">
                                                                    <label for="company-phone" class="col-sm-3 col-form-label col-form-label-sm">Status</label>
                                                                    <div class="col-sm-9">
                                                                        @if ($asset->status == 1)
                                                                        <span class="badge badge-light-success inv-status">Available</span> 
                                                                        @else
                                                                        <span class="badge badge-light-danger inv-status">Not Available</span>   
                                                                        @endif
                                                                 
                                                                    </div>
                                                                </div>                                                                
                                                                
                                                                
                                                            </div>
                                                            
                                                        </div>
    
    
                                                        <div class="col-xl-5 invoice-address-client">
    
                                                            <h4></h4><br/>
    
                                                            <div class="invoice-address-client-fields">
    
                                                                <div class="form-group row">
                                                                    <label for="client-name" class="col-sm-3 col-form-label col-form-label-sm"> Capacity (Tons)</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="payloadCapacity" id="client-name" placeholder="Client Name" value="{{$asset->payloadCapacity}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-email" class="col-sm-3 col-form-label col-form-label-sm"> Weight</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="weight" id="client-email" placeholder="name@company.com" value="{{$asset->weight}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-address" class="col-sm-3 col-form-label col-form-label-sm"> Type</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="assetType" id="client-address" placeholder="XYZ Street" value="{{$asset->assetType}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-phone" class="col-sm-3 col-form-label col-form-label-sm">License Number</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="licenseNumber" id="client-phone" placeholder="(123) 456 789" value="{{$asset->licenseNumber}}">
                                                                    </div>
                                                                </div>
                                                                
                                                            </div> 
                                                            
                                                        </div>
                                                        
                                                        
                                                    </div>
                                                    
                                                </div>
    
                                                <div class="invoice-detail-terms">
    
                                                    <div class="row justify-content-between">
    
                                                        <div class="col-md-3">
    
                                                            <div class="form-group mb-4">
                                                                <label for="number">Mileage</label>
                                                                <input type="text" class="form-control form-control-sm" name="mileage" id="number" placeholder="#0001" value="{{$asset->mileage}}">
                                                            </div>
    
                                                        </div>
    
                                                        <div class="col-md-3">
    
                                                            <div class="form-group mb-4">
                                                                <label for="date">Fuel Type</label>
                                                                <input type="text" class="form-control form-control-sm"  name="fueltype" id="date" placeholder="Add date picker" value="{{$asset->fueltype}}">
                                                            </div>
                                                        </div>
    
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-4">
                                                                <label for="due">Registration Expiration Date</label>
                                                                <input type="text" class="form-control form-control-sm"  name="registrationExpireDate" id="due" placeholder="None" value="{{$asset->registrationExpireDate}}">
                                                            </div>
                                                            
                                                        </div>
    
                                                    </div>
                                                    
                                                </div>

                                                
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
    
                                    <div class="col-xl-3">
                                        
                                        <div class="invoice-actions">
    
                                            <div class="invoice-action-currency">
                                            
                                                <div class="form-group mb-0">
                                                    <label>Status</label>
                                                    <div class="dropdown selectable-dropdown invoice-select">                              
                                                                    <select name="status" class="form-select">
                                                                    <option selected="">Choose...</option>
                                                                    <option value="1">Available</option>
                                                                    <option value="2">Not Available</option>                                                                                                                                                                                                              
                                                                   </select>                               
                                                    </div>
                                                </div>
    
                                            </div>
    
                                            <div class="invoice-action-tax">
                                            
                                                <h5>Reason for Change</h5>
    
                                                <div class="invoice-action-tax-fields">
    
                                                    <div class="row">
                                                
                                                        <div class="col-12">
    
                                                            <div class="form-group mb-0">
                                                            
                                                                <div class="dropdown selectable-dropdown invoice-select">
                                                                 
                                                          
                                                                    <select name="statusReason" class="form-select">
                                                                    <option selected="">Choose...</option>
                                                                    <option value="Broken down">Broken down</option>
                                                                    <option value="Under Maintenance">Under Maintenance</option>
                                                                    <option value="Involved in Accident">Involved in Accident</option> 
                                                                    <option value="Repaired">Repaired</option>                                                                                                                 
                                                                   </select>  
                                                                 
                                                                </div>
    
                                                            </div>
    
                                                        </div>
                                                   
                                                    </div>
                                                </div>
    
                                            </div> 
    
                                        </div>
    
                                        <div class="invoice-actions-btn">
    
                                            <div class="invoice-action-btn">
                                                
                                                <div class="row">
                                            
                                                    <div class="col-xl-12 col-md-4">
                                                        <button type="submit" class="btn btn-success btn-download">Update Asset Record</button>
                                                    </div>
                                                    </form>
                                                </div>
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
                    <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/">DesignReset</a>, All rights reserved.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
            <!--  END FOOTER  -->
        </div>
@endsection