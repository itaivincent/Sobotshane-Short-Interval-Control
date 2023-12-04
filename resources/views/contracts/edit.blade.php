@extends('template.default')

@section('content')
<div id="content" class="main-content">
            <div class="layout-px-spacing">

                <div class="middle-content container-xxl p-0">


                               <!-- BREADCRUMB -->
                               <div class="page-meta">
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Contracts</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Update Details</li>
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
                                                        <input type="text" class="form-control" placeholder="Invoice Label" value="Update Contract Record">
                                                    </div>
                                        
                                                        </div>
                                                    </div>
                                                    
                                                
    
                                                </div>
    
                                                <div class="invoice-detail-header">
    
                                                    <div class="row justify-content-between">
                                                        <div class="col-xl-5 invoice-address-company">
    
                                                            <h4>contract Details:</h4>
    
                                                            <form method="post" action="/contracts/update/{{$contract->id}}">
                                                            @csrf 
                                                            @method('put')
                                                            <div class="invoice-address-company-fields">
    
                                                                <div class="form-group row">
                                                                    <label for="company-name" class="col-sm-3 col-form-label col-form-label-sm">Number</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="make" id="company-name" placeholder="" value="{{$contract->number}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-email" class="col-sm-3 col-form-label col-form-label-sm">Provider</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="registration" id="company-email" placeholder="" value="{{$contract->provider}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-address" class="col-sm-3 col-form-label col-form-label-sm">Client</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm"  name="contractType" id="company-address" placeholder="" value="{{$contract->client}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="company-phone" class="col-sm-3 col-form-label col-form-label-sm">Product</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm"  name="commodity" id="company-phone" placeholder="" value="{{$contract->commodity}}">
                                                                    </div>
                                                                </div>
                                                                    
                                                                
                                                                <div class="form-group row">
                                                                    <label for="company-phone" class="col-sm-3 col-form-label col-form-label-sm">Status</label>
                                                                    <div class="col-sm-9">
                                                                        @if ($contract->status == 1)
                                                                        <span class="badge badge-light-success inv-status">Available</span> 
                                                                        @elseif($contract->status == 2)
                                                                        <span class="badge badge-light-danger inv-status">Not Available</span> 
                                                                        @else
                                                                        <span class="badge badge-light-info inv-status">Not Assigned</span>  
                                                                        @endif
                                                                 
                                                                    </div>
                                                                </div>                                                                
                                                                
                                                                
                                                            </div>
                                                            
                                                        </div>
    
    
                                                        <div class="col-xl-5 invoice-address-client">
    
                                                            <h4></h4><br/>
    
                                                            <div class="invoice-address-client-fields">
    
                                                                <div class="form-group row">
                                                                    <label for="client-name" class="col-sm-3 col-form-label col-form-label-sm">Duration</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="duration" id="client-name" placeholder="" value="{{$contract->duration}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-email" class="col-sm-3 col-form-label col-form-label-sm">Effective Date</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="date" class="form-control form-control-sm" name="effectiveDate" id="client-email" placeholder="" value="{{$contract->effectiveDate}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-address" class="col-sm-3 col-form-label col-form-label-sm">Required Monthly Distance</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="createdBy" id="client-address" placeholder="" value="{{$contract->requiredMonthlyDistance}}">
                                                                    </div>
                                                                </div>
    
                                                                <div class="form-group row">
                                                                    <label for="client-phone" class="col-sm-3 col-form-label col-form-label-sm">Required Monthly Quantity</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="requiredMonthlyQuantity" id="client-phone" placeholder="" value="{{$contract->requiredMonthlyQuantity}}">
                                                                    </div>
                                                                </div>
                                                                <div class="form-group row">
                                                                    <label for="client-phone" class="col-sm-3 col-form-label col-form-label-sm">Required Monthly Volume</label>
                                                                    <div class="col-sm-9">
                                                                        <input type="text" class="form-control form-control-sm" name="requiredMonthlyVolume" id="client-phone"  value="{{$contract->requiredMonthlyVolume}}">
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
                                                                <label for="number">Forecast Monthly Volume</label>
                                                                <input type="text" class="form-control form-control-sm" name="mileage" id="number" placeholder="#0001" value="{{$contract->forecastMonthlyVolume}}">
                                                            </div>
                                                        </div>
    
                                                        <div class="col-md-3"> 
                                                            <div class="form-group mb-4">
                                                                <label for="date">Forecast Weekly Volume</label>
                                                                <input type="text" class="form-control form-control-sm"  name="fueltype" id="date" placeholder="Add date picker" value="{{$contract->forecastWeeklyVolume}}">
                                                            </div>
                                                        </div>
    
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-4">
                                                                <label for="due">Forecast Daily Volume</label>
                                                                <input type="text" class="form-control form-control-sm"  name="registrationExpireDate" id="due" placeholder="None" value="{{$contract->forecastDailyVolume}}">
                                                            </div>       
                                                        </div> 
                                                    </div>  

                                                    <div class="row justify-content-between">
                                                        <div class="col-md-3"> 
                                                            <div class="form-group mb-4">
                                                                <label for="number">Engine Capacity</label>
                                                                <input type="text" class="form-control form-control-sm" name="engineCapacity" id="number"  value="{{$contract->engineCapacity}}">
                                                            </div>
                                                        </div>
    
                                                        <div class="col-md-3"> 
                                                            <div class="form-group mb-4">
                                                                <label for="date">Expected Fuel Consumption</label>
                                                                <input type="text" class="form-control form-control-sm"  name="expectedFuelConsumption" id="date"  value="{{$contract->expectedFuelConsumption}}">
                                                            </div>
                                                        </div>
    
                                                        <div class="col-md-3">
                                                            <div class="form-group mb-4">
                                                                <label for="due">Gear Model</label>
                                                                <input type="text" class="form-control form-control-sm"  name="gearType" id="due" value="{{$contract->gearType }}">
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
                                                                    <select name="status" class="form-select"  />
                                                                    <option value="{{ $contract->id}}">Choose...</option>
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
                                                                 
                                                          
                                                                    <select name="statusReason" class="form-select"  />
                                                                    <option value="">Choose...</option>
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
                                                        <button type="submit" class="btn btn-success btn-download">Update contract Record</button>
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