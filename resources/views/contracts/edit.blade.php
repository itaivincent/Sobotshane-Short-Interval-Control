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
                                                                        <span class="badge badge-light-info inv-status">Ongoing</span>  
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
                                                        <div class="col-md-4"> 
                                                            <div class="form-group mb-4">
                                                            <label class="form-label">Upload Contract</label>                                              
                                                            <input type="file" id="contractImage" name="contractImage" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-xl-12 col-md-4">
                                                        <a href="{{ url('/download-pdf/'. $contract->image) }}" class="btn btn-primary btn-send">Download Contract</a>
                                                    </div>                                   
                                             
                                                    </div>                                                
                                                    
                                                </div>
                                             
                                            </div>
                                            
                                        </div>
                                        
                                    </div>
    
                                    <div class="col-xl-3">
                                    
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
                                
                                
                                <!-- Escalation formulas  -->
                                <div class="row">
    
                                    <div class="col-xl-9">

                                        <div class="invoice-container">
                                            <div class="invoice-inbox">
                                                
                                                <div id="ct" class="">
                                                    
                                                    <div class="invoice-00001">
                                                        <div class="content-section">

                                                            <div class="inv--head-section inv--detail-section">
                                                            
                                                                <div class="row">

                                                                    <div class="col-sm-6 col-12 mr-auto">
                                                                        <div class="d-flex">
                                                                            <img class="company-logo" src="../src/assets/img/cork-logo.png" alt="company">
                                                                            <h3 class="in-heading align-self-center">Cork Inc.</h3>
                                                                        </div>
                                                                        <p class="inv-street-addr mt-3">XYZ Delta Street</p>
                                                                        <p class="inv-email-address">info@company.com</p>
                                                                        <p class="inv-email-address">(120) 456 789</p>
                                                                    </div>
                                                                    
                                                                    <div class="col-sm-6 text-sm-end">
                                                                        <p class="inv-list-number mt-sm-3 pb-sm-2 mt-4"><span class="inv-title">Invoice : </span> <span class="inv-number">#0001</span></p>
                                                                        <p class="inv-created-date mt-sm-5 mt-3"><span class="inv-title">Invoice Date : </span> <span class="inv-date">20 Mar 2022</span></p>
                                                                        <p class="inv-due-date"><span class="inv-title">Due Date : </span> <span class="inv-date">26 Mar 2022</span></p>
                                                                    </div>                                                                
                                                                </div>
                                                                
                                                            </div>

                                                            <div class="inv--detail-section inv--customer-detail-section">

                                                                <div class="row">

                                                                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                                        <p class="inv-to">Invoice To</p>
                                                                    </div>

                                                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 text-sm-end mt-sm-0 mt-5">
                                                                        <h6 class=" inv-title">Invoice From</h6>
                                                                    </div>
                                                                    
                                                                    <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                                        <p class="inv-customer-name">Jesse Cory</p>
                                                                        <p class="inv-street-addr">405 Mulberry Rd., NC, 28649</p>
                                                                        <p class="inv-email-address">jcory@company.com</p>
                                                                        <p class="inv-email-address">(128) 666 070</p>
                                                                    </div>
                                                                    
                                                                    <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1 text-sm-end">
                                                                        <p class="inv-customer-name">Oscar Garner</p>
                                                                        <p class="inv-street-addr">2161 Ferrell Street, MN, 56545 </p>
                                                                        <p class="inv-email-address">info@mail.com</p>
                                                                        <p class="inv-email-address">(218) 356 9954</p>
                                                                    </div>

                                                                </div>
                                                                
                                                            </div>

                                                            <div class="inv--product-table-section">
                                                                <div class="table-responsive">
                                                                    <table class="table">
                                                                        <thead class="">
                                                                            <tr>
                                                                                <th scope="col">S.No</th>
                                                                                <th scope="col">Items</th>
                                                                                <th class="text-end" scope="col">Qty</th>
                                                                                <th class="text-end" scope="col">Price</th>
                                                                                <th class="text-end" scope="col">Amount</th>
                                                                            </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                            <tr>
                                                                                <td>1</td>
                                                                                <td>Calendar App Customization</td>
                                                                                <td class="text-end">1</td>
                                                                                <td class="text-end">$120</td>
                                                                                <td class="text-end">$120</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>2</td>
                                                                                <td>Chat App Customization</td>
                                                                                <td class="text-end">1</td>
                                                                                <td class="text-end">$230</td>
                                                                                <td class="text-end">$230</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>3</td>
                                                                                <td>Laravel Integration</td>
                                                                                <td class="text-end">1</td>
                                                                                <td class="text-end">$405</td>
                                                                                <td class="text-end">$405</td>
                                                                            </tr>
                                                                            <tr>
                                                                                <td>4</td>
                                                                                <td>Backend UI Design</td>
                                                                                <td class="text-end">1</td>
                                                                                <td class="text-end">$2500</td>
                                                                                <td class="text-end">$2500</td>
                                                                            </tr>
                                                                        </tbody>
                                                                    </table>
                                                                </div>
                                                            </div>
                                                            
                                                            <div class="inv--total-amounts">
                                                            
                                                                <div class="row mt-4">
                                                                    <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                                    </div>
                                                                    <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                                        <div class="text-sm-end">
                                                                            <div class="row">
                                                                                <div class="col-sm-8 col-7">
                                                                                    <p class="">Sub Total :</p>
                                                                                </div>
                                                                                <div class="col-sm-4 col-5">
                                                                                    <p class="">$3155</p>
                                                                                </div>
                                                                                <div class="col-sm-8 col-7">
                                                                                    <p class="">Tax 10% :</p>
                                                                                </div>
                                                                                <div class="col-sm-4 col-5">
                                                                                    <p class="">$315</p>
                                                                                </div>
                                                                                <div class="col-sm-8 col-7">
                                                                                    <p class=" discount-rate">Shipping :</p>
                                                                                </div>
                                                                                <div class="col-sm-4 col-5">
                                                                                    <p class="">$10</p>
                                                                                </div>
                                                                                <div class="col-sm-8 col-7">
                                                                                    <p class=" discount-rate">Discount 5% :</p>
                                                                                </div>
                                                                                <div class="col-sm-4 col-5">
                                                                                    <p class="">$150</p>
                                                                                </div>
                                                                                <div class="col-sm-8 col-7 grand-total-title mt-3">
                                                                                    <h4 class="">Grand Total : </h4>
                                                                                </div>
                                                                                <div class="col-sm-4 col-5 grand-total-amount mt-3">
                                                                                    <h4 class="">$3480</h4>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="inv--note">

                                                                <div class="row mt-4">
                                                                    <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                                        <p>Note: Thank you for doing Business with us.</p>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                        </div>
                                                    </div> 
                                                    
                                                </div>


                                            </div>

                                        </div>

                                    </div>

                                    <div class="col-xl-3">

                                        <div class="invoice-actions-btn">

                                            <div class="invoice-action-btn">

                                                <div class="row">
                                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                                        <a href="javascript:void(0);" class="btn btn-primary btn-send">Send Invoice</a>
                                                    </div>
                                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                                        <a href="javascript:void(0);" class="btn btn-secondary btn-print  action-print">Print</a>
                                                    </div>
                                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                                        <a href="javascript:void(0);" class="btn btn-success btn-download">Download</a>
                                                    </div>
                                                    <div class="col-xl-12 col-md-3 col-sm-6">
                                                        <a href="./app-invoice-edit.html" class="btn btn-dark btn-edit">Edit</a>
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