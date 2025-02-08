@extends('backend.layouts.app')
@section('title', 'Wallet Withdraw')
    <!-- Custom styles can be add here -->
        @push('custom-styles')

        <!---Styles---->

        @endpush
    <!-- ## End Custom Styles ## -->


    <!-- Custom scripts can be add here -->
        @push('custom-scripts')

        <!---Scripts---->

        @endpush
    <!-- ## End Custom Scripts ## -->

<!--Content Will Goes Here-->
    @section('content')

              <!--begin::Form-->
<form action="" method="post"  enctype="multipart/form-data">
@csrf
@method('POST')
    <div class="card card-primary card-outline mb-4">
        <!--begin::Header-->
        <div class="card-header">
            <a href="{{route('wallets.index')}}" class="btn btn-sm btn-primary"> << Back to Wallet</a>
        </div>
        <div class="card-body">


                <div class="row">
                        <div class="form-group col-6">
                            <label>Name : </label>
                            <input type="text" class="form-control" placeholder="{{Auth::user()->name}}" disabled>
                        </div>
                        <div class="form-group col-6">
                            <label>Email : </label>
                            <input type="text" class="form-control" placeholder="{{Auth::user()->email}}" disabled>
                        </div>
                        <div class="form-group col-6">
                            <label>Ticket Category :</label>
                            <select name="category" id="" class="form-control">
                                <option value="deposit" selected disabled>Withdraw</option>
                            </select>
                        </div>
                        <div class="form-group col-6">
                            <label>Subject :<danger class="text-danger">*</danger>  </label>
                            <input type="text" class="form-control" placeholder="Withdraw Request" disabled>
                        </div>


                        <div class="form-group col-12">
                            <label>Encrypted Message : <danger class="text-danger">*</danger> <p style="font-size: 10px">For confidential data (admin and requested user only can see )</p></label>
                            <textarea type="text" class="form-control" placeholder=""></textarea>
                        </div>
                        <div class="form-group col-6">
                            <label>Withdraw Amount :<danger class="text-danger">*</danger>
                                <p style="font-size: 10px">Your Wallet balance = {{Auth::user()->wallet->balance}}</p>
                            </label>
                            <input type="number" class="form-control" placeholder="Type your Amount to withdraw">
                        </div>

                        <div class="form-group col-12">
                            <label class="">Attachment :<danger class="text-danger">*</danger> <p style="font-size: 10px">Please kindly attach bank slip or transaction proof:</p> </label>
                            <input type="file" class="form-control" name="attachment">
                        </div>
                </div>

                <div class="card-footer row">
                        <div class="col-6">
                            <a href="">Reset</a>
                        </div>
                        <div class="col-6 text-end">
                            <button href="" class="btn btn-outline btn-primary ">Submit Ticket</button>
                        </div>
                </div>


        </div>
    </div>
</form>
    @endsection
<!-- ## End Content ## -->

