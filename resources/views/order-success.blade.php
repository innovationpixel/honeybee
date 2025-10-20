@extends('layouts.admin')

@section('html')

	<style type="text/css">
		.body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            margin: 0;
        }

        .success-container {
            text-align: center;
            background: #fff;
            border: 2px solid #4caf50;
            border-radius: 15px;
            padding: 50px;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
        }

        .success-icon {
            font-size: 100px;
            color: #4caf50;
        }

        .success-text {
            font-size: 24px;
            color: #333;
            margin-top: 20px;
            font-weight: bold;
        }
	</style>

	<div class="body">
		<div class="success-container">
	        <div class="success-icon">✔</div>
	        <div class="success-text pt-5">Order Placed</div>
            <p class="pt-3">Your order has been place. You will receive a confirmation email.</p>
            <a href="{{ route('shop') }}" class="btn">Back to shop</a>
	    </div>		
	</div>

    <script type="text/javascript">
        $(document).ready(function()
        {
            window.history.pushState(null, "", window.location.href);
        })
    </script>

@stop