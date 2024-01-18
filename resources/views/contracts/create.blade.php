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
                                <li class="breadcrumb-item active" aria-current="page">Create New Contract</li>
                            </ol>
                        </nav>
                    </div>
                    <!-- /BREADCRUMB -->
                        
                    <div class="account-settings-container layout-top-spacing">
    
                        <div class="account-content">
                            <div class="row mb-3">
                                <div class="col-md-12">
                                   
                                </div>
                            </div>
    
                            <div class="tab-content" id="animateLineContent-4">
                            
                                <div class="tab-panel" id="animated-underline-profile" role="tabpanel" aria-labelledby="animated-underline-profile-tab">
                                    <div class="row">
                                    <form action="{{ route('contracts.store') }}" method="post" enctype="multipart/form-data">
                                    @method('POST')
                                      @csrf   
    
                                        <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                            <div class="section general-info payment-info">
                                                <div class="info">
                                                    <h6 class="">Add Contract Details</h6>                              
    
                                                    <div class="row mt-4">
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Contract Number</label>
                                                                <input type="text" name="number" class="form-control add-billing-address-input">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Service Provider</label>
                                                                <input type="text" name="provider" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Client </label>
                                                                <input type="text" name="client"  class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Duration (Months)</label>
                                                                <input type="text"  name="duration" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Product delivered</label>                                              
                                                                <input type="text"  name="commodity" class="form-control">
                                                                                                                      
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Effective Date</label>
                                                                <input type="date"   name="date"  class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Contract Value(R)</label>
                                                                <input type="text"  name="contractValue" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Forecast Monthly Volume(Ton)</label>
                                                                <input type="text" name="forecastMonthlyVolume" class="form-control add-billing-address-input">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Forecast Weekly Volume(Ton)</label>
                                                                <input type="text" name="forecastWeeklyVolume" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row mt-4">
                                                  
                                                        <div class="col-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Forecast Daily Volume(Ton)</label>
                                                                <input type="text" name="forecastDailyVolume"  class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Required Monthly Distance(km)</label>
                                                                <input type="text"  name="requiredMonthlyDistance" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Required Monthly Volume(Ton)</label>                                              
                                                                <input type="text"  name="requiredMonthlyVolume" class="form-control">
                                                                                                                      
                                                            </div>
                                                        </div>
                                                        <div class="col-md-4">
                                                            <div class="mb-3">
                                                                <label class="form-label">Upload Contract</label>                                              
                                                                <input type="file" id="contractImage" name="contractImage" class="form-control">                                                                                                                  
                                                            </div>
                                                        </div>

                                                
                                                </div>
                                            </div>
                                        </div>
                                        

                                        <button type="submit" class="btn btn-primary  float-end mt-3">Create Contract</button>

                                    </form>
                                    </div>
                                </div>
    
                           
                            </div>
                            
                        </div>
                        
                    </div>

                </div>

            </div>

            <!--  BEGIN FOOTER  -->
            
            <!--  END FOOTER  -->
            
        </div>
@endsection