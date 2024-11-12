@extends('master')

@section('title', 'Donate')
@section('description', 'Donate')

@section('style')
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <style>
        .give-goal-progress {
            margin-bottom: 20px;
            clear: both;
        }

        .give-goal-progress .raised {
            margin-bottom: 15px;
        }

        .give-goal-progress .income {
            font-size: 46px;
            line-height: 48px;
            letter-spacing: -1px;
            color: #333;
        }

        .give-progress-bar {
            height: 20px;
            position: relative;
            background: #eee;
            border-radius: 25px;
            overflow: hidden;
        }

        element.style {
            width: 28.57%;
            background-color: #f0c84c;
        }

        .give-progress-bar>span {
            display: block;
            height: 100%;
            border-top-right-radius: 8px;
            border-bottom-right-radius: 8px;
            border-top-left-radius: 20px;
            border-bottom-left-radius: 20px;
            background-color: #2bc253;
            position: relative;
            overflow: hidden;
        }

        .dollar_input>input {
            border: 1px solid #d8d8d8;
            font-size: 20px;
            padding-left: 8px;
        }

        .dollar_input>input:focus {
            border-color: transparent;
        }

        .donate_btn>button {
            font-size: 17px
        }

        .select_payment_method>h3 {
            font-size: 20px;
            padding: 12px 1px;
        }
    </style>
@endsection
@php
    $percentange = ($fund->donation_sum_raise / $fund->goal) * 100;
    $final_percentage = round($percentange);
@endphp
@section('content')
    <div class="page events-page">
        <div class="container">
            <div class="d-flex justify-content-center">
                <div class="card" style="width: 40rem;">
                    <div class="card-body">
                        <h3>{{ $fund->title }}</h3>
                        <div>

                            <div class="give-goal-progress">
                                <div class="raised">
                                    <span class="income">${{ number_format($fund->donation_sum_raise, 2, '.', ',') }}</span>
                                    of <span class="goal-text">${{ number_format($fund->goal, 2, '.', ',') }}</span> raised
                                </div>
                            </div>
                            <div class="give-progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                aria-valuenow="{{ $final_percentage }}">
                                <span style="width: {{ $final_percentage }}%; background-color:#f0c84c"></span>
                            </div>
                        </div>
                        <div class="pt-4">
                            {!! $fund->details !!}
                        </div>
                        <div class="pt-4">
                            <form>
                                <div class="mb-3 input-group dollar_input">
                                    <span class="input-group-text"><b>$</b></span>
                                    <input type="number" step="any" min="1" value="5.00">
                                </div>
                                <div class="donate_btn">
                                    <button type="button" class="btn btn-secondary btn mr-1"
                                        data-amounts="5.00">$5.00</button>
                                    <button type="button" class="btn btn-secondary btn m-1"
                                        data-amounts="10.00">$10.00</button>
                                    <button type="button" class="btn btn-secondary btn m-1"
                                        data-amounts="15.00">$15.00</button>
                                </div>
                                <div class="select_payment_method mt-2">
                                    <h3>Select Payment Method</h3>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="offline_donation" name="method"
                                            checked>
                                        <label class="form-check-label" for="offline_donation">
                                            Offline Donation
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="paypal_donation" name="method">
                                        <label class="form-check-label" for="paypal_donation">
                                            Paypal
                                        </label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" id="credit_card_donation"
                                            name="method">
                                        <label class="form-check-label" for="credit_card_donation">
                                            Credit Card
                                        </label>
                                    </div>
                                </div>
                                <div class="select_payment_method mt-2">
                                    <h3>Personal Info</h3>
                                    <div>
                                        <div class="row">
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="First Name">
                                            </div>
                                            <div class="col">
                                                <input type="text" class="form-control" placeholder="Last Name">
                                            </div>
                                        </div>
                                        <div class="mt-3">
                                            <input type="email" class="form-control" placeholder="Email Address">
                                        </div>
                                    </div>
                                </div>
                                <div class="additonal_place d-none">
                                    <ul class="pl-4 pt-3">
                                        <li>Write a check payable to "US Bangla BD"</li>
                                        <li>On the memo line of the check, indicate that the donation is for "US Bangla BD"
                                        </li>
                                        <li>Mail your check to:</li>
                                        <li>US Bangla BD</li>
                                        <li>111 Not A Real St.</li>
                                        <li>Anytown, CA 12345</li>

                                        <li>Your tax-deductible donation is greatly appreciated!</li>
                                    </ul>
                                </div>
                                <div class="mt-3">
                                    <div class="mb-3 input-group dollar_input">
                                        <span class="input-group-text"><b>Donation Total($):</b></span>
                                        <input type="number" step="any" min="1" value="5.00">
                                    </div>
                                </div>
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-yellow btn-lg">Donate Now</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection



@section('script')
    <script>
        $(document).ready(function() {
            $('.donate_btn button').click(function() {
                var amount = $(this).data('amounts');
                $('.dollar_input input').val(amount);
            });

            $('#offline_donation').on('click', function() {
                if ($(this).is(':checked')) {
                    $(".additonal_place").removeClass("d-none");
                }

            });

            $('#paypal_donation').on('click', function() {
                if ($(this).is(':checked')) {
                    $(".additonal_place").addClass("d-none");
                }

            });

            $('#credit_card_donation').on('click', function() {
                if ($(this).is(':checked')) {
                    $(".additonal_place").addClass("d-none");
                }

            });
            

            if ($("#offline_donation").is(':checked')) {
                $(".additonal_place").removeClass("d-none");
            }




        });
    </script>
@endsection
