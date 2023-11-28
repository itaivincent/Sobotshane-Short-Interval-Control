@extends('template.default')
<style>
        .hidden {
            display: none;
        }
    </style>
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
                                    <h2>Create an Asset</h2>

                                </div>
                            </div>
    
                            <div class="tab-content" id="animateLineContent-4">
                            
                                <div class="tab-panel" id="animated-underline-profile" role="tabpanel" aria-labelledby="animated-underline-profile-tab">
                                    <div class="row">
                                    <form method="post"  id="assets" action="{{ route('assets.store') }}">
                                      @csrf   
    
                                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Add Asset Details</h6>                              
    
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Make</label>
                                                                <input type="text" name="make" class="form-control add-billing-address-input">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Registration</label>
                                                                <input type="text" name="registration" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Model</label>
                                                                <input type="text" name="model"  class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Vin Number</label>
                                                                <input type="text"  name="vinNumber" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                            <label class="form-label">Asset Type</label>
                                                                <div class="invoice-action-currency">
                                                                    <div class="dropdown selectable-dropdown cardName-select">
                                                                    <select name="assetType"  id="assetType" class="form-select" onchange="toggleFields()">
                                                                    <option selected="">Choose...</option>
                                                                    <option value="Trailer">Trailer</option>
                                                                    <option value="Horse">Horse</option>
                                                                                                                                                                 
                                                                   </select>  
                                                                    </div>
                                                                </div>                                                                                                                                                                                                                         
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Asset Weight</label>
                                                                <input type="text"  name="weight"  class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Registration Expiration Date</label>
                                                                <input type="date"  name="registrationExpireDate"  class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">License Number</label>
                                                                <input type="text" name="licenseNumber"  class="form-control add-payment-method-input">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Registration Year</label>
                                                                <input type="text" name="registrationYear"  class="form-control add-payment-method-input">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    

                                                
                                                </div>
                                            </div>
                                        </div>
    
                                        
                                        <div class="hidden"  id="truckform" >
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Add Truck Details</h6>                                     
    
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">                                                            
                                                                <label class="form-label">Engine Capacity</label>  
                                                                <input type="text"  name="engineCapacity" class="form-control">
                                                            </div>
                                                        </div>

                                                        <div class="col-md-4">
                                                            <div class="mb-3">                                                            
                                                                <label class="form-label">Expected Fuel Consumption</label>  
                                                                <input type="text"  name="expectedFuelConsumption" class="form-control">
                                                            </div>
                                                        </div>
                                                 
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Mileage (Kms)</label>
                                                                <input type="text"  name="mileage"  class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Fuel Type</label>
                                                                <input type="text"  name="fueltype"  class="form-control">
                                                            </div>
                                                        </div>                                          
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                            <label class="form-label">Truck Type</label>
                                                                <div class="invoice-action-currency">
                                                                    <div class="dropdown selectable-dropdown cardName-select">
                                                                    <select name="truckType"  id="truckType" class="form-select">
                                                                    <option selected="">Choose...</option>
                                                                    <option value="Interlink">Interlink</option>
                                                                    <option value="Superlink">Superlink</option>                                                                                                                                                             
                                                                    </select>  
                                                                    </div>
                                                                </div>                                            
                                                         
                                                                                                                      
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Gear Model</label>
                                                                <input type="text"  name="gearType"  class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    
                                                </div>
                                                
                                            </div>
                                           
                                        </div>


                                        <div class="hidden"  id="trailerform">
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Add Trailer Details</h6>                                     
    
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Trailer Type</label>
                                                                <div class="invoice-action-currency">
                                                                    <div class="dropdown selectable-dropdown cardName-select">
                                                                    <select name="trailerType" class="form-select">
                                                                    <option selected="">Choose...</option>
                                                                    <option value="Dump">Dump</option>
                                                                    <option value="Tanker">Tanker</option>
                                                                    <option value="Intermodal">Intermodal</option>                                                                                                              
                                                                   </select>  
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
    
                                                         <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Payload Capacity</label>
                                                                <input type="text" name="payloadCapacity"  class="form-control add-payment-method-input">
                                                            </div>
                                                        </div>
                                                                                                      
                                                    </div>
    
                                                  
                                                </div>
                                                
                                            </div>
                                           
                                        </div>
                                        <button type="submit" class="btn btn-primary  float-end mt-3">Create Asset</button>
                                    </form>
                                    </div>
                                </div>
    
                           
                            </div>
                            
                        </div>
                        
                    </div>

                </div>

            </div>

            <script>
                function toggleFields() {
                    var assetType = document.getElementById('assetType');
                    var truckform = document.getElementById('truckform');
                    var trailerform = document.getElementById('trailerform');
                 
                    // Reset all fields to hidden
                    truckform.classList.add('hidden');
                    trailerform.classList.add('hidden');
           

                    // Show the selected field based on the option
                    if (assetType.value === 'Horse') {
                        truckform.classList.remove('hidden');
                    } else  
                    {
                        trailerform.classList.remove('hidden');
                    }                     
                 
                }
            </script>
   

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